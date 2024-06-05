<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    

</head>

<body>

<?php include "components/sidebar.php" ?>
    
    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

    <?php include "components/header.php" ?>


    <!--Start: Product Order Payment Acceptance/Cancellation-->

    <!--Start: Table-->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-black">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 border border-black">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Product ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Each
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg:white border-b border-black">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="sample-images/example.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <table class="w-full text-xs">
            <table class="w-full text-xs flex flex-col">
        <div class="sticky top-0 bg-gray-200">
            <div class="px-2 py-2">
                Order Subtotal:
            </div>
            <div class="px-2 py-2">
                Shipping:
            </div>
            <div class="px-2 py-2">
                Tax:
            </div>
            <div class="px-2 py-2">
                Order Total:
            </div>
        </div>
    </table>
    </table>
</div>
    <!--End: Table-->
    <div class="flex justify-end px-6 mt-0">
    <div class="flex place-content-end mt-10 mr-2">
        <button onclick="history.back()" class="items-end rounded-lg w- px-2 py-1 border border-black bg-yellow text-black duration-300">
        Back </button>
    </div>
    <div class="flex place-content-end mt-10">
        <button class="items-end rounded-lg w- px-2 py-1 border border-black bg-white text-black duration-300">
        Save </button>
    </div>
</div>
<script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
</body>
</html>


