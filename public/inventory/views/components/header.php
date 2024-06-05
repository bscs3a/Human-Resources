<!-- Start: Header -->

<div id="header" class="py-4 px-7 bg-header flex items-center shadow-md sticky">

    <!-- Start: Active Menu -->

    <button type="button" class="text-lg sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>

    <ul class="flex items-center text-md ml-4">

        <li class="mr-2">
            <a class="text-black font-medium">Inventory</a>
        </li>

    </ul>

    <!-- End: Active Menu -->

    <!-- Start: Profile -->

    <ul class="ml-auto flex items-center">
        <?php require_once __DIR__ . "/logout/logout.php" ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $(' .dropdown').click(function () {
                    $(this).find('ul').toggleClass('hidden');
                });
            });
        </script>
        <!-- End: Profile -->
</div>
<!-- top drawer component -->
<div id="hs-overlay-top" class="h-full mt-20 hs-overlay hs-overlay-open:translate-y-0 -translate-y-full fixed top-0 inset-x-0 transition-transform duration-300 transform max-h-40 size-full z-[80] 
    border-b hidden" tabindex="-1">


    <div
        class="mt-20 bg-sidebar h-screen left-0 top-0 w-64 px-4 pt-4 z-100 transition-transform duration-100 transform translate-x-0">
        <div class="flex justify-end mb-2">
            <button id="close button" type="button"
                class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                data-hs-overlay="#hs-overlay-top">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>

        <div route="/" class="flex items-center pb-4">
            <img src="https://placehold.co/50x50" alt="" class="w-10 h-10 rounded object-cover">

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
                <a route='/inv/delivery' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
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

            <li class="mb-1 hover:bg-slate-400 rounded-xl">
                <a route='/inv/reports' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                    <i class="ri-file-warning-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Incident Reports</span>
                    <i class="ri-arrow-down-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 hover:bg-slate-400 rounded-xl">
                <a route='/inv/req-finance'
                    class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                    <i class="ri-draft-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Finance Request</span>
                    <i class="ri-arrow-down-s-line ml-auto"></i>
                </a>
            </li>

    </div>
    <div class="p-4">
        <p class="text-gray-800">
        </p>
    </div>
</div>
<!-- end drawer component -->
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>
<script>
    document.querySelector('.sidebar-toggle').addEventListener('click', function () {
        // Check if the screen width is less than or equal to 767px
        if (window.innerWidth <= 767) {
            // Select the overlay
            var overlay = document.getElementById('hs-overlay-top');

            // If the overlay is hidden, show it
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');

            }
            // If the overlay is shown, hide it
            else {
                overlay.classList.add('hidden');
            }
        } else {
            document.getElementById('.sidebar-toggle').classList.toggle('-translate-x-full');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            // Toggle main content width and margin
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        }

        var content = document.getElementById('mainContent');

        if (content.classList.contains('hide-sidebar')) {
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        }

        document.getElementById('close button').addEventListener('click', function () {
            var overlay = document.getElementById('hs-overlay-top');
            overlay.classList.add('hidden');
        });

        window.addEventListener('resize', function () {
            // Check if the screen width is more than 767px
            if (window.innerWidth > 767) {
                // Select the overlay
                var overlay = document.getElementById('hs-overlay-top');

                // If the overlay is shown, hide it
                if (!overlay.classList.contains('hidden')) {
                    overlay.classList.add('hidden');
                }
            }
        });
    });
</script>
<script>
    document.querySelector('.sidebar-toggle').addEventListener('click', function () {
        document.getElementById('sidebar-menu').classList.toggle('hidden');
        document.getElementById('sidebar-menu').classList.toggle('transform');
        document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
        document.getElementById('mainContent').classList.toggle('md:w-full');
        document.getElementById('mainContent').classList.toggle('md:ml-64');
    });
</script>