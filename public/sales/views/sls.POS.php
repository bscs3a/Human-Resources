<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale (POS)</title>

    <!-- Stylesheets -->
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <style>
        .sidebar-open {
            grid-template-columns: 1fr 300px;
        }

        .sidebar-closed {
            grid-template-columns: 1fr;
        }

        /* .sidebar {
            background-color: #f7f7f7;
        } */
    </style>
</head>

<body>
    <?php include "components/sidebar.php" ?>

    <!-- Main container -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Full Screen Icon -->
        <div class="absolute top-0 right-0">
            <i id="fullscreenIcon" class="fas fa-expand" x-data="{ isFullScreen: false }" @click="isFullScreen = !isFullScreen" :class="{ 'p-3 text-lg': isFullScreen, 'pt-14 pr-3 text-lg': !isFullScreen }"></i>
        </div>
        <!-- End: Full Screen Icon -->

        <!-- Start: Header -->

        <div id="header" class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Point of Sale(POS)</p>
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

        <div class="min-h-screen" x-data="{ sidebarOpen: false, cartOpen: false }" :class="{ 'sidebar-open': sidebarOpen, 'sidebar-closed': !sidebarOpen }">

            <div class="flex justify-between items-center w-full pt-10 pl-10">

                <form class="max-w-lg mb-3 w-2/5 pl-10">
                    <div class="flex">
                        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your Email</label>
                        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-10">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Mockups</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Templates</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Design</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Logos</button>
                                </li>
                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Hardware, Tools, Supplies..." required /> <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const dropdownButton = document.getElementById('dropdown-button');
                        const dropdown = document.getElementById('dropdown');

                        dropdownButton.addEventListener('click', function() {
                            dropdown.classList.toggle('hidden');
                        });

                        document.addEventListener('click', function(event) {
                            const isDropdownButton = event.target.matches('#dropdown-button');
                            const isDropdown = event.target.closest('#dropdown');
                            if (!isDropdownButton && !isDropdown) {
                                dropdown.classList.add('hidden');
                            }
                        });
                    });
                </script>


                <div class=" right-0 fixed flex items-center border-2 border-gray-300 rounded-l-md bg-gray-200" x-show="!sidebarOpen">
                    <div class="flex items-center">
                        <button type="button" @click="sidebarOpen = !sidebarOpen; cartOpen = !cartOpen" class="items-center flex bg-gray-200  py-2 w-full justify-between sidebar-toggle2">
                            <i class="ri-arrow-left-s-line ml-5 mr-5 text-xl"></i>
                            <div class="border-r border-gray-400 h-6"></div>
                            <div class="px-5">
                                <i class="ri-shopping-cart-2-fill text-xl mr-2"></i>
                                <span>View Cart</span>
                            </div>
                        </button>
                    </div>
                </div>

            </div>

            <div class="flex flex-col items-center min-h-screen w-full" :class="{ 'w-full': !sidebarOpen, 'w-9/12': sidebarOpen }">
                <div>
                    <div class="text-xl font-bold divide-y ml-3">Most Sold</div>
                    <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                    <div id="grid" :class="!cartOpen ? 'grid grid-cols-6 gap-4' : 'grid grid-cols-5 gap-4'">
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Stocks: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Stocks: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Stocks: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Stocks: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Stocks: 1</div>
                        </div>
                        <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                <!-- SVG icon -->
                            </div>
                            <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                            <div class="font-bold text-lg text-gray-700">Nose Pliers</div>
                            <div class="font-normal text-sm text-gray-500">Pliers</div>
                            <div class="mt-6 text-lg font-semibold text-gray-700">Php500</div>
                            <div class="text-gray-500 text-sm">Stocks: 1</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart -->
            <div id="sidebar sidebar-toggle cart" class="fixed right-0 top-10 w-96 overflow-auto sidebar rounded-l-lg border-2 border-gray-300 bg-white shadow mt-12" style="height: 88vh;" x-show="sidebarOpen">
                <!-- Close Sidebar Button -->
                <div @click="sidebarOpen = false; cartOpen = !cartOpen" class="flex items-center py-2 text-black no-underline bg-gray-200 border-b border-gray-300 cursor-pointer">
                    <i class="ri-arrow-right-s-line text-xl ml-5 mr-5"></i>
                    <div class="border-r border-gray-400 h-6"></div>
                    <div class="mx-3">
                        <i class="ri-shopping-cart-2-fill text-xl mr-2"></i>
                        <span>Cart</span>
                    </div>
                </div>
                <!-- Add Order and Delete buttons -->
                <div class="flex justify-between px-3 py-2 ">
                    <button class="py-1 px-4 rounded bg-gray-100 border-2 border-gray-300">
                        <i class="ri-add-circle-fill text-xl"></i> Add Order
                    </button>
                    <button class="py- px-3 rounded bg-gray-100 border-2 border-gray-300">
                        <i class="ri-delete-bin-7-fill text-xl"></i>
                    </button>
                </div>

                <!-- Cart items -->
                <div class="flex justify-between px-3 py-2">
                    <table class="w-full text-right p-3">
                        <tbody>
                            <!-- Cart item rows -->
                            <tr class="bg-gray-100">
                                <td class="text-left px-3 py-2 rounded-l-lg">2</td>
                                <td class="text-left border-l border-gray-400 pl-2 px-3 py-2">Hammer</td>
                                <td class="px-3 py-2">$15.99</td>
                                <td class="px-3 py-2 rounded-r-lg"><i class="ri-close-circle-fill"></i></td>
                            </tr>
                            <tr class="">
                                <td class="text-left px-3 py-2 rounded-l-lg">2</td>
                                <td class="text-left border-l border-gray-400 pl-2 px-3 py-2">Hammer</td>
                                <td class="px-3 py-2">$15.99</td>
                                <td class="px-3 py-2 rounded-r-lg"><i class="ri-close-circle-fill"></i></td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="text-left px-3 py-2 rounded-l-lg">2</td>
                                <td class="text-left border-l border-gray-400 pl-2 px-3 py-2">Hammer</td>
                                <td class="px-3 py-2">$15.99</td>
                                <td class="px-3 py-2 rounded-r-lg"><i class="ri-close-circle-fill"></i></td>
                            </tr>
                            <!-- Add more item rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Add Coupon Section -->
                <div class="absolute bottom-52 w-full p-3">
                    <div class="flex items-center justify-between bg-gray-200 p-3 rounded-lg" style="background-color: #FFEEA5;">
                        <label for="coupon" class="mr-2 font-bold">Add</label>
                        <label for="coupon" class="mr-2 font-bold" style="color: #C91F41;">Discount Coupon</label>
                    </div>
                </div>

                <!-- Order details -->
                <div class="absolute bottom-0 w-full bg-gray-100">
                    <div class="py-2 px-1 ml-2 border-t border-gray-100">
                        <!-- Order detail rows -->
                        <div class="grid grid-cols-2 items-center mb-2">
                            <span class="text-right pr-16">Order Subtotal:</span>
                            <span class="text-right pr-16">$Subtotal</span>
                        </div>
                        <div class="grid grid-cols-2 items-center mb-2">
                            <span class="text-right pr-16">Shipping:</span>
                            <span class="text-right pr-16">$Shipping</span>
                        </div>
                        <div class="grid grid-cols-2 items-center mb-2">
                            <span class="text-right pr-16">Tax:</span>
                            <span class="text-right pr-16">$Tax</span>
                        </div>
                        <div class="grid grid-cols-2 items-center mb-2">
                            <span class="text-right pr-16 font-bold">Order Total:</span>
                            <span class="text-right pr-16">$Ordertotal</span>
                        </div>
                        <!-- Add more order detail rows as needed -->
                    </div>
                    <!-- Hold and Proceed buttons -->
                    <style>
                        .custom-button {
                            background-color: #FFC955;
                            transition: background-color 0.3s ease;
                        }

                        .custom-button:hover {
                            background-color: #FFA500;
                        }
                    </style>
                    <div class="flex justify-between px-5 py-1 mb-1 space-x-4">
                        <button class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                            <i class="ri-pause-line text-lg mr-2"></i>
                            Hold
                        </button>
                        <button class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                            <i class="ri-shopping-basket-2-fill mr-2"></i>
                            Proceed
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("layout", () => ({
                profileOpen: false,
                asideOpen: true,
            }));
        });
    </script>

    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');

            var sidebarMenu = document.getElementById('sidebar-menu');
            var grid = document.querySelector('.grid');

            if (!sidebarMenu.classList.contains('hidden')) {
                grid.classList.remove('grid-cols-6');
                grid.classList.add('grid-cols-5');
            } else {
                grid.classList.remove('grid-cols-5');
                grid.classList.add('grid-cols-6');
            }
        });

        document.querySelector('.sidebar-toggle2').addEventListener('click', function() {
            var sidebarMenu = document.getElementById('sidebar-menu');
            var mainContent = document.getElementById('mainContent');

            if (!sidebarMenu.classList.contains('hidden')) {
                sidebarMenu.classList.toggle('hidden');
                sidebarMenu.classList.toggle('transform');
                sidebarMenu.classList.toggle('-translate-x-full');
                mainContent.classList.toggle('md:w-full');
                mainContent.classList.toggle('md:ml-64');
            }
        });
    </script>

    <script>
        window.onload = function() {
            var grid = document.getElementById('grid');
            grid.classList.remove('grid-cols-6');
            grid.classList.add('grid-cols-5');
        };
    </script>

    <script>
        document.getElementById('fullscreenIcon').addEventListener('click', function() {
            var header = document.getElementById('header');
            var sidebarMenu = document.getElementById('sidebar-menu');
            var cart = document.getElementById('cart');
            if (header.style.display === 'none') {
                header.style.display = 'flex';
                if (!sidebarMenu.classList.contains('hidden')) {
                    sidebarMenu.classList.toggle('hidden');
                    sidebarMenu.classList.toggle('transform');
                    sidebarMenu.classList.toggle('-translate-x-full');
                    document.getElementById('mainContent').classList.toggle('md:w-full');
                    document.getElementById('mainContent').classList.toggle('md:ml-64');
                }

            } else {
                header.style.display = 'none';
                if (!sidebarMenu.classList.contains('hidden')) {
                    sidebarMenu.classList.toggle('hidden');
                    sidebarMenu.classList.toggle('transform');
                    sidebarMenu.classList.toggle('-translate-x-full');
                    document.getElementById('mainContent').classList.toggle('md:w-full');
                    document.getElementById('mainContent').classList.toggle('md:ml-64');
                }
                grid.classList.remove('grid-cols-5');
                grid.classList.add('grid-cols-6');
            }
        });
    </script>


</body>

</html>