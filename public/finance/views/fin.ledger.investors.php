<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
    <link href="./../../../src/tailwind.css" rel="stylesheet">
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
                    <p class="text-black font-medium">Ledger/Accounts</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <div class="w-full p-6 bg-white">

            <div class="justify-between items-start">
                <!-- Tabs -->
                <div class="mb-4">


                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                                <a route='/fin/ledger/accounts/investors'
                                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                                    aria-current="page">
                                    Investors
                                </a>
                                <a route='/fin/ledger/accounts/payable'
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Accounts Payable
                                </a>
                                <a route='/fin/ledger/accounts/taxPayable'
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Tax Payable
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="items-start mb-2">
                        <div class="relative">
                            <div class="inline-flex items-center overflow-hidden rounded-lg  border border-gray-500">
                                <!-- bg-gray-200 hover:bg-gray-300 text-gray-900 font-medium text-sm  -->
                                <button
                                    class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 border-gray-500">
                                    <i class="ri-calendar-2-fill"></i>
                                    Filter
                                </button>
                                <div class="relative">
                                    <label for="Search" class="sr-only"> Search </label>

                                    <input type="text" id="Search" placeholder="Search for..."
                                        class="w-full rounded-md rounded-l-md p-1 border-gray-200 pe-10 shadow-sm sm:text-sm outline-none" />

                                    <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                                        <button type="button" class="text-gray-600 hover:text-gray-700">
                                            <span class="sr-only">Search</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="items-start mb-2">
                        <button id="openModal"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-medium text-sm py-1 px-3 rounded-lg border border-gray-500">
                            <i class="ri-add-box-line"></i>
                            Add Capital Account
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="myModal"
                    class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white rounded shadow-lg w-1/3">
                        <div class="border-b pl-3 pr-3 pt-3 flex">
                            <h5 class="font-bold uppercase text-gray-600">New Account</h5>
                            <!-- <button id="closeModal" class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                                <i class="ri-close-line"></i>
                            </button> -->
                        </div>
                        <!-- form -->
                        <?php $rootFolder = dirname($_SERVER['PHP_SELF']); ?>
                        <div class="p-5">
                            <!-- <form action="<?= $rootFolder . '/fin/ledger' ?>" method="POST"> -->
                            <form action="/addInvestor" method="POST">
                                <div class="mb-4 relative">
                                    <label for="acctype" class="block text-xs font-medium text-gray-900">
                                        Account Type
                                    </label>
                                    <input type="text" id="description" name="acctype" required value="Capital Accounts"
                                        readonly
                                        class="mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />
                                </div>


                                <div class="mb-4 relative">
                                    <label for="name" class="block text-xs font-medium text-gray-900">
                                        Name
                                    </label>
                                    <input type="text" id="name" name="name" required
                                        class="mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />

                                </div>
                                <div class="mb-4 relative">
                                    <label for="contact" class="block text-xs font-medium text-gray-900">
                                        Contact Info
                                    </label>
                                    <input type="text" id="contact" name="contact" required
                                        class="mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />

                                </div>
                                <div class="mb-4 relative">
                                    <label for="contactName" class="block text-xs font-medium text-gray-900">
                                        Contact Name
                                    </label>
                                    <input type="text" id="contactName" name="contactName" required
                                        class="mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />

                                </div>
                                <div class="flex justify-end items-start mb-2">
                                    <button id="cancelModal" type="button"
                                        class="border border-gray-700 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-bold py-1 px-5 rounded-md ml-4 ">Cancel</button>
                                    <button type="submit"
                                        class="border border-gray-700 bg-amber-400 hover:bg-amber-300 text-gray-800 text-sm font-bold py-1 px-7 rounded-md ml-4 ">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- JavaScript -->



                <!-- Equity -->
                <div class="flex flex-wrap gap-5">
                    <?php
                    require_once "public/finance/functions/specialTransactions/payable.php";
                    $result = getAllInvestors();
                    ?>

                    <?php foreach ($result as $results): ?>
                        <?php $id = $results['ledgerno']; ?>
                        <div
                            class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center accountsDivs">
                            <div class="text-center p-5 ">
                                <br><br><br>
                                <h1 class="text-5xl"><?= $results['name'] ?></h1>
                                <p>Contact Name: <?= $results['contact_name']?>  </p>
                                <p>Contact info: <?= $results['contact']?>  </p>
                                <p>Total: <?= number_format($results['total_amount'],2) ?></p>
                            </div>
                            <div class="p-10">
                            <button id="openLoanModal<?= $id ?>"
                                    class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                    Invest
                                </button>   
                                <button id="openPayModal<?= $id ?>"
                                    class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                    Withdraw
                                </button>
                                
                            </div>
                        </div>
                        <div id="payModal<?= $id ?>"
                            class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded shadow-lg w-1/3">
                                <div class="border-b pl-3 pr-3 pt-3 flex">
                                    <h5 class="font-bold uppercase text-gray-600"><?= $results['name'] ?></h5>
                                    <!-- <button id="closeModal" class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                                <i class="ri-close-line"></i>
                            </button> -->
                                </div>
                                <!-- form -->
                                <?php $rootFolder = dirname($_SERVER['PHP_SELF']); ?>
                                <div class="p-5">
                                    <!-- <form action="<?= $rootFolder . '/fin/ledger' ?>" method="POST"> -->
                                    <form action="/withdrawAsset" method="POST">
                                        <div class="mb-4 relative">

                                            Total: <?= $results['total_amount'] ?>

                                        </div>

                                        <input type="hidden" id="ledgerNo" name="ledgerNo" value="<?= $id ?>" />
                                        <div class="mb-4 relative">
                                            <label for="amount" class="block text-xs font-medium text-gray-900"> Amount
                                            </label>
                                            <input type="text" id="amount" name="amount" placeholder="0.00" required
                                                class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md sm:text-sm"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                            <span
                                                class="absolute left-2 top-6 transform -translate-y-0.5 text-gray-400">&#8369;</span>
                                        </div>

                                        <?php
                                        $db = Database::getInstance();
                                        $conn = $db->connect();

                                        $query = "SELECT name FROM ledger WHERE AccountType = 2";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();

                                        ?>
                                        <div class="mb-4 relative">
                                            <label for="ledgerName" class="block text-xs font-medium text-gray-900">
                                                Pay Using
                                            </label>
                                            <select name="ledgerName" id="ledgerName"
                                                class="mt-1 py-1 px-2 w-full rounded-md border border-gray-400 shadow-md sm:text-sm">
                                                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>



                                        <div class="flex justify-end items-start mb-2">
                                            <button id="cancelPayModal<?= $id ?>" type="button"
                                                class="border border-gray-700 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-bold py-1 px-5 rounded-md ml-4 ">Cancel</button>
                                            <button type="submit"
                                                class="border border-gray-700 bg-amber-400 hover:bg-amber-300 text-gray-800 text-sm font-bold py-1 px-7 rounded-md ml-4 ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="LoanModal<?= $id ?>"
                            class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white rounded shadow-lg w-1/3">
                                <div class="border-b pl-3 pr-3 pt-3 flex">
                                    <h5 class="font-bold uppercase text-gray-600"><?= $results['name'] ?></h5>
                                    <!-- <button id="closeModal" class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <i class="ri-close-line"></i>
                                </button> -->
                                </div>
                                <!-- form -->
                                <?php $rootFolder = dirname($_SERVER['PHP_SELF']); ?>
                                <div class="p-5">
                                    <!-- <form action="<?= $rootFolder . '/fin/ledger' ?>" method="POST"> -->
                                    <form action="/investAsset" method="POST">
                                        <input type="text" id="ledgerNo" name="ledgerNo" value="<?= $id ?>" readonly/>
                                        <div class="mb-4 relative">
                                            <label for="description" class="block text-xs font-medium text-gray-900">
                                                Description
                                            </label>
                                            <input type="text" id="description" name="description" required
                                                class="mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />

                                        </div>
                                        <div class="mb-4 relative">
                                            <label for="amount" class="block text-xs font-medium text-gray-900"> Amount
                                            </label>
                                            <input type="text" id="amount" name="amount" placeholder="0.00" required
                                                class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md sm:text-sm"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                            <span
                                                class="absolute left-2 top-6 transform -translate-y-0.5 text-gray-400">&#8369;</span>
                                        </div>


                                        <?php
                                        $db = Database::getInstance();
                                        $conn = $db->connect();

                                        $query = "SELECT name FROM ledger";
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();

                                        ?>
                                        <div class="mb-4 relative">
                                            <label for="ledgerName" class="block text-xs font-medium text-gray-900">
                                                Category
                                            </label>
                                            <select name="ledgerName" id="ledgerName"
                                                class="mt-1 py-1 px-2 w-full rounded-md border border-gray-400 shadow-md sm:text-sm">
                                                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="flex justify-end items-start mb-2">
                                            <button id="cancelLoanModal<?= $id ?>" type="button"
                                                class="border border-gray-700 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-bold py-1 px-5 rounded-md ml-4 ">Cancel</button>
                                            <button type="submit"
                                                class="border border-gray-700 bg-amber-400 hover:bg-amber-300 text-gray-800 text-sm font-bold py-1 px-7 rounded-md ml-4 ">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                
            </div>
        </div>
    </main>
    <!-- script for modal -->
    <script>
        <?php foreach ($result as $results): ?>
            <?php $id = $results['ledgerno']; ?>
            function closeModalAndClearInputs<?= $id ?>() {
                document.getElementById('payModal<?= $id ?>').classList.add('hidden');
                document.getElementById('LoanModal<?= $id ?>').classList.add('hidden');
                ['name', 'contact', 'contactName'].forEach(id => document.getElementById(id + '<?= $id ?>').value = '');
            }

            document.getElementById('openPayModal<?= $id ?>').addEventListener('click', function () {
                document.getElementById('payModal<?= $id ?>').classList.remove('hidden');
            });

            document.getElementById('openLoanModal<?= $id ?>').addEventListener('click', function () {
                document.getElementById('LoanModal<?= $id ?>').classList.remove('hidden');
            });

            document.getElementById('cancelPayModal<?= $id ?>').addEventListener('click', function (event) {
                event.stopPropagation();
                closeModalAndClearInputs<?= $id ?>();
            });

            document.getElementById('cancelLoanModal<?= $id ?>').addEventListener('click', function (event) {
                event.stopPropagation();
                closeModalAndClearInputs<?= $id ?>();
            });
        <?php endforeach; ?>

        function closeModalAndClearInputs() {
            document.getElementById('myModal').classList.add('hidden');
            ['name', 'contact', 'contactName'].forEach(id => document.getElementById(id).value = '');
        }

        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('myModal').classList.remove('hidden');
        });

        ['cancelModal'].forEach(id => {
            document.getElementById(id).addEventListener('click', function (event) {
                event.stopPropagation();
                closeModalAndClearInputs();
                document.getElementById('myModal').classList.add('hidden');
            });
        });
    </script>
    <script src = "./../../../public\finance\javascript\accountFilter.js"></script>
    <script src="./../../../src/form.js"></script>
    <script src="./../../../src/route.js"></script>
    <!-- Start: Sidebar -->
    <!-- End: Dashboard -->
</body>

</html>