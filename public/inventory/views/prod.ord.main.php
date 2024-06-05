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


    <!--Start: Product Main-->

    <!--Start: Stats-->
    <div class="text-2xl font-semibold px-6 py-5">
        <h1>Stats</h1>
    </div>

    <div class="flex flex-row flex-wrap justify-evenly m-2 ">
        
        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Running Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
            <p class="text-2xl text-center mb-4">+ 10% more than average</p>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Delayed Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
            <p class="text-2xl text-center mb-4">+ 10% more than average</p>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Repeated Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
            <p class="text-2xl text-center mb-4">10% less than average</p>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Cancelled Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <p class="text-2xl text-center mb-4"></p>
              </div>
        </div>
        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
        <h1 class="font-bold text-4xl text-black mt-2 mb-4 text-center">Order Summary</h1>
        <div class="flex items-center m-3"> 
        <div class="flex flex-col justify-between flex-grow">
            <p class="text-4xl text-center mb-4">....</p>
        </div>
    </div>
    </div>
    </div>
    <!--End: Stats-->

    <!--Start: Product-->
    <div class="flex justify-between items-center mt-4">
    <div class="text-2xl font-semibold px-6 pt-3 pb-3">
        <h1>Recent Orders</h1>
    </div>
    <div class="relative">
        <input type="text" id="simple-search" class="py-2 px-4 text-md text-black border border-black rounded-lg w-80" placeholder="Search by ID...">
    </div>
</div>
    <!--End: Product-->

    <!--Start: Table-->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-black">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 border border-black">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Order ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Date and Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Buyer
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td>
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td>   
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td> 
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td>    
            </tr>
    </table>
    </div>
    <!--End: Table-->
    <div class="flex justify-end px-6 mt-0">
    <div class="flex place-content-end mt-10 mr-2">
        <button onclick="history.back()" class="items-end rounded-lg w- px-2 py-1 border border-black bg-yellow text-black duration-300">
        Back </button>
    </div>
    <div class="flex place-content-end mt-10">
        <button onclick="location.href='/Master/inv/product_shop'" class="items-end rounded-lg w- px-2 py-1 border border-black bg-white text-black duration-300">
        Shop </button>
    </div>
</div>
    </div>
    <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
    </body>
</html>


