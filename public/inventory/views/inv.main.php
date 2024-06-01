<?php 
// session_destroy();
?>
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

    <!-- Start: Stats -->
    <div class="text-2xl font-semibold px-6 py-5">
        <h1>Stats</h1>
    </div>

    <div class="flex flex-row flex-wrap justify-evenly m-2">
        
        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Total Products</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl font-semibold text-center mb-4">1234</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button class="items-end rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  View </button>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Out of Stock</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl font-semibold text-center mb-4">5 item(s)</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button class="items-end rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  View </button>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Total Products</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl font-semibold text-center mb-4">1234</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button class="items-end rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  View </button>
              </div>
        </div>
    </div>
    <!--End: Stats-->

    <!--Start: Product-->
    <div class="text-2xl font-semibold px-6 pt-3 pb-3">
        <h1>Product</h1>
    </div>

    <div class="flex justify-between px-6 mt-1 mb-4">
        
        <div class="flex place-content-end mt-2 m-3">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-200 hover:bg-slate-400 font-medium 
            rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                <i class="ri-arrow-up-s-line mr-3"></i>
                <span class="ml-0.5">Categories</span>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Pliers</a>
                </li>
                <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Hammers</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Grippers</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Guns</a>
                </li>
                </ul>
            </div>
        </div>

        <div class="flex place-content-end mt-2 m-3">
            <button route='/inv/prod-edit' class="items-end rounded-full px-2 py-1 bg-violet-950 text-white">
            <i class="ri-add-circle-line"></i>
            <span>Add Product</span> 
            </button>
        </div>
      </div>
    <!--End: Product-->

    <!--Start: Table-->
    <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product 
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Availability
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white">
                <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Available
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    2999
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php 500
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    <a route='/inv/prod-edit' class="font-medium hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white">
                <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Available
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    2999
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php 500
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    <a route='/inv/prod-edit' class="font-medium hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    <!--End: Table-->
    <script  src="./../src/route.js"></script>
    
</body>
</html>



