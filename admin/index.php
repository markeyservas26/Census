<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Fallback page
    exit();
}
include 'header.php';
include '../database/db_connect.php';

// Prepare SQL to get municipality counts
$sql = "SELECT municipality, COUNT(*) as count FROM barangay_census 
        WHERE municipality IN ('madridejos', 'bantayan', 'santafe')
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
$sqlHouseNumbers = "SELECT municipality, COUNT(DISTINCT house_number) as count FROM barangay_census 
                    WHERE municipality IN ('madridejos', 'bantayan', 'santafe')
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
$sqlOccupants = "SELECT municipality, COUNT(*) as count FROM barangay_census 
                 WHERE municipality IN ('madridejos', 'bantayan', 'santafe')
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
$sqlTotalHouseNumbers = "SELECT municipality, COUNT(DISTINCT house_number) as count FROM barangay_census 
                         WHERE municipality IN ('madridejos', 'bantayan', 'santafe')
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
?>
<main id="main" class="main">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background: #FEFCFF;
            overflow-x: hidden;
        }

        .card-box {
            position: relative;
            color: #fff;
            padding: 20px 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 150%; /* Ensure all cards have the same height */
            margin-left:18px;
            width: 100%;
        }

        .card-container {
          display: flex;
    justify-content: flex-start; /* Center cards horizontally */
    gap: 20px; /* Adjust spacing between cards */
    flex-wrap: wrap;
  
        }

        .card-box:hover {
            text-decoration: none;
            color: #f1f1f1;
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-box:hover .icon i {
            font-size: 100px;
            transition: 1s;
            -webkit-transition: 1s;
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
            background-color: #00c0ef !important;
        }

        .bg-green {
            background-color: #00a65a !important;
        }

        .bg-orange {
            background-color: #f39c12 !important;
        }

        .bg-red {
            background-color: #d9534f !important;
        }

       

        .dashboard-content {
    display: flex;
    justify-content: center; /* Center the content horizontally */
    width: 100%;
    padding: 20px; 
    margin-left: 0; /* Remove the left margin */
}

.chart-container {
   width: 400%;
}
.doughnut-chart {
  width: 100%;
  height: auto;
  margin-left:27%;
}
.container{
margin-left:13%;
}

    </style>

    <div class="pagetitle">
      <br>
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->
<br>
<section class="section dashboard">
        <div class="container">
            <div class="row">
            <h5 class="card-title su" style="margin-left: 37px;">Overall Total </h5>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
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

                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
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

                <!-- <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                    <div class="card-box bg-orange">
                        <div class="inner">
                        <h3 class="total-sitios"><?php echo $data['values'][0]; ?></h3>
                            <p><b>Total Sitios</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-location" aria-hidden="true"></i>
                        </div>              
                    </div>
                </div> -->

                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                    <div class="card-box bg-red">
                        <div class="inner">
                        <h3 class="total-residence"><?php echo array_sum($totalCombinedCounts); ?></h3>
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
    <div class="dashboard-content mt-5">
    <div class="chart-container">
        <h5 class="card-title">Total Counts Bar Chart</h5>
        <canvas id="barChart" style="max-height: 400px;"></canvas>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                        labels: ['Total Barangay', 'Total Houses', 'Total Residence'],
                        datasets: [{
                            label: 'Counts',
                            data: [
                                <?php echo $totalBarangayCount; ?>, // Total Barangay
                                <?php echo array_sum($data['totalHouseNumbers']); ?>, // Total Houses
                                <?php echo array_sum($data['totalHouseNumbers']); ?>  // Total Residence
                            ],
                            backgroundColor: [
                               'rgb(0, 192, 239)',
                               'rgb(0, 166, 90)',
                               'rgb(217, 83, 79)'
                            ],
                            borderColor: [
                                'rgb(75, 192, 192)',
                                'rgb(153, 102, 255)',
                                'rgb(255, 159, 64)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
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
<div class="dashboard-content">
    <div class="chart-container">
        <div class="row">
            <!-- Doughnut Chart for Barangays -->
            <div class="col-lg-6 mb-4">
                <h5 class="card-title text-center">Barangay Count Every Municipalities</h5>
                <canvas id="barangayChart" style="max-height: 400px;"></canvas>
                <script>
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
                            },
                            options: {
                                plugins: {
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                const label = tooltipItem.label || '';
                                                const value = tooltipItem.raw || 0;
                                                return `${label}: ${value} Barangays`;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

             <!-- Doughnut Chart for Residences -->
             <div class="col-lg-6 mb-4">
                    <h5 class="card-title text-center">Residence Count Every Municipalities</h5>
                    <canvas id="residenceChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#residenceChart'), {
                                type: 'doughnut',
                                data: {
                                    labels: <?php echo json_encode(array_keys($totalCombinedCounts)); ?>,
                                    datasets: [{
                                        label: 'Residences',
                                        data: <?php echo json_encode(array_values($totalCombinedCounts)); ?>,
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
                                    plugins: {
                                        tooltip: {
                                            callbacks: {
                                                label: function(tooltipItem) {
                                                    const label = tooltipItem.label || '';
                                                    const value = tooltipItem.raw || 0;
                                                    return `${label}: ${value} Residences`;
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>
