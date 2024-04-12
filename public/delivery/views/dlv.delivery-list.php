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
        // query for delivery orders where is not delivered status
$query = "SELECT * FROM deliveryorders WHERE DeliveryStatus != 'Delivered' AND DeliveryStatus != 'Failed to Deliver'";

$result = $conn->query($query);
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery-list</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <!-- Jquery for datatables sort -->
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
                    <p class="text-black font-medium">Delivery / List</p>
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
<!--    <div id="filter" class="py-2 px-10">
        <select id="statusFilter" class="bg-white border hover:bg-gray-300 text-black py-2 px-4 rounded">
            <option value="all">All</option>
            <option value="In transit">In Transit</option>
            <option value="Pending">Pending</option>
        </select>   
    </div>     -->
        <!--Table -->
    <div class="flex-1 pr-10 pl-10 h-full">
        <div class="h-auto bg-white p-4 rounded-lg shadow-xl border overflow-hidden">
            <div class="max-h-[850px] overflow-y-auto">
                <table id="orderTable" class="w-full">
                    <thead class="sticky top-0 bg-white z-10">
                        <tr>
                            <th class="border-b border-gray-400 px-4 py-2">Order ID</th>
                            <th class="border-b border-gray-400 px-4 py-2">Sale ID</th>
                            <th class="border-b border-gray-400 px-4 py-2">Order Date</th>
                            <th class="border-b border-gray-400 px-4 py-2">Status</th>
                            <th class="border-b border-gray-400 px-4 py-2" style="pointer-events: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            while ($row = $result->fetch(PDO::FETCH_ASSOC))
                            {
                            ?>
                             <!-- detail result -->
                                <td class="border px-4 py-2"><?php echo $row['DeliveryOrderID']; ?></td>
                                <td class="border px-4 py-2">#<?php echo $row['SaleID']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row['DeliveryDate']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row['DeliveryStatus']; ?></td>
                                <td class="border px-4 py-2 flex justify-center"> 
                                    <button class="viewDetailsBtn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl" 
                                            route='/dlv/viewdetails/id=<?php echo $row['DeliveryOrderID']; ?>'>
                                        View Details
                                    </button>   
                                </td>
                            </tr>
                            <?php
                            }
                            ?>         
                    </tbody>               
                </table>
            </div>
        </div>
    </div>



</main>                     
        <!-- JS for jquery filter -->                       
    <script>
        $(document).ready(function() {
            var table = $('#orderTable').DataTable({
                "paging": false,
                "info": false
            });
                // this is for the dropdown filter
            $('#statusFilter').change(function() {
                var selectedStatus = $(this).val().toLowerCase();
                table.column(2).search(selectedStatus === 'all' ? '' : selectedStatus).draw();
            });
        });
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

    <script  src="./../src/route.js"></script>
    <script  src="./../src/form.js"></script>
</body>

</html>