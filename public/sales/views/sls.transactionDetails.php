<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <?php
    require_once 'function/fetchSaleDetails.php';
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
                    <p class="text-black font-medium">Sales / Transaction Details</p>
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

                    <div class="origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="py-1" role="none">
                            <a route="/sls/logout" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                <i class="ri-logout-box-line"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('options-menu').addEventListener('click', function() {
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

        <!-- End: Header -->

        <div id="receipt" class="flex flex-col items-start justify-center min-h-screen w-full max-w-4xl mx-auto p-4">
            <div class="w-full bg-white rounded-lg overflow-hidden shadow-lg p-4">
                <div class="bg-green-900 text-white">
                    <div class="p-2 pl-6 text-xl">
                        <i class="ri-cash-line text-2xl"></i> <span class="font-regular">AMOUNT</span>
                    </div>
                    <div class="p-2 pl-6 text-6xl font-semibold flex flex-row items-center border-b pb-4 ">
                        <span>₱<?php echo number_format($sale['TotalAmount'], 2); ?></span>
                        <!-- <div>
                        <div class="bg-gray-200 flex justify-center p-2 px-4 rounded-full ml-4 shadow-md border-gray-200 border">
                            <div class="bg-green-800 size-6 rounded-full mr-2"></div>
                            <span class="text-xl font-medium">Order Delivered</span>
                        </div>
                    </div> -->
                    </div>
                </div>



                <div class="p-6 rounded flex flex-row text-lg font-medium">
                    <div class="flex flex-col border-r-2 pr-8">
                        <span class="font-semibold text-gray-500">Transaction Date</span>
                        <span class="mt-4"><?php echo date('F j, Y, g:i a', strtotime($sale['SaleDate'])); ?></span>
                    </div>

                    <div class="flex flex-col ml-4 pl-4 border-r-2 pr-8">
                        <span class="font-semibold text-gray-500">Order ID</span>
                        <span class="mt-4"><?php echo $sale['SaleID']; ?></span>
                    </div>

                    <div class="flex flex-col ml-4 pl-4 border-r-2 pr-8">
                        <span class="font-semibold text-gray-500">Sale Preference</span>
                        <span class="mt-4"><?php echo $sale['SalePreference']; ?></span>
                    </div>

                    <div class="flex flex-col ml-4 pl-4 pr-8">
                        <span class="font-semibold text-gray-500">Payment Method</span>
                        <span class="mt-4"><?php echo $sale['PaymentMode']; ?></span>
                    </div>
                </div>

                <div class="p-6 pb-2 pt-2 rounded flex flex-row text-lg border-b">
                    <div class="text-lg text-gray-900 font-semibold">Transaction Details</div>
                </div>

                <div class="flex flex-row p-6 gap-44">
                    <div class="flex flex-col gap-4 text-gray-500">

                        <span class="p-2 font-bold">Name</span>
                        <span class="p-2 font-bold">Phone Number</span>
                        <span class="p-2 font-bold">Email</span>
                    </div>

                    <div class="flex flex-col gap-4 font-semibold ">

                        <span class="p-2"><?php echo $customer['FirstName'] . ' ' . $customer['LastName']; ?></span>
                        <span class="p-2"><?php echo $customer['Phone']; ?></span>
                        <span class="p-2"><?php echo $customer['Email']; ?></span>
                    </div>
                </div>

                <?php if ($sale['SalePreference'] == 'Delivery') { ?>
                    <div class="p-6 pb-2 pt-2 rounded flex flex-row text-lg border-b">
                        <div class="text-lg text-gray-900 font-semibold">Delivery Details</div>
                    </div>

                    <div class="flex flex-row p-6 gap-44">
                        <div class="flex flex-col gap-4 text-gray-500">
                            <span class="p-2 font-bold">Cargo Type</span>
                            <span class="p-2 font-bold">Delivery Address</span>
                            <span class="p-2 font-bold">Delivery Date</span>
                            <span class="p-2 font-bold">Delivery Status</span>
                            <span class="p-2 font-bold">Received Date</span>
                        </div>

                        <div class="flex flex-col gap-4 font-semibold ">
                            <div class="bg-gray-200 rounded-full p-2 text-center font-bold">Heavy</div>
                            <span class="p-2"><?php echo $deliveryOrder['StreetBarangayAddress'] . ', ' . $deliveryOrder['Municipality'] . ', ' . $deliveryOrder['Province']; ?></span>
                            <span class="p-2"><?php echo $deliveryOrder['DeliveryDate']; ?></span>
                            <div class="flex justify-center items-center">
                                <span class="p-2 bg-gray-200 px-4 rounded-full font-bold flex flex-row items-center">
                                    <div changeColor class="size-4 rounded-full mr-2"></div>
                                    <?php echo $deliveryOrder['DeliveryStatus']; ?>
                                </span>
                            </div>
                            <span class="p-2"><?php echo $deliveryOrder['ReceivedDate']; ?></span>
                        </div>
                    </div>
                <?php } ?>


                <!-- COLOR CHANGER for delivery status-->
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                        const changeColor = document.querySelector('[changeColor]');
                        if ('<?= $deliveryOrder['DeliveryStatus'] ?>' == 'Delivered') {
                            changeColor.classList.remove('bg-yellow-500');
                            changeColor.classList.add('bg-green-500');
                        } else if ('<?= $deliveryOrder['DeliveryStatus'] ?>' == 'Pending') {
                            changeColor.classList.remove('bg-green-500');
                            changeColor.classList.add('bg-yellow-500');
                        } else if ('<?= $deliveryOrder['DeliveryStatus'] ?>' == 'In Transit') {
                            changeColor.classList.remove('bg-yellow-500');
                            changeColor.classList.add('bg-orange-300');
                        }
                    });
                </script>

                <?php if ($sale['PaymentMode'] == 'Card') { ?>
                    <div class="p-6 pb-2 pt-2 rounded flex flex-row text-lg border-b">
                        <div class="text-lg text-gray-900 font-semibold">Card Details</div>
                    </div>

                    <div class="flex flex-row p-6 gap-44">
                        <div class="flex flex-col gap-4 text-gray-500">
                            <span class="p-2 font-bold">Card Number</span>
                            <span class="p-2 font-bold">Expiry Date</span>
                            <span class="p-2 font-bold">CVV/CVC</span>
                        </div>

                        <div class="flex flex-col gap-4 font-semibold ">
                            <span class="p-2"><?php echo $sale['CardNumber']; ?></span>
                            <span class="p-2"><?php echo $sale['ExpiryDate']; ?></span>
                            <span class="p-2"><?php echo $sale['CVV']; ?></span>
                        </div>
                    </div>
                <?php } ?>

                <hr class=" border-gray-300">
                <h2 class="text-lg font-semibold text-center my-3 text-gray-700">Items</h2>
                <div class="flex justify-center">
                    <div class="grid grid-cols-3 gap-4 mx-auto">
                        <?php foreach ($items as $item) : ?>
                            <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg text-center cursor-pointer" data-open-modal data-product='<?= json_encode($item) ?>'>
                                <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4 flex items-center justify-center">
                                    <img src="../../<?= $item['ProductImage']; ?>" alt="<?php echo $item['ProductName']; ?>" class="object-contain">
                                </div>
                                <div class="font-bold text-lg text-gray-700"><?php echo $item['ProductName']; ?></div>
                                <div class="font-normal text-sm text-gray-500"><?php echo $item['Category_Name']; ?></div>
                                <div class="mt-6 text-lg font-semibold text-gray-700">&#8369;<?php echo number_format($item['UnitPrice'] * $item['Quantity'] * (1 + $item['TaxRate']), 2); ?></div>
                                <div class="text-gray-500 text-sm">Quantity: <?php echo $item['Quantity']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Modal Section -->
                <dialog data-modal class="rounded-lg shadow-xl  w-1/4 max-h-full">

                    <!-- Modal Header -->
                    <div class="w-full bg-green-800 h-10 flex justify-end items-center">
                        <button data-close-modal> <i class="ri-close-fill text-2xl font-bold text-white p-2"></i></button>
                    </div>

                    <!-- Modal Content -->
                    <div class="relative p-4">
                        <div class="relative bg-white">
                            <div class="flex justify-center">
                                <div class="size-64 rounded-full shadow-lg bg-yellow-200 mb-4 flex items-center justify-center">
                                    <img id="modal-product-image" src="" alt="Product Image" class="object-contain">
                                </div>
                            </div>
                            <div class="text-justify">
                                <div id="modal-product-category" class="text-justify font-semibold text-gray-800"></div>
                            </div>
                            <div class="flex justify-between pt-4">
                                <div id="modal-product-id" class="text-lg font-semibold hidden"></div>
                                <h3 id="modal-product-name" class="mb-5 text-2xl font-semibold text-gray-800 dark:text-gray-800"></h3>
                                <h3 id="modal-product-price" class="mb-5 text-2xl font-semibold text-gray-800 dark:text-gray-800"></h3>
                            </div>

                            <div class="text-justify ">
                                <div id="modal-product-description" class="text-justify"></div>
                            </div>

                            <div class="flex justify-between pt-6">
                                <h3 id="modal-product-quantity" class="pt-3 text-xl text-gray-500 font-medium"></h3>
                            </div>

                            <div class="flex justify-between">
                                <h3 id="modal-product-total" class="pt-3 text-xl text-gray-500 font-medium"></h3>
                            </div>

                            <!-- Return Order Button -->
                            <div class="flex justify-center pt-6">
                                <?php
                                $sql = "SELECT sd.SaleDetailID, sd.ProductID 
                                FROM SaleDetails sd 
                                JOIN Products p ON sd.ProductID = p.ProductID 
                                WHERE sd.SaleID = :sale_id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(":sale_id", $sale['SaleID']);
                                $stmt->execute();
                                $saleDetail = $stmt->fetch(PDO::FETCH_ASSOC);
                                $SaleDetailId = $saleDetail['SaleDetailID'];
                                $productId = $saleDetail['ProductID']; // Ensure this fetches the correct product ID
                                ?>
                                <button id="returnProductButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Return Product
                                </button>

                                <script>
                                    // Get the button element
                                    const button = document.querySelector('#returnProductButton');

                                    // Add click event listener to the button
                                    button.addEventListener('click', () => {
                                        // Get the sale ID, sale detail ID, and product ID
                                        const saleId = <?php echo json_encode($sale['SaleID']); ?>;
                                        const saleDetailId = <?php echo json_encode($SaleDetailId); ?>;
                                        const productId = <?php echo json_encode($productId); ?>;

                                        // Construct the route
                                        const route = `/master/sls/ReturnProduct/sale=${saleId}/saledetails=${saleDetailId}/product=${selectedProduct.id}`;

                                        // Redirect to the route
                                        window.location.href = route;
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </dialog>

                <script>
                    const openButtons = document.querySelectorAll('[data-open-modal]');
                    const closeButtons = document.querySelector('[data-close-modal]');
                    const modal = document.querySelector('[data-modal]');
                    const modalProductName = document.getElementById('modal-product-name');
                    const modalProductId = document.getElementById('modal-product-id');
                    const modalProductImage = document.getElementById('modal-product-image');
                    const modalProductPrice = document.getElementById('modal-product-price');
                    const modalProductDescription = document.getElementById('modal-product-description');
                    const modalProductCategory = document.getElementById('modal-product-category');
                    const modalProductQuantity = document.getElementById('modal-product-quantity');
                    const modalProductTotal = document.getElementById('modal-product-total');

                    openButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            const product = JSON.parse(button.dataset.product);
                            selectedProduct = {
                                id: product.ProductID,
                                name: product.ProductName,
                                image: product.ProductImage,
                                price: Number(product.Price),
                                stocks: product.Stocks,
                                priceWithTax: Number(product.Price) * (1 + Number(product.TaxRate)),
                                TaxRate: Number(product.TaxRate),
                                deliveryRequired: product.DeliveryRequired
                            };
                            // modalProductImage.src = `../../uploads/${product.Image}`;
                            modalProductImage.src = `../../` + selectedProduct.image;
                            modalProductId.textContent = selectedProduct.id;
                            modalProductName.textContent = selectedProduct.name;
                            modalProductPrice.textContent = '₱' + (selectedProduct.price * (1 + selectedProduct.TaxRate)).toFixed(2);
                            modalProductCategory.textContent = product.Category_Name;
                            modalProductDescription.textContent = product.Description;
                            modalProductQuantity.textContent = 'Quantity: ' + product.Quantity;
                            modalProductTotal.textContent = 'Total: ₱' + (selectedProduct.price * product.Quantity * (1 + selectedProduct.TaxRate)).toFixed(2);
                            modal.showModal();
                        });
                    });

                    closeButtons.addEventListener('click', () => {
                        modal.close();
                    });
                </script>

                <div class="p-6 pb-2 pt-2 rounded flex flex-row text-lg border-b mt-8">
                    <div class="text-lg text-gray-700 font-semibold">Order Summary</div>
                </div>
                <div class="flex flex-row p-6 gap-44">
                    <div class="flex flex-col gap-4 text-gray-500">
                        <span class="p-2 font-bold">Quantity</span>
                        <span class="p-2 font-bold">Subtotal</span>
                        <span class="p-2 font-bold">Tax</span>
                        <span class="p-2 font-bold">Shipping Fee</span>
                        <span class="p-2 font-bold">Price Discounted</span>
                        <span class="p-2 font-bold text-xl text-green-800">Total</span>
                    </div>

                    <div class="flex flex-col gap-4 font-semibold ">
                        <div class="p-2"><?php echo array_sum(array_column($items, 'Quantity')); ?></div>
                        <span class="p-2">&#8369;<?php echo number_format(array_sum(array_column($items, 'Subtotal')), 2); ?></span>
                        <span class="p-2">&#8369;<?php echo number_format(array_sum(array_column($items, 'Tax')), 2); ?></span>
                        <span class="p-2">&#8369;<?php echo number_format($sale['ShippingFee'], 2); ?></span>
                        <span class="p-2">N/A</span>
                        <span class="text-xl text-green-800 bg-gray-200 rounded-full p-1 px-8 text-center font-bold">₱<?php echo number_format($sale['TotalAmount'], 2); ?></span>
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
</body>

</html>