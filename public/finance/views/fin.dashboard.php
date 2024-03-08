<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <!-- Start: Sidebar -->
    <?php include "components/sidebar.php" ?>
    <!-- <div class="fixed bg-sidebar left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform">

        <div href="#" class="flex items-center pb-4">
            <img src="https://placehold.co/50x50" alt="" class="w-10 h-10 rounded object-cover">

            <span class="text-4xl  font-russo ml-3 text-white">BSCS 3A</span>
        </div>

        <ul class="mt-3">

            <li class="mb-1 group active ">
                <a href="#" class="flex items-center py-2 px-4 bg-fuchsia-200 bg-opacity-30 rounded-lg text-white ">
                    <i class="ri-speed-up-line mr-3 text-lg  "></i>
                    <span class="text-sm font-medium ">Dashboard</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-file-text-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Invoices</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-menu-search-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Expense Category</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-file-history-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Expense Record</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-box-3-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Items</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-bank-card-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Payments</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-funds-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Revenue Record</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-scales-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Balance Sheet</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-database-2-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Database</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-group-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Users</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
        </ul>

    </div>

    <div class="fixed top-0 left-0 w-full h-full z-40 md:hidden sidebar-overlay"></div> -->
    <!-- End: Sidebar -->

    <!-- Start: Dashboard -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">


        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Dashboard</p>
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

        <!-- Start: Inner Dashboard Analytics-->
        <div class="w-full h-1/4 p-6 bg-white">
            <!-- Start: Top Section -->
            <div class=" mb-6">
                <!-- Start: Top Left-Side Section -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  border-solid border-gray-400 shadow-md rounded-md px-5 py-4">
                    <div class="border-solid col-span-2 ">
                        <!-- Start: Welcome Message -->
                        <h1 class="font-sans font-bold  text-5xl">Hello, Sample User!</h1>
                        <p class="line-clamp-2 w-3/4 mt-3 font-sans text-xl text-gray-400 ">Welcome back! Ready to gear
                            up for another productive day?</p>
                        <!-- End: Welcome Message -->

                        <!-- Start: Mini-Dashboard Analytics -->
                        <div id="mini-dashboard" class="mt-10 grid grid-cols-1  md:grid-cols-2 md:grid-rows-2 gap-4">
                            <!-- Start: Dashboard Analytics: Total Items -->
                            <div class="bg-white rounded-md border border-gray-300 p-4 shadow-lg">
                                <div class="flex justify-between mb-4">
                                    <div>
                                        <div class="flex items-center mb-1">
                                            <div class="text-2xl font-semibold">0</div>
                                        </div>
                                        <div class="text-sm font-medium text-gray-400">Total Items</div>
                                    </div>
                                    <div>
                                        <i class="ri-file-text-line mr-3 text-4xl"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- End: Dashboard Analytics: Total Items -->
                        </div>
                        <!-- End: Mini-Dashboard Analytics -->

                        <!-- Start Script: mini-dashboard item repeater -->
                        <script>
                            var miniDashboard = document.getElementById('mini-dashboard');
                            // Array of mini-dashboard items
                            var mini_dash_items = [
                                "?",
                                "Total Expense",
                                "Balance"
                            ];
                            // Loop through the mini_dash_items array and display the mini-dashboard items
                            for (let index = 0; index < mini_dash_items.length; index++) {
                                // const element = array[index];
                                miniDashboard.innerHTML +=
                                    `
                                    <div class="bg-white rounded-md border border-gray-300 p-4 shadow-lg">
                                        <div class="flex justify-between mb-4">
                                            <div>
                                                <div class="flex items-center mb-1">
                                                    <div class="text-2xl font-semibold">0</div>
                                                </div>
                                                <div class="text-sm font-medium text-gray-400">${mini_dash_items[index]}</div>
                                            </div>
                                            <div>
                                            <i class="ri-file-text-line mr-3 text-4xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            }
                        </script>
                        <!-- End Script: mini-dashboard item repeater -->
                    </div>

                    <div class="text-right col-span-1">
                        <p class="font-sans font-bold text-xl">Today, March 04, 2024</p>
                    </div>



                </div>
                <!-- End: Top Left-Side Section -->

                <!-- Start: Top Right-Side Section -->

                <!-- End: Top Right-Side Section -->
            </div>
            <!-- End: Top Section -->


            <!-- Start: Second Section -->
            <div class="mt-10  h-2/4">
                <h1 class="font-sans font-bold text-3xl">Overview</h1>

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

            <!-- Start: Fourth Section -->
            <div class="mt-10 mb-10">

                <h1 class="font-sans font-bold text-xl">Recent Transaction</h1>

                <!-- Start: Table -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                    <table class="table-auto border-collapse border-slate-50 w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th class="px-6 py-3 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="recent-table">
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    1
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    John Doe
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    01/01/2024
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    $1000
                                </td>
                            </tr>
                    </table>
                    <script>
                        var recent_table = document.getElementById('recent-table');

                        for (let index = 0; index < 5; index++) {

                            recent_table.innerHTML += `
                        <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    1
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    John Doe
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    01/01/2024
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    $1000
                                </td> 
                            </tr>
                        `;
                        }
                    </script>
                </div>
                <!-- End: Table -->
            </div>
            <!-- End: Fourth Section -->

            <!-- Start: Fifth Section -->
            <div class="mt-10  grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Start: Inventory Request -->
                <div class="px-5 border-2 border-solid border-gray-300 shadow-lg">
                    <!-- Start: Header -->
                    <div class="flex justify-between mt-5 ">
                        <div>
                            <h1 class="font-sans text-xl font-bold">
                                Inventory Request
                            </h1>
                        </div>
                        <div>
                            <a href="#" class="text-sm font-sans font-semibold">View All</a>
                        </div>
                    </div>
                    <!-- End: Header -->
                    <!-- Start: Search Bar -->
                    <form action="#" method="get">
                        <div
                            class="mt-5 px-5 flex justify-between border-2 border-gray-200 bg-gray-200 rounded-xl transition-colors text-black">
                            <input type="text" name="search"
                                class="w-full pl-3 pr-10 py-2 text-black focus:outline-none bg-transparent transition-colors"
                                placeholder="Search by ID...">
                            <button class="block text-center text-xl">
                                <!-- Search -->
                                <i class="ri-search-line"></i>
                            </button>

                            <!-- <i class="ri-search-line">sdasd</i> -->
                        </div>
                    </form>
                    <!-- End: Search Bar -->
                    <br><br><br><br>
                    <br><br><br><br>
                    <br><br><br><br>
                </div>
                <!-- End: Inventory Request -->

                <!-- Start: Salary Request -->
                <div class="px-5 border-2 border-solid border-gray-300 shadow-lg">
                    <!-- Start: Header -->
                    <div class="flex justify-between mt-5 ">
                        <div>
                            <h1 class="font-sans text-xl font-bold">
                                Salary Request
                            </h1>
                        </div>
                        <div>
                            <a href="#" class="text-sm font-sans font-semibold">View All</a>
                        </div>
                    </div>
                    <!-- End: Header -->
                    <!-- Start: Search Bar -->
                    <form action="#" method="get">
                        <div
                            class="mt-5 px-5 flex justify-between border-2 border-gray-200 bg-gray-200 rounded-xl transition-colors text-black">
                            <input type="text" name="search"
                                class="w-full pl-3 pr-10 py-2 text-black focus:outline-none bg-transparent transition-colors"
                                placeholder="Search by ID...">
                            <button class="block text-center text-xl">
                                <!-- Search -->
                                <i class="ri-search-line"></i>
                            </button>

                            <!-- <i class="ri-search-line">sdasd</i> -->
                        </div>
                    </form>
                    <!-- End: Search Bar -->
                    <br><br><br><br>
                    <br><br><br><br>
                    <br><br><br><br>
                </div>
                <!-- End: Salary Request -->

            </div>
            <!-- End: Fifth Section -->
        </div>
        <!-- End: Inner Dashboard Analytics-->


    </main>
    <!-- End: Dashboard -->
</body>

</html>