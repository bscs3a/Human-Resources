<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <?php
    require_once 'function/fetchSalesData.php';
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
                    <p class="text-black font-medium">Sales / Transaction History</p>
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
                    <h1 class="mb-3 text-xl font-bold text-black">Transaction History</h1>
                    <div class="relative mb-3">
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
                    </div>
                </div>
                <div class="flex flex-row gap-10">

                    <table id="salesTable" class="table-auto w-full mx-auto rounded-lg overflow-hidden shadow-lg text-center">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 font-semibold">Customer Name</th>
                                <th class="px-4 py-2 font-semibold">Sale ID</th>
                                <th class="px-4 py-2 font-semibold">Sale Date</th>
                                <th class="px-4 py-2 font-semibold">Sale Preference</th>
                                <th class="px-4 py-2 font-semibold">Payment Mode</th>
                                <th class="px-4 py-2 font-semibold">Total Amount</th>
                                <th class="px-4 py-2 font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Fetch data from the result set -->
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                <?php $saleId = $row['SaleID']; ?>
                                <tr class='border border-gray-200 bg-white' data-sale-id='<?php echo $saleId; ?>'>
                                    <td class='px-4 py-2'><?php echo $row['CustomerFirstName'] . " " . $row['CustomerLastName']; ?></td>
                                    <td class='px-4 py-2'><?php echo $saleId; ?></td>
                                    <td class='px-4 py-2'><?php echo date('F j, Y, g:i a', strtotime($row['SaleDate'])); ?></td>
                                    <td class='px-4 py-2'><?php echo $row['SalePreference']; ?></td>
                                    <td class='px-4 py-2'><?php echo $row['PaymentMode']; ?></td>
                                    <td class='px-4 py-2'>₱<?php echo number_format($row['TotalAmount'], 2); ?></td>
                                    <td class='px-4 py-2'><a route='/sls/Transaction-Details/sale=<?php echo $saleId; ?>' class='text-blue-500 hover:underline view-link'>View</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                    <div class="flex flex-col gap-4 justify-start items-start">

                        <div class="bg-white shadow-md text-left size-44 w-64 font-bold p-4 border-gray-200 border rounded-md flex justify-start items-start text-lg">

                            <div class="flex flex-col gap-5">
                                <div class="text-lg font-semibold text-gray-800">
                                    <i class="ri-shake-hands-fill text-lg mx-2"></i> Transaction Rate
                                </div>
                                <div class="text-5xl font-semibold ml-5">53</div>
                                <div class="text-sm font-semibold ml-5 text-green-700">+10% more than average</div>
                            </div>

                        </div>

                        <div class="bg-white shadow-md text-left size-44 w-64 font-bold p-4 border-gray-200 border rounded-md flex justify-start items-start text-lg">

                            <div class="flex flex-col gap-5">
                                <div>
                                    <i class="ri-funds-line text-lg mx-2"></i>Raw Sales
                                </div>
                                <div class="text-5xl font-semibold ml-5">53</div>
                                <div class="text-sm font-medium ml-5 text-green-700">+10% more than average</div>
                            </div>

                        </div>

                        <!-- <div class="bg-white shadow-md text-left size-44 w-64 font-bold p-4 border-gray-200 border rounded-md flex justify-start items-start text-lg">

                            <div class="flex flex-col gap-5">
                                <div>
                                    <i class="ri-funds-line text-lg mx-2"></i>Raw Sales
                                </div>
                                <div class="text-5xl font-semibold ml-5">53</div>
                                <div class="text-sm font-medium ml-5 text-green-700">+10% more than average</div>
                            </div>
                        </div> -->
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