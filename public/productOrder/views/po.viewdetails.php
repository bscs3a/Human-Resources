<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Order Details</title>

    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
    <div class="flex h-screen bg-white">
        <!-- sidebar -->
        <div id="sidebar" class="flex h-screen">
            <?php include "components/po.sidebar.php" ?>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <!-- header -->
            <div class="flex items-center justify-between h-16 bg-gray-200 shadow-md px-4 py-1">
                <div class="flex items-center gap-4">
                    <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
                        <i class="ri-menu-line"></i>
                    </button>
                    <label class="text-black font-medium">Order Detail / View</label>
                </div>

                <!-- dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative my-32">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="relative z-10 border border-gray-400 rounded-md bg-gray-100 p-2 focus:outline-none">
                        <div class="flex items-center gap-4">
                            <a class="flex-none text-sm dark:text-white"
                                href="#"><?php echo $_SESSION['user']['username']; ?></a>
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>

                    <form id="logout-form" action="/logout/user" method="POST">
                        <div x-show="dropdownOpen"
                            class="absolute right-0 mt-2 py-2 w-40 bg-gray-100 border border-gray-200 rounded-md shadow-lg z-20">
                            <button type="submit" class="block px-8 py-1 text-sm capitalize text-gray-700">Log
                                out</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                document.getElementById('toggleSidebar').addEventListener('click', function () {
                    var sidebar = document.getElementById('sidebar');
                    sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
                });
            </script>

            <!-- New Form for add product -->
            <div class="container mx-auto py-8 px-5">
                <div
                    class="max-w-5xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">

                    <?php
                    // Include your database connection file
                    include 'dbconn.php';

                    // Check if the ID parameter is set in the URL
                    if (isset($_GET['id'])) {
                        // Get the ID from the URL parameter
                        $id = $_GET['id'];

                        // Prepare and execute a SQL query to fetch data based on the ID
                        $stmt = $conn->prepare("
                            SELECT b.*, s.Supplier_Name, s.Status, s.Address, s.Contact_Name, s.Contact_Number, s.Estimated_Delivery ,s.Shipping_fee
                            FROM batch_orders b
                            JOIN suppliers s ON b.Supplier_ID = s.Supplier_ID
                            WHERE b.Batch_ID = :id
                        ");
                        $stmt->execute(['id' => $id]);
                        // Fetch the data
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Check if data was found
                        if ($data) {
                            // Initialize variables for subtotal and total amount
                            $subtotal = 0;
                            $totalAmount = 0;

                            // Display the data
                            ?>
                            <div class="p-10">
                                <div class="flex justify-between pb-3">
                                    <div class="font-bold text-3xl">
                                        <?= $data['Supplier_Name'] ?>
                                    </div>
                                    <div class="font-bold text-xl">
                                        #<?= $data['Supplier_ID'] ?>
                                    </div>
                                </div>

                                <!-- Supplier Information -->
                                <div class="flex item-center gap-60 px-4">
                                    <ul class="text-gray-900">
                                        <li class="flex py-1">
                                            <span class="font-semibold w-40">Contact Name:</span>
                                            <span class="font-medium text-gray-900">
                                                <?= $data['Contact_Name'] ?>
                                            </span>
                                        </li>
                                        <li class="flex">
                                            <span class="font-semibold w-40">Order Date:</span>
                                            <span class="font-medium text-gray-900">
                                                <?= $data['Date_Ordered'] ?>
                                            </span>
                                        </li>
                                        <li class="flex py-1">
                                            <span class="font-semibold w-40">Order Time:</span>
                                            <span class="font-medium text-gray-900">
                                                <?= $data['Time_Ordered'] ?>
                                            </span>
                                        </li>
                                        <li class="flex py-1">
                                            <span class="font-semibold w-40">Shipping Fee:</span>
                                            <span class="font-medium text-gray-900">
                                                <?= $data['Shipping_fee'] ?>
                                            </span>
                                        </li>
                                    </ul>

                                    <ul class=" text-gray-900 ">
                                        <li class="flex py-1">
                                            <span class="font-semibold w-24">Location:</span>
                                            <span class="font-medium text-gray-900">
                                                <?= $data['Address'] ?>
                                            </span>
                                        </li>
                                        <li class="flex">
                                            <span class="font-semibold w-40">Estimate Delivery:</span>
                                            <span class="font-medium text-gray-900">
                                                <?= $data['Estimated_Delivery'] ?>
                                            </span>
                                        </li>
                                        <li class="flex py-1">
                                            <span class="font-semibold w-20">Status:</span>
                                            <span class="font-medium text-green-900">
                                                <?= $data['Status'] ?>
                                            </span>
                                        </li>
                                        
                                    </ul>
                                </div>

                                <!-- Table for products -->
                                <div class="py-4">
                                    <div class="overflow-x-auto overflow-auto rounded-lg border border-gray-400">
                                        <table class="min-w-full text-left mx-auto bg-white">
                                            <thead class="bg-gray-200 border-b border-gray-400 text-xs">
                                                <tr>
                                                    <th class="px-6 py-2 font-semibold">ProductName</th>
                                                    <th class="px-6 py-2 font-semibold">ProductID</th>
                                                    <th class="px-6 py-2 font-semibold">Category</th>
                                                    <th class="px-6 py-2 font-semibold">Price</th>
                                                    <th class="px-6 py-2 font-semibold">Quantity</th>
                                                    <th class="px-6 py-2 font-semibold">Status</th>
                                                    <th class="px-6 py-2 font-semibold"></th>
                                                </tr>
                                            </thead>

                                            <?php
                                            // Call the function to display product data for the specific order
                                            displayProductData($id, $conn);
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php
                        } else {
                            echo "No data found for Supplier ID: $id";
                        }
                    } else {
                        echo "ID parameter is missing.";
                    }

                    // Function to fetch and display product data based on Batch_ID
                    function displayProductData($batchId, $conn)
                    {
                        // Prepare and execute SQL query to fetch data
                        $stmt = $conn->prepare("
                            SELECT p.*, bo.Items_Subtotal, bo.Total_Amount, bo.Order_Status, od.Product_Quantity
                            FROM batch_orders bo
                            JOIN order_details od ON bo.Batch_ID = od.Batch_ID
                            JOIN products p ON od.Product_ID = p.ProductID
                            WHERE od.Batch_ID = :batchId
                        ");
                        $stmt->execute(['batchId' => $batchId]);

                        // Fetch data
                        $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Initialize variables for subtotal and total amount
                        $subtotal = 0;
                        $totalAmount = 0;

                        // Check if data was found
                        if ($productData) {
                            // Display the fetched data
                            foreach ($productData as $data) {
                                ?>
                                <tr>
                                    <td class="px-6 py-2 flex items-center justify-center">
                                        <?php
                                        // Display product image or placeholder
                                        echo '<img src="../../' . $data['ProductImage'] . '" alt="Product Image" class="w-16 h-16 object-cover mr-4">'; ?>
                                        <div>
                                            <?= $data['ProductName'] ?>
                                        </div> <!-- Display product name -->
                                    </td>
                                    <td class="px-6 py-2">
                                        <?= $data['ProductID'] ?>
                                    </td> <!-- Display product ID -->
                                    <td class="px-6 py-2">
                                        <?= $data['Category'] ?>
                                    </td> <!-- Display category -->
                                    <td class="px-6 py-2">
                                        <?= $data['Price'] ?>
                                    </td> <!-- Display price -->
                                    <td class="px-6 py-2">
                                        <?= $data['Product_Quantity'] ?>
                                    </td> <!-- Display status -->
                                    <td class="px-6 py-2">
                                        <?= $data['Order_Status'] ?>
                                    </td>
                                    <td class="px-6 py-2">
                                        <form action="/master/delete/viewdetails" method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            <input type="hidden" name="product_id" value="<?= $data['ProductID'] ?>">
                                            <input type="hidden" name="batch_id" value="<?= $batchId ?>">
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php

                            }

                            // Display items subtotal and total amount
                            ?>
                            <tfoot class="text-left bg-gray-200">
                                <tr class="border-b border-y-gray-300">
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    <!-- note: dont delete all of the products if the supplier has run out of items, instead just cancel the order -->
                                    
                                    <th scope="col" class="px-6 py-4 ml-3 font-medium text-gray-900">
                                        <div class="flex flex-col text-sm gap-3">
                                            <a class="font-bold">Items Subtotal:
                                                <div class="font-medium">
                                                    <?= $data['Items_Subtotal'] ?>

                                                </div>
                                            </a>
                                            <a class="font-bold">Total Amount:
                                                <div class="font-medium"> Php
                                                    <?= $data['Total_Amount'] ?>

                                                </div>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                </tr>
                            </tfoot>
                            <?php
                        } else {
                            // No data found for the given Batch_ID
                            echo "<tr><td colspan='6'>No data found for Order #$batchId</td></tr>";
                        }
                    }
                    ?>

                    </table>
                </div>

            </div>

            <div class="flex justify-end">
                <button route='/po/orderDetail'
                    class="py-2 px-6 border border-gray-600 bg-yellow-500 font-bold rounded-md">Back</button>
            </div>

        </div>
    </div>
    </div>
    </div>

    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>

    </div>
</body>

</html>