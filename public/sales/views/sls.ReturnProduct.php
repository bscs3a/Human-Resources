<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Product</title>
    <link href="./../../../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <?php
    // Database connection
    $db = Database::getInstance();
    $conn = $db->connect();

    // Get saleId, saledetailsId, and productId from URL
    $saleId = $_GET['sale'];
    $saledetailsId = $_GET['saledetails'];
    $productId = $_GET['product'];

    // Fetch product name, description, category, and image
    $sql = "SELECT p.ProductName, p.Description, c.Category_Name, p.ProductImage 
        FROM Products p 
        JOIN Categories c ON p.Category_ID = c.Category_ID 
        WHERE p.ProductID = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":product_id", $productId);
    $stmt->execute();
    $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    $productName = $productDetails['ProductName'];
    $productDescription = $productDetails['Description'];
    $productCategory = $productDetails['Category_Name'];
    $productImage = $productDetails['ProductImage'];

    // Fetch product details, quantity, unit price, and tax
    $sql = "SELECT p.ProductID, p.ProductName, sd.Quantity, sd.UnitPrice, sd.Tax 
                                     FROM SaleDetails sd 
                                     JOIN Products p ON sd.ProductID = p.ProductID 
                                     WHERE sd.SaleID = :sale_id AND sd.ProductID = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":sale_id", $saleId);
    $stmt->bindParam(":product_id", $productId);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch quantity
    $sql = "SELECT Quantity FROM SaleDetails WHERE SaleDetailID = :saledetails_id AND ProductID = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":saledetails_id", $saledetailsId);
    $stmt->bindParam(":product_id", $productId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $quantity = $result ? $result['Quantity'] : null;
    ?>

</head>

<body>
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
                    <p class="text-black font-medium">Sales / Return Product</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php" ?>

            <!-- End: Profile -->
        </div>

        <!-- End: Header -->
        <div class="flex flex-row justify-center">

            <div class="mx-10 my-10 flex flex-col w-1/2 mr-10">
                <h1 class="font-bold text-lg mx-8 text-gray-500 bg-white border-b shadow-md p-4">You're about to Return:</h1>
                <div class="flex flex-row">
                    <img src="./../../../../<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" width="300" height="300">

                    <div class="flex flex-col justify-center text-lg gap-4">
                        <div>Product Name: <span class="font-bold"><?php echo $productName; ?></span> </div>
                        <div>Product Category: <span class="font-bold"><?php echo $productCategory; ?></span> </div>
                        <div>Product Price (per item): <span class="font-bold">₱<?php echo number_format($products[0]['UnitPrice'] + $products[0]['Tax'], 2); ?></span> </div>
                        <div>Quantity Bought: <span class="font-bold"><?php echo $products[0]['Quantity']; ?></span> </div>
                    </div>
                </div>
                <div class="mx-10 text-lg font-semibold flex flex-col">
                    Product Description:
                    <div class="font-normal bg-gray-100 rounded-md p-4">
                        <?php echo $productDescription; ?>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-1/2 border max-w-md rounded-lg my-10 ml-10 shadow-md">
                <h1 class="text-2xl font-semibold p-4 text-center rounded-t-lg text-white bg-green-800 w-full">Return Product</h1>
                <?php
                // Assuming you have a PDO instance $pdo
                $saleId = $_GET['sale']; // Get sale from URL
                $productId = $_GET['product']; // Get product from URL

                // Check if the SaleID and ProductID exist in the returnproducts table
                $sql = "SELECT 1 FROM returnproducts WHERE SaleID = :sale_id AND ProductID = :product_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([':sale_id' => $saleId, ':product_id' => $productId]);
                $isReturned = $stmt->fetchColumn();

                if (!$isReturned) : ?>
                    <form action="/returnProduct" method="post" class="w-full p-4" id="returnproduct">
                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_id">
                                Product ID
                            </label>
                            <input readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_id" type="text" name="product_id" value="<?php echo $productId; ?>">
                        </div>
                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_name">
                                Product Name
                            </label>
                            <input readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_name" type="text" name="product_name" value="<?php echo $productName; ?>">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                                Quantity
                            </label>
                            <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" type="number" name="quantity" min="1" max="<?php echo $products[0]['Quantity']; ?>" oninput="calculatePaymentReturned()">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="reason">
                                Reason(s)
                            </label>
                            <textarea required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reason" name="reason"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_status">
                                Product Status
                            </label>
                            <select required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_status" name="product_status">
                                <option value="">Select a status</option>
                                <option value="Defective">Defective</option>
                                <option value="Damaged">Damaged</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="payment_returned">
                                Payment to be Returned
                            </label>
                            <input readonly name="payment_returned" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_returned" type="text">
                        </div>

                        <!-- Add hidden input field for saleId -->
                        <input type="hidden" name="sale" value="<?php echo $saleId; ?>">

                        <div class="flex items-center justify-end mt-4">
                            <button class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                <?php else : ?>
                    <div class="flex h-full flex-grid gap-4 text-2xl font-semibold justify-center items-center px-10 pb-10">
                    <i class="ri-checkbox-fill text-red-500 text-6xl"></i>
                    <p class="text-red-500">This product has already been returned.</p>
                    </div>
                <?php endif; ?>
            </div>

            <script>
                document.querySelector('#returnproduct').addEventListener('submit', function(event) {
                    var amount = document.getElementById('payment_returned').value;
                    var maxAmount = <?php echo getBalanceCashAccount('Cash on hand') ?>;

                    if (amount > maxAmount) {
                        alert('Cash on hand must not exceed ' + maxAmount);
                        event.preventDefault(); // Prevent form from submitting
                    }
                });
            </script>

            <script>
                function calculatePaymentReturned() {
                    var quantity = document.getElementById('quantity').value;
                    var unitPrice = <?php echo $products[0]['UnitPrice']; ?>;
                    var tax = <?php echo $products[0]['Tax']; ?>;
                    var priceEach = unitPrice + tax;
                    var paymentReturned = (unitPrice + tax) * quantity;
                    document.getElementById('payment_returned').value = paymentReturned.toFixed(2);
                }
            </script>
    </main>

    <script src="./../../../../src/form.js"></script>
    <script src="./../../../../src/route.js"></script>

    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
</body>

</html>