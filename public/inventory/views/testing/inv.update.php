<!DOCTYPE html>
<html>

<head>
    <title>Update Item</title>
</head>

<body>

    <?php
    require_once __DIR__ . "/../../functions/db.php";
    $stmt = $conn->query("SELECT * FROM total_stocks");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Stock ID</th>
            <th>Image</th>
            <th>Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Product Status</th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['stock_id']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['prod_stat']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Update Product</h2>
    <form action="/inv/Update" method="POST">
        <label for="product">Select Product:</label><br>
        <select id="product" name="product_id">
            <?php
            $stmt = $conn->query("SELECT id, product FROM total_stocks");
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Generate options for each product
            foreach ($products as $product) {
                echo "<option value=\"{$product['id']}\">{$product['product']}</option>";
            }
            ?>
        </select><br>
        <label for="quantity">Quantity:</label><br>
        <input type="text" id="quantity" name="quantity"><br>
        <input type="submit">
    </form>


    <br><br><br>
    <button route='/inv/update'">Update</button>
    <button route='/inv/add'">Add</button>
    <button route='/inv/delete'">Delete</button>
    <button route='/inv/main'">Home</button>
    <button route='/inv/incoming'">Incoming Stocks</button>
    <button route='/inv/testreturns'">Returns</button>
    <button route='/inv/incidents'">Incident Reports</button>
    <script src=" ./../src/form.js"></script>
        <script src="./../src/route.js"></script>
</body>

</html>