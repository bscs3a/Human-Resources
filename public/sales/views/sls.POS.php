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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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
    // $categories = $data['categories'];
    ?>


    <script src="js/app.js" defer></script>
</head>

<body x-data="main">
    <?php include "components/sidebar.php" ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <div id="header" class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-51" style="z-index: 99;">

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

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->
        </div>


        <!-- Start: Full Screen Icon -->
        <div class="absolute top-0 right-0">
            <i id="fullscreenIcon" class="fas fa-expand" @click="isFullScreen = !isFullScreen; sidebarOpen = false; cartOpen = !cartOpen;" :class="{ 'p-3 text-lg': isFullScreen, 'pt-14 pr-3 text-lg': !isFullScreen }"></i>
        </div>
        <!-- End: Full Screen Icon -->

        <div class="flex justify-between items-center w-full pt-10">

            <!-- Search Form -->
            <div class="flex justify-between items-center w-full pl-0">
                <!-- Dropdown for Categories -->
                <div class="flex ml-24">
                    <!-- Dropdown for Categories -->
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="h-10 flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
                        All categories
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-10">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            <!-- Dropdown Options -->
                            <?php 
                            $uniqueCategories = array_unique(array_column($products, 'Category_Name')); // Extracting unique categories from products
                            foreach ($uniqueCategories as $categoryName) : ?>
                                <li>
                                    <button type="button" class="category-button inline-flex w-full px-4 py-2 text-left hover:bg-gray-100"><?= $categoryName ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Search Form -->
                    <div class="relative mb-3">
                        <input type="text" id="searchInput" placeholder="Search..." title="Search by product name..." class="h-10 px-3 py-2 pl-5 pr-10 border rounded-r-lg rounded-l-none">
                        <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <svg id="clear-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-6 h-6 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>

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

                        // Add event listener to category buttons
                        document.querySelectorAll('.category-button').forEach(function(button) {
                            button.addEventListener('click', function() {
                                // Update search input value with category name
                                document.getElementById('searchInput').value = button.textContent;

                                // Trigger input event to filter products
                                document.getElementById('searchInput').dispatchEvent(new Event('input'));
                            });
                        });
                    });
                </script>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const searchInput = document.getElementById('searchInput');
                        const searchIcon = document.getElementById('search-icon');
                        const clearIcon = document.getElementById('clear-icon');

                        // Show the clear icon when the search input has value
                        searchInput.addEventListener('input', function() {
                            if (this.value) {
                                searchIcon.classList.add('hidden');
                                clearIcon.classList.remove('hidden');
                            } else {
                                searchIcon.classList.remove('hidden');
                                clearIcon.classList.add('hidden');
                            }
                        });

                        // Clear the search input when the clear icon is clicked
                        clearIcon.addEventListener('click', function() {
                            searchInput.value = '';
                            this.classList.add('hidden');
                            searchIcon.classList.remove('hidden');
                            searchInput.dispatchEvent(new Event('input'));
                        });

                        // Rest of your code...
                    });
                </script>
            </div>

            <div class="right-0 fixed flex items-center border-2 border-gray-300 rounded-l-md bg-gray-200 z-50">
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
                <button data-open-modal class="py-1 px-3 rounded bg-gray-100 border-2 border-gray-300 hover:bg-red-400 hover:border-red-600 active:scale-75 transition-all transform ease-in-out">
                    <i class="ri-delete-bin-7-fill text-xl"></i>
                </button>


                <!-- MODAL SECTION -->
                <dialog data-modal class="rounded-lg shadow-xl">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white">
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-red-500 w-12 h-12 dark:text-white-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-gray-800">Are you sure you want to delete this cart order?</h3>
                                <button data-close-modal type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" @click="clearCart()">
                                    Yes, I'm sure
                                </button>
                                <button data-close-modal2 type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                            </div>
                        </div>
                    </div>
                </dialog>


                <!-- MODAL SCRIPT -->
                <script>
                    const openButtons = document.querySelector('[data-open-modal]');
                    const closeButtons = document.querySelector('[data-close-modal]');
                    const closeButton2 = document.querySelector('[data-close-modal2]');
                    const modal = document.querySelector('[data-modal]');

                    openButtons.addEventListener('click', () => {
                        modal.showModal();
                    });

                    closeButtons.addEventListener('click', () => {
                        modal.close();
                    });

                    closeButton2.addEventListener('click', () => {
                        modal.close();
                    });
                </script>

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

                // Use the taxRates in your Alpine.js code
                // ...
            </script>

            <div class="flex justify-between px-3 py-2 overflow-y-auto " style="max-height: 26rem;">
                <table class="w-full text-right p-3">
                    <tbody>
                        <!-- Cart item rows -->
                        <template x-for="(item, index) in cart" :key="index">
                            <tr class="bg-gray-100">
                                <td class="text-left px-3 py-2 rounded-l-lg max-w-36 cursor-pointer hover:bg-gray-300 transition-colors ease-in-out" x-data="{ editing: false, newQuantity: item.quantity }" x-effect="newQuantity = item.quantity" @click="editing = true" @click.away="if (editing) {
                                                     console.log('Old quantity:', item.quantity);
                                                     console.log('New quantity:', newQuantity);

                                                     if (newQuantity <= item.stocks) { 
                                                        let quantity;
                                                        if (item.quantity > newQuantity) {
                                                            quantity = item.quantity - newQuantity;
                                                            for (let i = 0; i < quantity; i++) {
                                                                item.quantity--;
                                                            }
                                                            newQuantity = item.quantity;
                                                            localStorage.setItem('cart', JSON.stringify(cart));
                                                        } else {
                                                            quantity = newQuantity - item.quantity;
                                                            for (let i = 0; i < quantity; i++) {
                                                                item.quantity++;
                                                            }
                                                            newQuantity = item.quantity;
                                                            localStorage.setItem('cart', JSON.stringify(cart));
                                                        }
                                                        
                                                    } else { 
                                                        showAlertBox(); 
                                                    }
                                                    // Update the cart quantity display when the page loads
                                                    updateCartQuantity();
                                                }
                                                editing = false;" @blur="editing = false; item.quantity = newQuantity" @keydown.enter="if (editing) {
                                                     console.log('Old quantity:', item.quantity);
                                                     console.log('New quantity:', newQuantity);

                                                     if (newQuantity <= item.stocks) { 
                                                        let quantity;
                                                        if (item.quantity > newQuantity) {
                                                            quantity = item.quantity - newQuantity;
                                                            for (let i = 0; i < quantity; i++) {
                                                                item.quantity--;
                                                            }
                                                            newQuantity = item.quantity;
                                                            localStorage.setItem('cart', JSON.stringify(cart));
                                                        } else {
                                                            quantity = newQuantity - item.quantity;
                                                            for (let i = 0; i < quantity; i++) {
                                                                item.quantity++;
                                                            }
                                                            newQuantity = item.quantity;
                                                            localStorage.setItem('cart', JSON.stringify(cart));
                                                        }
                                                        
                                                    } else { 
                                                        showAlertBox(); 
                                                    }
                                                    // Update the cart quantity display when the page loads
                                                    updateCartQuantity();
                                                }

                                                editing = false;" x-bind:class="{ 'bg-gray-300': editing, 'transition-all' : editing }">



                                    <span x-show="!editing" x-text="item.quantity + ' x ' + item.name"></span>
                                    <input x-show="editing" type="number" x-model="newQuantity" min="1" step="1" x-autofocus class="w-full rounded-md">
                                </td>
                                <td class="text-left border-l border-gray-400 pl-2 px-3 py-2" x-text="'₱' + Number(item.priceWithTax * item.quantity).toFixed(2)"></td>
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
                    <!-- <button class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                        <i class="ri-pause-line text-lg mr-2"></i>
                        Hold
                    </button> -->
                    <div></div>
                    <button id="checkout-button" class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                        <i class="ri-shopping-basket-2-fill mr-2"></i>
                        Proceed
                    </button>

                    <script>
                        const checkoutButton = document.getElementById('checkout-button');
                        const basePath = '/master'; // Define the base path here
                        const checkoutRoute = basePath + '/sls/POS/Checkout'; // Concatenate base path with the route

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

        <!-- FOR NO STOCKS ALERT -->

        <div id="customAlertBox" class="fixed inset-0 z-30 flex items-center justify-center text-center bg-black bg-opacity-50 hidden shadow-lg border-gray-200 custom-alert-box">
            <div class="bg-white p-6 rounded">
                <img src="https://static.thenounproject.com/png/3407335-200.png" class="ml-6 p-10" alt="alternatetext">
                <div class="font-bold text-2xl mb-4">Out of Stocks!</div>
                <div class="mb-4">The amount of available stocks exceeded</div>
                <div class="flex justify-end">
                    <button onclick="closeAlertBox()" class="px-4 py-2 bg-green-800 text-white rounded hover:bg-green-900 hover:font-bold transition-all w-full">OK</button>
                </div>
            </div>
        </div>

        <style>
            .custom-alert-box {
                transition: opacity 0.3s ease;
                opacity: 0;
            }

            .custom-alert-box.show {
                opacity: 1;
            }
        </style>


        <!-- CUSTOM ALERT BOX -->
        <script>
            function showAlertBox() {
                const alertBox = document.getElementById('customAlertBox');
                alertBox.style.display = 'flex';
                setTimeout(() => {
                    alertBox.classList.add('show');
                }, 10);
            }

            function closeAlertBox() {
                const alertBox = document.getElementById('customAlertBox');
                alertBox.classList.remove('show');
                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 300);
            }
        </script>


        <div class="flex flex-col items-center min-h-screen w-full sidebar-toggle3" :class="{ 'w-full': !cartOpen, 'w-9/12': cartOpen }">
            <?php
            // Assuming $products is an array of arrays where each inner array contains the product details including category
            $categories = array_unique(array_column($products, 'Category_ID')); // Extracting unique categories from products
            ?>
            <?php foreach ($categories as $category) : ?>
                <?php
                // Get the category name for the current category ID
                $categoryName = '';
                foreach ($products as $product) {
                    if ($product['Category_ID'] === $category) {
                        $categoryName = $product['Category_Name'];
                        break;
                    }
                }
                ?>
                <div class="category-container flex flex-col justify-start"> <!-- Add this line -->
                    <!-- Display category name -->
                    <div class="text-xl font-bold divide-y ml-3 mt-5 category-name"><?= $categoryName ?></div>
                    <!-- Horizontal line -->
                    <hr class="w-full border-gray-300 my-2 mb-8 category-line">

                    <div id="grid" class="mb-10" x-bind:class="cartOpen ? ' grid-cols-5 gap-4' : (!cartOpen && sidebarOpen) ? ' grid-cols-5 gap-4' : (!cartOpen && !sidebarOpen) ? ' grid-cols-6 gap-4' : ' grid-cols-6 gap-4'" style="display: grid;">
                        <?php foreach ($products as $product) : ?>
                            <?php if ($product['Category_ID'] === $category && $product['Availability'] === 'Available' && $product['Stocks'] !== null) : ?> <!-- Show products only for the current category, if they are available, and if the stocks are not null -->

                                <button id="product-item-button" type="button" class="product-item w-52 h-70 p-6 flex flex-col items-center justify-center border rounded-lg border-solid border-gray-300 shadow-lg focus:ring-4 active:scale-90 transform transition-transform ease-in-out" x-for="(item, index) in cart" :key="index" data-product='<?= json_encode($product) ?>' data-product-name='<?= json_encode($product['ProductName']) ?>' data-product-category='<?= json_encode($product['Category_Name']) ?>' @click="
                                    if (<?= $product['Stocks'] ?> > 0) { 
                                        addToCart({ id: <?= $product['ProductID'] ?>, name: '<?= $product['ProductName'] ?>', price: <?= $product['Price'] ?>, stocks: <?= $product['Stocks'] ?>, priceWithTax: <?= $product['Price'] ?> * (1 + <?= $product['TaxRate'] ?>), TaxRate: <?= $product['TaxRate'] ?>, ProductWeight: '<?= $product['ProductWeight'] ?>', deliveryRequired: '<?= $product['DeliveryRequired'] ?>' , supplierPrice: '<?= $product['Supplier_Price'] ?>', image: '<?= $product['ProductImage'] ?>' }); cartOpen = true; 

                                    } else { 
                                        showAlertBox(); 
                                    }">

                                    <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4 flex items-center justify-center">
                                        <img src="../<?= $product['ProductImage'] ?>" alt="Your Image" class="object-contain">
                                    </div>

                                    <!-- Horizontal line -->
                                    <hr class="w-full border-gray-300 my-2">
                                    <div class="font-bold text-lg text-gray-700 text-center" x-data="{ productName: '<?= $product['ProductName'] ?>' }" :style="productName.length > 20 ? 'font-size: 0.90rem;' : 'font-size: 1rem;'">
                                        <span x-text="productName"></span>
                                    </div>
                                    <div class="font-normal text-sm text-gray-500"><?= $product['Category_Name'] ?></div>
                                    <?php
                                    // Compute the price with tax
                                    $price_with_tax = $product['Price'] * (1 + $product['TaxRate']);
                                    ?>
                                    <div class="mt-6 text-lg font-semibold text-gray-700">&#8369;<?= number_format($price_with_tax, 2) ?></div>
                                    <div class="text-gray-500 text-sm">Stocks: <?= $product['Stocks'] ?> <?= $product['UnitOfMeasurement'] ?></div>
                                </button>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                console.log('Input event triggered');

                var searchValue = this.value.toLowerCase();
                var containers = document.querySelectorAll('.category-container');

                containers.forEach(function(container) {
                    var categoryName = container.querySelector('.category-name').textContent.toLowerCase();
                    var items = container.querySelectorAll('#product-item-button');

                    var isCategoryMatch = categoryName.includes(searchValue);
                    var isItemMatch = Array.from(items).some(function(item) {
                        var productName = item.getAttribute('data-product-name').toLowerCase();
                        var productCategory = item.getAttribute('data-product-category').toLowerCase();
                        return productName.includes(searchValue) || productCategory.includes(searchValue);
                    });

                    if (isCategoryMatch || isItemMatch) {
                        container.style.display = '';
                        items.forEach(function(item) {
                            var productName = item.getAttribute('data-product-name').toLowerCase();
                            var productCategory = item.getAttribute('data-product-category').toLowerCase();
                            item.style.display = (productName.includes(searchValue) || productCategory.includes(searchValue)) ? '' : 'none';
                            item.style.border = '3px solid #21532c';
                            item.style.transition = 'border 0.1s ease-in-out'; // Add transition property

                            setTimeout(function() {
                                item.style.border = '1px solid #d2d5db';
                                item.style.transition = 'border 0.1s ease-in-out'; // Add transition property
                            }, 2000);
                        });

                    } else {
                        container.style.display = 'none';
                    }

                    if (searchValue === '') {
                        container.style.display = '';
                        items.forEach(function(item) {
                            item.style.display = '';
                            item.style.border = '1px solid #d2d5db';
                        });
                    }

                });
            });
        </script>
    </main>
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>

    <script>
        // Listen for Alpine.js initialization event
        document.addEventListener('alpine:init', () => {
            // Define Alpine.js data
            Alpine.data('main', () => ({
                // Initial state variables
                sidebarOpen: true,
                cartOpen: false,
                isFullScreen: false,

                // Initialize function: loads cart items from localStorage when the page loads
                init() {
                    // Retrieve cart items from localStorage
                    let savedCart = localStorage.getItem('cart');
                    if (savedCart) {
                        this.cart = JSON.parse(savedCart);
                    }
                    // Update the cart quantity display when the page loads
                    updateCartQuantity();
                },

                // Cart data array
                cart: [],

                // Function to add a product to the cart
                addToCart(product) {
                    let item = this.cart.find(i => i.id === product.id);
                    if (item) {
                        // If item already exists in the cart
                        if (item.quantity + 1 > product.stocks) {
                            showAlertBox(); // Show alert if quantity exceeds available stocks
                        } else {
                            item.quantity++; // Increment item quantity
                            // Show success message using SweetAlert
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
                        }
                    } else {
                        // If item doesn't exist in the cart
                        if (product.stocks < 1) {
                            showAlertBox(); // Show alert if product is out of stock
                        } else {
                            // Add product to the cart with quantity 1
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



</body>

</html>