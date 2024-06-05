<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Returns</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <?php include "components/sidebar.php" ?>
    <?php require_once __DIR__ . '/../functions/inc_stock.php'; ?>

    <!-- Start: Returns-->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Returns-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Returns</h1>
        </div>

        <!--Start: Table-->
        <div class="inline-flex rounded-md shadow-sm mx-5" role="group">
            <button type="button" onclick="printTable()"
                class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Print for product retrieval</span>
            </button>
        </div>
        <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Return ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Reason
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Return Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($returns as $row):
                        $stmt = $conn->prepare("SELECT * FROM products WHERE ProductID = :ProductID");
                        $stmt->execute(['ProductID' => $row['ProductID']]);
                        $productrow = $stmt->fetch(); ?>
                        <tr class="bg-white">
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap"><?= $row['ProductID'] ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <?php if (empty($row['image'])): ?>
                                    <img src="../public/inventory/views/assets/default.png" class="mr-4"
                                        style="width: 4em; height: 4em;">
                                <?php else: ?>
                                    <img src="<?php echo '/' . $row['image']; ?>" alt="Image" class="mr-4"
                                        style="width: 4em; height: 4em;">
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $productrow['ProductName'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $productrow['Category'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['Quantity'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $row['Reason']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['ReturnDate'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <button
                                    class="items-end rounded-full w-34 py-2 px-4 bg-violet-950 text-white shadow-md hover:bg-slate-600 active:bg-slate-700 duration-75"
                                    onclick="printTable()">
                                    Retrieve Product </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--End: Table-->
        <div class="flex justify-center mt-2 m-3 space-x-8">
            <button route='/inv/delete-returns'
                class="font-bold rounded-full w-48 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                Delete Returns
            </button>
        </div>
        <script>
            function printTable() {
                // Create a new window or tab
                var printWindow = window.open('', '_blank');

                // Write the HTML content of the table to the new window or tab
                printWindow.document.write('<html><head><title>Product Retrieval</title></head><body>');
                printWindow.document.write('<table border="1">' + document.getElementsByTagName("table")[0].innerHTML + '</table>');
                printWindow.document.write('</body></html>');

                // Trigger the print dialog for the new window or tab
                printWindow.document.close(); // Close the document for writing
                printWindow.print(); // Trigger the print dialog
            }
        </script>
        <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
</body>

</html>