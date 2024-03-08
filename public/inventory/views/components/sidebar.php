    <!--Start: Sidebar -->
    <div class="fixed bg-violet-950 left-0 top-0 w-64 h-screen p-4 z-50 sidebar-menu">
        
        <div  onclick="location.href='/Master/index.php'" class="flex items-center pb-4">
        <img src="" alt="sample image" class="w-10 h-10 rounded object-cover">

            <span class="text-4xl font-bold ml-3 text-white">BSCS 3A</span>
        </div>

        <ul class="mt-3">
           
            <li class="mb-1 group active">
                <a class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-speed-up-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Dashboard</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
            <li class="mb-1 group active">
                <a  onclick="location.href='/Master/inv/product_order'" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-speed-up-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Product Order</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
            <li class="mb-1 group active">
                <a  onclick="location.href='/Master/inv/main'" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-speed-up-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Inventory</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
        </ul>

    </div>

    <div class="fixed top-0 left-0 w-full h-screen z-40 md:hidden sidebar-overlay"></div>
    <!-- End: Sidebar -->