<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

</head>

<body>
    <?php include __DIR__ . '/../functions/prod_edit.php'; ?>
    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!-- Start: Edit content -->
        <div class="flex flex-row flex-wrap justify-center mx-24 mt-8">

            <div class="flex-1 p-4 mt-5 max-w-sm rounded-lg bg-transparent border border-gray-600 flex-col shadow-md">
                <?php if (empty($product['image'])): ?>
                    <img src="../public/inventory/views/assets/default.png" class="mr-4">
                <?php else: ?>
                    <img src="<?php echo '/' . $product['image']; ?>" alt="Image" class="mr-4">
                <?php endif; ?>
            </div>

            <div class="flex-1 p-4 w-full max-w-5xl">

                <div class="flex items-start">
                    <!-- ID div -->
                    <div class="mb-6 ml-3 w-1/4 flex-shrink-0">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" disabled>
                        <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                            ID</label>
                        <input type="text" id="product" name="product" value="<?php echo $product['id']; ?>" disabled
                            class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Product Name div -->
                    <div class="mb-6 ml-3 flex-1">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" disabled>
                        <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                            Name</label>
                        <input type="text" id="product" name="product" value="<?php echo $product['product']; ?>"
                            disabled
                            class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mb-6 ml-3">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Category</label>
                    <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>"
                        disabled
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6 ml-3">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                        Price</label>
                    <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" disabled
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
        <!-- End: Edit content -->


        <!-- Start: Details -->
        <div class="flex flex-row justify-between mx-24 mt-5 relative">

            <div class="flex-1 p-4 mx-5 mt-5 mb-5 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
                <h1 class="text-black text-2xl font-bold ml-2 mt-2">Details</h1>

                <div class="flex justify-between mx-36 my-3 text-xl">
                    <div>
                        <p>Stocks</p>
                    </div>

                    <div class="flex justify-evenly">
                        <div class="px-2">
                            <p class="font-bold">
                                <?php
                                echo $product['quantity']; ?>
                            </p>
                        </div>

                    </div>
                </div>

                <hr class="h-px my-4 bg-gray-200 border-0 mx-24">

                <div class="flex justify-between mx-36 my-5 text-xl">
                    <div>
                        <p>Availability</p>
                    </div>
                    <div>
                        <p class="font-bold">
                            <?php
                            if ($product['quantity'] == 0) {
                                echo "<span style='color:red'>Out of Stock</span>";
                            } elseif ($product['quantity'] <= 500) {
                                echo "<span style='color:yellow'>Understock</span>";
                            } elseif ($product['quantity'] >= 501 && $product['quantity'] <= 999) {
                                echo "<span style='color:green'>Stable Stock</span>";
                            } else {
                                echo "<span style='color:#ff9933'>Overstock</span>";
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <hr class="h-px my-6 bg-gray-200 border-0 mx-24">

                <?php
                $stmt = $conn->prepare("SELECT Description FROM products WHERE ProductID = :ProductID");
                $stmt->execute(['ProductID' => $product['id']]);
                $productDescription = $stmt->fetch();
                ?>

                <div class="flex flex-col mx-36 my-5 text-xl">
                    <div class="mb-8">
                        <p>Description</p>
                    </div>
                    <div class="font-bold">
                        <p>
                            <?php echo $productDescription['Description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mb-4 mx-4">
            <div class="">
                <button route='/inv/inventoryProducts' ;
                    class="rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                    Back
                </button>
            </div>
        </div>


        <script src=" ./../src/form.js"></script>
        <script src="./../src/route.js"></script>

</body>

</html>