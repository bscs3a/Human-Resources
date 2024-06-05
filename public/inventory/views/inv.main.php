<?php
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">


</head>

<body>
    <?php require_once __DIR__ . "/../functions/db.php"; ?>
    <?php include __DIR__ . '/../functions/q_counter.php'; ?>
    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!-- Start: Stats -->
        <div class="text-2xl font-semibold px-6 py-5">
            <h1>Stats</h1>
        </div>

        <div class="grid grid-cols-2 gap-4 m-2">

            <div class="flex px-4 w-full rounded-lg bg-white flex-col shadow-md border border-black">
                <h1 class="text-black font-bold mt-2 mb-4">Total Stocks</h1>

                <div class="flex items-center m-3">
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="text-5xl font-semibold text-center mb-4">
                            <?php
                            echo $total_quantity . " Item(s)"; ?>
                        </p>
                    </div>
                </div>

                <div class="flex place-content-end mt-2 m-3">
                    <button route='/inv/inventoryProducts'
                        class="items-end font-bold rounded-full w-48 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900"
                        id="openModal">
                        Go to Product List
                    </button>
                </div>
            </div>
            <div class="flex px-4 w-full rounded-lg bg-white border border-gray-600 flex-col shadow-md">
                <h1 class="text-black font-bold mt-2 mb-4">Incoming Stocks</h1>

                <div class="flex items-center m-3">
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="text-5xl font-semibold text-center mb-4">
                            <?php
                            echo $total_incoming . " Item(s)"; ?>
                        </p>
                    </div>
                </div>

                <div class="flex place-content-end mt-2 m-3">
                    <button data-modal-target="incomingstock-modal" data-modal-toggle="incomingstock-modal"
                        class="items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                        View </button>
                </div>
            </div>

            <div
                class="flex px-4 w-full rounded-lg <?php echo $no_stock_count > 0 ? 'bg-red-300' : ''; ?> border border-gray-600 flex-col shadow-md">
                <h1 class="text-black font-bold mt-2 mb-4">Out of Stock</h1>

                <div class="flex items-center m-3">
                    <div class="flex flex-col justify-between flex-grow">
                        <p
                            class="text-5xl <?php echo $no_stock_count > 0 ? 'text-red-950' : ''; ?> font-semibold text-center mb-4">
                            <?php
                            echo $no_stock_count . " Product(s)"; ?>
                        </p>
                    </div>
                </div>

                <div class="flex place-content-end mt-2 m-3">
                    <button data-modal-target="outstock-modal" data-modal-toggle="outstock-modal"
                        class="items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                        View </button>
                </div>
            </div>

            <div class="flex px-4 w-full rounded-lg bg-white border border-gray-600 flex-col shadow-md">
                <h1 class="text-black font-bold mt-2 mb-4">Returns</h1>

                <div class="flex items-center m-3">
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="text-5xl font-semibold text-center mb-4">
                        <p class="text-5xl text-red-950 font-semibold text-center mb-4">
                            <?php
                            echo $return_stock . " Product(s)"; ?>
                        </p>
                        </p>
                    </div>
                </div>

                <div class="flex place-content-end mt-2 m-3">
                    <button data-modal-target="return-modal" data-modal-toggle="return-modal"
                        class="items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                        View </button>
                </div>
            </div>
        </div>
        <!--End: Stats-->

        <!--Start: Product-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Product</h1>
        </div>

        <div class="flex justify-between px-6 mt-1 mb-4">
            <div>
                Recently Added
            </div>
            <div class="flex items-center">
                <!-- Dropdown button -->
            </div>
        </div>
        <!--End: Product-->

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Added
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . '/../functions/total_stock.php';
                    foreach ($rowsTStock as $rowTStock): ?>
                        <tr class="bg-white">
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['product']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['category']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['quantity']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['price']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['date_added']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--End: Table-->

        <!-- Modals -->

        <!-- Incoming Stock Modal -->
        <div id="incomingstock-modal"
            class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded shadow-lg w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 h-3/4 sm:h-2/3 md:h-1/2 lg:h-1/2">
                <div class="pl-3 pr-3 pt-3 flex">
                    <h5 class="font-bold uppercase text-gray-600">Incoming Stock</h5>
                    <button data-modal-hide="incomingstock-modal"
                        class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="overflow-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-black">
                        <thead class="text-xs text-black uppercase bg-gray-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ordered Products
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Arrival
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Number of Orders
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- eee -->
                            <?php
                            require_once __DIR__ . '/../functions/inc_stock.php';
                            foreach ($IncStock as $rowStock):
                                $stmt = $conn->prepare("SELECT ProductName FROM products WHERE ProductID = :ProductID");
                                $stmt->execute(['ProductID' => $rowStock['ProductID']]);
                                $product = $stmt->fetch();
                                ?>
                                <tr class="bg:white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200"
                                    onclick="location.href='/master/inv/incStock'">
                                    <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                                        <?php echo $rowStock['ProductID']; ?>
                                    </th>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $product['ProductName']; ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                        <?php
                                        echo $rowStock['DeliveryStatus'];
                                        ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $rowStock['DeliveryDate']; ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $rowStock['Quantity']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- eee -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Incoming Stock Modal JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('incomingstock-modal');
                var closeButtons = document.querySelectorAll('[data-modal-hide="incomingstock-modal"]');
                var openButton = document.querySelector('[data-modal-target="incomingstock-modal"]');

                closeButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                });

                openButton.addEventListener('click', function () {
                    modal.classList.remove('hidden');
                });
            });
        </script>
        <!-- Incoming Stock Modal JS end -->

        <!-- Out of Stock Modal -->
        <div id="outstock-modal"
            class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded shadow-lg w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 h-3/4 sm:h-2/3 md:h-1/2 lg:h-1/2">
                <div class=" pl-3 pr-3 pt-3 flex">
                    <h5 class="font-bold uppercase text-gray-600">Out of Stock</h5>
                    <button data-modal-hide="outstock-modal"
                        class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="overflow-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-black">
                        <thead class="text-xs text-black uppercase bg-gray-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Stock ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Out of Stock Products
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Recommended Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once __DIR__ . '/../functions/no_stock.php';
                            if ($count > 0) {
                                foreach ($rowsNoStock as $rowNoStock):
                                    ?>
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                                            <?php echo $rowNoStock['stock_id']; ?>
                                        </th>
                                        <td class="px-6 py-4 font-semibold text-black">
                                            <?php echo $rowNoStock['product']; ?>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-black">
                                            <button
                                                onclick="location.href='/master/inv/prod-edit=<?php echo $rowNoStock['stock_id']; ?>'"
                                                class="bg-white hover:bg-gray-200 text-black border border-black font-bold py-2 px-4">Details</button>

                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            } else {
                                echo "<tr><td colspan='4'>All Products are on stock</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('outstock-modal');
                var closeButtons = document.querySelectorAll('[data-modal-hide="outstock-modal"]');
                var openButton = document.querySelector('[data-modal-target="outstock-modal"]');
                closeButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                });

                openButton.addEventListener('click', function () {
                    modal.classList.remove('hidden');
                });
            });
        </script>
        <!-- Return Stock Modal -->
        <div id="return-modal"
            class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded shadow-lg w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 h-3/4 sm:h-2/3 md:h-1/2 lg:h-1/2">
                <div class="pl-3 pr-3 pt-3 flex">
                    <h5 class="font-bold uppercase text-gray-600">Returns</h5>
                    <button data-modal-hide="return-modal"
                        class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="overflow-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-black">
                        <thead class="text-xs text-black uppercase bg-gray-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Returned Products
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Reason
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once __DIR__ . '/../functions/return.php';
                            foreach ($rowsReturn as $rowReturn):
                                $stmt = $conn->prepare("SELECT ProductName FROM products WHERE ProductID = :ProductID");
                                $stmt->execute(['ProductID' => $rowReturn['ProductID']]);
                                $productReturn = $stmt->fetch(); ?>
                                <tr class="bg:white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200"
                                    onclick="location.href='/master/inv/returns'">
                                    <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                                        <?php echo $rowReturn['ProductID']; ?>
                                    </th>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $productReturn['ProductName']; ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $rowReturn['Quantity']; ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $rowReturn['Reason']; ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-black">
                                        <?php echo $rowReturn['ProductStatus']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Return Stock Modal JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('return-modal');
                var closeButtons = document.querySelectorAll('[data-modal-hide="return-modal"]');
                var openButton = document.querySelector('[data-modal-target="return-modal"]');

                closeButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                });

                openButton.addEventListener('click', function () {
                    modal.classList.remove('hidden');
                });
            });
        </script>
        
        <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
        <!-- Return Stock Modal JS End -->
</body>

</html>