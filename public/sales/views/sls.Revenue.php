<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        import Swal from 'sweetalert2'

        const Swal = require('sweetalert2')
    </script>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>

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
                    <p class="text-black font-medium">Sales / Revenue</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php" ?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->
        <div class="flex flex-col items-center min-h-screen mb-10 ">
            <div class="w-full max-w-6xl mt-10">
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Revenue Sheet</h1>
                    <!-- <div class="relative mb-3">
                        <input type="text" placeholder="Search by ID..." class="px-3 py-2 pl-5 pr-10 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div> -->
                </div>

                <div class="flex justify-between gap-5">
                    <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-green-800 text-white">
                            <tr class="font-bold">
                                <th class="px-4 py-2">Gross Sales</th>
                                <th class="px-4 py-2">Revenue</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Amount of Raw Sales</td>
                                <td class="p-4 text-green-400">
                                    <?php
                                    // Check if the function exists before calling it
                                    if (function_exists('amountOfRawSales')) {
                                        // Call the function and store its return value
                                        $salesAmount = amountOfRawSales();

                                        // Multiply the sales amount by -1
                                        $salesAmount *= -1;

                                        // Check if the function returned a value
                                        if ($salesAmount !== null) {
                                            echo "₱" . $salesAmount;
                                        } else {
                                            echo "Error: amountOfRawSales() returned null.";
                                        }
                                    } else {
                                        echo "Error: amountOfRawSales() function does not exist.";
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Amount of Tax Included</td>
                                <td class="p-4 text-green-400">
                                    <?php
                                    // Check if the function exists before calling it
                                    if (function_exists('amountOfSalesTax')) {
                                        // Call the function and store its return value
                                        $salesTaxAmount = amountOfSalesTax();

                                        // Multiply the sales tax amount by -1
                                        $salesTaxAmount *= -1;

                                        // Check if the function returned a value
                                        if ($salesTaxAmount !== null) {
                                            echo "₱" . $salesTaxAmount;
                                        } else {
                                            echo "Error: amountOfSalesTax() returned null.";
                                        }
                                    } else {
                                        echo "Error: amountOfSalesTax() function does not exist.";
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr class="font-semibold text-2xl">
                                <td class="p-4 ">Total</td>
                                <td class="p-4 text-green-600">
                                    <?php
                                    // Check if the functions exist before calling them
                                    if (function_exists('amountOfRawSales') && function_exists('amountOfSalesTax')) {
                                        // Call the functions and store their return values
                                        $salesAmount = amountOfRawSales();
                                        $salesTaxAmount = amountOfSalesTax();

                                        // Multiply the amounts by -1
                                        $salesAmount *= -1;
                                        $salesTaxAmount *= -1;

                                        // Subtract the sales tax amount from the sales amount to get the total
                                        $total = $salesAmount + $salesTaxAmount;

                                        // Check if the functions returned values
                                        if ($salesAmount !== null && $salesTaxAmount !== null) {
                                            echo "₱" . $total;
                                        } else {
                                            echo "Error: One of the functions returned null.";
                                        }
                                    } else {
                                        echo "Error: One of the functions does not exist.";
                                    }
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>


                    <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-red-700 text-white">
                            <tr class="font-bold">
                                <th class="px-4 py-2">Contra Revenue</th>
                                <th class="px-4 py-2">Lost</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Returns</td>
                                <td class="p-4 text-red-400">
                                    <?php
                                    // Check if the function exists before calling it
                                    if (function_exists('totalReturns')) {
                                        // Call the function and store its return value
                                        $totalReturns = totalReturns();

                                        // Check if the function returned a value
                                        if ($totalReturns !== null) {
                                            echo "₱" . $totalReturns;
                                        } else {
                                            echo "Error: totalReturns() returned null.";
                                        }
                                    } else {
                                        echo "Error: totalReturns() function does not exist.";
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr class="font-semibold text-2xl">
                                <td class="p-4 ">Total</td>
                                <td class="p-4 text-red-600">
                                    <?php
                                    // Check if the function exists before calling it
                                    if (function_exists('totalReturns')) {
                                        // Call the function and store its return value
                                        $totalReturns = totalReturns();

                                        // Check if the function returned a value
                                        if ($totalReturns !== null) {
                                            echo "₱" . $totalReturns;
                                        } else {
                                            echo "Error: totalReturns() returned null.";
                                        }
                                    } else {
                                        echo "Error: totalReturns() function does not exist.";
                                    }
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="mt-10">
                    <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-gray-200">
                            <tr class="font-bold">
                                <th class="px-4 py-2">Total Gross Sales</th>
                                <th class="px-4 py-2">Total Contra Revenue</th>
                                <th class="px-4 py-2">Summary</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-4 text-green-500">
                                    <?php
                                    // Check if the functions exist before calling them
                                    if (function_exists('amountOfRawSales') && function_exists('amountOfSalesTax')) {
                                        // Call the functions and store their return values
                                        $salesAmount = amountOfRawSales();
                                        $salesTaxAmount = amountOfSalesTax();

                                        // Multiply the amounts by -1
                                        $salesAmount *= -1;
                                        $salesTaxAmount *= -1;

                                        // Subtract the sales tax amount from the sales amount to get the total
                                        $total = $salesAmount + $salesTaxAmount;

                                        // Check if the functions returned values
                                        if ($salesAmount !== null && $salesTaxAmount !== null) {
                                            echo "₱" . $total;
                                        } else {
                                            echo "Error: One of the functions returned null.";
                                        }
                                    } else {
                                        echo "Error: One of the functions does not exist.";
                                    }
                                    ?>
                                </td>
                                <td class="p-4 text-red-500">
                                    <?php
                                    // Check if the function exists before calling it
                                    if (function_exists('totalReturns')) {
                                        // Call the function and store its return value
                                        $totalReturns = totalReturns();

                                        // Check if the function returned a value
                                        if ($totalReturns !== null) {
                                            echo "₱" . $totalReturns;
                                        } else {
                                            echo "Error: totalReturns() returned null.";
                                        }
                                    } else {
                                        echo "Error: totalReturns() function does not exist.";
                                    }
                                    ?>
                                </td>
                                <td class="p-4 text-yellow-500">
                                    <?php
                                    // Check if the function exists before calling it
                                    if (function_exists('totalSalesMinusTaxAndReturns')) {
                                        // Call the function and store its return value
                                        $totalSalesMinusTaxAndReturns = totalSalesMinusTaxAndReturns();

                                        // Multiply the result by -1
                                        $totalSalesMinusTaxAndReturns *= -1;

                                        // Check if the function returned a value
                                        if ($totalSalesMinusTaxAndReturns !== null) {
                                            echo "₱" . $totalSalesMinusTaxAndReturns;
                                        } else {
                                            echo "Error: totalSalesMinusTaxAndReturns() returned null.";
                                        }
                                    } else {
                                        echo "Error: totalSalesMinusTaxAndReturns() function does not exist.";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

    </main>
    <script>
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