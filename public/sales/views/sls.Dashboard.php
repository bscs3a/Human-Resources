
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>

    <!-- Stylesheets -->
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    require_once './src/dbconn.php';

    // Get PDO instance
    $database = Database::getInstance();
    $pdo = $database->connect();

    // Query for years
    $sqlYears = "SELECT DISTINCT YEAR(MonthYear) AS Year FROM TargetSales ORDER BY Year DESC";
    $stmtYears = $pdo->query($sqlYears);
    $years = $stmtYears->fetchAll(PDO::FETCH_ASSOC);

    // Query for target sales
    $sqlTargetSales = "SELECT MonthYear, TargetAmount FROM TargetSales ORDER BY MonthYear";
    $stmtTargetSales = $pdo->query($sqlTargetSales);
    $targetSales = $stmtTargetSales->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the labels and data for the chart
    $labels = [];
    $data = [];
    foreach ($targetSales as $targetSale) {
        $labels[] = date('Y-F', strtotime($targetSale['MonthYear']));  // Format the date as 'Year-MonthName'
        $data[] = $targetSale['TargetAmount'];
    }

    // Query for total sales
    $sqlTotalSales = "
        SELECT DATE_FORMAT(SaleDate, '%Y-%m-01') AS MonthYear, SUM(TotalAmount) AS TotalSales 
        FROM Sales 
        GROUP BY MonthYear 
        ORDER BY MonthYear
    ";
    $stmtTotalSales = $pdo->query($sqlTotalSales);
    $totalSales = $stmtTotalSales->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the data for the chart
    $totalSalesData = [];
    foreach ($totalSales as $totalSale) {
        $totalSalesData[] = $totalSale['TotalSales'];
    }
    ?>


</head>

<body>
    <?php include "components/sidebar.php" ?>
    <?php 
        if (session_status() === PHP_SESSION_ACTIVE) {
            if (isset($_SESSION['employee_name']) && isset($_SESSION['just_logged_in'])) {
                $db = Database::getInstance();
                $pdo = $db->connect();
                
                $logAction = "Log in";
        
                $sql = "INSERT INTO tbl_sls_audit (employee_name, log_action) VALUES (:employee_name, :log_action)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":employee_name", $_SESSION['employee_name']);
                $stmt->bindParam(":log_action", $logAction);
                $stmt->execute();
    
                // Unset the 'just_logged_in' session variable
                unset($_SESSION['just_logged_in']);
            }
        }
    ?>

    <!-- Main container -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Dashboard</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <ul class="ml-auto flex items-center">

                <div class="relative inline-block text-left">
                    <div>
                        <a class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-black bg-white rounded-md shadow-sm border-b-2 transition-all hover:bg-gray-200 focus:outline-none hover:cursor-pointer" id="options-menu" aria-haspopup="true" aria-expanded="true">
                            <div class="text-black font-medium mr-4 ">
                            <i class="ri-user-3-fill mx-1"></i> <?= $_SESSION['employee_name']; ?>
                            </div>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                    </div>

                    <div class="origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                        id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="py-1" role="none">
                            <a route="/sls/logout"
                                class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">
                                <i class="ri-logout-box-line"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('options-menu').addEventListener('click', function () {
                        var dropdownMenu = document.getElementById('dropdown-menu');
                        if (dropdownMenu.classList.contains('hidden')) {
                            dropdownMenu.classList.remove('hidden');
                        } else {
                            dropdownMenu.classList.add('hidden');
                        }
                    });
                </script>
            </ul>

            <!-- End: Profile -->

        </div>

        <div class="min-h-screen p-6">
            <!-- Dashboard Analytics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <?php
                // Get the current month
                $currentMonth = date('Y-m');

                // Query for target sales for the current month
                $sqlTargetSales = "
                    SELECT TargetAmount 
                    FROM TargetSales 
                    WHERE DATE_FORMAT(MonthYear, '%Y-%m') = ?
                ";
                $stmtTargetSales = $pdo->prepare($sqlTargetSales);
                $stmtTargetSales->execute([$currentMonth]);
                $targetSales = $stmtTargetSales->fetchColumn();

                // Query for actual sales for the current month
                $sqlActualSales = "
                    SELECT SUM(TotalAmount) AS ActualSales 
                    FROM Sales 
                    WHERE DATE_FORMAT(SaleDate, '%Y-%m') = ?
                ";
                $stmtActualSales = $pdo->prepare($sqlActualSales);
                $stmtActualSales->execute([$currentMonth]);
                $actualSales = $stmtActualSales->fetchColumn();
                ?>

                <!-- Target Sales Card -->
                <div class="md:col-span-2 bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                    <!-- Card header -->
                    <div class="flex justify-between">
                        <!-- Card title -->
                        <div>
                            <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                                <i class="ri-funds-box-fill ri-fw" style="font-size: 1.2em;"></i> Target Sales for <?php echo date('F Y', strtotime($currentMonth)); ?>
                            </div>
                            <!-- Card data -->
                            <div class="text-4xl font-semibold ml-5 mt-4" style="color: #262261;">Php <?php echo number_format($actualSales, 2); ?> <span style="color: gray;">/ Php <?php echo number_format($targetSales, 2); ?></span></div>
                            <!-- Additional data -->
                            <div class="text-sm font-semibold ml-5 mt-2" style="color: #5DD783;">+10% more than average</div>
                        </div>
                        <!-- Card options -->
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                        </div>
                    </div>
                </div>

                <?php
                // Get the current month
                $currentMonth = date('Y-m');

                // Query for the number of transactions for the current month
                $sqlTransactionRate = "
                    SELECT COUNT(*) AS TransactionRate 
                    FROM Sales 
                    WHERE DATE_FORMAT(SaleDate, '%Y-%m') = ?
                ";
                $stmtTransactionRate = $pdo->prepare($sqlTransactionRate);
                $stmtTransactionRate->execute([$currentMonth]);
                $transactionRate = $stmtTransactionRate->fetchColumn() ?: 0;

                // Query for the average number of transactions
                $sqlAverageTransactionRate = "
                    SELECT AVG(TransactionCount) AS AverageTransactionRate 
                    FROM (
                        SELECT COUNT(*) AS TransactionCount
                        FROM Sales 
                        GROUP BY DATE_FORMAT(SaleDate, '%Y-%m')
                    ) AS MonthlyTransactions
                ";
                $stmtAverageTransactionRate = $pdo->prepare($sqlAverageTransactionRate);
                $stmtAverageTransactionRate->execute();
                $averageTransactionRate = $stmtAverageTransactionRate->fetchColumn() ?: 0;

                // Calculate the percentage difference from the average
                $percentageDifference = $averageTransactionRate != 0 ? (($transactionRate - $averageTransactionRate) / $averageTransactionRate) * 100 : 0;
                ?>

                <!-- Transaction Rate Card -->
                <div class="bg-white rounded-md border p-6 shadow-md shadow-black/5">
                    <!-- Card header -->
                    <div class="flex justify-between">
                        <!-- Card title -->
                        <div>
                            <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                                <i class="ri-shake-hands-fill" style="font-size: 1.2em;"></i> Transaction Rate
                            </div>
                            <!-- Card data -->
                            <div class="text-4xl font-semibold ml-5 mt-4" style="color: #262261;"><?php echo $transactionRate; ?></div>
                            <!-- Additional data -->
                            <div class="text-sm font-semibold ml-5 mt-2" style="color: #5DD783;"><?php echo number_format($percentageDifference, 2); ?>% more than average</div>
                        </div>
                        <!-- Card options -->
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales and Stocks Analytics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Sales Chart Card -->
                <div class="md:col-span-2 bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                    <!-- Card header -->
                    <div class="flex justify-between">
                        <!-- Card title -->
                        <div>
                            <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                                <i class="ri-funds-box-fill ri-fw" style="font-size: 1.2em;"></i> Sales
                            </div>
                        </div>
                        <!-- Year Select -->
                        <div>
                            <select id="yearSelect" class="border rounded-md px-2 py-1">
                                <?php foreach ($years as $year) : ?>
                                    <option value="<?php echo $year['Year']; ?>"><?php echo $year['Year']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Sales Chart -->
                    <div class="h-60">
                        <canvas id="myChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Stocks Chart Card -->
                <div class="bg-white rounded-md border p-6 shadow-md shadow-black/5 h-full">
                    <!-- Card header -->
                    <div class="flex justify-between mb-2">
                        <!-- Card title -->
                        <div class="">
                            <div class="text-lg font-semibold text-gray-800" style="color: #262261;">
                                <i class="ri-box-3-fill" style="font-size: 1.2em;"></i> Stocks: <span class="font-bold text-gray-400">200/500</span>
                            </div>

                        </div>
                        <!-- Card options -->
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                        </div>
                    </div>
                    <!-- Stocks Chart -->
                    <div class="border border-dashed p-2 py-5 px-5 mt-10">
                        <canvas id="stocksChart" class="w-full h-96"></canvas>
                    </div>
                </div>

            </div>

            <div>
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Product Transactions</h1>
                    <div class="relative mb-3">
                        <select id="searchType" class="px-3 py-2 border rounded-lg mr-2">
                            <option value="product">Product</option>
                            <option value="orderId">Order ID</option>
                            <option value="customer">Customer</option>
                        </select>
                        <input type="text" id="productSearchInput" placeholder="Search..." class="px-3 py-2 pl-5 pr-10 border rounded-lg">
                        <!-- ... -->
                    </div>
                </div>

                <?php
                // Get PDO instance
                $database = Database::getInstance();
                $pdo = $database->connect();

                // Query for sale details
                $sqlSaleDetails = "
                    SELECT SaleDetails.*, Sales.SaleDate, Sales.CustomerID, Products.ProductName, Products.ProductImage, Customers.FirstName, Customers.LastName 
                    FROM SaleDetails 
                    JOIN Sales ON SaleDetails.SaleID = Sales.SaleID 
                    JOIN Products ON SaleDetails.ProductID = Products.ProductID 
                    JOIN Customers ON Sales.CustomerID = Customers.CustomerID
                ";
                $stmtSaleDetails = $pdo->query($sqlSaleDetails);
                $saleDetails = $stmtSaleDetails->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <table id="productTransactionsTable" class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 font-semibold">Product</th>
                            <th class="px-4 py-2 font-semibold">Order ID</th>
                            <th class="px-4 py-2 font-semibold">Date and Time</th>
                            <th class="px-4 py-2 font-semibold">Customer</th>
                            <th class="px-4 py-2 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($saleDetails as $saleDetail) : ?>
                            <tr class="border border-gray-200 bg-white">
                                <td class="px-4 py-2 flex items-start">
                                    <div class="size-16 rounded-full shadow-md bg-yellow-200 flex items-center justify-center mr-2">
                                        <img src="../<?= $saleDetail['ProductImage'] ?>" alt="Product Image" class="object-contain">
                                    </div>

                                    <div>
                                        <div><?= $saleDetail["ProductName"] ?></div>
                                        <div>Quantity: <?= $saleDetail["Quantity"] ?></div>
                                        <div>Price: $<?= $saleDetail["UnitPrice"] ?></div>
                                    </div>
                                </td>
                                <td class="px-4 py-2"><?= $saleDetail["SaleID"] ?></td>
                                <td class="px-4 py-2"><?= date("F j, Y, g:i a", strtotime($saleDetail["SaleDate"])) ?></td>
                                <td class="px-4 py-2"><?= $saleDetail["FirstName"] . " " . $saleDetail["LastName"] ?></td>
                                <td class='px-4 py-2'><a route='/sls/Transaction-Details/sale=<?php echo $saleDetail["SaleID"] ?>' class='text-blue-500 hover:underline view-link'>View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <script>
        // Trigger the change event for the year select element on page load
        window.onload = function() {
            var event = new Event('change');
            document.getElementById('yearSelect').dispatchEvent(event);
        };

        document.getElementById('yearSelect').addEventListener('change', function() {
            // Get the selected year
            var selectedYear = this.value;

            // Get the original labels and data
            var originalLabels = <?php echo json_encode($labels); ?>;
            var originalData = <?php echo json_encode($data); ?>;
            var originalTotalSalesData = <?php echo json_encode($totalSalesData); ?>;

            // Filter the labels and data based on the selected year
            var labels = [];
            var data = [];
            var totalSalesData = [];
            for (var i = 0; i < originalLabels.length; i++) {
                if (originalLabels[i].startsWith(selectedYear)) {
                    labels.push(originalLabels[i]);
                    data.push(originalData[i]);
                    totalSalesData.push(originalTotalSalesData[i]);
                }
            }

            // Update the chart labels and data
            myChart.data.labels = labels;
            myChart.data.datasets[0].data = data;
            myChart.data.datasets[1].data = totalSalesData;
            myChart.update();
        });
    </script>

    <script>
        document.getElementById('productSearchInput').addEventListener('keyup', function() {
            // Get the search input value
            var searchValue = this.value.toLowerCase();

            // Get the selected search type
            var searchType = document.getElementById('searchType').value;

            // Get all table rows
            var rows = document.querySelectorAll('#productTransactionsTable tbody tr');

            // Loop through the rows
            rows.forEach(function(row) {
                // Get the cell based on the search type
                var cell;
                switch (searchType) {
                    case 'product':
                        cell = row.querySelector('td:nth-child(1)');
                        break;
                    case 'orderId':
                        cell = row.querySelector('td:nth-child(2)');
                        break;
                    case 'customer':
                        cell = row.querySelector('td:nth-child(4)');
                        break;
                }

                // If the cell includes the search value, show the row, otherwise hide it
                if (cell.textContent.toLowerCase().includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

    <!-- Chart.js configurations -->
    <script>
        // Line Chart for Sales
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($labels); ?>, // Pass the labels
                datasets: [{
                    label: 'Target',
                    data: <?php echo json_encode($data); ?>, // Pass the target sales data
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }, {
                    label: 'Total Sales',
                    data: <?php echo json_encode($totalSalesData); ?>, // Pass the total sales data
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bar Chart for Stocks
        var ctx = document.getElementById('stocksChart').getContext('2d');
        var stocksChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Stocks'],
                datasets: [{
                        label: 'Sold',
                        data: [300],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
                    },
                    {
                        label: 'Remaining',
                        data: [200],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 500 // Set the maximum value of the y-axis to 500
                    }
                }
            }
        });
    </script>

    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
    <script src="./../src/route.js"></script>
</body>

</html>