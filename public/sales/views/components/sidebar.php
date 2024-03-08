 <!-- Start: Sidebar -->

 <div id="sidebar-menu" class="fixed bg-green-900 left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform">

<div href="/Master" class="flex items-center pb-4">
    <img src="https://placehold.co/50x50" alt="" class="w-10 h-10 rounded object-cover">

    <span onclick="location.href='/Master'" class="cursor pointer text-4xl font-russo text-white ml-3">BSCS 3A</span>
</div>

<ul class="mt-3">

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a onclick="location.href='/Master/sls/Dashboard'" class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-speed-up-line mr-3 text-lg"></i>
            <span class="text-sm font-medium">Dashboard</span>
            <i class="ri-arrow-down-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a onclick="location.href='/Master/sls/POS'" class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-shopping-cart-fill mr-3 text-lg"></i>
            <span class="text-sm font-medium">Point of Sale(POS)</span>
            <i class="ri-arrow-down-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a onclick="location.href='/Master/sls/Product-Catalog'" class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-book-fill mr-3 text-lg"></i>
            <span class="text-sm font-medium">Product Catalog</span>
            <i class="ri-arrow-down-s-line ml-auto"></i>
        </a>
    </li>

    <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a onclick="location.href='/Master/sls/Transaction-History'" class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-shake-hands-fill mr-3 text-lg"></i>
            <span class="text-sm font-medium">Transactions</span>
            <i class="ri-arrow-down-s-line ml-auto"></i>
        </a>
    </li>
</div>

<div class="fixed top-0 left-0 w-full h-full z-40 md:hidden sidebar-overlay"></div>
<!-- End: Sidebar -->