<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Add Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <?php
    require_once __DIR__ . "/../functions/db.php";
    $stmt = $conn->query("SELECT * FROM inventory ORDER BY date_added DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->query("SELECT Category_name FROM categories");
    $categories = $stmt->fetchAll();
    ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>


        <h2 class="m-5 text-4xl font-bold">Add Products</h2>
        <div class="p-6">
            <!-- Start: Add Products -->

            <form action="/inv/add-prod" method="POST" enctype="multipart/form-data">
                <div class="ml-3 mt-6">
                    <label for="product" class="w-20 text-right mx-4">Select Product:</label>
                    <select id="product" name="product" class="border p-1">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM products");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $product) {
                            echo "<option value='" . $product['ProductName'] . "' 
              data-stock-id='" . $product['ProductID'] . "' 
              data-category='" . $product['Category'] . "' 
              data-price='" . $product['Price'] . "'>" . $product['ProductName'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="flex items-center space-x-2">
                        <label for="stock_id" class="w-20 text-right mx-4">Stock ID(SKU):</label>
                        <input type="text" id="stock_id" name="stock_id" class="border p-1" readonly>
                    </div>

                    <div class="flex items-center space-x-2">
                        <label for="category" class="w-20 text-right mx-4">Category:</label>
                        <input type="text" id="category" name="category" class="border p-1" readonly>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="price" class="w-20 text-right mx-4">Price:</label>
                        <input type="text" id="price" name="price" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="quantity" class="w-20 text-right mx-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="status" class="w-20 text-right mx-4">Product Status:</label>
                        <input type="text" id="status" name="status" class="border p-1" readonly>
                    </div>
                </div>
                <div class="flex justify-between">
            <input type="hidden" id="date_added" name="date_added">
            <input type="submit"
                class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900 hover:bg-violet-900">
                <button type="button" route='/inv/inventoryProducts'
    class="mt-4 items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
    Back
</button>
        </div>
    </form>
</div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Stock
                        ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Image
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Price
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Quantity</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Product Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['stock_id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['image']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['product']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['category']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['price']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['quantity']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            document.getElementById('quantity').addEventListener('input', function (e) {
                var quantity = e.target.value;
                var statusField = document.getElementById('status');

                if (quantity == 0) {
                    statusField.value = 'No Stock';
                } else if (quantity < 499 && quantity > 1) {
                    statusField.value = 'Understock';
                } else if (quantity >= 500 && quantity <= 999) {
                    statusField.value = 'On Stock';

                } else if (quantity >= 1000) {
                    statusField.value = 'Overstock';
                }
            });
            document.getElementById('product').addEventListener('change', function () {
                var selectedOption = this.options[this.selectedIndex];
                document.getElementById('stock_id').value = selectedOption.getAttribute('data-stock-id');
                document.getElementById('category').value = selectedOption.getAttribute('data-category');
                document.getElementById('price').value = selectedOption.getAttribute('data-price');
            });
        </script>
    </main>
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>
</body>

</html>