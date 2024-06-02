<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>

</head>

<body>
    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Point Of Sale(POS) / Checkout</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->
        <div class="flex flex-col items-center min-h-screen">
            <div class="w-full max-w-6xl">
                <!-- <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Checkout</h1>
                </div> -->
                <!-- Checkout form -->

                <div class="flex flex-row gap-6 mt-10 w">
                    <div class="bg-white rounded-lg p-6 w-1/2">
                        <!-- Order summary -->
                        <div class="mb-4">
                            <ul id="order-summary" x-data="cartData()" class="text-gray-700">
                                <h2 class="text-xl font-medium mb-6 text-gray-500">Order Summary</h2>
                                <!-- <div class="text-6xl font-medium mb-10" x-text="'₱' + total.toFixed(2)"></div> -->

                                <!-- Cart item rows -->
                                <template x-for="(item, index) in cart" :key="index">
                                    <li class="py-4 flex justify-between">
                                        <div class="flex items-center justify-between w-full">
                                            <div class=" flex items-center">
                                                <img class="object-contain size-12 rounded-full shadow-lg bg-yellow-200" :src="'../../' + item.image" :alt="item.name">
                                                <span class="ml-2" x-text="item.quantity + ' x ' + item.name"></span>
                                            </div>
                                            <div class="">
                                            <span x-text="'₱' + ((item.quantity >= 50 ? item.priceWithTax * 0.9 : item.priceWithTax) * item.quantity).toFixed(2)"></span>
                                            </div>
                                        </div>
                                    </li>
                                </template>

                                <!-- Cart item Total -->
                                <div class="ml-16">
                                    <li class="mt-4 pb-4 pt-6 font-semibold border-t border-b mb-4 flex justify-between">
                                        <span x-text="'Subtotal:'"></span>
                                        <span x-text="'₱' + (cart.reduce((total, item) => total + item.price * item.quantity, 0)).toFixed(2)"></span>
                                    </li>
                                    <li class="py-2 pb-4 text-gray-500 font-medium border-b mb-4 flex justify-between">
                                        <span x-text="'Tax:'"></span>
                                        <span x-text="'₱' + (cart.reduce((total, item) => total + (item.quantity >= 50 ? item.price * 0.9 : item.price) * item.quantity * item.TaxRate, 0)).toFixed(2)"></span>
                                    </li>
                                    <li id="shipping-fee-toggle" class="py-2 pb-4 text-gray-500 font-medium border-b mb-4 flex justify-between" x-show="salePreference === 'delivery'">
                                        <span x-text="'Shipping Fee:'"></span>
                                        <span x-text="'₱' + (salePreference.value === 'delivery' ? parseFloat(localStorage.getItem('shippingFee') || '0') : 0).toFixed(2)"></span>
                                    </li>
                                    <li class="py-2 pb-4 text-gray-500 font-medium border-b mb-4 flex justify-between">
                                        <span x-text="'Discount:'"></span>
                                        <span x-text="'₱' + (cart.reduce((total, item) => total + (item.quantity >= 50 ? item.price * 0.1 * item.quantity : 0), 0)).toFixed(2)"></span>
                                    </li>
                                    <li class="py-4 font-semibold text-green-800 flex justify-between">
                                        <span x-text="'Total:'"></span>
                                        <span x-text="'₱' + ((function() {
                                                        const subtotal = cart.reduce((total, item) => total + item.price * item.quantity, 0);
                                                        console.log('Subtotal:', subtotal);
                                                        const discount = cart.reduce((total, item) => total + (item.quantity >= 50 ? item.price * 0.1 * item.quantity : 0), 0);
                                                        console.log('Discount:', discount);
                                                        const tax = cart.reduce((total, item) => total + (item.quantity >= 50 ? item.price * 0.9 : item.price) * item.quantity * item.TaxRate, 0);
                                                        console.log('Tax:', tax);
                                                        const shippingFee = salePreference.value === 'delivery' ? parseFloat(localStorage.getItem('shippingFee') || '0') : 0;
                                                        console.log('Shipping Fee:', shippingFee);
                                                        const total = subtotal + tax - discount + shippingFee;
                                                        console.log('Total:', total);
                                                        return total;
                                                    })()).toFixed(2)"></span>
                                    </li>
                                </div>

                        </div>
                    </div>


                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 w-1/2 h-full mb-10">
                        <form action="/addSales" method="POST" onsubmit="clearCart()">
                            <div class="font-medium text-xl mb-4 text-gray-500 border-b pb-2">Shipping Information</div>
                            <div>
                                <label for="customerName" class="block mb-2">Customer Name:</label>
                                <input type="text" id="customerName" name="customerName" class="w-full p-2 border border-gray-300 rounded mb-4" required>
                            </div>
                            <div>
                                <label for="customerEmail" class="block mb-2">Customer Email:</label>
                                <input type="email" id="customerEmail" name="customerEmail" class="w-full p-2 border border-gray-300 rounded mb-4" required>
                            </div>
                            <div>
                                <label for="customerPhone" class="block mb-2">Customer Phone:</label>
                                <input type="tel" id="customerPhone" name="customerPhone" class="w-full p-2 border border-gray-300 rounded mb-4" required>
                            </div>

                            <!-- Option for delivery or pick-up -->
                            <div class="mb-4">
                                <label class="block mb-2 font-semibold">Delivery or Pick-up:</label>
                                <select name="SalePreference" id="SalePreference" class="cursor-pointer w-full p-2 border border-gray-300 rounded" onchange="toggleSaleDetails(this.value)">
                                    <option value="delivery">Delivery</option>
                                    <option value="pick-up" selected>Pick-up</option>
                                </select>
                            </div>

                            <div id="sale-details">
                                <label for="province" class="block mb-2">Province:</label>
                                <select id="province" name="province" class="w-full p-2 border border-gray-300 rounded mb-4" required>
                                    <!-- Replace with your actual data -->
                                    <option value="none">Select Province</option>
                                    <option value="Pampanga">Pampanga</option>
                                </select>

                                <label for="municipality" class="block mb-2">Municipality:</label>
                                <select id="municipality" name="municipality" class="w-full p-2 border border-gray-300 rounded mb-4" required>
                                    <option value="none">Select Municipality</option>
                                    <option value="Angeles">Angeles</option>
                                    <option value="San Fernando">San Fernando</option>
                                    <option value="Mabalacat">Mabalacat</option>
                                    <option value="Apalit">Apalit</option>
                                    <option value="Arayat">Arayat</option>
                                    <option value="Bacolor">Bacolor</option>
                                    <option value="Candaba">Candaba</option>
                                    <option value="Floridablanca">Floridablanca</option>
                                    <option value="Guagua">Guagua</option>
                                    <option value="Macabebe">Macabebe</option>
                                    <option value="Magalang">Magalang</option>
                                    <option value="Masantol">Masantol</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Minalin">Minalin</option>
                                    <option value="Porac">Porac</option>
                                    <option value="San Luis">San Luis</option>
                                    <option value="San Simon">San Simon</option>
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="Santa Rita">Santa Rita</option>
                                    <option value="Santo Tomas">Santo Tomas</option>
                                    <option value="Sasmuan">Sasmuan</option>
                                    <!-- Add more municipalities in Pampanga as needed -->
                                </select>


                                <label for="barangayStreet" class="block mb-2">Street and Barangay:</label>
                                <input type="text" id="barangayStreet" name="streetBarangayAddress" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter Barangay and Street">

                                <label for="deliveryDate" class="block mb-2">Delivery Date:</label>
                                <input type="date" id="deliveryDate" name="deliveryDate" class="w-full p-2 border border-gray-300 rounded mb-4" min="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <!-- Mode of payment -->
                            <div class="mb-4">
                                <label class="block mb-2 font-semibold">Mode of Payment:</label>
                                <select name="payment-mode" id="payment-mode" class="w-full p-2 border border-gray-300 rounded" onchange="togglePaymentDetails(this.value)">
                                    <option value="card">Card</option>
                                    <option value="cash" selected>Cash</option>
                                </select>
                            </div>

                            <div id="payment-details" class="grid grid-rows-2 p-4 rounded-md shadow-inner bg-gray-200">
                                <div class="w-full">
                                    <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number" class="w-full p-4 border border-gray-300 rounded">
                                </div>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <input type="text" id="expiryDate" name="expiryDate" placeholder="Expiry Date" class=" w-full p-4 border border-gray-300 rounded">
                                    </div>
                                    <div>
                                        <input type="number" id="cvv" name="cvv" placeholder="CVC" class="w-full p-4 border border-gray-300 rounded">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="totalAmount" name="totalAmount">
                            <input type="hidden" id="cartData" name="cartData">
                            <input type="hidden" id="subtotal" name="subtotal">
                            <input type="hidden" id="tax" name="tax">
                            <input type="hidden" id="shippingFee" name="shippingFee">
                            <input type="hidden" id="supplierPriceTotal" name="supplierPriceTotal">
                            <input type="hidden" id="discount" name="discount">

                            <button type="submit" value="Submit" class="bg-green-800 text-white rounded px-4 py-2 mt-4 w-full hover:bg-gray-200 hover:text-green-800 hover:font-bold transition-colors ease-in-out">Complete Sale</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- Option for delivery or pick-up -->
    <script>
        // Get cart from local storage
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        console.log('Cart:', cart);

        // Compute weight for each item in the cart
        cart.forEach(item => item.totalWeight = item.ProductWeight * item.quantity);

        // Compute total weight of all products in the cart
        const totalWeight = cart.reduce((total, item) => total + item.totalWeight, 0);

        // Compute price for each item in the cart
        cart.forEach(item => item.totalPrice = (item.priceWithTax * item.quantity));

        // Compute total price of all products in the cart
        const totalAmount = cart.reduce((total, item) => total + item.totalPrice, 0);

        // Log the total amount to the console
        console.log('Total Amount:', totalAmount);


        const salePreference = document.getElementById('SalePreference');
        if (totalWeight >= 300) { // Check if total weight is 300 or more
            salePreference.value = 'delivery';
            const pickupOption = salePreference.querySelector('option[value="pick-up"]');
            pickupOption.disabled = true;
        } else {
            salePreference.value = 'pick-up';
        }

        // Add shipping fee if customer chooses 'delivery' and total weight is less than 300
        salePreference.addEventListener('change', function() {
            const shippingFeeElement = document.getElementById('shippingFee');
            const shippingFeeInput = document.getElementById('shippingFee');

            if (this.value === 'delivery' && totalWeight < 300 ) {
                localStorage.setItem('shippingFee', '50');
                console.log('Shipping Fee:', localStorage.getItem('shippingFee')); // Log the shipping fee
            } else {
                localStorage.setItem('shippingFee', '0');
                console.log('Shipping Fee:', localStorage.getItem('shippingFee')); // Log the shipping fee
            }

            // Save form data to localStorage
            const formData = {
                customerName: document.getElementById('customerName').value,
                customerPhone: document.getElementById('customerPhone').value,
                customerEmail: document.getElementById('customerEmail').value,
                province: document.getElementById('province').value,
                municipality: document.getElementById('municipality').value,
                streetBarangayAddress: document.getElementById('barangayStreet').value,
                deliveryDate: document.getElementById('deliveryDate').value

            };
            localStorage.setItem('formData', JSON.stringify(formData));

            location.reload(); // Refresh the page
        });

        if (parseFloat(localStorage.getItem('shippingFee')) > 0) { // Check if shippingFee is greater than 0
            salePreference.value = 'delivery';
        }

        // Get the shippingFee from localStorage
        const shippingFee = localStorage.getItem('shippingFee') || '0';
        // Get the hidden input field
        const shippingFeeInput = document.getElementById('shippingFee');
        // Set the value of the hidden input field
        shippingFeeInput.value = shippingFee;

        toggleSaleDetails(salePreference.value);

        function toggleSaleDetails(salePreference) {
            const saleDetails = document.getElementById('sale-details');
            const shippingFee = document.getElementById('shipping-fee-toggle');
            const province = document.getElementById('province');
            const municipality = document.getElementById('municipality');
            const barangayStreet = document.getElementById('barangayStreet');
            const deliveryDate = document.getElementById('deliveryDate');

            if (salePreference == 'delivery') {
                saleDetails.style.display = 'block';
                shippingFee.style.display = 'flex';
                province.required = true;
                municipality.required = true;
                barangayStreet.required = true;
                deliveryDate.required = true;
            } else {
                saleDetails.style.display = 'none';
                shippingFee.style.display = 'none';
                province.required = false;
                municipality.required = false;
                barangayStreet.required = false;
                deliveryDate.required = false;
            }
        }

        // Call the function on page load to set the initial state
        document.addEventListener('DOMContentLoaded', () => {
            toggleSaleDetails(document.getElementById('SalePreference').value);
            togglePaymentDetails(document.getElementById('payment-mode').value);

            // Retrieve form data from localStorage
            const formData = JSON.parse(localStorage.getItem('formData')) || {};
            document.getElementById('customerName').value = formData.customerName || '';
            document.getElementById('customerPhone').value = formData.customerPhone || '';
            document.getElementById('customerEmail').value = formData.customerEmail || '';
            document.getElementById('province').value = formData.province || '';
            document.getElementById('municipality').value = formData.municipality || '';
            document.getElementById('barangayStreet').value = formData.streetBarangayAddress || '';
            document.getElementById('deliveryDate').value = formData.deliveryDate || '';

            // Remove the form data from localStorage
            localStorage.removeItem('formData');
        });
    </script>

    <!-- Mode of payment -->
    <script>
        function togglePaymentDetails(paymentMode) {
            const cardNumberInput = document.getElementById('cardNumber');
            const expiryDateInput = document.getElementById('expiryDate');
            const cvvInput = document.getElementById('cvv');
            const paymentDetailsDiv = document.getElementById('payment-details');

            if (paymentMode == 'card') {
                cardNumberInput.required = true;
                expiryDateInput.required = true;
                cvvInput.required = true;
                paymentDetailsDiv.style.display = 'block';
            } else {
                cardNumberInput.required = false;
                expiryDateInput.required = false;
                cvvInput.required = false;
                cardNumberInput.value = '';
                expiryDateInput.value = '';
                cvvInput.value = '';
                paymentDetailsDiv.style.display = 'none';
            }
        }

        // Call the function on page load to set the initial state
        document.addEventListener('DOMContentLoaded', () => {
            togglePaymentDetails(document.getElementById('payment-mode').value);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Get the cart from localStorage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Calculate the subtotal, tax, discount, and total amount
            const subtotal = cart.reduce((total, item) => total + item.price * item.quantity, 0);
            
            const discount = cart.reduce((total, item) => {
                if (item.quantity >= 100) {
                    return total + item.price * 0.2 * item.quantity; // 20% discount for quantity >= 100
                } else if (item.quantity >= 20) {
                    return total + item.price * 0.1 * item.quantity; // 10% discount for quantity >= 50
                } else {
                    return total;
                }
            }, 0);
            
            const tax = cart.reduce((total, item) => total + (item.quantity >= 50 ? item.price * 0.9 : item.price) * item.quantity * item.TaxRate, 0);

            const totalAmount = subtotal + tax - discount;
            let shippingFee = 0;

            // Compute the shipping fee
            if (salePreference.value === 'delivery' && totalAmount < 10000) {
                shippingFee = 50;
            }

            const finalTotal = totalAmount + shippingFee;
            const supplierPriceTotal = cart.reduce((total, item) => total + item.supplierPrice * item.quantity, 0);

            // Set the value of the hidden input fields
            document.getElementById('subtotal').value = subtotal.toFixed(2);
            document.getElementById('discount').value = discount.toFixed(2);
            document.getElementById('tax').value = tax.toFixed(2);
            document.getElementById('shippingFee').value = shippingFee.toFixed(2);
            document.getElementById('totalAmount').value = finalTotal.toFixed(2);
            document.getElementById('cartData').value = JSON.stringify(cart);
            document.getElementById('supplierPriceTotal').value = supplierPriceTotal.toFixed(2);

            console.log(document.getElementById('supplierPriceTotal').value);

            // Assign the cart to a global variable
            window.cart = cart;

            // Store the shipping fee and total amount in localStorage
            localStorage.setItem('shippingFee', shippingFee.toFixed(2));
            localStorage.setItem('totalAmount', finalTotal.toFixed(2));
        });
    </script>

    <script>
        // Add an event listener for the click event
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            // Toggle the hidden, transform, and -translate-x-full classes
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');

            // Toggle the md:w-full and md:ml-64 classes
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>

    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>
</body>

</html>