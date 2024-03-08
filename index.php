<?php
// database conncetion
require_once './src/dbconn.php';

// router
require_once './router.php';

// Group #1
require_once './public/admin/routes.php';

// Group #2
require_once './public/humanResources/routes.php';

// Group #3
require_once './public/sales/routes.php';

// Group #4
require_once './public/inventory/routes.php';

// Group #5
require_once './public/finance/routes.php';

// Group #6
require_once './public/delivery/routes.php';

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./src/tailwind.css" rel="stylesheet">

</head>

<body class="bg-slate-400">

    <div class="flex flex-col items-center justify-center h-screen">
        <br>
        <div class="flex flex-wrap -mx-2">
            <div class="w-1/2 px-2">
                <p>Group1</p>
                <button onclick="location.href='/Master/adm/login'"
                    class="px-6 py-3 mb-2 text-white bg-sidebar rounded hover:bg-blue-700">Admin Page</button><br>
                <p>Group3</p>
                <button onclick="location.href='/Master/sls/Dashboard'"
                    class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700">Sales Page</button><br>
                <p>Group5</p>
                <button onclick="location.href='/Master/fin/dashboard'"
                    class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700">Finance Page</button><br>
            </div>
            <div class="w-1/2 px-2">
                <p>Group2</p>
                <button onclick="location.href='/Master/hr/dashboard'"
                    class="px-6 py-3 mb-2 text-white bg-sidebar rounded hover:bg-blue-700 whitespace-nowrap">Human Resources Page</button><br>
                <p>Group4</p>
                <button onclick="location.href='/Master/inv/main'"
                    class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700 whitespace-nowrap">Inventory & Product Order Page</button><br>
                <p>Group6</p>
                <button onclick="location.href='/Master/dlv/details'"
                    class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700">Delivery Page</button><br>
            </div>
            
        </div>

        

    </div>

</body>

</html>