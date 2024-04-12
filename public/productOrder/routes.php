<?php

$path = './public/productOrder/views';
$basePath = "$path/po.";

$po = [
    // Sample Routes
    '/po/dashboard' => $basePath . "dashboard.php",
    '/po/requestOrder' => $basePath . "requestOrder.php",
    '/po/suppliers' => $basePath . "suppliers.php",
    '/po/addsupplier' => $basePath . "addsupplier.php",
    '/po/viewsupplier' => $basePath . "viewsupplier.php",
    '/po/items' => $basePath . "items.php",
    '/po/addItem' => $basePath . "addItem.php",
    '/po/orderDetail' => $basePath . "orderDetail.php",
    '/po/viewdetails' => $basePath . "viewdetails.php",
    '/po/transactionHistory' => $basePath . "transactionHistory.php",
    '/po/requestHistory' => $basePath . "requestHistory.php",
    '/po/updateRequestStatus' => $basePath . "updateRequestStatus.php",

//umm idk what to say here
    '/po/viewdetails/Order={id}' => function($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['id'] = $id;
        include $basePath . "viewdetails.php";
},

];
Router::post('/po/addItem', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $productName = $_POST['productname'];
    $supplierName = $_POST['supplier'];
    $description = $_POST['description'];
    $categoryName = $_POST['category'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];

    // Check if all necessary data is provided
    if (empty($supplierName) || empty($productName)) {
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/po/items");
        return;
    }

    // Retrieve the supplier_id based on the supplier name
    $stmt = $conn->prepare("SELECT supplier_id FROM suppliers WHERE supplier_name = ?");
    $stmt->bindParam(1, $supplierName, PDO::PARAM_STR);
    $stmt->execute();
    $supplier = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$supplier) {
        echo "Supplier not found.";
        return;
    }

    $supplierId = $supplier['supplier_id'];

    // Retrieve the category_id based on the category name
    $stmt = $conn->prepare("SELECT category_id FROM categories WHERE category_name = ?");
    $stmt->bindParam(1, $categoryName, PDO::PARAM_STR);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
        echo "Category not found.";
        return;
    }

    $categoryId = $category['category_id'];

    // Handle image upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileDestination = 'uploads/' . $fileName;

        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // Insert data into products table with supplier_id and category_id
            $stmt1 = $conn->prepare("INSERT INTO products (ProductImage, ProductName, supplier_id, category_id, Description, Supplier, Category, Price, ProductWeight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bindParam(1, $fileDestination, PDO::PARAM_STR);
            $stmt1->bindParam(2, $productName, PDO::PARAM_STR);
            $stmt1->bindParam(3, $supplierId, PDO::PARAM_INT);
            $stmt1->bindParam(4, $categoryId, PDO::PARAM_INT);
            $stmt1->bindParam(5, $description, PDO::PARAM_STR);
            $stmt1->bindParam(6, $supplierName, PDO::PARAM_STR);
            $stmt1->bindParam(7, $categoryName, PDO::PARAM_STR);
            $stmt1->bindParam(8, $price, PDO::PARAM_INT);
            $stmt1->bindParam(9, $weight, PDO::PARAM_INT);
            $stmt1->execute();

            // Redirect after successful insertion
            $rootFolder = dirname($_SERVER['PHP_SELF']);
            header("Location: $rootFolder/po/items");
            exit();
        } else {
            echo "Failed to move uploaded file.";
            return;
        }
    } else {
        echo "No file uploaded or an error occurred.";
        return;
    }
});

//function to get all the categories in the addItem.php
function getAllCategories() {
    $db = Database::getInstance();
    $conn = $db->connect();

    $categories = array();

    try {
        // Query to retrieve all category names
        $query = "SELECT category_name FROM categories";
        $statement = $conn->prepare($query);
        $statement->execute();

        // Fetch all category names and store them in an array
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row['category_name'];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $categories;
}
//function to delete/remove requested orders of the Inventory Team 
Router::post('/delete/requestOrder', function () {
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        // Check if the requestID is provided in the POST data
        if (isset ($_POST['requestID'])) {
            $requestID = $_POST['requestID'];

            $stmt = $conn->prepare("DELETE FROM requests WHERE Request_ID = :requestID");
            $stmt->bindParam(':requestID', $requestID);

            // Execute the statement
            $stmt->execute();

            // Check if any rows were affected
            $rowsAffected = $stmt->rowCount();
            if ($rowsAffected > 0) {
                // Redirect back to the request order page after successful deletion
                $rootFolder = dirname($_SERVER['PHP_SELF']);
                header("Location: $rootFolder/po/requestOrder");
                exit (); // Ensure script execution stops after redirection
            } else {
                // No rows were affected, handle this case accordingly
                echo "No rows were deleted.";
            }
        } else {
            // Handle case where requestID is not provided
            echo "No requestID provided for deletion.";
        }
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        // Handle any other exceptions
        echo "Error: " . $e->getMessage();
    }
});



// //testing chit
// Router::post('/po/test', function () {
//     $db = Database::getInstance();
//     $conn = $db->connect();

//     $productID = $_POST['productID'];
//     $quantity = $_POST['quantity'];

//     $query = "SELECT Price FROM products WHERE ProductID = :productID";
//         $statement = $conn->prepare($query);
//         $statement->bindParam(':productID', $productID);
//         $statement->execute();
//         $row = $statement->fetch(PDO::FETCH_ASSOC);
//         $price = $row['Price'];

//     $rootFolder = dirname($_SERVER['PHP_SELF']);
//  // Calculate total price
//  $totalPrice = $price * $quantity;

//  // Prepare the SQL statement
//  $query = "INSERT INTO requests (Product_ID, Product_Quantity, Product_Total_Price) VALUES (:productID, :quantity, :totalPrice)";
//  $statement = $conn->prepare($query);

//  // Bind parameters
//  $statement->bindParam(':productID', $productID);
//  $statement->bindParam(':quantity', $quantity);
//  $statement->bindParam(':totalPrice', $totalPrice);

//  // Execute the statement
//  if ($statement->execute()) {
//      echo "Request saved successfully.";
//  } else {
//      echo "Failed to save request.";

//     // Execute the statement


//     header("Location: $rootFolder/test");
// }});



//function to show all the product details
function getProductDetails($productID, $conn)
{
    try {
        // Prepare the SQL statement to fetch product details including the image path
        $query = "SELECT p.ProductImage, p.ProductName, p.Supplier, p.Category, p.Price, r.Product_Quantity, r.Product_Total_Price
                  FROM products p
                  INNER JOIN requests r ON p.ProductID = r.Product_ID
                  WHERE p.ProductID = :product_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':product_id', $productID);
        $statement->execute();

        // Fetch the product details
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if a result is returned
        if ($result) {
            return $result; // Return an associative array containing all product details
        } else {
            return false; // Return false if no result found
        }
    } catch (PDOException $e) {
        // Handle the exception
        echo "Error: " . $e->getMessage();
        return false; // Return false in case of an error
    }
}


// Function to update request status to 'Ok' this code is for the finance team
function updateRequestStatusToOk()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        // Begin a transaction
        $conn->beginTransaction();

        // Update the request status in the requests table
        $query = "UPDATE requests SET request_Status = 'Ready to order' WHERE request_Status = 'pending'";
        $statement = $conn->prepare($query);
        $statement->execute();

        // Commit the transaction
        $conn->commit();

        echo "All pending requests have been updated to 'Ok' status.";
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/po/requestOrder");

    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

// Route to handle the update request status action
Router::post('/accept/requestOrder', function () {
    // Call the function to update request status
    updateRequestStatusToOk();
});


//function to change the "pending" status of requested orders to "accepted" and it will insert on the
//orders_details table while also having a data in the requests tables to use it as a request history
function updateRequestStatusToAccepted()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        // Begin a transaction
        $conn->beginTransaction();

        // Retrieve pending requests
        $pendingRequestsStmt = $conn->prepare("SELECT * FROM requests WHERE request_Status = 'Ready to order'");
        $pendingRequestsStmt->execute();
        $pendingRequests = $pendingRequestsStmt->fetchAll(PDO::FETCH_ASSOC);

        // Prepare the SQL statement to insert into order_details
        $insertStmt = $conn->prepare("INSERT INTO order_details (Request_ID, Product_ID, Category_ID, Supplier_ID, Order_Status) VALUES (:requestID, :productID, :categoryID, :supplierID, 'to receive')");

        // Loop through each pending request and insert into order_details
        foreach ($pendingRequests as $request) {
            $requestID = $request['Request_ID'];
            $productID = $request['Product_ID'];
            
            // Retrieve Category_ID and Supplier_ID from products table
            $productStmt = $conn->prepare("SELECT Category_ID, Supplier_ID FROM products WHERE ProductID = :productID");
            $productStmt->bindParam(':productID', $productID);
            $productStmt->execute();
            $product = $productStmt->fetch(PDO::FETCH_ASSOC);
            $categoryID = $product['Category_ID'];
            $supplierID = $product['Supplier_ID'];

            // Bind parameters and execute the insert statement
            $insertStmt->bindParam(':requestID', $requestID);
            $insertStmt->bindParam(':productID', $productID);
            $insertStmt->bindParam(':categoryID', $categoryID);
            $insertStmt->bindParam(':supplierID', $supplierID);
            $insertStmt->execute();
        }

        // Commit the transaction
        $conn->commit();

        // Update the request status to 'accepted' after inserting into order_details
        $updateStmt = $conn->prepare("UPDATE requests SET request_Status = 'accepted' WHERE request_Status = 'Ready to order'");
        $updateStmt->execute();

        echo "Request status updated to 'accepted' for all pending requests.";

        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/po/requestOrder");
        exit(); // Stop script execution after redirection

    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}



// Route to handle the update request status action
Router::post('/update/requestOrder', function () {
    // Call the function to update request status
    updateRequestStatusToAccepted();
});

//function to set the order status of to complete and also add the data in the transaction history
function updateOrderStatusToCompleted()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        if (isset($_POST['Order_ID'])) {
            $orderID = $_POST['Order_ID'];

            // Begin a transaction
            $conn->beginTransaction();

            // Update the order status in the order_details table
            $stmt = $conn->prepare("UPDATE order_details SET Order_Status = 'Completed' WHERE Order_ID = :orderID");
            $stmt->bindParam(':orderID', $orderID);
            $stmt->execute();

            // Fetch order details
            $orderDetailsStmt = $conn->prepare("SELECT request_Id, Supplier_ID FROM order_details WHERE Order_ID = :orderID");
            $orderDetailsStmt->bindParam(':orderID', $orderID);
            $orderDetailsStmt->execute();
            $orderDetails = $orderDetailsStmt->fetch(PDO::FETCH_ASSOC);
            $requestID = $orderDetails['request_Id'];
            $supplierID = $orderDetails['Supplier_ID'];

            // Insert data into transaction_history table
            $insertStmt = $conn->prepare("INSERT INTO transaction_history (order_id, request_Id, Supplier_ID, Order_Status) VALUES (:orderID, :requestID, :supplierID, 'Completed')");
            $insertStmt->bindParam(':orderID', $orderID);
            $insertStmt->bindParam(':requestID', $requestID);
            $insertStmt->bindParam(':supplierID', $supplierID);
            $insertStmt->execute();

            // Commit the transaction
            $conn->commit();

            echo "Order status updated to 'Completed' for Order ID: $orderID";

            $rootFolder = dirname($_SERVER['PHP_SELF']);
            header("Location: $rootFolder/po/orderDetail");
            exit(); // Stop script execution after redirection
        }
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

// Route to handle the update order status action
Router::post('/complete/orderDetail', function () {
    // Call the function to update order status
    updateOrderStatusToCompleted();
});

//function to set the order status of to complete and also add the data in the transaction history
function updateOrderStatusToCancel()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        if (isset($_POST['Order_ID'])) {
            $orderID = $_POST['Order_ID'];

            // Begin a transaction
            $conn->beginTransaction();

            // Update the order status in the order_details table
            $stmt = $conn->prepare("UPDATE order_details SET Order_Status = 'Canceled' WHERE Order_ID = :orderID");
            $stmt->bindParam(':orderID', $orderID);
            $stmt->execute();

            // Fetch order details
            $orderDetailsStmt = $conn->prepare("SELECT request_Id, Supplier_ID FROM order_details WHERE Order_ID = :orderID");
            $orderDetailsStmt->bindParam(':orderID', $orderID);
            $orderDetailsStmt->execute();
            $orderDetails = $orderDetailsStmt->fetch(PDO::FETCH_ASSOC);
            $requestID = $orderDetails['request_Id'];
            $supplierID = $orderDetails['Supplier_ID'];

            // Insert data into transaction_history table
            $insertStmt = $conn->prepare("INSERT INTO transaction_history (order_id, request_Id, Supplier_ID, Order_Status) VALUES (:orderID, :requestID, :supplierID, 'Canceled')");
            $insertStmt->bindParam(':orderID', $orderID);
            $insertStmt->bindParam(':requestID', $requestID);
            $insertStmt->bindParam(':supplierID', $supplierID);
            $insertStmt->execute();

            // Commit the transaction
            $conn->commit();

            echo "Order status updated to 'Completed' for Order ID: $orderID";

            $rootFolder = dirname($_SERVER['PHP_SELF']);
            header("Location: $rootFolder/po/orderDetail");
            exit(); // Stop script execution
        }
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

// Route to handle the update order status action
Router::post('/cancel/orderDetail', function () {
    // Call the function to update order status
    updateOrderStatusToCancel();
});


//function to just fetch the data in the requestHistory
function fetchAllRequestsData()
{
    try {
        // Connect to the database
        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare SQL query to fetch all requests data
      $sql = "SELECT r.*, od.*, p.ProductName, p.Price 
                    FROM requests r
                    INNER JOIN order_details od ON r.Request_ID = od.Order_ID
                    INNER JOIN products p ON od.Product_ID = p.ProductID
                WHERE r.Request_Status = 'accepted'
                ORDER BY r.Request_ID ASC"; // Order by Request_ID from lowest to highest

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Execute the statement
        $stmt->execute();

        // Fetch all rows as an associative array
        $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $requests;
        
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return []; // Set requests to an empty array in case of error
    }
}


// Function to search requests by date
function searchByDate()
{
    try {
        // Connect to the database
        $db = Database::getInstance();
        $conn = $db->connect();

        if (isset($_POST['searchDate'])) {
            $searchDate = $_POST['searchDate'];

            // Prepare SQL query to fetch requests data based on the search date
            $sql = "SELECT r.*, od.*, p.ProductName, p.Price 
                    FROM requests r
                    INNER JOIN order_details od ON r.Request_ID = od.Order_ID
                    INNER JOIN products p ON od.Product_ID = p.ProductID
                    WHERE DATE(od.Date_Ordered) = :searchDate AND r.Request_Status = 'accepted'
                    ORDER BY r.Request_ID ASC"; // Order by Request_ID from lowest to highest

            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':searchDate', $searchDate);

            // Execute the statement
            $stmt->execute();

            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Return the fetched data
            return $result;
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array in case of error
    }
}
// Route to handle the search request
Router::post('/search/requestHistory', function () {
    // Call the function to search requests by date
    $searchedRequests = searchByDate();

    // Include the requestHistory.php file to display the search results
    include 'views/po.requestHistory.php';
});

