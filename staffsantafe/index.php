<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:login.php"); // Redirect to login page if not logged in
    exit();
}
?>
<?php include 'header.php'; ?>


<main id="main" class="main">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background: #eee;
        }

        .card-box {
            position: relative;
            color: #fff;
            padding: 20px 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 150%; /* Ensure all cards have the same height */
        }

        .card-container {
          display: flex;
    justify-content: flex-start; /* Center cards horizontally */
    gap: 10px; /* Adjust spacing between cards */
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
            font-size: 27px;
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

        #myChart {
            margin-top: 100px; /* Adjust as needed */
        }
    </style>

    <div class="pagetitle">
      <br>
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->
<br>

                <!-- <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                    <div class="card-box bg-orange">
                        <div class="inner">
                        <h3 class="total-sitios">5464</h3>
                            <p><b>Total Sitios</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-location" aria-hidden="true"></i>
                        </div>              
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                    <div class="card-box bg-red">
                        <div class="inner">
                        <h3 class="total-residence">723</h3>
                            <p><b>Total Residence</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <canvas id="myChart" width="400" height="105"></canvas>
    
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var initialData = fetchDataFromCards(); // Initial data from the cards

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Barangay', 'Total Houses', 'Total Sitios', 'Total Residence'],
                    datasets: [{
                        label: 'Counts',
                        data: initialData,
                        backgroundColor: [
                            'rgba(0, 176, 255, 0.5)',
                            'rgba(0, 166, 90, 0.5)',
                            'rgba(243, 156, 18, 0.5)',
                            'rgba(217, 83, 79, 0.5)'
                        ],
                        borderColor: [
                            'rgba(0, 176, 255, 1)',
                            'rgba(0, 166, 90, 1)',
                            'rgba(243, 156, 18, 1)',
                            'rgba(217, 83, 79, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Update chart data every 5 seconds (adjust interval as needed)
            setInterval(function() {
                var newData = fetchDataFromCards();
                updateChart(myChart, newData);
            }, 5000); // Update every 5 seconds (adjust as needed)

            // Function to fetch data from card boxes
            function fetchDataFromCards() {
                var totalBarangay = parseInt(document.querySelector('.total-barangay').textContent);
                var totalHouses = parseInt(document.querySelector('.total-houses').textContent);
                var totalSitios = parseInt(document.querySelector('.total-sitios').textContent);
                var totalResidence = parseInt(document.querySelector('.total-residence').textContent);
                
                return [totalBarangay, totalHouses, totalSitios, totalResidence];
            }

            // Function to update the chart with new data
            function updateChart(chart, newData) {
                chart.data.datasets.forEach((dataset) => {
                    dataset.data = newData;
                });
                chart.update();
            }
        });
    </script>
<?php include 'footer.php'; ?>
