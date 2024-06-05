<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incoming</title>
</head>

<body>

    <div class="container">
        <h2>Returns</h2>
        <?php
        require_once __DIR__ . "/../../functions/db.php";
        $stmt = $conn->query("SELECT * FROM returns");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Return ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Date Returned</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['return_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['reason']; ?></td>
                    <td><?php echo $row['date_added']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- Add Delivery Status Form -->
        <form id="deliveryForm" action="/inv/testreturns" method="POST" enctype="multipart/form-data">
            <h3>Add Return Reports</h3>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image"><br>
                <label for="return_id">Return ID:</label>
                <input type="number" id="return_id" name="return_id" required><br>
                <label for="product_id">Product ID:</label>
                <input type="number" id="product_id" name="product_id" required><br>
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required><br>
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br>
                <label for="date_added">Return Date:</label>
                <input type="date" id="date_added" name="date_added" required><br>
            </div>
            <div class="form-group">
                <label for="reason">reason:</label>
                <select id="reason" name="reason" required>
                    <option value="">Select Reason</option>
                    <option value="Defective">Defective</option>
                    <option value="Void">Void</option>
                    <option value="Wrong Item">Wrong Item</option>
                    <option value="Change of Mind">Change of Mind</option>
                </select>
            </div>
            <button type="submit" class="btn">Submit</button>
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