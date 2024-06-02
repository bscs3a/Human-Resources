<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>

    <?php
    require_once './src/dbconn.php';

    // Get the database instance and PDO object
    $database = Database::getInstance();
    $pdo = $database->connect();

    // Query the database for the latest sale
    $sqlSale = 'SELECT * FROM Sales ORDER BY SaleDate DESC LIMIT 1';
    $stmtSale = $pdo->query($sqlSale);
    $sale = $stmtSale->fetch(PDO::FETCH_ASSOC);

    // Get the sale details
    $sale_id = $sale['SaleID'];
    $sale_date = $sale['SaleDate'];
    $total_price = $sale['TotalAmount'];
    $payment_method = $sale['PaymentMode'];
    $sale_preferences = $sale['SalePreference'];
    $shippingFee = $sale['ShippingFee'];
    $discount = $sale['Discount'];
    $employeeId = $sale['EmployeeID'];

    // Query the database for the employee details
    $sqlEmployeeDetails = "SELECT first_name, last_name FROM Employees WHERE id = $employeeId";
    $stmtEmployeeDetails = $pdo->query($sqlEmployeeDetails);
    $employee = $stmtEmployeeDetails->fetch(PDO::FETCH_ASSOC);

    $firstName = $employee['first_name'];
    $lastName = $employee['last_name'];

    // Query the database for the sale items
    $sqlSaleItems = "SELECT SaleDetails.Quantity, SaleDetails.UnitPrice, SaleDetails.TotalAmount, Products.ProductName, Products.TaxRate, Products.ProductImage 
                     FROM SaleDetails 
                     INNER JOIN Products ON SaleDetails.ProductID = Products.ProductID 
                     WHERE SaleDetails.SaleID = $sale_id";
    $stmtSaleItems = $pdo->query($sqlSaleItems);
    $sale_items = $stmtSaleItems->fetchAll(PDO::FETCH_ASSOC);

    // Query the database for the latest sale
    $sqlSale = 'SELECT Sales.*, Customers.Name, Customers.Phone, Customers.Email 
                FROM Sales 
                INNER JOIN Customers ON Sales.CustomerID = Customers.CustomerID 
                ORDER BY SaleDate DESC LIMIT 1';
    $stmtSale = $pdo->query($sqlSale);
    $sale = $stmtSale->fetch(PDO::FETCH_ASSOC);

    // Query the database for the latest sale
    $sqlSale = 'SELECT Sales.*, Customers.Name, Customers.Phone, Customers.Email, DeliveryOrders.Province, DeliveryOrders.Municipality, DeliveryOrders.StreetBarangayAddress 
                FROM Sales 
                INNER JOIN Customers ON Sales.CustomerID = Customers.CustomerID 
                INNER JOIN DeliveryOrders ON Sales.SaleID = DeliveryOrders.SaleID
                ORDER BY SaleDate DESC LIMIT 1';
    $stmtSale = $pdo->query($sqlSale);
    $sale = $stmtSale->fetch(PDO::FETCH_ASSOC);
    ?>

</head>

<body>
    <?php include "components/sidebar.php" ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">
            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-md ml-4">
                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Receipt</p>
                </li>
            </ul>
        </div>

        <!-- receipt -->
        <div class="flex flex-col items-center min-h-screen">
            <div class="w-1/2 mt-10 mb-10">

                <!-- Add receipt details here -->
                <div id="receipt" class="bg-white rounded-xl shadow-md">
                    <div class="bg-green-800 text-white p-10">
                        <!-- Display the sale details -->
                        <div class="flex justify-between text-2xl md:text-4xl xl:text-6xl">
                            <h2 class="font-medium">Receipt</h2>
                            <h2 class="font-medium">₱<?= $total_price ?></h2>
                        </div>

                        <div class="flex sm:justify-between md:justify:between xl:justify-between mt-8 text-gray-300">
                            <span><?= date('F j, Y, g:i a', strtotime($sale_date)) ?></span>
                            <span>Order ID: <?= $sale_id ?></span>
                            <span>Payment Method: <?= $payment_method ?></span>
                        </div>

                    </div>

                    <div class="px-8 py-6 w-full">

                        <table id="cart-items" class="table-auto w-full text-left xl:border">
                            <tr class=" text-gray-500 sm:text-md xl:text-xl text-md border-b text-justify">
                                <th class="p-2">Product</th>
                                <th class="p-2">Quantity</th>
                                <th class="p-2">Pcs Price</th>
                                <th class="p-2">Total</th>
                            </tr>
                            <?php foreach ($sale_items as $item) : ?>
                                <tr class="border-b sm:text-sm md:text-md xl:text-lg">
                                    <td class="flex flex-row items-center pt-2 p-2">
                                        <?= $item['ProductName'] ?>
                                    </td>
                                    <td class="pt-2 pl-4"><?= $item['Quantity'] ?></td>
                                    <td class="pt-2 pl-2">₱<?= number_format($item['TotalAmount'], 2) ?></td>
                                    <td class="pt-2 pl-2">₱<?= number_format($item['TotalAmount'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                  
                        <div class="pt-6">
                                <?php
                                // Calculate the subtotal and tax
                                $subtotal = array_reduce($sale_items, function ($carry, $item) {
                                    return $carry + $item['UnitPrice'] * $item['Quantity'];
                                }, 0);
                                $tax = $subtotal * 0.12; // Assuming a tax rate of 12%
                                ?>

                                <div id="subtotal" class="flex justify-between border-b text-sm xl:text-lg pb-2 mb-2 text-gray-400">
                                    <span>Subtotal</span>
                                    <span class="xl:pr-6">₱<?= number_format($subtotal, 2) ?></span>
                                </div>
                                <div id="taxes" class="flex justify-between border-b text-sm xl:text-lg pb-2 mt-4 text-gray-400">
                                    <span>Taxes</span>
                                    <span class="xl:pr-6">₱<?= number_format($tax, 2) ?></span>
                                </div>
                                <?php if ($sale_preferences === 'Delivery') : ?>
                                    <div id="shippingFee" class="flex justify-between border-b text-sm xl:text-lg pb-2 mt-4 text-gray-400">
                                        <span>Shipping Fee</span>
                                        <span class="xl:pr-6">₱<?= number_format($shippingFee, 2) ?></span>
                                    </div>
                                <?php endif; ?>
                                <div id="discount" class="flex justify-between border-b text-sm xl:text-lg pb-2 mt-4 text-gray-400">
                                    <span>Discount</span>
                                    <span class="xl:pr-6">₱<?= number_format($discount, 2) ?></span>
                                </div>
                                <div id="total" class="flex justify-between font-semibold border-b text-xl pb-2 text-gray-400 mt-4">
                                    <span>Total</span>
                                    <span class="text-green-800 font-semibold xl:pr-6">₱<?= $total_price ?></span>
                                </div>
                            </div>

                    <div class="pt-10 flex justify-between md:pt-6">
                        
                        <div class="grid gap-2 text-left w-full">
                            <div class="border-b text-gray-400 text-md xl:text-xl font-bold pb-2 mb-2">Store Address</div>
                            <div>BSCS 3A | DHVSU</div>
                            <div>Address: Bacolor, Pampanga</div>
                            <div>Cashier: <?php echo $firstName . ' ' . $lastName; ?></div>
                            <div>Cashier ID: <?= $employeeId ?></div>
                        </div>

                        <div class="<?= $sale_preferences == 'Delivery' ?> w-full flex justify-end">
                            <?php if ($sale_preferences != 'Pick-up') : ?>
                                <div class="grid gap-2 text-right">
                                    <div class="border-b text-gray-400 text-md xl:text-xl font-bold pb-2 mb-2">Delivery Address</div>
                                    <div>Name: <?= $sale['Name'] ?></div>
                                    <div>Address: <?= $sale['StreetBarangayAddress'] . ', ' . $sale['Municipality'] . ', ' . $sale['Province'] ?></div>
                                    <div>Phone: <?= $sale['Phone'] ?></div>
                                    <div>Email: <?= $sale['Email'] ?></div>
                            </div>
                            <?php endif; ?>
                        </div>   
                    </div>

                    <div>
                        <div class="flex justify-between md:mt-2 mt-8 text-gray-300 flex-col items-center pt-8">
                            <span>Thank you for shopping with us!</span>
                            <span>if you have any concerns please contact below:</span>
                            <div class="flex-row gap-2">
                                <span>Phone: 123-456-7890 | </span>
                                <span>Email: Sample @ email.com </span>
                            </div>

                    </div>

                        </div>

                    </div>
                    <button class="print-button mt-4 w-full text-black text-xl py-4 px-4 hover:bg-gray-200 hover:font-bold transition-all ease-in-out">
                        <i class="ri-import-line font-medium text-2xl"></i>
                        Print Receipt</button>
                </div>
                <button route="/sls/POS" class="print-button mt-4 w-full text-black text-xl py-4 px-4 hover:bg-gray-200 hover:font-bold transition-all ease-in-out">
                    <i class="ri-arrow-left-line font-medium text-2xl"></i> <!-- Change the icon class here -->
                    Go Back
                </button>
            </div>
        </div>

        <script>
            window.onbeforeunload = function() {
                // Clear the cart in localStorage
                localStorage.removeItem('cart');
            };
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

        <script>
            function attachPrintButtonEventListener() {
                document.querySelector('.print-button').addEventListener('click', printReceipt);
            }

            function printReceipt() {
                var receipt = document.getElementById('receipt').innerHTML;
                var originalContent = document.body.innerHTML;

                document.body.innerHTML = receipt;

                window.onbeforeprint = function() {
                    document.querySelector('.print-button').style.display = 'none';
                };

                window.onafterprint = function() {
                    document.querySelector('.print-button').style.display = 'block';
                };

                window.print();

                document.body.innerHTML = originalContent;

                // Reattach the event listener after the original content is restored
                attachPrintButtonEventListener();
            }

            // Attach the event listener when the page loads
            attachPrintButtonEventListener();
        </script>

        <script src="./../../src/route.js"></script>
</body>

</html>