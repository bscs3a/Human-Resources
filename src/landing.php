<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./src/tailwind.css" rel="stylesheet">

    <?php
        $_SESSION['just_logged_in'] = true;
    ?>

</head>

<body class="bg-slate-400">

    <div class="flex flex-col items-center justify-center h-screen">
        <br>
        <div class="flex flex-wrap -mx-2">
            <div class="w-1/2 px-2">
                <p>Group1</p>
                <button route='/po/dashboard' class="px-6 py-3 mb-2 text-white bg-sidebar rounded hover:bg-blue-700">ProductOrder</button><br>
                <p>Group3</p>
                <script>
                    var basePath = window.location.pathname.split('/').slice(0, -1).join('/');
                </script>
                <button route='/sls/Dashboard' class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700">Sales Page</button><br>
                <p>Group5</p>
                <button route='/fin/dashboard' class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700">Finance Page</button><br>
            </div>
            <div class="w-1/2 px-2">
                <p>Group2</p>
                <button route='/hr/dashboard' class="px-6 py-3 mb-2 text-white bg-sidebar rounded hover:bg-blue-700 whitespace-nowrap">Human
                    Resources Page</button><br>
                <p>Group4</p>
                <button route='/inv/main' class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700 whitespace-nowrap">Inventory
                    & Product Order Page</button><br>
                <p>Group6</p>
                <button route='/dlv/dashboard'
                    class="px-6 py-3 mb-2 text-white  bg-sidebar rounded hover:bg-blue-700">Delivery Page</button><br>
            </div>
        </div>
    </div>
    <script src="./src/route.js"></script>
</body>

</html>