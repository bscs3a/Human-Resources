<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<!--Start: Empty Returns-->

<body>

    <?php include "components/sidebar.php" ?>
    <!-- Start: Empty Returns-->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Finance Request-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Returns</h1>
        </div>


        <div class="flex justify-between items-center mt-2 px-2">
            <div class="px-4">
                <p class="">Today</p>
            </div>
        </div>

        <body>
            <div class="h-screen flex justify-center items-center">
                <img src="assets/empty.png" alt="">
                <p class="mb-5 text-center">No Returns for now.</p>
            </div>
        </body>

        <!--End: Table-->
        <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>

</body>
<!--END: Empty Returns-->

</html>