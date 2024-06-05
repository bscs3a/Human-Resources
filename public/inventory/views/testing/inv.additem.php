<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
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
        <?php foreach ($rows as $row) : ?>
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

    <h2>Add Product</h2>
    <form action="/inv/Add" method="POST" enctype="multipart/form-data">
        <label for="stock_id">Stock ID:</label><br>
        <input type="text" id="stock_id" name="stock_id"><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>
        <label for="product">Product:</label><br>
        <input type="text" id="product" name="product"><br>
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category"><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
        <label for="quantity">Quantity:</label><br>
        <input type="text" id="quantity" name="quantity"><br>
        <label for="prod_stat">Product Status:</label><br>
        <input type="text" id="prod_stat" name="prod_stat"><br>
        <input type="hidden" id="date_added" name="date_added">
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


    <script src=" ./../src/route.js"></script>
        <script src="./../src/form.js"></script>
</body>

</html>