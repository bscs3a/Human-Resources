<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    
</head>

<body>

<?php include "components/sidebar.php" ?>
    
    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

    <?php include "components/header.php" ?>

    <!-- Start: Edit content -->
    <div class="flex flex-row flex-wrap justify-start m-3">

        <div class="flex-1 p-4 mt-5 w-96 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <img id="image-preview" src="" alt="Image Preview" style="display: none;">
            <input type="file" accept="image/*" id="photo-upload" onchange="previewImage(event)">
        </div>

        <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                 var output = document.getElementById('image-preview');
                 output.src = reader.result;
                 output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>

        <div class="flex-1 p-4 w-96">
            <div class="mb-6 ml-3">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Display Name</label>
                <input type="text" id="large-input" class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-6 ml-3">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Product Details</label>
                <input type="text" id="large-input" class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-6 ml-3">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Product Price</label>
                <input type="text" id="large-input" class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
    </div>
    <!-- End: Edit content -->

    <!-- Start: Brand Variations -->
    <div class="text-2xl font-semibold px-6 pt-3 pb-3 ml-3 mt-5">
        <h1>Available Brand Variations</h1>
    </div>

    <div class="flex flex-row flex-wrap justify-evenly">
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 1</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 2</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 3</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 4</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 5</div>
        <div class="flex-1 w-64 py-3 mb-6 text-5xl text-primary"><i class="ri-add-circle-fill"></i></div>
    </div>
    <!-- End: Brand Variations -->

    <!-- Start: Buttons -->
    <div class="flex flex-row flex-wrap justify-between m-3">

        <div class="flex-1 p-4 mt-5 w-64 rounded-lg bg-white border border-gray-600 flex-col shadow-md">    
            <h1 class= "text-black font-bold mt-2 mb-4">Stocks</h1>

            <div class="flex items-center m-3"> 
                <div class="flex flex-col justify-between flex-grow">
                    <p class="text-5xl font-semibold text-center mb-4">100</p>
                </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
                 <button route='/inv/product_order' class="items-end rounded-lg w-full py-2 bg-primary text-black border">
                     <span class="font-bold">Order</span></button>
            </div>

        </div>

    </div>

    <div class="flex place-content-end mr-3">  
            <div class="flex justify-end px-4 mt-0">
                <div class="flex place-content-end mt-10 mr-2">
                    <button route='/inv/inv/main' class="items-end rounded-lg w-24 px-2 py-1 border border-black bg-yellow text-black duration-300">
                    Cancel </button>
                </div>
            </div>
            <div class="flex place-content-end mt-10">
                <button  class="items-end rounded-lg w-24 px-2 py-1 border border-black bg-white text-black duration-300">
                Save </button>
            </div>
    </div>
    
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>
</body>
</html>



