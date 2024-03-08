<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
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
            <h1 class="mb-3 text-xl font-bold text-gray-700">Transaction Details</h1>
            <div class="w-full bg-white rounded-lg overflow-hidden shadow-lg p-4">
                <div class="p-6 rounded">
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Name: John Doe</h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Address: 123 Main St, Anytown, USA</h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Delivery Status: Delivered</h2>
                </div>
                <hr class="my-4 border-gray-300">
                <h2 class="text-lg font-semibold text-center my-3 text-gray-700">Items</h2>
                <div class="flex justify-center">
                    <div class="grid grid-cols-3 gap-4 mx-auto">
                        <!-- Repeat this block for each item -->
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Quantity: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Quantity: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Quantity: 1</div>
                        </div>
                        <!-- End of block -->
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Quantity: 3</h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Total Amount: &#8369;1500.00</h2>
                </div>
            </div>
            <button onclick="window.history.back();" class="px-4 py-2 mt-4 text-white bg-black rounded hover:bg-gray-800 transition-colors">Back</button>
        </div>
    </main>
</body>

</html>