<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Details</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

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
                    <p class="text-black font-medium">Sales / Return Details</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <div id="receipt" class="flex flex-col items-start min-h-screen w-full max-w-3xl mx-auto p-5">
            <div class="w-full bg-green-800 rounded-t-lg p-8 h-10 flex justify-center items-center text-center">
                <span class="text-white w-full text-3xl font-semibold p-2">Details</span>
            </div>
            <div class="w-full bg-white rounded-lg overflow-hidden shadow-lg p-4 ">
                <!-- Header -->


                <!-- Body -->
                <div class="flex flex-col gap-4 p-8">

                    <?php
                    $database = Database::getInstance();
                    $pdo = $database->connect();
                    // Fetch ReturnID from URL parameters
                    $returnId = $_GET['returnID'];

                    // Fetch return details from ReturnProduct table
                    $sql = "SELECT * FROM ReturnProducts WHERE ReturnID = :return_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":return_id", $returnId);
                    $stmt->execute();
                    $returnProduct = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Fetch product details from Products table
                    $sql = "SELECT * FROM Products WHERE ProductID = :product_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":product_id", $returnProduct['ProductID']);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Display product image -->
                    <div class="flex justify-center items-center">
                        <div class="size-64 flex rounded-full shadow-lg bg-yellow-200">
                            <img src="../../<?= $product['ProductImage'] ?>" alt="Your Image" class="object-contain">
                        </div>
                    </div>

                    <?php
                    $database = Database::getInstance();
                    $pdo = $database->connect();
                    // Fetch ReturnID from URL parameters
                    $returnId = $_GET['returnID'];

                    // Fetch return details from ReturnProduct table
                    $sql = "SELECT * FROM ReturnProducts WHERE ReturnID = :return_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":return_id", $returnId);
                    $stmt->execute();
                    $returnProduct = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Fetch product details from Products table
                    $sql = "SELECT p.*, c.Category_Name FROM Products p 
                                JOIN Categories c ON p.Category_ID = c.Category_ID 
                                WHERE p.ProductID = :product_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":product_id", $returnProduct['ProductID']);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Display product details -->
                    <div class="mt-8">
                        <div class="flex flex-row justify-between">
                            <div class="text-lg font-semibold">
                                <?php echo $product['ProductName']; ?>
                            </div>
                            <div class="text-lg font-semibold">
                                <?php echo 'Payment to be Returned: Php ' . $returnProduct['PaymentReturned']; ?>
                            </div>
                        </div>

                        <div class="text-s text-gray-300">
                            <div class="text-lg font-medium">
                                <?php echo $product['Category_Name']; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $database = Database::getInstance();
                    $pdo = $database->connect();
                    // Fetch ReturnID from URL parameters
                    $returnId = $_GET['returnID'];

                    // Fetch return details from ReturnProduct table
                    $sql = "SELECT * FROM ReturnProducts WHERE ReturnID = :return_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":return_id", $returnId);
                    $stmt->execute();
                    $returnProduct = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Display return details -->
                    <div>
                        <div>From Sale ID: <span class="font-bold" id="saleId"><?php echo $returnProduct['SaleID']; ?></span></div>
                        <div>Product ID: <span class="font-bold" id="productId"><?php echo $returnProduct['ProductID']; ?></span> </div>
                        <div>Return Date: <span class="font-bold" id="returnDate"><?php echo date("F j, Y, g:i a", strtotime($returnProduct['ReturnDate'])); ?></span> </div>
                        <div>Product Status: <span class="font-bold" id="productStatus"><?php echo $returnProduct['ProductStatus']; ?></span> </div> <!-- Add this line -->
                        <div class="text-lg mt-4">Reason(s) for Return:</div>
                        <div class="bg-gray-200 rounded-md p-4 shadow-inner" id="reasonForReturn"><?php echo $returnProduct['Reason']; ?></div>
                    </div>


                </div>
            </div>

        </div>
    </main>
    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>
</body>

</html>