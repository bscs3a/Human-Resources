<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incoming Stocks</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>


    <?php include "components/sidebar.php" ?>
    <?php require_once __DIR__ . '/../functions/inc_stock.php'; ?>
    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Finance Request-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Incoming Stocks</h1>
        </div>

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Weight(kg)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delivery Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delivery Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($IncStock as $row):
                        $stmt = $conn->prepare("SELECT * FROM products WHERE ProductID = :ProductID");
                        $stmt->execute(['ProductID' => $row['ProductID']]);
                        $product = $stmt->fetch(); ?>
                        <tr class="bg-white">
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap"><?= $row['ProductID'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <?php if (empty($row['image'])): ?>
                                    <img src="../public/inventory/views/assets/default.png" class="mr-4"
                                        style="width: 4em; height: 4em;">
                                <?php else: ?>
                                    <img src="<?php echo '/' . $row['image']; ?>" alt="Image" class="mr-4"
                                        style="width: 4em; height: 4em;">
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $product['ProductName'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $product['Category'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['Quantity'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['ProductWeight'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php
                                echo $row['DeliveryStatus'];
                                ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['DeliveryDate'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--End: Table-->
        <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>

</body>

</html>