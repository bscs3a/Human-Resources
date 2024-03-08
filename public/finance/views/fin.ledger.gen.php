<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Ledger/General</p>
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

        <div class="w-full p-6 bg-white">

            <div class="justify-between items-start mb-4">
                <!-- Button -->
                <div class="flex justify-between">
                    <div class="items-start mb-2">
                        <div class="relative">
                            <div class="inline-flex items-center overflow-hidden rounded-lg  border border-gray-500">
                                <!-- bg-gray-200 hover:bg-gray-300 text-gray-900 font-medium text-sm  -->
                                <button
                                    class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 border-gray-500">
                                    <i class="ri-calendar-2-fill"></i>
                                </button>

                                <button
                                    class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900">                   
                                    Recent
                                </button>
                            </div>

                            <div class="hidden absolute end-0 z-10 mt-2 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                                role="menu">
                                <div class="p-2">
                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        View on Storefront
                                    </a>

                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        View Warehouse Info
                                    </a>

                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        Duplicate Product
                                    </a>

                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        Unpublish Product
                                    </a>
                                </div>

                                <div class="p-2">
                                    <form method="POST" action="#">
                                        <button type="submit"
                                            class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>

                                            Delete Product
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="items-start mb-2">
                        <button id="openModal"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-medium text-sm py-1 px-3 rounded-lg border border-gray-500">
                            <i class="ri-add-box-line"></i>
                            New Transactions
                        </button>
                    </div>
                </div>


                <!-- Modal -->
                <div id="myModal"
                    class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white rounded shadow-lg w-1/3">
                        <div class="border-b pl-3 pr-3 pt-3 flex">
                            <h5 class="font-bold uppercase text-gray-600">New Transactions</h5>
                            <button id="closeModal" class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <div class="p-5">
                            <div class="mb-4 relative">
                                <label for="date" class="block text-xs font-medium text-gray-900"> Date </label>
                                <input type="text" id="date" readonly
                                    class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md  sm:text-sm" />
                                <i
                                    class="ri-calendar-fill absolute left-2 top-6 transform -translate-y-0.5 h-6 w-6 text-gray-400"></i>
                            </div>

                            <script>
                                var today = new Date();
                                var dd = String(today.getDate()).padStart(2, '0');
                                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                                var yyyy = today.getFullYear();

                                today = mm + '/' + dd + '/' + yyyy;
                                document.getElementById('date').value = today;
                            </script>
                            <div class="mb-4 relative">
                                <label for="cash" class="block text-xs font-medium text-gray-900"> Cash </label>
                                <input type="text" id="cash" placeholder="0.00"
                                    class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />
                                <span
                                    class="absolute left-2 top-6 transform -translate-y-0.5 text-gray-400">&#8369;</span>
                            </div>
                            <div class="mb-4 relative">
                                <label for="debit" class="block text-xs font-medium text-gray-900"> Debit </label>
                                <input type="text" id="debit" placeholder="0.00"
                                    class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />
                                <span
                                    class="absolute left-2 top-6 transform -translate-y-0.5 text-gray-400">&#8369;</span>
                            </div>
                            <div class="mb-4 relative">
                                <label for="credit" class="block text-xs font-medium text-gray-900"> Credit </label>
                                <input type="text" id="credit" placeholder="0.00"
                                    class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />
                                <span
                                    class="absolute left-2 top-6 transform -translate-y-0.5 text-gray-400">&#8369;</span>
                            </div>
                            <div class="flex justify-end items-start mb-2">
                                <button id="cancelModal"
                                    class="border border-gray-700 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-bold py-1 px-5 rounded-md ml-4 ">Cancel</button>
                                <button
                                    class="border border-gray-700 bg-amber-400 hover:bg-amber-300 text-gray-800 text-sm font-bold py-1 px-7 rounded-md ml-4 ">Save</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- JavaScript -->

                <script>
                    function closeModalAndClearInputs() {
                        document.getElementById('myModal').classList.add('hidden');
                        ['cash', 'credit', 'debit'].forEach(id => document.getElementById(id).value = '');
                    }

                    document.getElementById('openModal').addEventListener('click', function () {
                        document.getElementById('myModal').classList.remove('hidden');
                    });

                    ['closeModal', 'cancelModal'].forEach(id => {
                        document.getElementById(id).addEventListener('click', function (event) {
                            event.stopPropagation();
                            closeModalAndClearInputs();
                        });
                    });
                </script>

                <!-- Table -->
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="min-w-full divide-y-2 divide-gray-400 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right bg-gray-200">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Cash</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Debit</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Credit</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 text-center">
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">24/05/1995</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700"></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">&#8369;100,000</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">&#8369;120,000</td>
                            </tr>

                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jane Doe</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">04/11/1980</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">>&#8369;20,000</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">&#8369;100,000</td>
                            </tr>

                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">&#8369;100,000</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">>&#8369;20,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <ol class="flex justify-end mr-8 gap-1 text-xs font-medium">
            <li>
                <a href="#"
                    class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Prev Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>

            <li>
                <a href="#"
                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                    1
                </a>
            </li>

            <li class="block size-8 rounded border-blue-600 bg-blue-600 text-center leading-8 text-white">
                2
            </li>

            <li>
                <a href="#"
                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                    3
                </a>
            </li>

            <li>
                <a href="#"
                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                    4
                </a>
            </li>

            <li>
                <a href="#"
                    class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        </ol>
    </main>

    <!-- Start: Sidebar -->
    <!-- End: Dashboard -->
</body>

</html>