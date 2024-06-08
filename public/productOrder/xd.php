<?php
require_once "public/finance/functions/otherGroups/productOrder.php";
$path = './public/productOrder/views';
$basePath = "$path/po.";

$po = [
    // Sample Routes
    '/po/login' => $basePath . "login.php",
    // '/po/dashboard' => $basePath . "dashboard.php",
    '/po/requestOrder' => $basePath . "requestOrder.php",
    '/po/viewRequest' => $basePath . "viewRequest.php",
    '/po/suppliers' => $basePath . "suppliers.php",
    '/po/addsupplier' => $basePath . "addsupplier.php",
    '/po/viewsupplier' => $basePath . "viewsupplier.php",
    '/po/viewsupplierproduct' => $basePath . "viewsupplierproduct.php",
    '/po/items' => $basePath . "items.php",
    '/po/addItem' => $basePath . "addItem.php",
    '/po/addbulk' => $basePath . "addbulk.php",
    '/po/orderDetail' => $basePath . "orderDetail.php",
    '/po/viewdetails' => $basePath . "viewdetails.php",
    '/po/transactionHistory' => $basePath . "transactionHistory.php",
    '/po/requestHistory' => $basePath . "requestHistory.php",
    '/po/updateRequestStatus' => $basePath . "updateRequestStatus.php",
    '/po/viewtransaction' => $basePath . "viewtransaction.php",
    '/po/editsupplier' => $basePath . "editsupplier.php",
    '/po/test' => $basePath . "test.php",
    '/po/test1' => $basePath . "test1.php",
    '/po/pondo' => $basePath . "pondo.php",
    '/po/logout' => $basePath . "pondo.php",
    // '/po/audit_logs' => $basePath . "audit_logs.php",

    //auditlogs
    '/po/audit_logs/page={pageNumber}' => function ($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "audit_logs.php";
    },

    //funds
    '/po/pondo/page={pageNumber}' => function ($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "pondo.php";
    },

    //umm idk what to say here view orders route
    '/po/viewdetails/Batch={id}' => function ($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['id'] = $id;
        include $basePath . "viewdetails.php";
    },
    //for viewing the transaction information based on the batch id
    '/po/viewtransaction/Batch={id}' => function ($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['id'] = $id;
        include $basePath . "viewtransaction.php";
    },
    // view supplier information route
    '/po/viewsupplier/Supplier={Supplier_ID}' => function ($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['Supplier_ID'] = $id;
        include $basePath . "viewsupplier.php";
    },
    // view supplier products route
    '/po/viewsupplierproduct/Supplier={Supplier_ID}' => function ($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['Supplier_ID'] = $id;
        include $basePath . "viewsupplierproduct.php";
    },
    // for adding bulk orders based on the supplier id
    '/po/addbulk/Supplier={Supplier_ID}' => function ($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['Supplier_ID'] = $id;
        include $basePath . "addbulk.php";
    },
    // for edditing the supplier information + products based on the Supplier_ID in the $GET
    '/po/editsupplier/Supplier={Supplier_ID}' => function ($id) use ($basePath) {
        // $_SESSION['id'] = $id;
        $_GET['Supplier_ID'] = $id;
        include $basePath . "editsupplier.php";
    },

    '/po/test1/pagenumber={page}' => function ($page) use ($basePath) {
        $_GET['page'] = $page; // Update the $_GET key to 'page' to match the parameter used in test.php
        include $basePath . "test1.php";
    },
];

// Router::post('/login/user', function () {
//     // Establish database connection
//     $db = Database::getInstance();
//     $conn = $db->connect();

//     try {
//         // Retrieve username from POST request
//         $username = $_POST['username'];

//         // Prepare SQL statement to fetch user record from the database
//         $stmt = $conn->prepare("SELECT * FROM accounts WHERE username = :username");
//         $stmt->bindParam(':username', $username);
//         $stmt->execute();
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);

//         // Check if the user exists
//         if ($user) {
//             // Authentication successful
//             // Set a session variable to indicate the user is logged in

//             $_SESSION['user']['username'] = $user['employee'];

//             // Insert log entry for successful login audit log
//             $user_id = $user['employee'];
//             $action = "Logged In";
//             $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

//             $sql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
//             $stmt = $conn->prepare($sql);
//             $stmt->bindValue(':user_id', $user_id);
//             $stmt->bindValue(':action', $action);
//             $stmt->bindValue(':time_out', $time_out);
//             $stmt->execute();

//             $rootFolder = dirname($_SERVER['PHP_SELF']);
//             // Redirect to the dashboard page after successful login
//             header("Location: $rootFolder/po/dashboard");
//             exit ();
//         } else {
//             // Authentication failed
//             echo "Invalid username or password!";
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// });


// Router::post('/logout/user', function () {
//     // Establish database connection
//     $db = Database::getInstance();
//     $conn = $db->connect();

//     try {
//         if (isset ($_SESSION['user']['username'])) {
//             // Retrieve the last time_in from the poauditlogs table based on user
//             $stmt = $conn->prepare("SELECT time_in FROM poauditlogs WHERE user = (SELECT username FROM account_info WHERE username = :employee) ORDER BY audit_ID DESC LIMIT 1");
//             $stmt->bindParam(':employee', $_SESSION['user']['username']);
//             $stmt->execute();
//             $last_time_in = $stmt->fetchColumn();


//         }

//         // Insert logout action into poauditlogs table
//         if (isset ($_SESSION['user']['username'])) {
//             $employee = $_SESSION['user']['username'];
//             $action = "Logged Out";
//             // Use the last_time_in value obtained earlier as the time_in value when logging out
//             $sql = "INSERT INTO poauditlogs (user, action, time_in) VALUES ((SELECT username FROM account_info WHERE username = :employee), :action, :last_time_in)";
//             $stmt = $conn->prepare($sql);
//             $stmt->bindParam(':employee', $employee);
//             $stmt->bindParam(':action', $action);
//             $stmt->bindParam(':last_time_in', $last_time_in);
//             $stmt->execute();
//         }

//         // Unset all of the session variables
//         $_SESSION = array ();

//         // Destroy the session
//         session_destroy();

//         // Redirect the user to the login page after logout
//         $rootFolder = dirname($_SERVER['PHP_SELF']);
//         header("Location: $rootFolder/po/login");
//         exit ();
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// });

Router::post('/insert/addsupplier/', function () {
    // Establish database connection
    $db = Database::getInstance();
    $conn = $db->connect();

    try {
        // Retrieve form data directly from the $_POST superglobal
        $suppliername = $_POST["suppliername"];
        $contactname = $_POST["contactname"];
        $contactnum = $_POST["contactnum"];
        $status = $_POST["status"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $delivery = $_POST["delivery"];
        $shippingfee = $_POST["shippingfee"];
        $workingdays = $_POST["workingday"];

        // Prepare SQL statement for inserting supplier data
        $supplierSql = "INSERT INTO suppliers (Supplier_Name, Contact_Name, Contact_Number, Status, Email, Address, Estimated_Delivery, Shipping_fee, Working_days) 
                        VALUES (:suppliername, :contactname, :contactnum, :status, :email, :address, :delivery, :shippingfee, :workingdays)";
        $supplierStmt = $conn->prepare($supplierSql);
        $supplierStmt->bindParam(':suppliername', $suppliername);
        $supplierStmt->bindParam(':contactname', $contactname);
        $supplierStmt->bindParam(':contactnum', $contactnum);
        $supplierStmt->bindParam(':status', $status);
        $supplierStmt->bindParam(':email', $email);
        $supplierStmt->bindParam(':address', $address);
        $supplierStmt->bindParam(':delivery', $delivery);
        $supplierStmt->bindParam(':shippingfee', $shippingfee);
        $supplierStmt->bindParam(':workingdays', $workingdays);

        // Execute the supplier SQL statement
        $supplierStmt->execute();

        // Retrieve the last inserted supplier ID
        $supplierId = $conn->lastInsertId();

        // Loop through each row of product data
        for ($i = 1; $i <= 5; $i++) { // Assuming there are 5 rows of product data
            $productName = $_POST["productName$i"];
            $categoryName = $_POST["category$i"];
            $price = $_POST["price$i"];
            $retailprice = $_POST["retailprice$i"];
            $availability = $_POST["avail$i"];
            $description = $_POST["description$i"];
            $productWeight = $_POST["productweight$i"];
            $measurement = $_POST["measurement$i"];

            // Handle file upload for each row
            $fileFieldName = "productImage$i";
            $fileUploadPath = "uploads/"; // Adjust this path accordingly

            if ($_FILES[$fileFieldName]['error'] == UPLOAD_ERR_OK) {
                $fileName = basename($_FILES[$fileFieldName]['name']);
                $uploadPath = $fileUploadPath . $fileName;

                if (move_uploaded_file($_FILES[$fileFieldName]['tmp_name'], $uploadPath)) {
                    // File uploaded successfully, proceed with database insertion
                    // Prepare SQL statement for inserting product data
                    $productSql = "INSERT INTO products (Supplier_ID, Category_ID, ProductName, Description, Price, Supplier_Price, Availability, Category, ProductImage, Supplier, ProductWeight, UnitOfMeasurement, TaxRate) 
                                VALUES (:supplierId, :categoryId, :productName, :description, :price, :retailprice, :availability, :categoryName, :productImage, :suppliername, :productWeight, :measurement, 0.12)";
                    $productStmt = $conn->prepare($productSql);

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

                    // Bind parameters for product SQL statement
                    $productStmt->bindParam(':supplierId', $supplierId);
                    $productStmt->bindParam(':categoryId', $categoryId);
                    $productStmt->bindParam(':productName', $productName);
                    $productStmt->bindParam(':description', $description);
                    $productStmt->bindParam(':price', $price);
                    $productStmt->bindParam(':retailprice', $retailprice);
                    $productStmt->bindParam(':availability', $availability);
                    $productStmt->bindParam(':categoryName', $categoryName);
                    $productStmt->bindParam(':productImage', $uploadPath);
                    $productStmt->bindParam(':suppliername', $suppliername);
                    $productStmt->bindParam(':productWeight', $productWeight);
                    $productStmt->bindParam(':measurement', $measurement);

                    // Execute the product SQL statement
                    $productStmt->execute();
                } else {
                    // Failed to move the uploaded file, handle the error
                    echo "Error uploading file.";
                }
            } else {
                // No file uploaded for this row, handle accordingly
                echo "No file uploaded for row $i.";
            }
        }


        // Audit log for adding a supplier
        // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
        // $action = "Added Supplier: $suppliername";
        // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

        // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
        // $auditStmt = $conn->prepare($auditSql);
        // $auditStmt->bindParam(':user_id', $user_id);
        // $auditStmt->bindParam(':action', $action);
        // $auditStmt->bindParam(':time_out', $time_out);
        // $auditStmt->execute();

        // Redirect to the supplier addition page upon successful insertion
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/po/suppliers");
        exit; // Terminate script execution after redirect
    } catch (PDOException $e) {
        // Handle PDO exceptions
        echo "Error: " . $e->getMessage();
    } finally {
        // Close connection
        $conn = null;
    }
});


// Function for adding bulk items on a supplier
Router::post('/po/addbulk/', function () {
    // Establish database connection
    $db = Database::getInstance();
    $conn = $db->connect();

    try {
        // Retrieve the 'Supplier_ID' from the $_POST superglobal
        $supplierID = $_POST["supplierID"];

        // Loop through each row of product data
        for ($i = 1; $i <= 13; $i++) { // Assuming there are 13 rows of product data
            $productName = $_POST["productName$i"];
            $categoryName = $_POST["category$i"];
            $price = $_POST["price$i"];
            $retailprice = $_POST["retailprice$i"];
            $availability = $_POST["avail$i"];
            $description = $_POST["description$i"];
            $productWeight = $_POST["productweight$i"];
            $measurement = $_POST["measurement$i"];

            // Handle file upload for each row
            $fileFieldName = "productImage$i";
            $fileUploadPath = "uploads/"; // Adjust this path accordingly

            if ($_FILES[$fileFieldName]['error'] == UPLOAD_ERR_OK) {
                $fileName = basename($_FILES[$fileFieldName]['name']);
                $uploadPath = $fileUploadPath . $fileName;

                if (move_uploaded_file($_FILES[$fileFieldName]['tmp_name'], $uploadPath)) {
                    // File uploaded successfully, proceed with database insertion
                    // Prepare SQL statement for inserting product data
                    $productSql = "INSERT INTO products (Supplier_ID, Category_ID, ProductName, Description, Price, Supplier_Price, Availability, Category, ProductImage, Supplier, ProductWeight, UnitOfMeasurement, TaxRate) 
                                SELECT s.Supplier_ID, c.category_id, :productName, :description, :price, :retailprice, :availability, :categoryName, :productImage, s.Supplier_Name , :productWeight, :measurement, 0.12
                                FROM suppliers s 
                                INNER JOIN categories c ON c.category_name = :categoryName 
                                WHERE s.Supplier_ID = :supplierID";
                    $productStmt = $conn->prepare($productSql);

                    // Bind parameters for product SQL statement
                    $productStmt->bindParam(':supplierID', $supplierID);
                    $productStmt->bindParam(':categoryName', $categoryName);
                    $productStmt->bindParam(':productName', $productName);
                    $productStmt->bindParam(':description', $description);
                    $productStmt->bindParam(':price', $price);
                    $productStmt->bindParam(':retailprice', $retailprice);
                    $productStmt->bindParam(':availability', $availability);
                    $productStmt->bindParam(':productImage', $uploadPath);
                    $productStmt->bindParam(':productWeight', $productWeight);
                    $productStmt->bindParam(':measurement', $measurement);

                    // Execute the product SQL statement
                    $productStmt->execute();
                } else {
                    // Failed to move the uploaded file, handle the error
                    echo "Error uploading file.";
                }
            } else {
                // No file uploaded for this row, handle accordingly
                echo "No file uploaded for row $i.";
            }
        }

        // Audit log for adding bulk items on a supplier
        $user_id = $_SESSION['user']['username']; // Assuming you have a user session

        // Fetch Supplier_Name based on Supplier_ID
        // $supplierNameQuery = "SELECT Supplier_Name FROM suppliers WHERE Supplier_ID = :supplierID";
        // $supplierNameStmt = $conn->prepare($supplierNameQuery);
        // $supplierNameStmt->bindParam(':supplierID', $supplierID);
        // $supplierNameStmt->execute();
        // $supplierName = $supplierNameStmt->fetchColumn();

        // $action = "Added items for Supplier: $supplierName";
        // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

        // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
        // $auditStmt = $conn->prepare($auditSql);
        // $auditStmt->bindParam(':user_id', $user_id);
        // $auditStmt->bindParam(':action', $action);
        // $auditStmt->bindParam(':time_out', $time_out);
        // $auditStmt->execute();

        // Redirect to the products page upon successful insertion
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/po/viewsupplierproduct/Supplier=$supplierID");
        exit; // Terminate script execution after redirect
    } catch (PDOException $e) {
        // Handle PDO exceptions
        echo "Error: " . $e->getMessage();
    } finally {
        // Close connection
        $conn = null;
    }
});





// Function to get the next available batch ID
function getNextBatchID($conn)
{
    $query = "SELECT MAX(Batch_ID) AS MaxBatchID FROM order_details";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return ($result['MaxBatchID'] ?? 0) + 1;
}

Router::post('/placeorder/supplier/', function () {
    if (!isset($_POST['products']) || !is_array($_POST['products'])) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var message = 'No products selected for ordering.';
            var alertBox = document.createElement('div');
            alertBox.textContent = message;
            alertBox.style.backgroundColor = '#f8d7da'; // Red background color
            alertBox.style.color = '#721c24'; // Dark text color
            alertBox.style.padding = '30px'; // Padding
            alertBox.style.borderRadius = '12px'; // Rounded corners
            alertBox.style.position = 'fixed'; // Fixed position
            alertBox.style.top = '50%'; // Center vertically
            alertBox.style.left = '50%'; // Center horizontally
            alertBox.style.transform = 'translate(-50%, -50%)'; // Centering trick
            alertBox.style.zIndex = '9999'; // Ensure it's on top
            alertBox.style.border = '3px solid #f5c6cb'; // Border color
            alertBox.style.fontSize = '36px'; // Larger font size
            alertBox.style.fontWeight = 'bold'; // Bolder text
            document.body.appendChild(alertBox);
            setTimeout(function() {
                alertBox.parentNode.removeChild(alertBox);
                window.location.href = '/master/po/viewsupplierproduct';
            }, 2000); // Close the alert after 2 seconds
        });
      </script>";
return;
    }

    // Establish database connection
    $db = Database::getInstance();
    $conn = $db->connect();

    try {
        // Start a transaction
        $conn->beginTransaction();

        // Get Supplier_ID from the form data
        $supplierID = $_POST['supplierID'];
        $paymentmethod = $_POST['paymentmethod'];

        // Check supplier status
        $statusQuery = "SELECT Status FROM suppliers WHERE Supplier_ID = :supplierID";
        $statusStmt = $conn->prepare($statusQuery);
        $statusStmt->bindParam(':supplierID', $supplierID, PDO::PARAM_INT);
        $statusStmt->execute();
        $supplierStatus = $statusStmt->fetchColumn();

        if ($supplierStatus === 'Inactive') {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var message = 'This supplier is inactive and you cannot place orders with them.';
                        var alertBox = document.createElement('div');
                        alertBox.textContent = message;
                        alertBox.style.backgroundColor = '#f8d7da'; // Red background color
                        alertBox.style.color = '#721c24'; // Dark text color
                        alertBox.style.padding = '30px'; // Padding
                        alertBox.style.borderRadius = '12px'; // Rounded corners
                        alertBox.style.position = 'fixed'; // Fixed position
                        alertBox.style.top = '50%'; // Center vertically
                        alertBox.style.left = '50%'; // Center horizontally
                        alertBox.style.transform = 'translate(-50%, -50%)'; // Centering trick
                        alertBox.style.zIndex = '9999'; // Ensure it's on top
                        alertBox.style.border = '3px solid #f5c6cb'; // Border color
                        alertBox.style.fontSize = '36px'; // Larger font size
                        alertBox.style.fontWeight = 'bold'; // Bolder text
                        document.body.appendChild(alertBox);
                        setTimeout(function() {
                            alertBox.parentNode.removeChild(alertBox);
                            window.location.href = '/master/po/viewsupplierproduct/Supplier=$supplierID';
                        }, 2000); // Close the alert after 2 seconds
                    });
                  </script>";
            return;
        }

        // Prepare SQL statement for inserting orders into order_details table
        $orderStmt = $conn->prepare("INSERT INTO order_details (Supplier_ID, Product_ID, Product_Quantity, Date_Ordered, Batch_ID) VALUES (:supplierID, :productID, :quantity, NOW(), :batchID)");

        // Get Batch_ID
        $batchID = getNextBatchID($conn); // Function to get the next available batch ID

        // Initialize total quantity and total amount
        $totalQuantity = 0;
        $totalAmount = 0;

        // Flag to track availability status of products
        $allProductsAvailable = true;

        foreach ($_POST['products'] as $productID) {
            $quantityField = 'quantity_' . $productID;
            $quantity = isset($_POST[$quantityField]) ? intval($_POST[$quantityField]) : 0;

            // Ensure quantity is greater than 0 before processing
            if ($quantity > 0) {
                // Check product availability
                $availabilityQuery = "SELECT Availability, ProductImage, ProductName, Category FROM products WHERE ProductID = :productID";
                $availabilityStmt = $conn->prepare($availabilityQuery);
                $availabilityStmt->bindParam(':productID', $productID, PDO::PARAM_INT);
                $availabilityStmt->execute();
                $productInfo = $availabilityStmt->fetch(PDO::FETCH_ASSOC);

                $availability = $productInfo['Availability'];

                // If product is not available, set flag to false and halt order processing
                if ($availability === 'Not Available') {
                    $allProductsAvailable = false;
                    echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var message = 'Product with ID $productID is not available and cannot be ordered.';
                        var alertBox = document.createElement('div');
                        alertBox.textContent = message;
                        alertBox.style.backgroundColor = '#f8d7da'; // Red background color
                        alertBox.style.color = '#721c24'; // Dark text color
                        alertBox.style.padding = '30px'; // Padding
                        alertBox.style.borderRadius = '12px'; // Rounded corners
                        alertBox.style.position = 'fixed'; // Fixed position
                        alertBox.style.top = '50%'; // Center vertically
                        alertBox.style.left = '50%'; // Center horizontally
                        alertBox.style.transform = 'translate(-50%, -50%)'; // Centering trick
                        alertBox.style.zIndex = '9999'; // Ensure it's on top
                        alertBox.style.border = '3px solid #f5c6cb'; // Border color
                        alertBox.style.fontSize = '36px'; // Larger font size
                        alertBox.style.fontWeight = 'bold'; // Bolder text
                        document.body.appendChild(alertBox);
                        setTimeout(function() {
                            alertBox.parentNode.removeChild(alertBox);
                            window.location.href = '/master/po/viewsupplierproduct/Supplier=$supplierID';
                        }, 2000); // Close the alert after 2 seconds
                    });
                </script>";
                    break; // Stop processing further products
                }

                // Insert product information into inventory table
                $inventoryInsertStmt = $conn->prepare("INSERT INTO inventory (Product_ID, product, Quantity, Category) VALUES (:productID, :productName, :quantity, :category)");
                $inventoryInsertStmt->bindParam(':productID', $productID);
                // $inventoryInsertStmt->bindParam(':productImage', $productInfo['Product_Image']);
                $inventoryInsertStmt->bindParam(':productName', $productInfo['ProductName']);
                $inventoryInsertStmt->bindParam(':quantity', $quantity);
                $inventoryInsertStmt->bindParam(':category', $productInfo['Category']);
                $inventoryInsertStmt->execute();

                // Bind parameters for order details insertion
                $orderStmt->bindParam(':supplierID', $supplierID);
                $orderStmt->bindParam(':productID', $productID);
                $orderStmt->bindParam(':quantity', $quantity);
                $orderStmt->bindParam(':batchID', $batchID);

                // Execute the statement for order details insertion
                $orderStmt->execute();

                // Calculate subtotal quantity
                $totalQuantity += $quantity;

                // Retrieve product price from the database
                $productPriceQuery = "SELECT Supplier_Price FROM products WHERE ProductID = :productID";
                $productPriceStmt = $conn->prepare($productPriceQuery);
                $productPriceStmt->bindParam(':productID', $productID);
                $productPriceStmt->execute();
                $productPrice = $productPriceStmt->fetchColumn();

                // Calculate total amount
                $totalAmount += $quantity * $productPrice;
            }
        }

        // Fetch the shipping fee for the supplier
        $shippingFeeQuery = "SELECT Shipping_fee FROM suppliers WHERE Supplier_ID = :supplierID";
        $shippingFeeStmt = $conn->prepare($shippingFeeQuery);
        $shippingFeeStmt->bindParam(':supplierID', $supplierID, PDO::PARAM_INT);
        $shippingFeeStmt->execute();
        $shippingFee = $shippingFeeStmt->fetchColumn();

        // Add the shipping fee to the total amount
       // Add the shipping fee to the total amount
       $totalAmount += $shippingFee;


       $remaingvalue = getRemainingProductOrderPondo($paymentmethod);

       if ($totalAmount > $remaingvalue) {
           echo "<script>alert('You dont have enough Funds to proceed with the order');</script>";
           echo "<script>window.location.href = '/master/po/viewsupplierproduct/Supplier=$supplierID';</script>";
    
       }

       // If any product is not available, halt the order processing
       if (!$allProductsAvailable) {
           // echo "Order cannot be processed because one or more products are not available.<br>";
       } else {
           // If total quantity is greater than 0, proceed with batch order insertion
           if ($totalQuantity > 0) {
               // Prepare SQL statement for inserting batch into batch_orders table

               $fundsID = recordBuyingInventory($totalAmount, $paymentmethod);
               $batchOrderStmt = $conn->prepare("INSERT INTO batch_orders (Supplier_ID, Items_Subtotal, Total_Amount, Order_Status, Pay_Using, Funds_Transact_ID) VALUES (:supplierID, :itemsSubtotal, :totalAmount, 'to receive', :paymentmethod, :fundsID)");
               // Bind parameters for batch order insertion
               $batchOrderStmt->bindParam(':supplierID', $supplierID);
               $batchOrderStmt->bindParam(':itemsSubtotal', $totalQuantity);
               $batchOrderStmt->bindParam(':totalAmount', $totalAmount);
               $batchOrderStmt->bindParam(':paymentmethod', $paymentmethod);
               $batchOrderStmt->bindParam(':fundsID', $fundsID);

               // Execute the statement for batch order insertion
               $batchOrderStmt->execute();

               // Commit the transaction
               $conn->commit();

               // Redirect the user after successful order placement
               $rootFolder = dirname($_SERVER['PHP_SELF']);
               header("Location: $rootFolder/po/orderDetail");
               exit(); // Ensure that script execution stops after redirection
           } else {
               // Rollback the transaction if no products were ordered
               $conn->rollBack();
               echo "<script>
               document.addEventListener('DOMContentLoaded', function() {
                   var message = 'No products were ordered.';
                   var alertBox = document.createElement('div');
                   alertBox.textContent = message;
                   alertBox.style.backgroundColor = '#f8d7da'; // Red background color
                   alertBox.style.color = '#721c24'; // Dark text color
                   alertBox.style.padding = '30px'; // Padding
                   alertBox.style.borderRadius = '12px'; // Rounded corners
                   alertBox.style.position = 'fixed'; // Fixed position
                   alertBox.style.top = '50%'; // Center vertically
                   alertBox.style.left = '50%'; // Center horizontally
                   alertBox.style.transform = 'translate(-50%, -50%)'; // Centering trick
                   alertBox.style.zIndex = '9999'; // Ensure it's on top
                   alertBox.style.border = '3px solid #f5c6cb'; // Border color
                   alertBox.style.fontSize = '36px'; // Larger font size
                   alertBox.style.fontWeight = 'bold'; // Bolder text
                   document.body.appendChild(alertBox);
                   setTimeout(function() {
                       alertBox.parentNode.removeChild(alertBox);
                       window.location.href = '/master/po/viewsupplierproduct/Supplier=$supplierID';
                   }, 2000); // Close the alert after 2 seconds
               });
           </script>";
           }
       }
   } catch (PDOException $e) {
       // Rollback the transaction on error
       $conn->rollBack();
       echo "Error placing order: " . $e->getMessage();
   } finally {
       // Close connection
       $conn = null;
   }
});





//function to delete view details
Router::post('/delete/viewdetails', function () {
    // Check if the delete request was submitted
    if (isset($_POST['product_id']) && isset($_POST['batch_id'])) {
        $productID = $_POST['product_id'];
        $batchID = $_POST['batch_id'];

        // Establish database connection
        $db = Database::getInstance();
        $conn = $db->connect();

        try {
            // Begin a transaction
            $conn->beginTransaction();

            // Get the Price and Quantity of the product being deleted
            $stmt = $conn->prepare("SELECT p.Price, od.Product_Quantity 
                                    FROM order_details od 
                                    INNER JOIN products p ON od.Product_ID = p.ProductID
                                    WHERE od.Product_ID = :productID AND od.Batch_ID = :batchID");
            $stmt->bindParam(':productID', $productID);
            $stmt->bindParam(':batchID', $batchID);
            $stmt->execute();
            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Delete the row from the order_details table
            $deleteStmt = $conn->prepare("DELETE FROM order_details WHERE Product_ID = :productID AND Batch_ID = :batchID");
            $deleteStmt->bindParam(':productID', $productID);
            $deleteStmt->bindParam(':batchID', $batchID);
            $deleteStmt->execute();

            // Subtract the Product_Quantity from batch_orders table
            $subtotal = $productData['Product_Quantity'];
            $totalAmount = $productData['Price'] * $subtotal;

            $updateStmt = $conn->prepare("UPDATE batch_orders SET Items_Subtotal = Items_Subtotal - :subtotal, Total_Amount = Total_Amount - :totalAmount WHERE Batch_ID = :batchID");
            $updateStmt->bindParam(':subtotal', $subtotal);
            $updateStmt->bindParam(':totalAmount', $totalAmount);
            $updateStmt->bindParam(':batchID', $batchID);
            $updateStmt->execute();

            // Audit log for deleting a product
            // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
            // $action = "Deleted Product ID: $productID from Order #$batchID";
            // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

            // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
            // $auditStmt = $conn->prepare($auditSql);
            // $auditStmt->bindParam(':user_id', $user_id);
            // $auditStmt->bindParam(':action', $action);
            // $auditStmt->bindParam(':time_out', $time_out);
            // $auditStmt->execute();

            // Commit the transaction
            $conn->commit();

            // Redirect back to the view details page
            $rootFolder = dirname($_SERVER['PHP_SELF']);
            header("Location: $rootFolder/po/viewdetails/Batch=$batchID");
            exit();
        } catch (PDOException $e) {
            // Rollback the transaction on error
            $conn->rollBack();
            echo "Error deleting row: " . $e->getMessage();
        } finally {
            // Close connection
            $conn = null;
        }
    }
});





// Router::post('/po/addItem', function () {
//     $db = Database::getInstance();
//     $conn = $db->connect();

//     $productName = $_POST['productname'];
//     $supplierName = $_POST['supplier'];
//     $description = $_POST['description'];
//     $categoryName = $_POST['category'];
//     $price = $_POST['price'];
//     $weight = $_POST['weight'];

//     // Check if all necessary data is provided
//     if (empty ($supplierName) || empty ($productName)) {
//         $rootFolder = dirname($_SERVER['PHP_SELF']);
//         header("Location: $rootFolder/po/items");
//         return;
//     }

//     // Retrieve the supplier_id based on the supplier name
//     $stmt = $conn->prepare("SELECT supplier_id FROM suppliers WHERE supplier_name = ?");
//     $stmt->bindParam(1, $supplierName, PDO::PARAM_STR);
//     $stmt->execute();
//     $supplier = $stmt->fetch(PDO::FETCH_ASSOC);

//     if (!$supplier) {
//         echo "Supplier not found.";
//         return;
//     }

//     $supplierId = $supplier['supplier_id'];

//     // Retrieve the category_id based on the category name
//     $stmt = $conn->prepare("SELECT category_id FROM categories WHERE category_name = ?");
//     $stmt->bindParam(1, $categoryName, PDO::PARAM_STR);
//     $stmt->execute();
//     $category = $stmt->fetch(PDO::FETCH_ASSOC);

//     if (!$category) {
//         echo "Category not found.";
//         return;
//     }

//     $categoryId = $category['category_id'];

//     // Handle image upload
//     if (isset ($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
//         $fileName = $_FILES['file']['name'];
//         $fileTmpName = $_FILES['file']['tmp_name'];
//         $fileDestination = 'uploads/' . $fileName;

//         if (move_uploaded_file($fileTmpName, $fileDestination)) {
//             // Insert data into products table with supplier_id and category_id
//             $stmt1 = $conn->prepare("INSERT INTO products (ProductImage, ProductName, supplier_id, category_id, Description, Supplier, Category, Price, ProductWeight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//             $stmt1->bindParam(1, $fileDestination, PDO::PARAM_STR);
//             $stmt1->bindParam(2, $productName, PDO::PARAM_STR);
//             $stmt1->bindParam(3, $supplierId, PDO::PARAM_INT);
//             $stmt1->bindParam(4, $categoryId, PDO::PARAM_INT);
//             $stmt1->bindParam(5, $description, PDO::PARAM_STR);
//             $stmt1->bindParam(6, $supplierName, PDO::PARAM_STR);
//             $stmt1->bindParam(7, $categoryName, PDO::PARAM_STR);
//             $stmt1->bindParam(8, $price, PDO::PARAM_INT);
//             $stmt1->bindParam(9, $weight, PDO::PARAM_INT);
//             $stmt1->execute();

//             // Redirect after successful insertion
//             $rootFolder = dirname($_SERVER['PHP_SELF']);
//             header("Location: $rootFolder/po/items");
//             exit ();
//         } else {
//             echo "Failed to move uploaded file.";
//             return;
//         }
//     } else {
//         echo "No file uploaded or an error occurred.";
//         return;
//     }
// });

//function to get all the categories in the addItem.php
function getAllCategories()
{
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
        if (isset($_POST['requestID'])) {
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
                exit(); // Ensure script execution stops after redirection
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

// Function to add feedback
Router::post('/addfeedback/viewtransaction', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    try {
        // Retrieve data from the form submission
        $reviews = $_POST['reviews'];
        $supplierID = $_POST['supplierID'];
        $user = $_POST['user'];
        $batchID = $_POST['batchID']; // Retrieve the batchID from the form submission

        // Check if feedback has already been provided for this supplier and batch
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM feedbacks WHERE batch_ID = :batchID");
        $checkStmt->bindParam(':batchID', $batchID);
        $checkStmt->execute();
        $feedbackCount = $checkStmt->fetchColumn();

        // If feedback hasn't been provided yet, save the feedback and update the "Done" status
        if ($feedbackCount == 0) {
            // Prepare and execute the SQL query to insert feedback into the database
            $stmt = $conn->prepare("INSERT INTO feedbacks (reviews, supplier_id, user, batch_ID) VALUES (:reviews, :supplierID, :user, :batchID)");
            $stmt->bindParam(':reviews', $reviews);
            $stmt->bindParam(':supplierID', $supplierID);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':batchID', $batchID);
            $stmt->execute();

            // Update the "Feedback" column in the transaction history table
            $updateStmt = $conn->prepare("UPDATE transaction_history SET Feedback = 'Done' WHERE supplier_id = :supplierID AND batch_ID = :batchID");
            $updateStmt->bindParam(':supplierID', $supplierID);
            $updateStmt->bindParam(':batchID', $batchID);
            $updateStmt->execute();

            // Audit log for adding feedback
            // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
            // $action = "Added feedback a for Order #$batchID";
            // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

            // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
            // $auditStmt = $conn->prepare($auditSql);
            // $auditStmt->bindParam(':user_id', $user_id);
            // $auditStmt->bindParam(':action', $action);
            // $auditStmt->bindParam(':time_out', $time_out);
            // $auditStmt->execute();
        }

        // Close the database connection
        $conn = null;

        // Redirect back to the previous page after saving feedback
        header("Location: /master/po/transactionHistory", true, 303);
    } catch (PDOException $e) {
        // Handle PDO exceptions
        echo "Error: " . $e->getMessage();
    }
});


Router::post('/edit/editsupplier', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Update supplier information
    $supplierID = $_POST['supplierID'];
    $supplierName = $_POST['suppliername'];
    $contactName = $_POST['contactname'];
    $contactNum = $_POST['contactnum'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $location = $_POST['Address'];
    $estimatedDelivery = $_POST['estimated-delivery-date'];
    $shippingfee = $_POST['shipping-fee'];
    $workingdays = $_POST['working-days'];

    $stmt_supplier = $conn->prepare("UPDATE suppliers SET Supplier_Name = :supplierName, Contact_Name = :contactName, Contact_Number = :contactNum, Email = :email, Status = :status, Address = :location, Estimated_Delivery = :estimatedDelivery, Shipping_Fee = :shippingfee, Working_days = :workingdays WHERE Supplier_ID = :supplierID");
    $stmt_supplier->bindParam(':supplierID', $supplierID);
    $stmt_supplier->bindParam(':supplierName', $supplierName);
    $stmt_supplier->bindParam(':contactName', $contactName);
    $stmt_supplier->bindParam(':contactNum', $contactNum);
    $stmt_supplier->bindParam(':email', $email);
    $stmt_supplier->bindParam(':status', $status);
    $stmt_supplier->bindParam(':location', $location);
    $stmt_supplier->bindParam(':estimatedDelivery', $estimatedDelivery);
    $stmt_supplier->bindParam(':shippingfee', $shippingfee);
    $stmt_supplier->bindParam(':workingdays', $workingdays);
    $stmt_supplier->execute();

    // Update Supplier name in the Products table
    $stmt_update_products_supplier = $conn->prepare("UPDATE products SET Supplier = :supplierName WHERE Supplier_ID = :supplierID");
    $stmt_update_products_supplier->bindParam(':supplierName', $supplierName);
    $stmt_update_products_supplier->bindParam(':supplierID', $supplierID);
    $stmt_update_products_supplier->execute();

    // Update product information
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'product_name_') !== false) {
            $productID = substr($key, strlen('product_name_'));
            $categoryKey = 'product_category_' . $productID;
            $priceKey = 'product_price_' . $productID;
            $retailpriceKey = 'supplier_price_' . $productID;
            $descriptionKey = 'product_description_' . $productID;
            $productWeightKey = 'product_weight_' . $productID;
            $availabilityKey = 'availability_' . $productID;
            $unitofmeasurement = 'unitofmeasurement_' . $productID;
            $taxrate = 'taxrate_' . $productID;

            // Update product information
            $productName = $_POST[$key];
            $category = $_POST[$categoryKey];
            $price = $_POST[$priceKey];
            $retailprice = $_POST[$retailpriceKey];
            $description = $_POST[$descriptionKey];
            $productWeight = $_POST[$productWeightKey];
            $availability = $_POST[$availabilityKey];
            $unitofmeasurement = $_POST[$unitofmeasurement];
            $taxrate = $_POST[$taxrate];


            $stmt_product = $conn->prepare("UPDATE products SET ProductName = :productName, Category = :category, Price = :price, Supplier_Price =:retailprice, Description = :description, ProductWeight = :productWeight, Availability = :availability, UnitOfMeasurement = :unitofmeasurement, TaxRate = :taxrate WHERE ProductID = :productID");
            $stmt_product->bindParam(':productName', $productName);
            $stmt_product->bindParam(':category', $category);
            $stmt_product->bindParam(':price', $price);
            $stmt_product->bindParam(':retailprice', $retailprice);
            $stmt_product->bindParam(':description', $description);
            $stmt_product->bindParam(':productWeight', $productWeight);
            $stmt_product->bindParam(':availability', $availability);
            $stmt_product->bindParam(':productID', $productID);
            $stmt_product->bindParam(':unitofmeasurement', $unitofmeasurement);
            $stmt_product->bindParam(':taxrate', $taxrate);
            $stmt_product->execute();
        }
    }

    // Handle file uploads for product images
    foreach ($_FILES as $key => $file) {
        if (strpos($key, 'product_image_') !== false) {
            $productID = substr($key, strlen('product_image_'));
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                // Update product image path in the database
                $stmt_product_image = $conn->prepare("UPDATE products SET ProductImage = :productImage WHERE ProductID = :productID");
                $stmt_product_image->bindParam(':productImage', $uploadFile);
                $stmt_product_image->bindParam(':productID', $productID);
                $stmt_product_image->execute();
            } else {
                echo "Failed to upload file.";
            }
        }
    }

    // Audit log for updating supplier and product information
    // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
    // $action = "Updated the Supplier Information and Products on Supplier: $supplierName";
    // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

    // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
    // $auditStmt = $conn->prepare($auditSql);
    // $auditStmt->bindParam(':user_id', $user_id);
    // $auditStmt->bindParam(':action', $action);
    // $auditStmt->bindParam(':time_out', $time_out);
    // $auditStmt->execute();

    // Redirect back to the page
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/po/editsupplier/Supplier=$supplierID");
});

// Function to delete the supplier
Router::post('/delete/supplier', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Retrieve supplier ID from the POST data
    $supplierID = $_POST['supplier_id'];

    // Retrieve the supplier name before deleting
    $stmt_supplier_name = $conn->prepare("SELECT Supplier_Name FROM suppliers WHERE Supplier_ID = :supplierID");
    $stmt_supplier_name->bindParam(':supplierID', $supplierID);
    $stmt_supplier_name->execute();
    $supplierName = $stmt_supplier_name->fetchColumn();

    // Prepare and execute the SQL statement to delete the supplier
    $stmt = $conn->prepare("DELETE FROM suppliers WHERE Supplier_ID = :supplierID");
    $stmt->bindParam(':supplierID', $supplierID);
    $stmt->execute();

    // Optionally, you can also delete related products, if needed
    $stmt_products = $conn->prepare("DELETE FROM products WHERE Supplier_ID = :supplierID");
    $stmt_products->bindParam(':supplierID', $supplierID);
    $stmt_products->execute();

    // Audit log for updating supplier and product information
    // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
    // $action = "Deleted Supplier: $supplierName";
    // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

    // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
    // $auditStmt = $conn->prepare($auditSql);
    // $auditStmt->bindParam(':user_id', $user_id);
    // $auditStmt->bindParam(':action', $action);
    // $auditStmt->bindParam(':time_out', $time_out);
    // $auditStmt->execute();

    // Redirect back to a specific page after deletion
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/po/suppliers");
});



// Function to get product details
// function getProductDetails($productID, $conn)
// {
//     try {
//         // Prepare the SQL statement to fetch product details including the image path
//         $query = "SELECT * FROM products WHERE Product_ID = :product_id";
//         $statement = $conn->prepare($query);
//         $statement->bindParam(':product_id', $productID);
//         $statement->execute();

//         // Fetch the product details
//         $result = $statement->fetch(PDO::FETCH_ASSOC);

//         // Check if a result is returned
//         if ($result) {
//             return $result; // Return an associative array containing all product details
//         } else {
//             return false; // Return false if no result found
//         }
//     } catch (PDOException $e) {
//         // Handle the exception
//         echo "Error: " . $e->getMessage();
//         return false; // Return false in case of an error
//     }
// }


// // Function to update request status to 'Ok' this code is for the finance team
// function updateRequestStatusToOk()
// {
//     try {
//         $db = Database::getInstance();
//         $conn = $db->connect();

//         // Begin a transaction
//         $conn->beginTransaction();

//         // Update the request status in the requests table
//         $query = "UPDATE requests SET request_Status = 'Ready to order' WHERE request_Status = 'pending'";
//         $statement = $conn->prepare($query);
//         $statement->execute();

//         // Commit the transaction
//         $conn->commit();

//         echo "All pending requests have been updated to 'Ok' status.";
//         $rootFolder = dirname($_SERVER['PHP_SELF']);
//         header("Location: $rootFolder/po/requestOrder");

//     } catch (PDOException $e) {
//         // Rollback the transaction in case of error
//         $conn->rollBack();
//         echo "Error: " . $e->getMessage();
//     }
// }

// // Route to handle the update request status action
// Router::post('/accept/requestOrder', function () {
//     // Call the function to update request status
//     updateRequestStatusToOk();
// });




// //function to change the "pending" status of requested orders to "accepted" and it will insert on the
// //orders_details table while also having a data in the requests tables to use it as a request history
// function updateRequestStatusToAccepted()
// {
//     try {
//         $db = Database::getInstance();
//         $conn = $db->connect();

//         // Begin a transaction
//         $conn->beginTransaction();

//         // Retrieve pending requests
//         $pendingRequestsStmt = $conn->prepare("SELECT * FROM requests WHERE request_Status = 'Ready to order'");
//         $pendingRequestsStmt->execute();
//         $pendingRequests = $pendingRequestsStmt->fetchAll(PDO::FETCH_ASSOC);

//         // Prepare the SQL statement to insert into order_details
//         $insertStmt = $conn->prepare("INSERT INTO order_details (Request_ID, Product_ID, Category_ID, Supplier_ID, Order_Status) VALUES (:requestID, :productID, :categoryID, :supplierID, 'to receive')");

//         // Loop through each pending request and insert into order_details
//         foreach ($pendingRequests as $request) {
//             $requestID = $request['Request_ID'];
//             $productID = $request['Product_ID'];

//             // Retrieve Category_ID and Supplier_ID from products table
//             $productStmt = $conn->prepare("SELECT Category_ID, Supplier_ID FROM products WHERE ProductID = :productID");
//             $productStmt->bindParam(':productID', $productID);
//             $productStmt->execute();
//             $product = $productStmt->fetch(PDO::FETCH_ASSOC);
//             $categoryID = $product['Category_ID'];
//             $supplierID = $product['Supplier_ID'];

//             // Bind parameters and execute the insert statement
//             $insertStmt->bindParam(':requestID', $requestID);
//             $insertStmt->bindParam(':productID', $productID);
//             $insertStmt->bindParam(':categoryID', $categoryID);
//             $insertStmt->bindParam(':supplierID', $supplierID);
//             $insertStmt->execute();
//         }

//         // Commit the transaction
//         $conn->commit();

//         // Update the request status to 'accepted' after inserting into order_details
//         $updateStmt = $conn->prepare("UPDATE requests SET request_Status = 'accepted' WHERE request_Status = 'Ready to order'");
//         $updateStmt->execute();

//         echo "Request status updated to 'accepted' for all pending requests.";

//         $rootFolder = dirname($_SERVER['PHP_SELF']);
//         header("Location: $rootFolder/po/requestOrder");
//         exit(); // Stop script execution after redirection

//     } catch (PDOException $e) {
//         // Rollback the transaction in case of error
//         $conn->rollBack();
//         echo "Error: " . $e->getMessage();
//     }
// }



// // Route to handle the update request status action
// Router::post('/update/requestOrder', function () {
//     // Call the function to update request status
//     updateRequestStatusToAccepted();
// });



// Route to handle the update order status action
Router::post('/complete/orderDetail', function () {
    // Call the function to update order status
    updateOrderStatusToCompleted();
});

// Function to set the order status to complete and add data in the transaction history
function updateOrderStatusToCompleted()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        if (isset($_POST['Batch_ID'])) {
            $batchID = $_POST['Batch_ID'];

            // Begin a transaction
            $conn->beginTransaction();

            // Update the order status in the batch_orders table
            $stmt = $conn->prepare("UPDATE batch_orders SET Order_Status = CONCAT('Completed', IF(Order_Status LIKE 'to receive + Delayed', ' + Delayed', '')) WHERE Batch_ID = :batchID AND Order_Status LIKE 'to receive%'");
            $stmt->bindParam(':batchID', $batchID);
            $stmt->execute();

            // Fetch supplier ID and order status from the batch_orders table based on Batch_ID
            $orderDetailsStmt = $conn->prepare("SELECT Supplier_ID, Order_Status FROM batch_orders WHERE Batch_ID = :batchID");
            $orderDetailsStmt->bindParam(':batchID', $batchID);
            $orderDetailsStmt->execute();
            $orderDetails = $orderDetailsStmt->fetch(PDO::FETCH_ASSOC);
            $supplierID = $orderDetails['Supplier_ID'];
            $orderStatus = $orderDetails['Order_Status'];

            // Insert data into transaction_history table
            $insertStmt = $conn->prepare("INSERT INTO transaction_history (Batch_ID, Supplier_ID, Order_Status) VALUES (:batchID, :supplierID, :orderStatus)");
            $insertStmt->bindParam(':batchID', $batchID);
            $insertStmt->bindParam(':supplierID', $supplierID);
            $insertStmt->bindParam(':orderStatus', $orderStatus);
            $insertStmt->execute();

            // Fetch Product_ID and Product_Quantity from order_details table based on Batch_ID
            $orderDetailsStmt = $conn->prepare("SELECT Product_ID, Product_Quantity FROM order_details WHERE Batch_ID = :batchID");
            $orderDetailsStmt->bindParam(':batchID', $batchID);
            $orderDetailsStmt->execute();
            $orderDetails = $orderDetailsStmt->fetchAll(PDO::FETCH_ASSOC);

            // Update the Stocks column in the Products table
            foreach ($orderDetails as $detail) {
                $productID = $detail['Product_ID'];
                $productQuantity = $detail['Product_Quantity'];

                // Fetch current stock
                $stockStmt = $conn->prepare("SELECT Stocks FROM Products WHERE ProductID = :productID");
                $stockStmt->bindParam(':productID', $productID);
                $stockStmt->execute();
                $currentStock = $stockStmt->fetchColumn();

                // Update stock
                $newStock = $currentStock + $productQuantity;
                $updateStockStmt = $conn->prepare("UPDATE Products SET Stocks = :newStock WHERE ProductID = :productID");
                $updateStockStmt->bindParam(':newStock', $newStock);
                $updateStockStmt->bindParam(':productID', $productID);
                $updateStockStmt->execute();
            }

            // Commit the transaction
            $conn->commit();

            echo "Order status updated to 'Completed' for Order ID: $batchID";

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







// Route to handle the cancel order status action
Router::post('/cancel/orderDetail', function () {
    // Call the function to cancel order status
    updateOrderStatusToCancel();
});

function updateOrderStatusToCancel()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        if (isset($_POST['Batch_ID'])) {
            $batchID = $_POST['Batch_ID'];

            // Begin a transaction
            $conn->beginTransaction();

            // Update the order status in the batch_orders table
            $stmt = $conn->prepare("UPDATE batch_orders SET Order_Status = CONCAT('Cancelled', IF(Order_Status LIKE 'to receive + Delayed', ' + Delayed', '')) WHERE Batch_ID = :batchID AND Order_Status LIKE 'to receive%'");
            $stmt->bindParam(':batchID', $batchID);
            $stmt->execute();

            // Fetch supplier ID and order status from the batch_orders table based on Batch_ID
            $orderDetailsStmt = $conn->prepare("SELECT Supplier_ID, Order_Status, Funds_Transact_ID FROM batch_orders WHERE Batch_ID = :batchID");
            $orderDetailsStmt->bindParam(':batchID', $batchID);
            $orderDetailsStmt->execute();
            $orderDetails = $orderDetailsStmt->fetch(PDO::FETCH_ASSOC);
            $supplierID = $orderDetails['Supplier_ID'];
            $orderStatus = $orderDetails['Order_Status'];
            $fundsID = $orderDetails['Funds_Transact_ID'];

            cancelOrder($fundsID);

            // Insert data into transaction_history table
            $insertStmt = $conn->prepare("INSERT INTO transaction_history (Batch_ID, Supplier_ID, Order_Status) VALUES (:batchID, :supplierID, :orderStatus)");
            $insertStmt->bindParam(':batchID', $batchID);
            $insertStmt->bindParam(':supplierID', $supplierID);
            $insertStmt->bindParam(':orderStatus', $orderStatus);
            $insertStmt->execute();

            // Audit log for cancelling an order
            // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
            // $action = "Cancelled Order #$batchID";
            // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

            // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
            // $auditStmt = $conn->prepare($auditSql);
            // $auditStmt->bindParam(':user_id', $user_id);
            // $auditStmt->bindParam(':action', $action);
            // $auditStmt->bindParam(':time_out', $time_out);
            // $auditStmt->execute();

            // Commit the transaction
            $conn->commit();

            echo "Order status updated to 'Cancelled' for Order ID: $batchID";

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

// Route to handle the delay order status action
Router::post('/delay/orderDetail', function () {
    // Call the function to delay order status
    updateOrderStatusToDelay();
});

function updateOrderStatusToDelay()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        if (isset($_POST['Batch_ID'])) {
            $batchID = $_POST['Batch_ID'];

            // Begin a transaction
            $conn->beginTransaction();

            // Fetch current order status from the batch_orders table based on Batch_ID
            $currentOrderStatusStmt = $conn->prepare("SELECT Order_Status FROM batch_orders WHERE Batch_ID = :batchID");
            $currentOrderStatusStmt->bindParam(':batchID', $batchID);
            $currentOrderStatusStmt->execute();
            $currentOrderStatus = $currentOrderStatusStmt->fetchColumn();

            // New order status will be the concatenation of the current status and "Delayed"
            $newOrderStatus = $currentOrderStatus . " + Delayed";

            // Update the order status in the batch_orders table
            $stmt = $conn->prepare("UPDATE batch_orders SET Order_Status = :newOrderStatus WHERE Batch_ID = :batchID");
            $stmt->bindParam(':newOrderStatus', $newOrderStatus);
            $stmt->bindParam(':batchID', $batchID);
            $stmt->execute();

            // Fetch supplier ID and order status from the batch_orders table based on Batch_ID
            // $orderDetailsStmt = $conn->prepare("SELECT Supplier_ID, Order_Status FROM batch_orders WHERE Batch_ID = :batchID");
            // $orderDetailsStmt->bindParam(':batchID', $batchID);
            // $orderDetailsStmt->execute();
            // $orderDetails = $orderDetailsStmt->fetch(PDO::FETCH_ASSOC);
            // $supplierID = $orderDetails['Supplier_ID'];
            // $orderStatus = $orderDetails['Order_Status'];

            // Insert data into transaction_history table
            // $insertStmt = $conn->prepare("INSERT INTO transaction_history (Batch_ID, Supplier_ID, Order_Status) VALUES (:batchID, :supplierID, :orderStatus)");
            // $insertStmt->bindParam(':batchID', $batchID);
            // $insertStmt->bindParam(':supplierID', $supplierID);
            // $insertStmt->bindParam(':orderStatus', $orderStatus);
            // $insertStmt->execute();

            // Audit log for delaying an order
            // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
            // $action = "Delayed Order #$batchID";
            // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

            // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
            // $auditStmt = $conn->prepare($auditSql);
            // $auditStmt->bindParam(':user_id', $user_id);
            // $auditStmt->bindParam(':action', $action);
            // $auditStmt->bindParam(':time_out', $time_out);
            // $auditStmt->execute();

            // Commit the transaction
            $conn->commit();

            echo "Order status updated to '$newOrderStatus' for Order ID: $batchID";

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


Router::post('/delete/product', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Get the product ID and supplier ID to delete
    $productID = $_POST['product_id'];
    $supplierID = $_POST['supplier_id'];

    // Fetch the supplier name based on the supplier ID
    $stmt_supplier_name = $conn->prepare("SELECT Supplier_Name FROM suppliers WHERE Supplier_ID = :supplierID");
    $stmt_supplier_name->bindParam(':supplierID', $supplierID);
    $stmt_supplier_name->execute();
    $supplierName = $stmt_supplier_name->fetchColumn();

    // Prepare and execute the SQL statement to delete the product
    $stmt_delete_product = $conn->prepare("DELETE FROM products WHERE ProductID = :productID");
    $stmt_delete_product->bindParam(':productID', $productID);
    $stmt_delete_product->execute();

    // Audit log for cancelling an order
    // $user_id = $_SESSION['user']['username']; // Assuming you have a user session
    // $action = "Deleted a Product from Supplier: $supplierName";
    // $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

    // $auditSql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
    // $auditStmt = $conn->prepare($auditSql);
    // $auditStmt->bindParam(':user_id', $user_id);
    // $auditStmt->bindParam(':action', $action);
    // $auditStmt->bindParam(':time_out', $time_out);
    // $auditStmt->execute();

    // Redirect back to the page with the supplier ID
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/po/editsupplier/Supplier=$supplierID");
});

//function to just fetch the data in the requestHistory
// function fetchAllRequestsData()
// {
//     try {
//         // Connect to the database
//         $db = Database::getInstance();
//         $conn = $db->connect();

//         // Prepare SQL query to fetch all requests data
//         $sql = "SELECT r.*, od.*, p.ProductName, p.Price 
//                     FROM requests r
//                     INNER JOIN order_details od ON r.Request_ID = od.Order_ID
//                     INNER JOIN products p ON od.Product_ID = p.ProductID
//                 WHERE r.Request_Status = 'accepted'
//                 ORDER BY r.Request_ID ASC"; // Order by Request_ID from lowest to highest

//         // Prepare the SQL statement
//         $stmt = $conn->prepare($sql);

//         // Execute the statement
//         $stmt->execute();

//         // Fetch all rows as an associative array
//         $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         return $requests;

//     } catch (PDOException $e) {
//         // Handle database errors
//         echo "Error: " . $e->getMessage();
//         return []; // Set requests to an empty array in case of error
//     }
// }


// // Function to search requests by date
// function searchByDate()
// {
//     try {
//         // Connect to the database
//         $db = Database::getInstance();
//         $conn = $db->connect();

//         if (isset($_POST['searchDate'])) {
//             $searchDate = $_POST['searchDate'];

//             // Prepare SQL query to fetch requests data based on the search date
//             $sql = "SELECT r.*, od.*, p.ProductName, p.Price 
//                     FROM requests r
//                     INNER JOIN order_details od ON r.Request_ID = od.Order_ID
//                     INNER JOIN products p ON od.Product_ID = p.ProductID
//                     WHERE DATE(od.Date_Ordered) = :searchDate AND r.Request_Status = 'accepted'
//                     ORDER BY r.Request_ID ASC"; // Order by Request_ID from lowest to highest

//             // Prepare the SQL statement
//             $stmt = $conn->prepare($sql);

//             // Bind parameters
//             $stmt->bindParam(':searchDate', $searchDate);

//             // Execute the statement
//             $stmt->execute();

//             // Fetch all rows as an associative array
//             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//             // Return the fetched data
//             return $result;
//         }
//     } catch (PDOException $e) {
//         // Handle database errors
//         echo "Error: " . $e->getMessage();
//         return []; // Return an empty array in case of error
//     }
// }
// // Route to handle the search request
// Router::post('/search/requestHistory', function () {
//     // Call the function to search requests by date
//     $searchedRequests = searchByDate();

//     // Include the requestHistory.php file to display the search results
//     include 'views/po.requestHistory.php';
// });

Router::post('/request/insert', function () {

    // Get the database connection instance
    $db = Database::getInstance();
    $conn = $db->connect();

    // Get the submitted data
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];

    // Define the root folder for redirection
    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($quantity) || empty($productID)) {
        // Redirect to the form page if the quantity or product ID is empty
        header("Location: $rootFolder/po/requestOrder");
        return;
    }

    try {
        // Insert the request into the requests table
        $query = "INSERT INTO requests (product_ID, quantity) VALUES (:productID, :quantity)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':productID', $productID);
        $statement->bindParam(':quantity', $quantity);
        $statement->execute();

        // Redirect after successful insertion
        header("Location: $rootFolder/po/requestOrder");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
});

