 <!-- Start: Sidebar -->

 <div id="sidebar-menu" class="fixed bg-sidebar left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform">

<div route="/" class="flex items-center pb-4">
        <div class="w-12 h-12 rounded bg-cover bg-[url('../public/finance/img/logo_reports.png')]">

        </div>
    <span class="text-4xl font-russo text-white ml-3">BSCS 3A</span>
</div>

<ul class="mt-3">

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a route='/dlv/dashboard' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-speed-up-line mr-3 text-lg"></i>
            <span class="text-sm font-medium">Dashboard</span>
            <i class="ri-arrow-right-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a route='/dlv/list' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-truck-line mr-3 text-lg"></i>
            <span class="text-sm font-medium">Delivery</span>
            <i class="ri-arrow-right-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a route='/dlv/history' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-chat-history-line mr-3 text-lg"></i>
            <span class="text-sm font-medium">History</span>
            <i class="ri-arrow-right-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a route='/dlv/pondo/page=1' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-bank-line mr-3 text-lg"></i>
            <span class="text-sm font-medium">Expenses Request</span>
            <i class="ri-arrow-right-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a route='/dlv/audit/page=1' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-file-text-line mr-3 text-lg"></i>
            <span class="text-sm font-medium">Audit Logs</span>
            <i class="ri-arrow-right-s-line ml-auto"></i>
        </a>
    </li>

</div>

<div class="fixed top-0 left-0 w-full h-full z-40 md:hidden sidebar-overlay"></div>
<!-- End: Sidebar -->