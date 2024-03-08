<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
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
        <div class="flex flex-col items-center min-h-screen">
            <div class="w-full max-w-6xl mt-10">
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Transaction History</h1>
                    <div class="relative mb-3">
                        <input type="text" placeholder="Search by ID..." class="px-3 py-2 pl-5 pr-10 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 font-semibold">Name</th>
                            <th class="px-4 py-2 font-semibold">Order ID</th>
                            <th class="px-4 py-2 font-semibold">Address</th>
                            <th class="px-4 py-2 font-semibold">Total Amount</th>
                            <th class="px-4 py-2 font-semibold">Delivery Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border border-gray-200 bg-white" onclick="location.href='/Master/sls/Transaction-Details'" style="cursor: pointer;">
                            <td class="px-4 py-2">John Doe</td>
                            <td class="px-4 py-2">123456</td>
                            <td class="px-4 py-2">123 Main St, Anytown, USA</td>
                            <td class="px-4 py-2">&#8369;1500.00</td>
                            <td class="px-4 py-2">Delivered</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button onclick="location.href='/Master/sls/sample'" class="px-4 py-2 mt-4 text-white bg-black rounded">Go to Sales</button>
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
</body>

</html>