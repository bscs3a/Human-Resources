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

            <div class="justify-between items-start">
                <!-- Tabs -->
                <div class="mb-4">


                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                                <a onclick="location.href='/Master/fin/ledger/accounts/investors'"
                                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                                    aria-current="page">
                                    Investors
                                </a>
                                <a onclick="location.href='/Master/fin/ledger/accounts/payable'"
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Accounts Payable
                                </a>


                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Button -->
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

                    <div class="inline-flex items-center justify-center gap-3">
                        <a href="#"
                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                            <span class="sr-only">Next Page</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <p class="text-xs text-gray-900">
                            3
                            <span class="mx-0.25">/</span>
                            12
                        </p>

                        <a href="#"
                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                            <span class="sr-only">Next Page</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Equity -->
                <div class="flex flex-wrap gap-5">
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">A</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">B</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">C</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">D</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">E</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">F</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">G</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-1/8 h-full border p-10 border-gray-300 text-gray-900 font-bold py-2 px-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                        <div class="text-center p-10">
                            <h1 class="text-6xl p-5">H</h1>
                            Equity
                        </div>
                        <div class="p-5">
                            <button
                                class="bg-sidebar hover:bg-blue-900 text-white text-sm/none font-bold py-2 px-4 rounded-md border border-gray-900">
                                Withdraw
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <!-- Start: Sidebar -->
    <!-- End: Dashboard -->
</body>

</html>