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

// Combine house numbers and occupant names
$totalCombinedCounts = [];
foreach ($houseLabels as $key => $municipality) {
    $totalCombinedCounts[$municipality] = $houseValues[$key] + $occupantValues[$key];
}

// Fetch total count of house number records (for Residence)
$sqlTotalHouseNumbers = "SELECT municipality, COUNT(DISTINCT house_number) as count FROM house_leader  
                         WHERE municipality IN ('Madridejos', 'Bantayan', 'Santafe')
                         GROUP BY municipality";

$resultTotalHouseNumbers = $conn->query($sqlTotalHouseNumbers);

$totalHouseNumbers = [];
if ($resultTotalHouseNumbers->num_rows > 0) {
    while ($row = $resultTotalHouseNumbers->fetch_assoc()) {
        $totalHouseNumbers[$row['municipality']] = $row['count'];
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

// Calculate the total number of residents across all municipalities
$totalResidents = array_sum(array_column($residenceData, 'total_members'));

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
.card-container {
    display: flex;
    justify-content: center; /* Center the cards horizontally */
    gap: 20px; /* Add space between cards */
    flex-wrap: wrap; /* Ensure that cards wrap if the screen is too narrow */
    width: 100%; /* Full width to ensure centering */
    margin: 0 auto; /* Ensure the cards are centered in the viewport */
}

     /* Card box styling */
.card-box {
    width: 230px;
    height: 220px;
    padding: 20px 0px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    text-align: center; /* Center align text and icons */
    position: relative; /* Ensure all elements are positioned relative to the card */
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: 'Arial', sans-serif;
    font-size: 1rem;
    font-weight: bold;
}

/* Container for the section */
.section .container {
    display: flex;
    justify-content: center; /* Center the cards section */
    width: 100%;
    flex-wrap: wrap;
    margin-left: auto;
    margin-right: auto;
}

/* Media queries for mobile devices */
@media screen and (max-width: 767px) {
    .section .container {
        max-width: 100%;
        padding: 0;
    }

    .card-container {
        flex-wrap: nowrap;
        justify-content: flex-start;
        overflow-x: visible;
        padding: 0 5px;
        gap: 5px; /* Reduced gap between cards */
        margin-bottom: 15px;
    }

    .card-box {
        width: 103px;  /* Further reduced width */
        min-width: 103px;
        height: 90px;  /* Further reduced height */
        padding: 8px 0px;
        margin-right: 5px;
    }

    .card-box .inner {
        padding: 2px 2px 0 2px;
    }

    .card-box h3 {
        font-size: 16px !important;
        margin: 0 0 2px 0 !important;
        text-align: left !important;
        line-height: 1.2 !important;
    }

    .card-box p {
        font-size: 8px !important;
        margin-top: 30px !important;
        white-space: normal !important;
        line-height: 1.1 !important;
        padding: 0 2px !important;
    }

    .card-box .icon {
        margin-bottom: 20px;
        right: 2px;
    }

    .card-box .icon i {
        font-size: 30px;
    }

    .card-box:hover .icon i {
        font-size: 30px !important; /* Disable hover effect by resetting size */
        color: inherit !important; /* Remove hover color change */
        transition: none !important; /* Remove hover transition */
    }

    .col-xl-3.col-lg-6.col-md-6.mb-4 {
        flex: 0 0 auto;
        width: auto;
        max-width: none;
        padding: 0 2px; /* Reduced padding */
        margin-bottom: 0 !important;
    }
}

/* Extra small devices */
@media screen and (max-width: 375px) {
    .card-box {
        width: 90px !important;
        min-width: 90px !important;
        height: 90px !important;
    }

    .card-box h3 {
        font-size: 14px !important;
        margin: 0 0 2px 0 !important;
    }

    .card-box p {
        font-size: 8px !important;
        line-height: 1 !important;
    }

    .card-box .icon i {
        font-size: 16px !important;
    }
}

/* Very small devices */
@media screen and (max-width: 320px) {
    .card-box {
        width: 80px !important;
        min-width: 80px !important;
        height: 80px !important;
    }

    .card-box h3 {
        font-size: 12px !important;
    }

    .card-box p {
        font-size: 7px !important;
    }

    .card-box .icon i {
        font-size: 14px !important;
    }
}

/* Hide scrollbar but keep functionality */
.card-container::-webkit-scrollbar {
    display: none;
}

.card-container {
    -ms-overflow-style: none;
    scrollbar-width: none;
}



        .card-box:hover {
            text-decoration: none;
            color: #333333;
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-box:hover .icon i {
            font-size: 100px;
            transition: 1s;
            -webkit-transition: 1s;
            color: #468189;
        }

        .card-box .inner {
            padding: 5px 10px 0 10px;
        }

        .card-box h3 {
    font-size: 35px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}

.card-box p {
    font-size: 15px;
    margin-bottom: 5px;
}

        .card-box .icon {
            position: absolute;
            top: auto;
            bottom: 5px;
            right: 5px;
            z-index: 0;
            font-size: 72px;
            color: rgba(0, 0, 0, 0.15);
        }

        .card-box .card-box-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 8px 0;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .card-box:hover .card-box-footer {
            background: rgba(0, 0, 0, 0.3);
        }

        .bg-blue {
            background-color: #EDEDED !important;
        }

        .bg-green {
            background-color: #EDEDED !important;
        }

        .bg-orange {
            background-color: #EDEDED !important;
        }

        .bg-red {
            background-color: #EDEDED !important;
        }

       

        .dashboard-content {
    display: flex;
    justify-content: center; /* Center the content horizontally */
    width: 100%;
    padding: 20px; 
    margin-left: 0; /* Remove the left margin */
}

.chart-container {
    display: flex;
    justify-content: center; /* Center all charts horizontally */
    align-items: center; /* Align the charts at the top */
    gap: 30px; /* Add a gap between each chart */
   width: 200%;
   margin-left: 33px;
}
.doughnut-chart {
  width: 50%;
  height: auto;
  margin-left:27%;
}
.container{
margin-left:13%;
}
.chart-box {
    width: 100%;
        max-width: 800px;
        padding: 0 15px;
    flex: 1; /* Allow each chart to take equal space */
    text-align: center;
}

.chart-box-container {
    background-color: #ffffff; /* Background color for the box */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    padding: 20px; /* Inner padding */
    margin: 10px 0; /* Margin above and below the box */
    text-align: center; /* Center align text inside the box */
}

.chart-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        height: 400px; /* Default height */
    }
    @media screen and (max-width: 768px) {
    .chart-wrapper {
        height: 300px; /* Adjust height on smaller devices */
        margin-right: 50px;
        width: 85%;
    }

    /* Adjust the size of the h5 title and ensure it's centered */
    .card-title.text-center {
        margin-top: -50px !important;
        font-size: 14px !important;  /* Adjust the font size */
        text-align: center !important; /* Ensure the text is centered */
        margin-right: 20px !important;
    }
}
    @media screen and (max-width: 576px) {
        .chart-wrapper {
            height: 200px; /* Further adjust for very small devices */
        }
    }

    /* Ensure centering on small screens */
@media (max-width: 767px) {
    .chart-container {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center the entire chart container */
    }
    .chart-box-container {
        margin: 0 auto;
        text-align: center;
        margin-right: 59%;
    }
    .responsive-chart {
        max-width: 100% !important;
        height: auto !important;
    }
}

    </style>

<div class="pagetitle" data-aos="fade-up">
  <h1 style="margin-top:-20px;">Dashboard</h1>
</div><!-- End Page Title -->
<br>
<br>
<section class="section dashboard" data-aos="fade-up">
    <div class="container">
        <div class="row card-container" data-aos="fade-up">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3 class="total-barangay"><?php echo $totalBarangayCount; ?></h3>
                        <p><b>Total Barangay</b></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3 class="total-houses"><?php echo array_sum($data['totalHouseNumbers']); ?></h3>
                        <p><b>Total Houses</b></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-house" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
    <div class="card-box bg-red">
        <div class="inner">
            <h3 class="total-residence"><?php echo $totalResidents; ?></h3>
            <p><b>Total Residence</b></p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
    </div>
</div>

        </div>
    </div>
</section>
<br>
<hr>
<div class="dashboard-content mt-5" data-aos="fade-up">
    <div class="chart-container">
        <div class="chart-box">
        <h5 class="card-title text-center">Gender Distribution Bar Chart</h5>
            <div class="chart-wrapper">
                <canvas id="sexChart"></canvas>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const ctx = document.getElementById('sexChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Male', 'Female'],
                            datasets: [{
                                label: 'Number of People',
                                data: [
                                    <?php echo $sexData['Male']; ?>,  // Male count
                                    <?php echo $sexData['Female']; ?>  // Female count
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.6)',  // Blue for Male
                                    'rgba(255, 99, 132, 0.6)'   // Red for Female
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',  // Blue for Male
                                    'rgba(255, 99, 132, 1)'   // Red for Female
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>

<hr>
<div class="dashboard-content" data-aos="fade-up">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="chart-container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 d-flex justify-content-center mb-4" data-aos="flip-left" data-aos-delay="100">
                        <div class="chart-box-container text-center">
                            <h5 class="card-title">Barangay Count Per Municipality</h5>
                            <canvas id="barangayChart" style="max-width: 265px; max-height: 265px;" class="responsive-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 d-flex justify-content-center mb-4" data-aos="flip-left" data-aos-delay="200">
                        <div class="chart-box-container text-center">
                            <h5 class="card-title">House Count Per Municipality</h5>
                            <canvas id="houseCountChart" style="max-width: 265px; max-height: 265px;" class="responsive-chart"></canvas>
                        </div>
                    </div>

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
        new Chart(document.querySelector('#barangayChart'), {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode(array_keys($totalBarangays)); ?>,
                datasets: [{
                    label: 'Barangays',
                    data: <?php echo json_encode(array_values($totalBarangays)); ?>,
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
            }
        });
    });

    // Doughnut chart for House Count
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#houseCountChart'), {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($houseLabels); ?>,
                datasets: [{
                    label: 'Houses',
                    data: <?php echo json_encode($houseValues); ?>,
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
            }
        });
    });

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