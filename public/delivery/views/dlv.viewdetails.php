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
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id = $_SESSION['id'];

    $db = Database::getInstance();
    $conn = $db->connect();

    // To Get the details of the delivery order
    $stmt = $conn->prepare("SELECT * FROM deliveryorders WHERE DeliveryOrderID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $stmt = $conn->prepare("
        SELECT 
            deliveryorders.*, 
            sales.PaymentMode, 
            sales.ShippingFee,
            sales.TotalAmount as SalesTotalAmount, 
            products.*, 
            customers.*, 
            saledetails.TotalAmount as SaleDetailsTotalAmount, 
            saledetails.*
        FROM 
            deliveryorders 
        INNER JOIN 
            sales ON deliveryorders.SaleID = sales.SaleID 
        INNER JOIN 
            products ON deliveryorders.ProductID = products.ProductID 
        INNER JOIN 
            customers ON sales.CustomerID = customers.CustomerID
        INNER JOIN 
            saledetails ON sales.SaleID = saledetails.SaleID AND products.ProductID = saledetails.ProductID
        WHERE 
            DeliveryOrderID = :id
    ");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
   
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View-Details</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
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
                    <p class="text-black font-medium">Delivery / Customer Details</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once __DIR__ . "/logout.php"?>

            <!-- End: Profile -->

        </div>
        <!-- Content here -->
    
        <div class="pr-20 pl-20 pt-5 pb-5">
            <div class="h-auto p4 rounded-2xl shadow-xl" style="background-color: #262261;">
                <div class="flex justify-between items-center">
                    <h1 class="pt-3 pr-4 pl-4 pb-3 text-lg font-bold text-white">Order Details</h1>
                    <button route='/dlv/list' class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-4 rounded-2xl mr-4">
                        Close
                    </button>
                </div>
                <div>

                <table class="w-full" style="background-color: white;">
                    <tbody class="text-sm">
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Current Status</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['DeliveryStatus']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Sale ID</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['SaleID']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Order ID</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['DeliveryOrderID']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Customer ID</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['CustomerID']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Customer Name</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Name']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Customer Address</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Province'] . ' ' . $order['Municipality'] . ' ' . $order['StreetBarangayAddress']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Customer Contact Number</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Phone']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Order Date</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['DeliveryDate']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Order Received</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['ReceivedDate']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Product ID</td>
                            <td class="border px-4 py-2" style="width: 70%;">#<?php echo $order['ProductID']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Product Name</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['ProductName']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Quantity</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Quantity']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Payment Mode</td>
                            <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['PaymentMode']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Unit Price</td>
                            <td class="border px-4 py-2" style="width: 70%;">₱<?php echo $order['UnitPrice']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Subtotal</td>
                            <td class="border px-4 py-2" style="width: 70%;">₱<?php echo $order['Subtotal']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Shipping fee</td>
                            <td class="border px-4 py-2" style="width: 70%;">₱<?php echo $order['ShippingFee']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Tax</td>
                            <td class="border px-4 py-2" style="width: 70%;">₱<?php echo $order['Tax']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Total Product Price</td>
                            <td class="border px-4 py-2" style="width: 70%;">₱<?php echo $order['SaleDetailsTotalAmount']; ?></td>
                        </tr>
                        <tr>
                            <td class="border font-bold px-4 py-2" style="width: 30%;">Total Order Price</td>
                            <td class="border px-4 py-2" style="width: 70%;">₱<?php echo $order['SalesTotalAmount']; ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <!--- This for dropdown selection -->
                <div class="flex justify-center items-center ">
                    <div class="relative inline-flex justify-center items-center">
                        <form method="POST" id="statusForm" action="/statusupdateview">
                            <input type="hidden" name="orderId" value="<?php echo $order['DeliveryOrderID']; ?>">
                            <select id="statusSelect" name="status" class="mt-4 mb-4 bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded-2xl" onchange="confirmStatusChange(this)" data-previous="<?php echo $order['DeliveryStatus']; ?>">
                                <option value="" disabled selected>Change Status</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Failed to Deliver">Failed to Deliver</option>
                            </select>
                        </form>
                    </div>
                </div>

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

<!-- This is for the Dialog box -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function confirmStatusChange(selectElement) {
    var previousStatus = selectElement.getAttribute('data-previous');
    var newStatus = selectElement.value;

    if (previousStatus === 'Pending' && (newStatus === 'Delivered' || newStatus === 'Failed to Deliver')) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pending status cannot be updated to Delivered or Failed to Deliver!',
        });

        // Reset the select value to the previous one
        selectElement.value = previousStatus;
    } else {
        Swal.fire({
            title: 'Are you sure?',
            text: `You want to change the status to ${newStatus}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked 'OK'.
                document.getElementById("statusForm").submit();
            } else {
                // User clicked 'Cancel'.
                selectElement.value = previousStatus;
            }
        });

        // Update the previous status data attribute
        selectElement.setAttribute('data-previous', newStatus);
    }
}
</script>

    <script  src="./.././../src/route.js"></script>
    <script  src="./.././../src/form.js"></script>
    </body>
</html>