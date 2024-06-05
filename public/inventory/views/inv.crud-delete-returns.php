<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Delete Product Returns</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>
        <?php
        require_once __DIR__ . "/../functions/db.php";
        $stmt = $conn->query("SELECT * FROM returnproducts ORDER BY ReturnDate DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2 class="m-5 text-4xl font-bold">Delete Product Returns</h2>
        <div class="p-6">
            <!-- Start: Delete Product Returns -->
            <div class="ml-3 mt-6">
                <form action="/inv/delete-returns" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <label for="id" class="w-20 text-center mx-4">ID:</label>
                        <input type="text" id="ReturnID" name="ReturnID" class="border p-1">
                    </div>
            </div>
            <div class="flex justify-between mt-2 m-3">
                <input type="hidden" id="date_added" name="date_added">
                <input type="submit"
                    class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900 hover:bg-violet-900">
                </form>
                <button route='/inv/returns'
                    class="mt-4 items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                    Back
                </button>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Return ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reason</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Return Date
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($rows as $row):
                        $stmt = $conn->prepare("SELECT ProductName FROM products WHERE ProductID = :ProductID");
                        $stmt->execute(['ProductID' => $row['ProductID']]);
                        $product = $stmt->fetch(); ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['ReturnID']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $product['ProductName']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['Quantity']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['Reason']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['ProductStatus']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['ReturnDate']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>
</body>

</html>