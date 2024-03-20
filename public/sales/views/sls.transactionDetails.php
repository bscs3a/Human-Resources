<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <?php
    require_once './src/dbconn.php';

    // Fetch the sale ID from the URL
    $saleId = $_GET['sale'];

    // Get PDO instance
    $database = Database::getInstance();
    $pdo = $database->connect();

    // Query for sale details
    $sqlSale = "SELECT * FROM Sales WHERE SaleID = ?";
    $stmtSale = $pdo->prepare($sqlSale);
    $stmtSale->execute([$saleId]);
    $sale = $stmtSale->fetch(PDO::FETCH_ASSOC);

    // Query for customer details
    $sqlCustomer = "SELECT * FROM Customers WHERE CustomerID = ?";
    $stmtCustomer = $pdo->prepare($sqlCustomer);
    $stmtCustomer->execute([$sale['CustomerID']]);
    $customer = $stmtCustomer->fetch(PDO::FETCH_ASSOC);

    // Query for sale items
    $sqlItems = "SELECT * FROM SaleDetails INNER JOIN Products ON SaleDetails.ProductID = Products.ProductID WHERE SaleID = ?";
    $stmtItems = $pdo->prepare($sqlItems);
    $stmtItems->execute([$saleId]);
    $items = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
    ?>

</head>

<body class="bg-gray-100">
    <?php include "components/sidebar.php" ?>

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
                    <p class="text-black font-medium">Sales / Transaction History</p>
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

        <div class="flex flex-col items-start justify-center min-h-screen w-full max-w-4xl mx-auto p-4">
            <div class="w-full bg-white rounded-lg overflow-hidden shadow-lg p-4">
                <div class="p-2 pl-6 text-green-800 text-xl">
                <i class="ri-cash-line text-2xl"></i> <span class="font-regular text-green-800">AMOUNT</span>
                </div>
                <div class="p-2 pl-6 text-6xl font-semibold flex flex-row items-center border-b pb-4">
                <span>₱12356.00</span>
                <!-- <span class="text-gray-500 font-medium pl-4">PESO</span> -->
                <div>
         
                    <div class="bg-gray-200 flex justify-center p-2 px-4 rounded-full ml-4 shadow-md border-gray-200 border">
                    <div class="bg-green-800 size-6 rounded-full mr-2"></div>
                    <span class="text-xl font-medium">Order Delivered</span>
                    </div>
                    
                </div>
                
             
               </div>
              
               
                <div class="p-6 rounded flex flex-row text-lg font-medium">
      
                    <div class="flex flex-col border-r-2 pr-8">
                        <span class="font-semibold text-gray-500">Transaction Date</span>
                        <span class="mt-4">00/00/0000</span>
                    </div>
                       
                    <div class="flex flex-col ml-4 pl-4 border-r-2 pr-8">
                    <span class="font-semibold text-gray-500">Order ID</span>
                        <span class="mt-4">#12345678</span>
                    </div>

                    <div class="flex flex-col ml-4 pl-4 pr-8">
                    <span class="font-semibold text-gray-500">Payment Method</span>
                        <span class="mt-4">Cash</span>
                    </div>
                    

                </div>

                <div class="p-6 pb-2 pt-2 rounded flex flex-row text-lg border-b">
                    <div class="text-lg text-gray-900 font-semibold">Transaction Details</div>
                </div>

                <div class="flex flex-row p-6 gap-44">
                     <div class="flex flex-col gap-4 text-gray-500">
                        <span class="p-2 font-bold">Cargo Type</span>
                        <span class="p-2 font-bold">Name</span>
                        <span class="p-2 font-bold">Phone Number</span>
                        <span class="p-2 font-bold">Email</span>
                        <span class="p-2 font-bold">Sale Preferences</span>
                     </div>
                 
                     <div class="flex flex-col gap-4 font-semibold ">
                     <div class="bg-gray-200 rounded-full p-1 text-center font-bold">HEAVY</div>
                        <span class="p-2"><?php echo $customer['FirstName'] . ' ' . $customer['LastName']; ?></span>
                        <span class="p-2"><?php echo $customer['Phone']; ?></span>
                        <span class="p-2"><?php echo $customer['Email']; ?></span>
                        <span class="p-2"><?php echo $sale['SalePreference']; ?></span>
                     </div>
                </div>




              <!-- <h2 class="mb-2 text-medium font-semibold text-gray-600">Name: </h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Phone: </h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Email: </h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Sale Preferences: </h2> -->


                <hr class=" border-gray-300">
                <h2 class="text-lg font-semibold text-center my-3 text-gray-700">Items</h2>
                <div class="flex justify-center">
                    <div class="grid grid-cols-3 gap-4 mx-auto">
                        <?php foreach ($items as $item) : ?>
                            <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg text-center">
                                <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                    <!-- SVG icon -->
                                </div>
                                <div class="font-bold text-lg text-gray-700"><?php echo $item['ProductName']; ?></div>
                                <div class="font-normal text-sm text-gray-500"><?php echo $item['Category']; ?></div>
                                <div class="mt-6 text-lg font-semibold text-gray-700">Php<?php echo $item['UnitPrice']; ?></div>
                                <div class="text-gray-500 text-sm">Quantity: <?php echo $item['Quantity']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="p-6 pb-2 pt-2 rounded flex flex-row text-lg border-b mt-8">
                    <div class="text-lg text-gray-700 font-semibold">Order Summary</div>
                </div>
                <div class="flex flex-row p-6 gap-44">
                <div class="flex flex-col gap-4 text-gray-500">
                        <span class="p-2 font-bold">Quantity</span>
                        <span class="p-2 font-bold">Subtotal</span>
                        <span class="p-2 font-bold">Tax</span>
                        <span class="p-2 font-bold">Price Discounted</span>
                        <span class="p-2 font-bold text-xl text-green-800">Total</span>
                     </div>
                 
                     <div class="flex flex-col gap-4 font-semibold ">
                     <div class="p-2"><?php echo array_sum(array_column($items, 'Quantity')); ?></div>
                        <span class="p-2">&#8369;<?php echo array_sum(array_column($items, 'Subtotal')); ?></span>
                        <span class="p-2">&#8369;<?php echo array_sum(array_column($items, 'Tax')); ?></span>
                        <span class="p-2">N/A</span>
                        <span class="text-xl text-green-800 bg-gray-200 rounded-full p-1 px-8 text-center font-bold">&#8369;<?php echo array_sum(array_column($items, 'TotalAmount')); ?></span>
                     </div>
                </div>
                <button class="border-t print-button mt-4 w-full rounded-full text-black text-xl py-4 px-4 hover:bg-gray-200 hover:font-bold transition-all ease-in-out">
                        <i class="ri-import-line font-medium text-2xl"></i>
                        Print Receipt</button>
            </div>
            
        </div>
    </main>
    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>
</body>

</html>