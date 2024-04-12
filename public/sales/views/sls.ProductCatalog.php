<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>

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


        .modalPop {
            animation: fadeInUp 0.3s ease-in-out;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            100% {
                opacity: 1;
                transform: translateY(0);
            }


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

        <div id="header" class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Sidebar toggle button -->
            <button type="button" class="text-lg sidebar-toggle" @click="cartOpen = false; sidebarOpen = true">
                <i class="ri-menu-line"></i>
            </button>

            <!-- Main title or heading -->
            <ul class="flex items-center text-md ml-4">
                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Product Catalog</p>
                </li>
            </ul>

            <!-- Start: Profile -->

            <ul class="ml-auto flex items-center">

                <div class="relative inline-block text-left">
                    <div>
                        <a class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-black bg-white rounded-md shadow-sm border-b-2 transition-all hover:bg-gray-200 focus:outline-none hover:cursor-pointer" id="options-menu" aria-haspopup="true" aria-expanded="true">
                            <div class="text-black font-medium mr-4 ">
                            <i class="ri-user-3-fill mx-1"></i> <?= $_SESSION['employee_name']; ?>
                            </div>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                    </div>

                    <div class="origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="py-1" role="none">
                            <a route="/sls/logout" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                <i class="ri-logout-box-line"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('options-menu').addEventListener('click', function() {
                        var dropdownMenu = document.getElementById('dropdown-menu');
                        if (dropdownMenu.classList.contains('hidden')) {
                            dropdownMenu.classList.remove('hidden');
                        } else {
                            dropdownMenu.classList.add('hidden');
                        }
                    });
                </script>
            </ul>

            <!-- End: Profile -->
        </div>


        <!-- Start: Full Screen Icon -->
        <div class="absolute top-0 right-0 hidden">
            <i id="fullscreenIcon" class="fas fa-expand" @click="isFullScreen = !isFullScreen; sidebarOpen = false; sidebarOpen = false;" :class="{ 'p-3 text-lg': isFullScreen, 'pt-14 pr-3 text-lg': !isFullScreen }"></i>
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

                // Use the taxRates in your Alpine.js code
                // ...
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
                        const checkoutRoute = '/master/sls/POS/Checkout'; // Define the route path here

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
                <div class="category-container"> <!-- Add this line -->
                    <!-- Display category name -->
                    <div class="text-xl font-bold divide-y ml-3 mt-5 category-name"><?= $categoryName ?></div>
                    <!-- Horizontal line -->
                    <hr class="w-full border-gray-300 my-2 mb-8 category-line">
                    <div id="grid" class="mb-10" x-bind:class="cartOpen ? ' grid-cols-5 gap-4' : (!cartOpen && sidebarOpen) ? ' grid-cols-5 gap-4' : (!cartOpen && !sidebarOpen) ? ' grid-cols-6 gap-4' : ' grid-cols-6 gap-4'" style="display: grid;">
                        <?php foreach ($products as $product) : ?>
                            <?php if ($product['Category_ID'] === $category) : ?> <!-- Show products only for the current category -->
                                <!-- Product Item Button -->
                                <button id="product-item-button" data-open-modal type="button" flareFire class="product-item w-52 h-70 p-6 flex flex-col items-center justify-center border rounded-lg border-solid border-gray-300 shadow-lg focus:ring-4 active:scale-90 transform transition-transform ease-in-out" data-product='<?= json_encode($product) ?>' data-product-name='<?= json_encode($product['ProductName']) ?>' data-product-category='<?= json_encode($product['Category_Name']) ?>' @click="
                                                            selectedProduct = { id: <?= $product['ProductID'] ?>, name: '<?= $product['ProductName'] ?>', price: <?= $product['Price'] ?>, stocks: <?= $product['Stocks'] ?>, priceWithTax: <?= $product['Price'] ?> * (1 + <?= $product['TaxRate'] ?>), TaxRate: <?= $product['TaxRate'] ?>, deliveryRequired: '<?= $product['DeliveryRequired'] ?>' , image: '<?= $product['ProductImage'] ?>'};
                                                        ">

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

        <!-- Modal Section -->
        <dialog data-modal class="modalPop rounded-lg shadow-xl max-h-full elementToFade">

            <!-- Modal Header -->
            <div class="w-full bg-green-800 h-10 flex flex-row-2 gap-60 text-center justify-end">
                <span class="text-white text-xl font-semibold p-2">Product Details</span>
                <button data-close-modal> <i class="ri-close-fill text-2xl font-bold text-white p-2"></i></button>
            </div>


            <!-- Modal Content -->
            <div class="relative">
                <div class=" bg-white flex-row flex gap-10 p-4 pt-6 pb-8">
                    <div class="">
                        <div class="size-64 rounded-full shadow-lg bg-yellow-200 flex items-center justify-center">
                            <img id="modal-product-image" src="" alt="Product Image" class="object-contain">
                        </div>
                    </div>

                    <div>
                        <div class="">
                            <div id="modal-product-category" class=" text-gray-400"></div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h3 id="modal-product-name" class="mb-5 text-2xl font-bold text-gray-800 dark:text-gray-800 pr-10"></h3>
                            <h3 id="modal-product-price" class="mb-5 text-2xl font-bold text-gray-800 dark:text-gray-800 bg-gray-200 rounded-lg p-1 px-10 shadow-md border border-gray-300"></h3>
                        </div>

                        <div class="divide-y">
                            <div class="text-gray-400 pb-2">Product Description</div>
                            <div id="modal-product-description" class="text-lg pt-2"></div>
                        </div>

                        <div class="flex justify-between pt-6 mt-8">
                            <h3 id="modal-product-stocks" class="pt-3 text-xl text-gray-400"></h3>
                            <button class="p-3 border w-44 border-green-900 bg-green-800 text-white rounded-lg font-medium hover:shadow-lg hover:bg-green-950 hover:font-bold transition-all" @click="
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
            </div>

        </dialog>


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
            const modalProductImage = document.getElementById('modal-product-image');

            openButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const product = JSON.parse(button.dataset.product);
                    selectedProduct = {
                        id: product.ProductID,
                        name: product.ProductName,
                        image: product.ProductImage,
                        price: Number(product.Price),
                        stocks: product.Stocks,
                        priceWithTax: Number(product.Price) * (1 + Number(product.TaxRate)),
                        TaxRate: Number(product.TaxRate),
                        deliveryRequired: product.DeliveryRequired
                    };
                    console.log('selectedProduct: ', selectedProduct);
                    modalProductName.textContent = product.ProductName;
                    modalProductImage.src = '../' + product.ProductImage; // Set the src attribute of the img tag to the ProductImage
                    modalProductPrice.textContent = '₱' + (Number(product.Price) * (1 + Number(product.TaxRate))).toFixed(2);
                    modalProductCategory.textContent = product.Category_Name;
                    modalProductDescription.textContent = product.Description;
                    modalProductStocks.textContent = 'Stocks: ' + product.Stocks + ' ' + product.UnitOfMeasurement;
                    modal.showModal();
                });
            });

            closeButtons.addEventListener('click', () => {
                modal.animate([{
                    opacity: 1
                }, {
                    opacity: 0
                }], 250).onfinish = () => {
                    modal.close();
                };
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