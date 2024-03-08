<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow Report</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <!-- Start: Sidebar -->
    <?php include "components/sidebar.php" ?>
    <!-- End: Sidebar -->

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
                    <p class="text-black font-medium">Cash Flow</p>
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

        <!-- Start Buttons -->
        <div class = "p-6 flex w-full justify-between">
            <button class = "rounded-[10px] bg-[#E9E9EF] p-3">
                <i class="ri-calendar-2-line"></i> Nov - Dec 2023 <i class="ri-arrow-down-s-line"></i>
            </button>
            <button class = "rounded-[10px] bg-[#E9E9EF] p-3">
                <i class="ri-download-2-line"></i> Download PDF   
            </button>
        </div>
        <!-- End Buttons -->


        <!-- Start Report -->
        <div class="m-6 bg-white border-solid border-gray-800 shadow-md rounded-[10px] min-h-[80vh] relative pt-4">
            <!-- start of detailed report -->
            <ul class="list-none mx-5 my-5">
                <li class = "flex justify-between">
                    <span>Current Cash</span>
                    <span>10m</span>
                </li>
                <li class = "flex justify-between">
                    <span>Accounts Payable</span>
                    <span>100K</span>
                </li>
                <li>
                    Expenses
                    <ul class="list-none ps-6">
                        <li>
                            Utilities
                                
                            <ul class="list-none ps-6">
                                <li class = "flex justify-between">
                                    <span>Rent</span>
                                    <span>20k</span>
                                </li>
                                <li class = "flex justify-between">
                                    <span>Water</span>
                                    <span>100K</span>
                                </li>
                                <li class = "flex justify-between">
                                    <span>etc</span>
                                    <span>100K</span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            Tax
                            <ul class="list-none ps-6">
                                <li class = "flex justify-between">
                                    <span>vat</span>
                                    <span>100K</span>
                                </li>
                                <li class = "flex justify-between">
                                    <span>salary</span>
                                    <span>100K</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- end of detailed report -->
            <!-- start of ending result -->
            <div class="absolute w-full bottom-0 flex justify-between  bg-[#E9E9EF] rounded-b-[10px] p-6">
                <span class = "font-bold">
                    Remaining Cash
                </span>
                <span class = "font-bold">
                    1m
                </span>
            </div>
            <!-- end of ending result -->
        </div>
        <!-- End Report -->

    </main>
    <!-- End: Dashboard -->
</body>

</html>