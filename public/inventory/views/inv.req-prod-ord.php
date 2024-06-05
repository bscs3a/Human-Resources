<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Request for Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <?php
    require_once __DIR__ . "/../functions/db.php";
    $stmt = $conn->query("SELECT * FROM inventoryorders ORDER BY date_ordered DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->query("SELECT Category_name FROM categories");
    $categories = $stmt->fetchAll();
    ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>


        <h2 class="m-5 text-4xl font-bold">Request for Products</h2>
        <div class="p-6">
            <!-- Start: Add Products -->
            <form action="/inv/request-prod-ord" method="POST" enctype="multipart/form-data">
                <div class="ml-3 mt-6">
                    <label for="product" class="w-20 text-right mx-4">Select Product:</label>
                    <select id="product" name="product" class="border p-1">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM products");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $product) {
                            echo "<option value='" . $product['ProductName'] . "' 
              data-product-id='" . $product['ProductID'] . "' 
              data-category='" . $product['Category'] . "' 
              data-price='" . $product['Price'] . "'>" . $product['ProductName'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" id="product_id" name="product_id">
                    <input type="hidden" id="product_name" name="product_name">
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
                        Order ID
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Product
                        ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Product Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Quantity</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date Ordered</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['order_id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['product_id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['product_name']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['quantity']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['date_ordered']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
        <script>
            document.getElementById('product').addEventListener('change', function () {
                var selectedOption = this.options[this.selectedIndex];
                document.getElementById('product_id').value = selectedOption.getAttribute('data-product-id');
                document.getElementById('product_name').value = selectedOption.value;
                document.getElementById('category').value = selectedOption.getAttribute('data-category');
                document.getElementById('price').value = selectedOption.getAttribute('data-price');
            });
        </script>
                <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
    </main>
</body>

</html>