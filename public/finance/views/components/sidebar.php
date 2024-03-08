<!-- Start: Sidebar -->

<div class="fixed bg-sidebar left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform">

    <div href="#" class="flex items-center pb-4">
        <img src="https://placehold.co/50x50" alt="" class="w-10 h-10 rounded object-cover">

        <span onclick="location.href='/Master'" class="cursor-pointer text-4xl font-russo text-white ml-3">BSCS 3A</span>
    </div>

    <ul class="mt-3">

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a href="/Master/fin/dashboard" class="flex items-center py-2 px-4 text-white hover:text-black">
                <i class="ri-speed-up-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Dashboard</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>

        <!-- button dropdown -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelector('.toggle-reports').addEventListener('click', function () {
                    document.getElementById('reports').classList.toggle('hidden');
                    document.getElementById('ledger').classList.add('hidden');
                    document.getElementById('request').classList.add('hidden');
                    // document.getElementById('reports-button').classList.toggle('bg-slate-400');

                });

                document.querySelector('.toggle-ledger').addEventListener('click', function () {
                    document.getElementById('ledger').classList.toggle('hidden');
                    document.getElementById('reports').classList.add('hidden');
                    document.getElementById('request').classList.add('hidden');
                    // document.getElementById('reports-button').classList.toggle('bg-slate-400');
                });

                document.querySelector('.toggle-request').addEventListener('click', function () {
                    document.getElementById('ledger').classList.add('hidden');
                    document.getElementById('reports').classList.add('hidden');
                    document.getElementById('request').classList.toggle('hidden');
                    // document.getElementById('reports-button').classList.toggle('bg-slate-400');
                });
            });
        </script>


        <li class="mb-1  rounded-xl">
            <button id="reports-button"
                class="toggle-reports flex items-center py-2 px-4 w-full text-white hover:text-black  hover:bg-slate-400 rounded-xl">
                <i class="ri-file-edit-fill mr-3 text-lg"></i>
                <span class="text-sm font-medium">Reports</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </button>
            <ul id="reports" class="ml-8 hidden">
                <li>
                    <a href ="/Master/fin/reportIncome"class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Income</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
                <li>
                    <a href="/Master/fin/reportCash" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Cash Flow</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>

                <li>
                    <a href="/Master/fin/reportEquity" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Equity</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>

                <li>
                    <a href="/Master/fin/reportBalance" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Balance Sheet</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>


            </ul>
        </li>

        <li class="mb-1">
            <button
                class="toggle-ledger flex items-center py-2 px-4 w-full text-white hover:bg-slate-400 hover:text-black rounded-xl">
                <i class="ri-survey-fill mr-3 text-lg"></i>
                <span class="text-sm font-medium">Ledger</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </button>
            <ul id="ledger" class="ml-8 hidden">
                <li>
                    <a onclick="location.href='/Master/fin/ledger'" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">General</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
                <li>
                    <a onclick="location.href='/Master/fin/ledger/accounts/investors'" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Account</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
            </ul>
        </li>


        <li class="mb-1">
            <button
                class="toggle-request flex items-center py-2 px-4 w-full text-white hover:bg-slate-400 hover:text-black rounded-xl">
                <i class="ri-shake-hands-fill mr-3 text-lg"></i>
                <span class="text-sm font-medium">Request</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </button>
            <ul id="request" class="ml-8 hidden">
                <li>
                    <a href="/Master/fin/request" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Inventory</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
                <li>
                    <a href="/Master/fin/salary" class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Salary</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
            </ul>
        </li>


        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a href="/Master/fin/charts" class="flex items-center py-2 px-4 text-white hover:text-black">
                <i class="ri-line-chart-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Charts</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>



</div>

<div class="fixed top-0 left-0 w-full h-full z-40 md:hidden sidebar-overlay"></div>
<!-- End: Sidebar -->