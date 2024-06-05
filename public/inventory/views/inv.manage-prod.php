<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Manage Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>


        <h2 class="m-5 text-4xl font-bold">Manage Products</h2>
        <div class="p-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Tabs -->
                    <a href="#" class="tab whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="1">
                        Add
                    </a>
                    <a href="#" class="tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="2">
                        Update
                    </a>
                    <a href="#" class="tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="3">
                        Delete
                    </a>
                </nav>
            </div>
            <!-- Tab Contents -->
            <!-- Start: Add -->
            <div class="tab-content ml-3 mt-6" data-tab="1">
                <h1 class="text-lg font-medium text-gray-900">
                    Add Product
                </h1>
                <form action="/inv/Add" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <label for="stock_id" class="w-20 text-right mx-4">Stock ID:</label>
                        <input type="text" id="stock_id" name="stock_id" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="image" class="w-20 text-right mx-4">Image:</label>
                        <input type="file" id="image" name="image" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="product" class="w-20 text-right mx-4">Product:</label>
                        <input type="text" id="product" name="product" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="category" class="w-20 text-right mx-4">Category:</label>
                        <input type="text" id="category" name="category" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="price" class="w-20 text-right mx-4">Price:</label>
                        <input type="text" id="price" name="price" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="quantity" class="w-20 text-right mx-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="border p-1" onkeydown="return event.key !== 'e' && event.key !== 'E'">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="prod_stat" class="w-20 text-right mx-4">Product Status:</label>
                        <input type="text" id="prod_stat" name="prod_stat" class="border p-1">
                    </div>
                    <input type="hidden" id="date_added" name="date_added">
                    <input type="submit" class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900">
                </form>
            </div>
            <!-- End: Add -->

            <div class="tab-content ml-3 mt-6 hidden" data-tab="2">
                <h1 class="text-lg font-medium text-gray-900">Update Product</h1>
                <form action="/inv/Update" method="POST">
                    <div class="flex items-center space-x-2">
                        <label for="product" class="w-20 text-right mx-4">Select Product:</label>
                        <select id="product" name="product" class="border p-1 w-40">
                            <option value="">Select a product</option>
                            <option value="product1">Pliers x300</option>
                            <option value="product2">Hammer T2000</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="quantity" class="w-20 text-right mx-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="border p-1" onkeydown="return event.key !== 'e' && event.key !== 'E'">
                    </div>
                    <input type="submit" class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900">
            </div>
            </form>

            <div class="tab-content ml-3 mt-6 hidden" data-tab="3">
                <h1 class="text-lg font-medium text-gray-900">Delete Product</h1>
                <form action="/inv/delete" method="POST">
                    <div class="flex items-center space-x-2">
                        <label for="id" class="w-20 text-center mx-4">ID:</label>
                        <input type="text" id="id" name="id" class="border p-1">
                    </div>
                    <input type="submit" value="Delete" class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900">
                </form>
            </div>

            <script>
                document.querySelectorAll('.tab').forEach((tab) => {
                    tab.addEventListener('click', (e) => {
                        e.preventDefault();

                        // Remove active state from all tabs
                        document.querySelectorAll('.tab').forEach((tab) => {
                            tab.classList.remove('border-indigo-500', 'text-indigo-600');
                            tab.classList.add('border-transparent', 'text-gray-500');
                        });

                        // Add active state to clicked tab
                        tab.classList.add('border-indigo-500', 'text-indigo-600');
                        tab.classList.remove('border-transparent', 'text-gray-500');

                        // Hide all tab contents
                        document.querySelectorAll('.tab-content').forEach((content) => {
                            content.classList.add('hidden');
                        });

                        // Show clicked tab's content
                        document.querySelector(`.tab-content[data-tab="${tab.dataset.tab}"]`).classList.remove('hidden');
                    });
                });
            </script>
            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>
</body>

</html>