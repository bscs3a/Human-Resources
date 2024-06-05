<!-- Start: Sidebar -->

<div id="sidebar-menu"
    class="fixed bg-sidebar left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform hide-sidebar:hidden">

    <div route='/' class="flex items-center pb-4">
        <div class="w-12 h-12 rounded bg-cover bg-[url('../public/finance/img/logo_reports.png')]">

        </div>

        <span class="cursor-pointer text-4xl font-russo text-white ml-3">BSCS 3A</span>
    </div>

    <ul class="mt-3">

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/main' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-speed-up-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Dashboard</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/inventoryProducts'
                class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-shopping-cart-fill mr-3 text-lg"></i>
                <span class="text-sm font-medium">Product List</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/incStock' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-inbox-archive-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Incoming Stocks</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/returns' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-arrow-go-back-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Returns</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>

        <!-- <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/manageProducts' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-file-warning-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Manage Products</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li> -->

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/reports' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-file-warning-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Reports</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route='/inv/req-finance/page=1'
                class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                <i class="ri-draft-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Finance Request</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>


</div>


</div>
<!-- End: Sidebar -->
<script src="./../src/route.js"></script>