<?php
//database connection
require_once './src/dbconn.php';

$db = Database::getInstance();
$conn = $db->connect();
if ($conn === null) {
    die('Failed to connect to the database.');
}
?>

<?php
        // Get the TruckID from the query parameters
$truckId = $_SESSION['truckId'] ?? null;

if ($truckId === null) {
    die('No TruckID provided.');
}
?>

<?php
        // Fetch the truck details
$stmt = $conn->prepare("SELECT * FROM trucks WHERE TruckID = :truckId");
$stmt->execute([':truckId' => $truckId]);

$truck = $stmt->fetch(PDO::FETCH_ASSOC);

if ($truck === false) {
    die('No truck found with the provided TruckID.');
}
?>

<?php
        // Display orders from DeliveryOrders table and intersect with Products and Sales tables
$stmt = $conn->prepare("SELECT DeliveryOrders.*, Products.ProductName, Sales.SaleDate FROM DeliveryOrders 
        INNER JOIN Products ON DeliveryOrders.ProductID = Products.ProductID
        INNER JOIN Sales ON DeliveryOrders.SaleID = Sales.SaleID");
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Assign</title>
    <link href="/Master/src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <!-- This is for sorting library -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>
<body>
    <?php include "component/sidebar.php" ?>

    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Delivery / Truck Assign</p>
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
        <!-- Content here -->
        <div class="pr-20 pl-20 pt-5 pb-5">
            <div class="h-auto bg-white rounded-lg shadow-xl border overflow-hidden">
                <!-- header -->
                <div class="h-auto p4 rounded-lg shadow-xl flex justify-between items-center" style="background-color: #262261;">
                    <h1 class="pt-3 pr-4 pl-4 pb-3 text-2xl font-bold text-white">Truck Assign</h1>
                    <button route='/dlv/dashboard' class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-4 rounded-2xl mr-4">
                        Close
                    </button>
                </div>
                <!-- content -->
                <!-- You could provide a form here to assign the truck to an order -->
                <div class="m-4 font-bold text-lg flex flex-col space-y-4">
                    <div class="flex justify-start space-x-20">
                        <p>Plate Number: <span class="font-normal text-gray-500"><?php echo $truck['PlateNumber']; ?></span></p>
                        <p>Truck Type: <span class="font-normal text-gray-500"><?php echo $truck['TruckType']; ?></p><br><br>
                    </div>
                    <div class="flex space-x-10">
                        <p>Select:</p>
                        <div class="border border-gray-200 overflow-auto max-h-[20rem] w-full">
                            <table id="myTable" class="w-full mb-4">
                                <thead class="sticky top-0 bg-white z-10">
                                    <tr>
                                        <th class="w-1/8 border px-4 py-2">Order ID</th>
                                        <th class="w-1/8 border px-4 py-2">Sale ID</th>
                                        <th class="w-1/8 border px-4 py-2">Item Name</th>
                                        <th class="w-1/8 border px-4 py-2">Quantity</th>
                                        <th class="w-1/8 border px-4 py-2">Order Date</th>
                                        <th class="w-1/8 border px-4 py-2">Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody class="font-normal text-center">
                                    <?php foreach ($results as $row): ?>        
                                        <tr>
                                            <td class="border px-4 py-2">
                                                <input type="checkbox" name="selectRow" class="mr-4 select-checkbox" data-weight="<?php echo $row['ProductWeight']; ?>" data-id="<?php echo $row['ProductID']; ?>">
                                            </td>
                                            <td class="border px-4 py-2"><?php echo $row['SaleID']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['ProductName']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['Quantity']; ?></td>
                                            <td class="border px-4 py-2"><?php echo date('Y-m-d', strtotime($row['SaleDate'])); ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['DeliveryDate']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>         
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- save -->
                    <div class="flex justify-center items-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl">
                            Go
                        </button>
                    </div>
                    <div class="flex justify-start items-center">
                        <button id="uncheck-all" class="px-2 py-1 bg-blue-500 text-white rounded text-sm w-auto">Uncheck All</button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <p class="text-lg text-gray-700">
                    Total Products Weight: <span id="total-weight" class="font-bold">0.00 kg</span>
                </p>
                <p class="text-lg text-gray-700 mt-4">
                    Number of Selected Orders: <span id="selected-count" class="font-bold">0</span>
                </p>
            </div>
        </div>
    </main>
                <!-- function for sorting library  --> 
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "paging":   false,
                "info":     false});
        } );
    </script>   
            <!-- JS function for sidebar -->
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
            <!-- Calculate total weight and product function -->
    <script>
        // Get the elements displaying the total weight and the number of selected orders
        var totalWeightElement = document.getElementById('total-weight');
        var selectedCountElement = document.getElementById('selected-count');

        // Initialize the total weight and the count of selected orders
        var totalWeight = 0;
        var selectedCount = 0;

        // Listen for click events on checkboxes
        var checkboxes = document.getElementsByClassName('select-checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('click', function() {
                // Get the weight of the product corresponding to the clicked checkbox
                var weight = parseFloat(this.getAttribute('data-weight'));

                // Update the total weight and the count of selected orders
                if (this.checked) {
                    totalWeight += weight;
                    selectedCount++;
                } else {
                    totalWeight -= weight;
                    selectedCount--;
                }

                // Update the content of the elements displaying the total weight and the number of selected orders
                totalWeightElement.textContent = totalWeight.toFixed(2) + ' kg';
                selectedCountElement.textContent = selectedCount;
            });
        }
    </script>
            <!-- Uncheck All -->
    <script>
        // Listen for click events on the "Uncheck All" button
        document.getElementById('uncheck-all').addEventListener('click', function() {
            // Uncheck all checkboxes and enable them
            var checkboxes = document.getElementsByClassName('select-checkbox');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = false;  // Enable the checkbox
            }

            // Reset the total weight and the count of selected orders
            totalWeight = 0;
            selectedCount = 0;

            // Update the content of the elements displaying the total weight and the number of selected orders
            totalWeightElement.textContent = '0.00 kg';
            selectedCountElement.textContent = '0';
        });
    </script>
            <!-- Only select one productID -->
    <script>
        // Listen for click events on checkboxes
        var checkboxes = document.getElementsByClassName('select-checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('click', function() {
                // Get the ID of the product corresponding to the clicked checkbox
                var id = this.getAttribute('data-id');

                // If the checkbox with data-id="4" or data-id="13" is checked, uncheck and disable all other checkboxes
                if ((id === '4' || id === '13') && this.checked) {
                    for (var j = 0; j < checkboxes.length; j++) {
                        if (checkboxes[j] !== this) {
                            checkboxes[j].checked = false;  // Uncheck the checkbox
                            checkboxes[j].disabled = true;  // Disable the checkbox
                        }
                    }
                }
                // If the checkbox with data-id="4" or data-id="13" is unchecked, enable all other checkboxes
                else if ((id === '4' || id === '13') && !this.checked) {
                    for (var j = 0; j < checkboxes.length; j++) {
                        checkboxes[j].disabled = false;  // Enable the checkbox
                    }
                }

                // Calculate the total weight and the count of selected orders
                totalWeight = 0;
                selectedCount = 0;
                for (var j = 0; j < checkboxes.length; j++) {
                    if (checkboxes[j].checked) {
                        totalWeight += parseFloat(checkboxes[j].getAttribute('data-weight'));
                        selectedCount++;
                    }
                }

                // Check if the total weight exceeds the maximum allowed weight based on the truck type
                var maxWeight = <?php echo $truck['TruckType'] === 'Light-Duty' ? 1000 : 2000; ?>;
                if (totalWeight > maxWeight) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Truck Notice.',
                        text: 'Please reduce order. The total weight of ' + totalWeight.toFixed(2) + ' kg exceeds the maximum allowed weight for this truck type.'
                    });
                    this.checked = false;  // Uncheck the checkbox
                    totalWeight -= parseFloat(this.getAttribute('data-weight'));
                    selectedCount--;
                }

                // Update the content of the elements displaying the total weight and the number of selected orders
                totalWeightElement.textContent = totalWeight.toFixed(2) + ' kg';
                selectedCountElement.textContent = selectedCount;
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/master/src/route.js"></script>
    <script src="/master/src/form.js"></script>
</body>

</html>