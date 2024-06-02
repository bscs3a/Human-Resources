<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale (POS)</title>

    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        import Swal from 'sweetalert2'

        const Swal = require('sweetalert2')
    </script>



    <style>
        .sidebar-open {
            grid-template-columns: 1fr 300px;
        }

        .sidebar-closed {
            grid-template-columns: 1fr;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>

    <?php
    require_once 'function/getProducts.php';

    $data = getProductsAndCategories();
    $products = $data['products'];
    $categories = $data['categories'];
    ?>


    <script src="js/app.js" defer></script>
</head>

<body x-data="main">
    <?php include "components/sidebar.php" ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <div id="header" class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Sidebar toggle button -->
            <button type="button" class="text-lg sidebar-toggle" @click="cartOpen = false; sidebarOpen = true">
                <i class="ri-menu-line"></i>
            </button>

            <!-- Main title or heading -->
            <ul class="flex items-center text-md ml-4">
                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Point of Sale(POS)</p>
                </li>
            </ul>

            <!-- User information -->
            <ul class="ml-auto flex items-center">
                <!-- User name or identifier -->
                <div class="text-black font-medium">Sample User</div>

                <!-- Dropdown for user options -->
                <li class="dropdown ml-3">
                    <i class="ri-arrow-down-s-line"></i>
                </li>
            </ul>
        </div>


        <!-- Start: Full Screen Icon -->
        <div class="absolute top-0 right-0">
            <i id="fullscreenIcon" class="fas fa-expand" @click="isFullScreen = !isFullScreen; sidebarOpen = false; sidebarOpen = false;" :class="{ 'p-3 text-lg': isFullScreen, 'pt-14 pr-3 text-lg': !isFullScreen }"></i>
        </div>
        <!-- End: Full Screen Icon -->

        <div class="flex justify-between items-center w-full pt-10">

            <!-- Search Form -->
            <div class="flex justify-between items-center w-full pl-0">
                <form class="max-w-lg ml-20 mb-3 w-2/5">
                    <!-- Dropdown for Categories -->
                    <div class="flex">
                        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your Email</label>
                        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-10">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                                <!-- Dropdown Options -->
                                <?php foreach ($categories as $category) : ?>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100"><?= $category ?></button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- Search Input -->
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Hardware, Tools, Supplies..." required /> <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-green-800 rounded-e-lg border border-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- JavaScript for Dropdown -->
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
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Get references to the dropdown button and the dropdown menu
                    const dropdownButton = document.getElementById('dropdown-button');
                    const dropdown = document.getElementById('dropdown');

                    // Toggle the visibility of the dropdown menu when the dropdown button is clicked
                    dropdownButton.addEventListener('click', function() {
                        dropdown.classList.toggle('hidden');
                    });

                    // Close the dropdown menu when a click occurs outside of the dropdown button or the dropdown menu
                    document.addEventListener('click', function(event) {
                        // Check if the clicked element is the dropdown button or inside the dropdown menu
                        const isDropdownButton = event.target.matches('#dropdown-button');
                        const isDropdown = event.target.closest('#dropdown');

                        // If the click is neither on the dropdown button nor inside the dropdown menu, hide the dropdown menu
                        if (!isDropdownButton && !isDropdown) {
                            dropdown.classList.add('hidden');
                        }
                    });
                });
            </script>

            <div class="right-0 fixed flex items-center border-2 border-gray-300 rounded-l-md bg-gray-200 hidden">
                <div class="flex items-center">
                    <!-- Button to toggle the cart view -->
                    <button type="button" @click="if (sidebarOpen) { sidebarOpen = false; cartOpen = !cartOpen; } else { cartOpen = !cartOpen; }" x-show="!cartOpen" class="items-center flex bg-gray-200 py-2 w-full justify-between sidebar-toggle2 hover:bg-gray-300 ease-in-out transition">
                        <!-- Icon indicating going back to the previous view -->
                        <i class="ri-arrow-left-s-line ml-5 mr-5 text-xl"></i>
                        <!-- Vertical separator line -->
                        <div class="border-r border-gray-400 h-6"></div>
                        <!-- Cart icon and text -->
                        <div class="px-5">
                            <i class="ri-shopping-cart-2-fill text-xl mr-2"></i>
                            <span>View Cart</span>
                        </div>
                    </button>
                </div>
            </div>

        </div>



        <!-- Cart -->
        <div id="cart" x-show="cartOpen" class="fixed right-0 top-10 w-96 overflow-auto rounded-l-lg border-2 border-gray-300 bg-white shadow" x-bind:style="isFullScreen ? 'height: 94vh;' : 'height: 88vh;'" :class="{ '': isFullScreen, 'mt-12': !isFullScreen }">
            <!-- Close Sidebar Button -->
            <div @click="sidebarOpen = false; cartOpen = !cartOpen" class="flex items-center py-2 text-black no-underline bg-gray-200 border-b hover:bg-gray-300 border-gray-300 cursor-pointer">
                <i class="ri-arrow-right-s-line text-xl ml-5 mr-5"></i>
                <div class="border-r border-gray-400 h-6"></div>
                <div class="mx-3">
                    <i class="ri-shopping-cart-2-fill text-xl mr-2"></i>
                    <span>Cart</span>
                </div>
            </div>

            <!-- Add Order and Delete buttons -->
            <div class="flex justify-between px-3 py-2">
                <!-- <button class="py-1 px-4 rounded bg-gray-100 border-2 border-gray-300">
                    <i class="ri-add-circle-fill text-xl"></i> Add Order
                </button> -->
                <h2 class="text-sm font-semibold text-gray-800 py-2">Total Items in Cart: <span id="cart-quantity" class="text-sm font-bold ">0</span></h2>
                <button class="py-1 px-3 rounded bg-gray-100 border-2 border-gray-300 hover:bg-red-400 hover:border-red-600 active:scale-75 transition-all transform ease-in-out">
                    <i class="ri-delete-bin-7-fill text-xl"></i>
                </button>

            </div>

            <!-- Cart items -->
            <style>
                tr:nth-child(even) {
                    background: #EEEEEE
                }

                tr:nth-child(odd) {
                    background: #FFF
                }
            </style>

            <script>
                // Parse the JSON string to a JavaScript object
                var taxRates = JSON.parse('<?php echo $taxRatesJson; ?>');

            </script>

            <div class="flex justify-between px-3 py-2 overflow-y-auto " style="max-height: 26rem;">
                <table class="w-full text-right p-3">
                    <tbody>
                        <!-- Cart item rows -->
                        <template x-for="(item, index) in cart" :key="index">
                            <tr class="bg-gray-100">
                                <td class="text-left px-3 py-2 rounded-l-lg max-w-36" x-text="item.quantity + ' x ' + item.name"></td>
                                <td class="text-left border-l border-gray-400 pl-2 px-3 py-2" x-text="'₱' + Number(item.priceWithTax).toFixed(2)"></td>
                                <td class="px-3 py-2 rounded-r-lg">
                                    <i class="ri-close-circle-fill cursor-pointer" @click="removeFromCart(index)"></i>
                                </td>
                            </tr>
                        </template>
                        <!-- Add more item rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Order details -->
            <div class="absolute bottom-0 w-full">
                <div class="py-2 px-1 ml-2 border-t">
                    <!-- Order detail rows -->
                    <div class="grid-cols-2 gap-4 items-center mb-2 bg-gray-100 p-4 rounded-lg shadow-md" style="display: grid;">
                        <span class="font-bold text-base">Order Total:</span>
                        <span class="text-base" x-text="'&#8369;' + cart.reduce((total, item) => total + item.priceWithTax * item.quantity, 0).toFixed(2)"></span>
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
                    <button id="checkout-button" class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                        <i class="ri-shopping-basket-2-fill mr-2"></i>
                        Proceed
                    </button>

                    <script>
                        const checkoutButton = document.getElementById('checkout-button');
                        const basePath = '/master'; // Define the base path here
                        const checkoutRoute = basePath + '/sls/POS/Checkout'; // Define the route path here

                        checkoutButton.addEventListener('click', (event) => {
                            // Get the cart from localStorage
                            var cart = JSON.parse(localStorage.getItem('cart'));

                            if (!cart || cart.length === 0) {
                                // Prevent the default button click behavior
                                event.preventDefault();

                                // Show a notification if the cart is empty
                                Swal.fire({
                                    title: "Uh oh!",
                                    text: "Please put items in your cart before proceeding to checkout.",
                                    imageUrl: "https://cdn-icons-png.flaticon.com/512/4555/4555971.png",
                                    imageWidth: 200,
                                    imageHeight: 200,
                                    imageAlt: "Custom image",
                                    width: 400,
                                    confirmButtonColor: "#FF0000",
                                });


                            } else {
                                // Proceed to checkout
                                window.location.pathname = checkoutRoute;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <script>
            function updateCartQuantity() {
                // Get the cart from localStorage
                var cart = JSON.parse(localStorage.getItem('cart'));

                // Calculate the total quantity of items in the cart
                var totalQuantity = 0;
                if (cart) {
                    for (var i = 0; i < cart.length; i++) {
                        totalQuantity += cart[i].quantity; // Replace 'quantity' with the actual property name for the quantity
                    }
                }

                // Update the cart quantity display
                document.getElementById('cart-quantity').textContent = totalQuantity;
            }
        </script>

        <div class="flex flex-col items-center min-h-screen w-full" :class="{ 'w-full': !cartOpen, 'w-9/12': cartOpen }">
            <?php
            // Assuming $products is an array of arrays where each inner array contains the product details including category
            $categories = array_unique(array_column($products, 'Category')); // Extracting unique categories from products
            ?>
            <?php foreach ($categories as $category) : ?>
                <!-- Display category name -->
                <div class="text-xl font-bold divide-y ml-3 mt-5"><?= $category ?></div>
                <!-- Horizontal line -->
                <hr class="w-full border-gray-300 my-2">
                <div id="grid" class="mb-10" x-bind:class="cartOpen ? ' grid-cols-5 gap-4' : (!cartOpen && sidebarOpen) ? ' grid-cols-5 gap-4' : (!cartOpen && !sidebarOpen) ? ' grid-cols-6 gap-4' : ' grid-cols-6 gap-4'" style="display: grid;">
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['Category'] === $category) : ?> <!-- Show products only for the current category -->
                            <!-- Product Item Button -->
                            <button id="product-item-button" data-open-modal type="button" flareFire class="product-item w-52 h-70 p-6 flex flex-col items-center justify-center border rounded-lg border-solid border-gray-300 shadow-lg focus:ring-4 active:scale-90 transform transition-transform ease-in-out" data-product='<?= json_encode($product) ?>' @click="
                                selectedProduct = { id: <?= $product['ProductID'] ?>, name: '<?= $product['ProductName'] ?>', price: <?= $product['Price'] ?>, stocks: <?= $product['Stocks'] ?>, priceWithTax: <?= $product['Price'] ?> * (1 + <?= $product['TaxRate'] ?>), TaxRate: <?= $product['TaxRate'] ?>, deliveryRequired: '<?= $product['DeliveryRequired'] ?>' };
                            ">

                                <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                    <!-- SVG icon -->
                                </div>

                                <!-- Horizontal line -->
                                <hr class="w-full border-gray-300 my-2">
                                <div class="font-bold text-lg text-gray-700 text-center" x-data="{ productName: '<?= $product['ProductName'] ?>' }" :style="productName.length > 20 ? 'font-size: 0.90rem;' : 'font-size: 1rem;'">
                                    <span x-text="productName"></span>
                                </div>
                                <div class="font-normal text-sm text-gray-500"><?= $product['Category'] ?></div>
                                <?php
                                // Compute the price with tax
                                $price_with_tax = $product['Price'] * (1 + $product['TaxRate']);
                                ?>
                                <div class="mt-6 text-lg font-semibold text-gray-700">&#8369;<?= number_format($price_with_tax, 2) ?></div>
                                <div class="text-gray-500 text-sm">Stocks: <?= $product['Stocks'] ?> <?= $product['UnitOfMeasurement'] ?></div>
                            </button>

                            <!-- Modal Section -->
                            <dialog data-modal class="rounded-lg shadow-xl  w-1/4 max-h-full">

                                <!-- Modal Header -->
                                <div class="w-full bg-green-800 h-10 flex justify-end items-center">
                                    <button data-close-modal> <i class="ri-close-fill text-2xl font-bold text-white p-2"></i></button>
                                </div>

                                <!-- Modal Content -->
                                <div class="relative p-4">
                                    <div class="relative bg-white">
                                        <div class="flex justify-center">
                                            <div class="size-64 rounded-full shadow-lg bg-yellow-200 mb-4"></div>
                                        </div>
                                        <div class="text-justify">
                                            <div id="modal-product-category" class="text-justify font-semibold text-gray-800"></div>
                                        </div>
                                        <div class="flex justify-between pt-4">
                                            <h3 id="modal-product-name" class="mb-5 text-2xl font-semibold text-gray-800 dark:text-gray-800"></h3>
                                            <h3 id="modal-product-price" class="mb-5 text-2xl font-semibold text-gray-800 dark:text-gray-800"></h3>
                                        </div>

                                        <div class="text-justify ">
                                            <div id="modal-product-description" class="text-justify"></div>
                                        </div>

                                        <div class="flex justify-between pt-6">
                                            <h3 id="modal-product-stocks" class="pt-3 text-xl text-gray-500 font-medium"></h3>
                                            <button class="p-3 border border-green-900 bg-green-800 text-white rounded-lg font-medium" @click="
                                                if (selectedProduct['stocks'] > 0) { 
                                                    addToCart(selectedProduct); 
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 1000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast.onmouseenter = Swal.stopTimer;
                                                            toast.onmouseleave = Swal.resumeTimer;
                                                        }
                                                    });

                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: 'Item Added To Cart!'
                                                    });
                                                } else { 
                                                    alert('This product is out of stock.'); 
                                                }
                                            ">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>


        <!-- Modal Script -->
        <script>
            const openButtons = document.querySelectorAll('[data-open-modal]');
            const closeButtons = document.querySelector('[data-close-modal]');
            const modal = document.querySelector('[data-modal]');
            const modalProductName = document.getElementById('modal-product-name');
            const modalProductPrice = document.getElementById('modal-product-price');
            const modalProductDescription = document.getElementById('modal-product-description');
            const modalProductCategory = document.getElementById('modal-product-category');
            const modalProductStocks = document.getElementById('modal-product-stocks');

            openButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const product = JSON.parse(button.dataset.product);
                    modalProductName.textContent = product.ProductName;
                    modalProductPrice.textContent = 'Php' + product.Price;
                    modalProductCategory.textContent = product.Category;
                    modalProductDescription.textContent = product.Description;
                    modalProductStocks.textContent = 'Stocks: ' + product.Stocks + ' ' + product.UnitOfMeasurement;
                    modal.showModal();
                });
            });

            closeButtons.addEventListener('click', () => {
                modal.close();
            });
        </script>
    </main>
    <script src="./../src/route.js"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButton = document.querySelector('#modal-add-to-cart-button');
        const productItemButton = document.querySelector('#product-item-button');

        addToCartButton.addEventListener('click', function() {
            // Trigger click event of product item button
            productItemButton.click();
        });
    });
</script>


<script>
    // Initialize Alpine.js data
    document.addEventListener('alpine:init', () => {
        Alpine.data('main', () => ({
            sidebarOpen: true,
            cartOpen: false,
            isFullScreen: false,
            selectedProduct: null,

            // Load the cart items from localStorage when the page loads
            init() {
                let savedCart = localStorage.getItem('cart');
                if (savedCart) {
                    this.cart = JSON.parse(savedCart);
                }
                // Update the cart quantity display when the page loads
                updateCartQuantity();
            },

            cart: [],
            // Function to add product to cart
            addToCart(product) {
                let item = this.cart.find(i => i.id === product.id);
                if (item) {
                    if (item.quantity + 1 > product.stocks) {
                        alert('The quantity you want to add is greater than the available stocks.');
                    } else {
                        item.quantity++;
                    }


                } else {
                    if (product.stocks < 1) {
                        alert('The quantity you want to add is greater than the available stocks.');
                    } else {
                        this.cart.push({
                            ...product,
                            quantity: 1
                        });
                    }
                }


                // Save the cart items to localStorage
                localStorage.setItem('cart', JSON.stringify(this.cart));

                // Update the cart quantity display
                updateCartQuantity();
            },

            // Function to remove product from cart
            removeFromCart(index) {
                this.cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(this.cart));

                // Update the cart quantity display
                updateCartQuantity();
            },

            // Function to clear the cart
            clearCart() {
                this.cart = [];
                localStorage.setItem('cart', JSON.stringify(this.cart));

                // Update the cart quantity display
                updateCartQuantity();
            }
        }));
    });

    // Toggle sidebar visibility and adjust grid columns
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
        // Toggle sidebar visibility and transformation
        document.getElementById('sidebar-menu').classList.toggle('hidden');
        document.getElementById('sidebar-menu').classList.toggle('transform');
        document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
        // Toggle main content width and margin
        document.getElementById('mainContent').classList.toggle('md:w-full');
        document.getElementById('mainContent').classList.toggle('md:ml-64');

        // Adjust grid columns based on sidebar visibility
        var sidebarMenu = document.getElementById('sidebar-menu');
        var grid = document.querySelector('.grid');
        if (sidebarMenu.classList.contains('hidden')) {
            grid.classList.remove('grid-cols-5');
            grid.classList.add('grid-cols-6');
        } else {
            grid.classList.remove('grid-cols-6');
            grid.classList.add('grid-cols-5');
        }
    });

    // Toggle sidebar visibility and adjust grid columns (alternative method)
    document.querySelector('.sidebar-toggle2').addEventListener('click', function() {
        var sidebarMenu = document.getElementById('sidebar-menu');
        var grid = document.querySelector('.grid');

        // Check if sidebar is not hidden
        if (!sidebarMenu.classList.contains('hidden')) {
            // Toggle sidebar visibility and transformation
            sidebarMenu.classList.toggle('hidden');
            sidebarMenu.classList.toggle('transform');
            sidebarMenu.classList.toggle('-translate-x-full');
            // Toggle main content width and margin
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');

            // Adjust grid columns based on sidebar visibility
            if (!sidebarMenu.classList.contains('hidden')) {
                grid.classList.remove('grid-cols-6');
                grid.classList.add('grid-cols-5');
            } else {
                grid.classList.remove('grid-cols-5');
                grid.classList.add('grid-cols-6');
            }
        }
    });

    // Toggle sidebar visibility and adjust grid columns (alternative method)
    document.querySelector('.sidebar-toggle3').addEventListener('click', function() {
        // Adjust grid columns based on sidebar visibility
        var sidebarMenu = document.getElementById('sidebar-menu');
        var grid = document.querySelector('.grid');
        if (sidebarMenu.classList.contains('hidden')) {
            grid.classList.remove('grid-cols-5');
            grid.classList.add('grid-cols-6');
            // Toggle sidebar visibility and transformation
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            // Toggle main content width and margin
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        } else {
            // Toggle sidebar visibility and transformation
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            // Toggle main content width and margin
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
            grid.classList.remove('grid-cols-6');
            grid.classList.add('grid-cols-5');
        }
    });

    // Toggle fullscreen mode
    document.getElementById('fullscreenIcon').addEventListener('click', function() {
        var header = document.getElementById('header');
        var sidebarMenu = document.getElementById('sidebar-menu');

        // Check if header is visible
        if (header.style.display === 'none') {
            // Show header
            header.style.display = 'flex';
            // Hide sidebar if it's not hidden
            if (!sidebarMenu.classList.contains('hidden')) {
                sidebarMenu.classList.toggle('hidden');
                sidebarMenu.classList.toggle('transform');
                sidebarMenu.classList.toggle('-translate-x-full');
                document.getElementById('mainContent').classList.toggle('md:w-full');
                document.getElementById('mainContent').classList.toggle('md:ml-64');
            }
        } else {
            // Hide header
            header.style.display = 'none';
            // Hide sidebar if it's not hidden
            if (!sidebarMenu.classList.contains('hidden')) {
                sidebarMenu.classList.toggle('hidden');
                sidebarMenu.classList.toggle('transform');
                sidebarMenu.classList.toggle('-translate-x-full');
                document.getElementById('mainContent').classList.toggle('md:w-full');
                document.getElementById('mainContent').classList.toggle('md:ml-64');
            }
        }
    });
</script>


</html>