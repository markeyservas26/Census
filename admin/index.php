<?php
include 'header.php';
include '../database/db_connect.php';

// Prepare SQL to get municipality counts
$sql = "SELECT municipality, COUNT(*) as count FROM house_leader 
        WHERE municipality IN ('Madridejos', 'Bantayan', 'Santafe')
        GROUP BY municipality";

$result = $conn->query($sql);

$data = [];
$labels = [];
$values = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['municipality'];
        $values[] = $row['count'];
    }
}

// Prepare SQL to get house number counts
$sqlHouseNumbers = "SELECT municipality, COUNT(DISTINCT house_number) as count FROM house_leader 
                    WHERE municipality IN ('Madridejos', 'Bantayan', 'Santafe')
                    GROUP BY municipality";

$resultHouseNumbers = $conn->query($sqlHouseNumbers);

$houseData = [];
$houseLabels = [];
$houseValues = [];

if ($resultHouseNumbers->num_rows > 0) {
    while ($row = $resultHouseNumbers->fetch_assoc()) {
        $houseLabels[] = $row['municipality'];
        $houseValues[] = $row['count'];
    }
}

// Prepare SQL to get occupant name counts
$sqlOccupants = "SELECT municipality, COUNT(*) as count FROM house_leader 
                 WHERE municipality IN ('Madridejos', 'Bantayan', 'Santafe')
                 GROUP BY municipality";

$resultOccupants = $conn->query($sqlOccupants);

$occupantData = [];
$occupantLabels = [];
$occupantValues = [];

if ($resultOccupants->num_rows > 0) {
    while ($row = $resultOccupants->fetch_assoc()) {
        $occupantLabels[] = $row['municipality'];
        $occupantValues[] = $row['count'];
    }
}

$data = [
    'labels' => $labels,
    'values' => $values,
    'houseLabels' => $houseLabels,
    'houseValues' => $houseValues,
    'occupantLabels' => $occupantLabels,
    'occupantValues' => $occupantValues,
    'totalHouseNumbers' => $totalHouseNumbers,
    'totalCombinedCounts' => $totalCombinedCounts
];

// PHP code to count barangays for each municipality
$barangays = [
    'Bantayan' => [
        'Atop-Atop', 'Bigad', 'Bantigue', 'Baod', 'Binaobao', 'Botigues', 'Doong', 'Guiwanon', 'Hilotongan',
        'Kabac', 'Kabangbang', 'Kampingganon', 'Kangkaibe', 'Lipayran', 'Luyongbaybay', 'Mojon',
        'Oboob', 'Patao', 'Putian', 'Sillion', 'Suba', 'Sulangan', 'Sungko', 'Tamiao', 'Ticad'
    ],
    'Madridejos' => [
        'Poblacion', 'Mancilang', 'Malbago', 'Kaongkod', 'San Agustin', 'Kangwayan', 'Pili', 'Kodia',
        'Tabagak', 'Bunakan', 'Maalat', 'Tugas', 'Tarong', 'Talangnan'
    ],
    'Santa Fe' => [
        'Balidbid', 'Hagdan', 'Hilantagaan', 'Kinatarkan', 'Langub', 'Marikaban', 'Okoy', 'Poblacion',
        'Pooc', 'Talisay'
    ]
];

$totalBarangays = [];
foreach ($barangays as $municipality => $barangayList) {
    $totalBarangays[$municipality] = count($barangayList);
}

// Calculate the total number of barangays
$totalBarangayCount = array_sum($totalBarangays);

// Update totalCombinedCounts to reflect the total residence count
$totalCombinedCounts = [];
foreach ($houseLabels as $key => $municipality) {
    // Assuming 'occupantValues' is the count of total occupants per municipality
    $totalCombinedCounts[$municipality] = $houseValues[$key] + $occupantValues[$key];
}

$sqlSexCounts = "
    SELECT sex, COUNT(*) as count
    FROM (
        SELECT sex FROM house_leader WHERE municipality IN ('Madridejos', 'Bantayan', 'Santafe')
        UNION ALL
        SELECT spouse_sex AS sex FROM spouse WHERE municipality_spouse IN ('Madridejos', 'Bantayan', 'Santafe')
    ) AS combined_sex_counts
    GROUP BY sex
";

$resultSexCounts = $conn->query($sqlSexCounts);

// Debugging the query result
if ($resultSexCounts === false) {
    echo "Error executing query: " . $conn->error;
}

$sexData = [
    'Male' => 0,
    'Female' => 0
];

if ($resultSexCounts->num_rows > 0) {
    while ($row = $resultSexCounts->fetch_assoc()) {
        if ($row['sex'] == 'Male') {
            $sexData['Male'] = $row['count'];
        } else if ($row['sex'] == 'Female') {
            $sexData['Female'] = $row['count'];
        }
    }
} else {
    echo "No results found for the gender counts.";
}

// Output to verify
echo "Male: " . $sexData['Male'] . "<br>";
echo "Female: " . $sexData['Female'] . "<br>";

$municipalities = ['Madridejos', 'Bantayan', 'Santafe'];
// Function to get comprehensive residence data
function getResidenceData($conn, $municipalities) {
    $residenceData = [];

    foreach ($municipalities as $municipality) {
        // House Leaders
        $sqlHouseLeaders = "SELECT COUNT(*) as house_leader_count FROM house_leader 
                            WHERE municipality = ?";
        $stmtHouseLeaders = $conn->prepare($sqlHouseLeaders);
        $stmtHouseLeaders->bind_param("s", $municipality);
        $stmtHouseLeaders->execute();
        $resultHouseLeaders = $stmtHouseLeaders->get_result();
        $houseLeadersCount = $resultHouseLeaders->fetch_assoc()['house_leader_count'];

        // Spouses
        $sqlSpouses = "SELECT COUNT(*) as spouse_count FROM spouse 
                       WHERE municipality_spouse = ?";
        $stmtSpouses = $conn->prepare($sqlSpouses);
        $stmtSpouses->bind_param("s", $municipality);
        $stmtSpouses->execute();
        $resultSpouses = $stmtSpouses->get_result();
        $spousesCount = $resultSpouses->fetch_assoc()['spouse_count'];

        // Younger Household Members
        $sqlYounger = "SELECT COUNT(*) as younger_count 
                       FROM younger_household_members yhm
                       JOIN house_leader hl ON yhm.house_leader_id = hl.id
                       WHERE hl.municipality = ?";
        $stmtYounger = $conn->prepare($sqlYounger);
        $stmtYounger->bind_param("s", $municipality);
        $stmtYounger->execute();
        $resultYounger = $stmtYounger->get_result();
        $youngerCount = $resultYounger->fetch_assoc()['younger_count'];

        // Older Household Members
        $sqlOlder = "SELECT COUNT(*) as older_count 
                     FROM older_household_members ohm
                     JOIN house_leader hl ON ohm.house_leader_id = hl.id
                     WHERE hl.municipality = ?";
        $stmtOlder = $conn->prepare($sqlOlder);
        $stmtOlder->bind_param("s", $municipality);
        $stmtOlder->execute();
        $resultOlder = $stmtOlder->get_result();
        $olderCount = $resultOlder->fetch_assoc()['older_count'];

        // Total Unique Households (Distinct House Numbers)
        $sqlHouseNumbers = "SELECT COUNT(DISTINCT house_number) as unique_houses 
                            FROM house_leader 
                            WHERE municipality = ?";
        $stmtHouseNumbers = $conn->prepare($sqlHouseNumbers);
        $stmtHouseNumbers->bind_param("s", $municipality);
        $stmtHouseNumbers->execute();
        $resultHouseNumbers = $stmtHouseNumbers->get_result();
        $uniqueHouses = $resultHouseNumbers->fetch_assoc()['unique_houses'];

        // Compile data for this municipality
        $residenceData[$municipality] = [
            'house_leaders' => $houseLeadersCount,
            'spouses' => $spousesCount,
            'younger_members' => $youngerCount,
            'older_members' => $olderCount,
            'unique_houses' => $uniqueHouses,
            'total_members' => $houseLeadersCount + $spousesCount + $youngerCount + $olderCount
        ];
    }

    return $residenceData;
}

// Get comprehensive residence data
$residenceData = getResidenceData($conn, $municipalities);

// Prepare data for Chart.js
$chartLabels = array_keys($residenceData);
$chartValues = array_column($residenceData, 'total_members');
?>
<main id="main" class="main">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <style>
       body {
        background: #FEFCFF;
        max-width: 100vw;
    }

main{
    overflow: hidden;
}

        /* Adjusting the card container to center the cards */


    </style>

    <div class="pagetitle" data-aos="fade-up">
  <h1 style="margin-top:-20px;">Dashboard</h1>
</div><!-- End Page Title -->
<br>
<br>
<section class="section dashboard" data-aos="fade-up">
</section>
<br>
<hr>


<hr>
<div class="dashboard-content" data-aos="fade-up">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="chart-container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-4" data-aos="flip-left" data-aos-delay="300">
                        <div class="chart-box-container text-center">
                            <h5 class="card-title">Residence Count Per Municipality</h5>
                            <canvas id="residenceChart" style="max-width: 265px; max-height: 265px;" class="responsive-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    // Doughnut chart for Barangay Count

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#residenceChart'), {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chartLabels); ?>,
                datasets: [{
                    label: 'Total Residents',
                    data: <?php echo json_encode($chartValues); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 205, 86, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Total Residents by Municipality'
                    }
                }
            }
        });
    });

</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
      duration: 1200,  // Optional: Adjust animation duration
      once: true,      // Optional: Run animation only once
    });
  });
</script>

<?php include 'footer.php'; ?>