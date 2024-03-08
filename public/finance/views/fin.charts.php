<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>



    <!-- Start: Sidebar -->
    <?php include "components/sidebar.php" ?>
    
    <!-- End: Sidebar -->



    <!-- Start: Body -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">


        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Charts</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <ul class="ml-auto flex items-center">
                <div class="text-black font-medium">Sample User</div>
                <li class="dropdown ml-3">
                    <i class="ri-arrow-down-s-line"></i>
                </li>
            </ul>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <!-- Start Charts -->
        <!-- Start: Second Section -->
        <div class="mt-10  h-2/4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="px-3 pt-5 border-solid border-2 border-gray-200 shadow-md">

                    <h2 class="font-sans font-bold text-xl">Income Statement</h2>

                    <canvas id="incomeBarChart"></canvas>

                </div>
                <div class="px-3 pt-5 border-solid border-2 border-gray-200 shadow-md">
                    <h2 class="font-sans font-bold text-xl">Balance</h2>
                    <!-- Balance Sheet in Pie Graph -->
                    <canvas id="balancePie" class="mx-auto my-auto"></canvas>
                </div>
            </div>

            <!-- Include Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                // get the canvas id of incomeBarChart
                var incomeBar = document.getElementById('incomeBarChart').getContext('2d');

                // Configure the chart
                var myChart = new Chart(incomeBar, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [{
                            label: 'Income',
                            data: [12000, 19000, 3000, 5000, 2000, 3000, 7000, 8000, 9000, 10000, 11000, 12000], // Replace with your income data
                            backgroundColor: 'rgba(255, 165, 0, 0.2)',
                            borderColor: 'rgba(255, 165, 0, 1)',
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

                // Get the context of the canvas element we want to select
                var balancePie = document.getElementById('balancePie').getContext('2d');

                var myPieChart = new Chart(balancePie, {
                    type: 'pie',
                    data: {
                        labels: ['Asstes', 'Liabilities'],
                        datasets: [{
                            data: [20, 30],
                            backgroundColor: ['rgb(255, 165, 0)', 'rgb(255, 205, 86)']
                        }]
                    },
                    options: {
                        responsive: true,
                    }
                });


            </script>



        </div>
            <!-- End: Second Section -->

        <!-- Start: Third Section -->
        <div class=" mt-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="col-span-1 px-3 pt-5 border-solid border-2 border-gray-200 shadow-md">
                    <h2 class="font-sans text-xl font-bold">Equity</h2>
                    <!-- Donut Chart for Equity -->
                    <div>
                        <canvas id="equityDonutChart"></canvas>
                    </div>
                </div>
                <div class="col-span-2 px-3 pt-5 border-solid border-2 border-gray-200 shadow-md">

                    <h2 class="mt-5  font-sans  font-bold text-xl">Cash Flow</h2>
                    <!-- Create a canvas element -->
                    <canvas id="salesGrowthChart"></canvas>
                </div>
            </div>

            <script>

                // Donut Chart Equity
                var equityDonut = document.getElementById('equityDonutChart').getContext('2d');

                var myChart = new Chart(equityDonut, {
                    type: 'doughnut',
                    data: {
                        labels: ['Equity1', 'Equity2', 'Equity3'],
                        datasets: [{
                            data: [10, 20, 30], // Replace with your equity data
                            backgroundColor: ['rgba(255, 165, 0, 0.5)', 'rgba(255, 165, 0, 0.7)', 'rgba(255, 165, 0, 0.9)']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true
                    }
                });

                // Initialize a new Chart.js instance
                var ctx = document.getElementById('salesGrowthChart').getContext('2d');

                // Configure the chart
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Sales Growth',
                            data: [12, 19, 3, 5, 2, 3, 7], // Replace with your data
                            backgroundColor: 'rgba(255, 165, 0, 0.2)',
                            borderColor: 'rgba(255, 165, 0, 1)',
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
            </script>

        </div>
        <!-- End: Third Section -->
    
        <!-- pie chart -->
        <div style="width: 800px;"><canvas id="pieChart"></canvas></div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="module" src="../public/finance/javascript/charts.js"></script>
        <!-- End Charts -->

</body>

</html>