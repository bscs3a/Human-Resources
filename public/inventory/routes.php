<?php

$path = './public/inventory/views';
$basePath = "$path/inv.";
$crudPath = "$path/inv-crud/inv.";
$testPath = "$path/testing/inv.";

$inv = [
    // Main
    '/inv/main' => $basePath . "main.php",
    // Inventory Products
    '/inv/inventoryProducts' => $basePath . "products.php",
    // Product Process
    '/inv/inventoryProductsProcess' => $basePath . "prod.process.php",
    // Product Returns
    '/inv/returns' => $basePath . "returns.php",
    // Product Incident Reports  
    '/inv/reports' => $basePath . "reports.php",
    // Product Incoming Stocks
    '/inv/incStock' => $basePath . "incStock.php",
    // Account Settings
    '/inv/accountsett' => $basePath . "accountsett.php",
    // Request Product Order
    '/inv/request-prod-ord' => $basePath . "req-prod-ord.php",
    // Finance Request
    '/inv/req-finance/page={pageNumber}' => function ($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "fin.request.php";
    },
    // Manage Products
    '/inv/manageProducts' => $basePath . "manage-prod.php",

    //--------------CRUD REAL---------------
    //ADD PRODUCTS
    '/inv/add-prod' => $basePath . "crud-add-prod.php",
    //UPDATE PRODUCTS
    '/inv/update-prod' => $basePath . "crud-update-prod.php",
    //DELETE PRODUCTS 
    '/inv/delete-prod' => $basePath . "crud-delete-prod.php",
    //ADD INCOMING STOCKS
    '/inv/add-inc-stocks' => $basePath . "crud-add-inc-stocks.php",
    //UPDATE INCOMING STOCKS
    '/inv/update-inc-stocks' => $basePath . "crud-update-inc-stocks.php",
    //DELETE INCOMING STOCKS
    '/inv/delete-inc-stocks' => $basePath . "crud-delete-inc-stocks.php",
    //ADD RETURNS
    '/inv/add-returns' => $basePath . "crud-add-returns.php",
    //UPDATE RETURNS
    '/inv/update-returns' => $basePath . "crud-update-returns.php",
    //DELETE RETURNS
    '/inv/delete-returns' => $basePath . "crud-delete-returns.php",
    //ADD PRODUCT INCIDENT
    '/inv/add-incidents' => $basePath . "crud-add-incidents.php",
    //UPDATE PRODUCT INCIDENT
    '/inv/update-incidents' => $basePath . "crud-update-incidents.php",
    //DELETE PRODUCT INCIDENT
    '/inv/delete-incidents' => $basePath . "crud-delete-incidents.php",

    //------------------TESTING------------------------
    //--------------CRUD---------------
    //ADD
    '/inv/add' => $testPath . "additem.php",
    //UPDATE
    '/inv/update' => $testPath . "update.php",
    //DELETE 
    '/inv/delete' => $testPath . "delete.php",
    //incoming stocs
    '/inv/incoming' => $testPath . "incomingStocks.php",
    //returns
    '/inv/testreturns' => $testPath . "Testreturns.php",
    //incident reports
    '/inv/incidents' => $testPath . "incidents.php",
    //table
    '/inv/table' => $testPath . "table.php",
    //--------------END CRUD---------------
    //------------------END TESTING------------------------


    // Edit Product
    '/inv/prod-edit={stock_id}' => function ($stock_id) use ($basePath) {
        $_SESSION['stock_id'] = $stock_id;
        include $basePath . "prodEdit.php";
    },



];


//---------------CRUD OPERATIONS-------------------
//------------Product List--------------------------
//ADD PRODUCTS
Router::post('/inv/add-prod', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $date_added = date('Y-m-d H:i:s');
    $stock_id = $_POST['stock_id'];
    $product = $_POST['product'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("SELECT * FROM inventory WHERE stock_id = ?");
    $stmt->execute([$stock_id]);
    $existingStock = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingStock) {
        $stmt = $conn->prepare("UPDATE inventory SET quantity = quantity + :quantity WHERE stock_id = :stock_id");
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':stock_id', $stock_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO inventory (stock_id, product, category, price, quantity, status, date_added) 
                                VALUES (:stock_id, :product, :category, :price, :quantity, :status, :date_added)");
        $stmt->bindParam(':stock_id', $stock_id);
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date_added', $date_added);
    }

    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/add-prod");
    exit();
});
Router::post('/inv/update-prod', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (empty($product_id) || empty($quantity)) {
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/inv/update");
        exit();
    }

    $stmt = $conn->prepare("UPDATE inventory SET quantity = :quantity WHERE id = :product_id");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/update-prod");
    exit();
});
//DELETE PRODUCTS
Router::post('/inv/delete-prod', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM inventory WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/delete-prod");
    exit();
});
// ------------END Product List----------------
// ------------Delete Incidents-----------------
Router::post('/inv/delete-incidents', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM inventory WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/delete-incidents");
    exit();
});
// ------------END Delete Incidents-----------------
// ------------Delete Retturns-----------------
Router::post('/inv/delete-returns', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $id = $_POST['ReturnID'];

    $stmt = $conn->prepare("DELETE FROM returnproducts WHERE ReturnID = :ReturnID");
    $stmt->bindParam(':ReturnID', $id);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/delete-returns");
    exit();
});
// ------------END Delete Returns-----------------

//-------------Incoming Stocks-----------------
Router::post('/inv/incoming', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $date_added = date('Y-m-d H:i:s');
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $product_id = $_POST['product_id'];
    $delivery_id = $_POST['delivery_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $weight = $_POST['weight'];
    $delivery_date = $_POST['delivery_date'];
    $stmt = $conn->prepare("INSERT INTO delivery_inc (product_id, image, product_name, category, quantity, status, date_added, delivery_id, weight, delivery_date) 
                            VALUES (:product_id, :image, :product_name, :category, :quantity, :status, :date_added, :delivery_id, :weight, :delivery_date)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->bindParam(':delivery_id', $delivery_id);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':delivery_date', $delivery_date);
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/incoming");
});
//------------END Incoming Stocks-----------------
//------------Returns-----------------
Router::post('/inv/testreturns', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $product_id = $_POST['product_id'];
    $date_added = $_POST['date_added'];
    $return_id = $_POST['return_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    $stmt = $conn->prepare("INSERT INTO returns (product_id, image, product_name, category, quantity, reason, date_added, return_id)  
                            VALUES (:product_id, :image, :product_name, :category, :quantity, :reason, :date_added, :return_id)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->bindParam(':return_id', $return_id);
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/testreturns");
});
//------------END Returns-----------------
//------------Incident Reports----------------
Router::post('/inv/incidents', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $product_id = $_POST['product_id'];
    $date_added = $_POST['date_added'];
    $incident_id = $_POST['incident_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("INSERT INTO incidents (product_id, image, product_name, category, quantity, status, date_added, incident_id)  
                            VALUES (:product_id, :image, :product_name, :category, :quantity, :status, :date_added, :incident_id)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->bindParam(':incident_id', $incident_id);
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/incidents");
});
//------------END Incident Reports----------------
//------------END OPERATIONS----------------

//------------PRODUCT ORDER----------------
Router::post('/inv/prod-edit', function () {
    // Include Database class if not already included
    // require_once('Database.php');

    $db = Database::getInstance();
    $conn = $db->connect();
    $date_added = date('Y-m-d H:i:s');

    // Sanitize and validate input
    $prodId = isset($_POST['id']) ? intval($_POST['id']) : null;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    // Check if required fields are empty
    if (empty($prodId) || empty($quantity)) {
        // Redirect if required fields are empty
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/inv/main");
        exit();
    }

    // Assuming you have a table called 'total_stocks' where product stock information is stored
    $stmt = $conn->prepare("SELECT stock_id FROM total_stocks WHERE prodID = :prodID");
    $stmt->bindParam(':prodID', $prodId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        // Redirect if product ID not found in total_stocks
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/inv/main");
        exit();
    }

    $stockId = $result['stock_id'];

    // Inserting data into 'inventory_orders'
    $stmt = $conn->prepare("INSERT INTO inventory_orders (stock_id, quantity, date_added) VALUES (:stock_id, :quantity, :date_added)");
    $stmt->bindParam(':stock_id', $stockId);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->execute();

    // Redirect after successful insertion
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/incStock");
    exit();
});
//Request Products
Router::post('/inv/request-prod-ord', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $date_ordered = date('Y-m-d H:i:s');
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("SELECT * FROM inventoryorders WHERE product_id = ?");
    $stmt->execute([$product_id]);
    $existingStock = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingStock) {
        $stmt = $conn->prepare("UPDATE inventoryorders SET quantity = quantity + :quantity WHERE product_id = :product_id");
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':product_id', $product_id);

    } else {
        $stmt = $conn->prepare("INSERT INTO inventoryorders (product_id, product_name, quantity, date_ordered) 
                                VALUES (:product_id, :product_name, :quantity, :date_ordered)");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':date_ordered', $date_ordered);
    }

    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/request-prod-ord");
    exit();
});






//END OPERATIONS