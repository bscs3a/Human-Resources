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
        <div class="flex flex-col items-center min-h-screen mb-10 ">
            <div class="w-full max-w-6xl mt-10">
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Revenue Sheet</h1>
                    <div class="relative mb-3">
                        <input type="text" placeholder="Search by ID..." class="px-3 py-2 pl-5 pr-10 border rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="flex justify-between gap-5">
                    <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-green-800 text-white">
                            <tr class="font-bold">
                                <th class="px-4 py-2">Assets</th>
                                <th class="px-4 py-2">Revenue</th>
                                <th class="px-4 py-2">Percentage</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Amount of Raw Sales</td>
                                <td class="p-4 text-green-400">₱10000</td>
                                <td class="p-4 text-green-400">%10</td>
                            </tr>

                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Amount of Tax Included</td>
                                <td class="p-4 text-green-400">₱10000</td>
                                <td class="p-4 text-green-400">%10</td>
                            </tr>

                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Amount of Transactions</td>
                                <td class="p-4 text-green-400">100</td>
                                <td class="p-4 text-green-400">%10</td>

                    
                            <tr class="font-semibold text-2xl">
                                <td class="p-4 ">Total</td>
                                <td class="p-4 text-green-600">₱10000</td>
                                <td class="p-4 text-green-600">%1</td>
                            </tr>

                        </tbody>
                    </table>


                    <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-red-700 text-white">
                            <tr class="font-bold">
                                <th class="px-4 py-2">Contra Revenue</th>
                                <th class="px-4 py-2">Lost</th>
                                <th class="px-4 py-2">Percentage</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Returns</td>
                                <td class="p-4 text-red-400">₱10000</td>
                                <td class="p-4 text-red-400">%10</td>
                            </tr>

                        

                            <tr class="border-b border">
                                <td class="p-4 font-semibold">Amount of Returned Items</td>
                                <td class="p-4 text-red-400">100</td>
                                <td class="p-4 text-red-400">%10</td>
                            </tr>         

                            <tr class="font-semibold text-2xl">
                                <td class="p-4 ">Total</td>
                                <td class="p-4 text-red-600">₱10000</td>
                                <td class="p-4 text-red-600">%1</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="mt-10">
                    <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-gray-200">
                            <tr class="font-bold">
                                <th class="px-4 py-2">Total Assets</th>
                                <th class="px-4 py-2">Total Contra Revenue</th>
                                <th class="px-4 py-2">Summary</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-4 text-green-500">₱10000</td>
                                <td class="p-4 text-red-500">₱5000</td>
                                <td class="p-4 text-yellow-500">₱5000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

            <button class="w-44 p-4 rounded-lg shadow-lg border-gray-400 border-2 bg-gray-200 font-semibold mt-12 hover:bg-gray-300 hover:border-gray-500 hover:font-bold transition-all ease-in-out">
                <i class="ri-import-line font-medium text-2xl"></i>
                Print Sheet
            </button>
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