<!DOCTYPE html>
<html>

<head>
    <title>Delete Item</title>
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

    <h2>Delete Product</h2>
    <form action="/inv/delete" method="POST">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <input type="submit" value="Delete">
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