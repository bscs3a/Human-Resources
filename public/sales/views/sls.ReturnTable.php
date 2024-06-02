<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns History</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <?php
    // Database connection
    $db = Database::getInstance();
    $conn = $db->connect();

    // Fetch number of returns
    $sql = "SELECT COUNT(*) as count FROM ReturnProducts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    $sql = "SELECT rp.ReturnID, rp.SaleID, p.ProductID, p.ProductName, rp.Quantity, rp.Reason, rp.ReturnDate, rp.PaymentReturned 
    FROM ReturnProducts rp 
    JOIN Products p ON rp.ProductID = p.ProductID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $returnedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <p class="text-black font-medium">Sales / Returns History</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <div class="flex flex-col items-center min-h-screen mb-10 ">
            <div class="w-full max-w-6xl mt-10">
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Returns History</h1>
                    <!-- <div class="relative mb-3">
                        <select id="searchType" class="px-3 py-2 border rounded-lg mr-8">
                            <option value="customerName">Customer Name</option>
                            <option value="saleId">Sale ID</option>
                            <option value="salePreference">Sale Preference</option>
                            <option value="paymentMode">Payment Mode</option>
                        </select>
                        <input type="text" id="searchInput" placeholder="Search..." title="Search by ID, Name, Sale Preferences, Payment Mode..." class="px-3 py-2 pl-5 pr-10 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div> -->
                </div>
                <div class="flex flex-row gap-10">

                    <table id="salesTable" class="table-auto w-full mx-auto rounded-lg overflow-hidden shadow-lg text-center">

                        <!-- Rest of your code... -->

                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 font-semibold">Returned Item</th>
                                <th class="px-4 py-2 font-semibold">Quantity</th>
                                <th class="px-4 py-2 font-semibold">Sale ID</th>
                                <th class="px-4 py-2 font-semibold">Product ID</th>
                                <th class="px-4 py-2 font-semibold">Payment Returned</th>
                                <th class="px-4 py-2 font-semibold">Return Date</th> <!-- Added this -->
                                <th class="px-4 py-2 font-semibold">Action</th>
                            </tr>
                        </thead>

                        <!-- Rest of your code... -->

                        <tbody>
                            <?php foreach ($returnedProducts as $product) : ?>
                                <tr class='border border-gray-200 bg-white'>
                                    <td class='px-4 py-2'><?php echo $product['ProductName']; ?></td>
                                    <td class='px-4 py-2'><?php echo $product['Quantity']; ?></td>
                                    <td class='px-4 py-2'><?php echo $product['SaleID']; ?></td>
                                    <td class='px-4 py-2'><?php echo $product['ProductID']; ?></td>
                                    <td class='px-4 py-2'><?php echo $product['PaymentReturned']; ?></td>
                                    <td class='px-4 py-2'><?php echo $product['ReturnDate']; ?></td> <!-- Added this -->
                                    <td class='px-4 py-2'>
                                        <button route="/sls/ReturnDetails/returnID=<?php echo $product['ReturnID']; ?>" class='text-blue-500 hover:underline view-link'>View</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Rest of your code... -->
                    </table>

                    <dialog data-modal class="modalPop rounded-lg shadow-xl max-w-[400px] max-h-full elementToFade">

                        <!-- Modal Header -->
                        <div class="w-full bg-green-800 h-10 flex flex-row-2 gap-[120px] text-center justify-end">
                            <span class="text-white text-xl font-semibold p-2">Details</span>
                            <button data-close-modal> <i class="ri-close-fill text-2xl font-bold text-white p-2"></i></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="flex flex-col gap-4 p-8">

                            <div class="flex justify-center items-center">
                                <div class="size-64 flex  rounded-full shadow-lg bg-yellow-200"></div>
                            </div>

                            <div class="mt-2">
                                <div class="flex flex-row justify-between">
                                    <div class="text-lg font-semibold">
                                        Product Name
                                    </div>
                                    <div class="text-lg font-semibold">Php 300</div>
                                </div>

                                <div class="text-s text-gray-600">
                                    <?php
                                    // Fetch CategoryID
                                    $sql = "SELECT Category_ID FROM Products WHERE ProductID = :product_id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(":product_id", $product['ProductID']);
                                    $stmt->execute();
                                    $categoryId = $stmt->fetch(PDO::FETCH_ASSOC)['Category_ID'];

                                    // Fetch CategoryName
                                    $sql = "SELECT Category_Name FROM Categories WHERE Category_ID = :category_id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(":category_id", $categoryId);
                                    $stmt->execute();
                                    $categoryName = $stmt->fetch(PDO::FETCH_ASSOC)['Category_Name'];
                                    echo $categoryName;
                                    ?>
                                </div>
                            </div>

                            <div>
                                <div>From Sale ID: <span class="font-bold" id="saleId"></span></div>
                                <div>Product ID: <span class="font-bold" id="productId"></span> </div>


                                <div class="text-lg">Reason for Return:</div>
                                <div class="bg-gray-200 rounded-md p-4 shadow-inner" id="reasonForReturn"></div>

                            </div>

                        </div>
                    </dialog>

                    <script>
                        // Get all view buttons
                        const viewButtons = document.querySelectorAll('.view-link');

                        // Add click event listener to each button
                        viewButtons.forEach(button => {
                            button.addEventListener('click', () => {
                                // Get the SaleID and ProductID from the button's data- attributes
                                const saleId = button.dataset.saleId;
                                const productId = button.dataset.productId;

                                // Display the SaleID and ProductID
                                document.querySelector('#saleId').textContent = saleId;
                                document.querySelector('#productId').textContent = productId;

                            });
                        });
                    </script>

                    <script>
                        document.querySelectorAll('[data-open-modal]').forEach(function(button) {
                            button.addEventListener('click', function() {
                                document.querySelector('[data-modal]').showModal();
                            });
                        });

                        document.querySelectorAll('[data-close-modal]').forEach(function(button) {
                            button.addEventListener('click', function() {
                                document.querySelector('[data-modal]').close();
                            });
                        });
                    </script>



                    <div class="flex flex-col gap-4 justify-start items-start">
                        <div class="bg-white shadow-md text-left size-44 w-64 font-bold p-4 border-gray-200 border rounded-md flex justify-start items-center text-lg">
                            <div class="flex flex-col gap-5">
                                <div class="text-lg font-semibold text-gray-800">
                                    <i class="ri-shake-hands-fill text-lg mx-2"></i> Number of Returns
                                </div>
                                <div class="text-5xl font-semibold ml-5"><?php echo $count; ?></div>
                            </div>
                        </div>

                        <?php
                            // Fetch total of PaymentReturned
                            $sql = "SELECT SUM(PaymentReturned) as total FROM ReturnProducts";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $totalPaymentReturned = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
                        ?>

                        <!-- Display total PaymentReturned -->
                        <div class="bg-white shadow-md text-left size-44 w-64 font-bold p-4 border-gray-200 border rounded-md flex justify-start items-center text-lg">
                            <div class="flex flex-col gap-5">
                                <div>
                                    <i class="ri-funds-line text-lg mx-2"></i>Payment Returned
                                </div>
                                <div class="font-semibold ml-5">
                                    <?php 
                                        if (strlen((string)$totalPaymentReturned) > 5) {
                                            echo '<span class="text-4xl">₱' . $totalPaymentReturned . '</span>';
                                        } else {
                                            echo '<span class="text-5xl">₱' . $totalPaymentReturned . '</span>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            // Get the search input value
            var searchValue = this.value.toLowerCase();

            // Get the selected search type
            var searchType = document.getElementById('searchType').value;

            // Get all table rows
            var rows = document.querySelectorAll('#salesTable tbody tr');

            // Loop through the rows
            rows.forEach(function(row) {
                // Get the cell based on the search type
                var cell;
                switch (searchType) {
                    case 'customerName':
                        cell = row.querySelector('td:nth-child(1)');
                        break;
                    case 'saleId':
                        cell = row.querySelector('td:nth-child(2)');
                        break;
                    case 'salePreference':
                        cell = row.querySelector('td:nth-child(4)');
                        break;
                    case 'paymentMode':
                        cell = row.querySelector('td:nth-child(5)');
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

        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
    <script src="./../src/form.js"></script>
    <script src="./../src/route.js"></script>
</body>

</html>