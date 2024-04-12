<?php

$_SESSION['user'] = 'admin';
$_SESSION['role'] = 'admin';
$_SESSION['employee_name'] = "Alfaro, Aian Louise";

$path = './public/sales/views';
$basePath = "$path/sls.";

$sls = [
    '/sls/Dashboard' => $basePath . "Dashboard.php",
    '/sls/Product-Catalog' => $basePath . "ProductCatalog.php",
    '/sls/Transaction-History' => $basePath . "transactionHistory.php",
    '/sls/Transaction-Details' => $basePath . "transactionDetails.php",
    '/sls/POS' => $basePath . "POS.php",
    '/sls/TEST' => $basePath . "TEST.php",
    '/sls/POS/Checkout' => $basePath . "checkout.php",
    '/sls/POS/Receipt' => $basePath . "Receipt.php",
    '/sls/Audit-Trail' => $basePath . "AuditTrail.php",
    '/sls/Revenue' => $basePath . "Revenue.php",
    '/sls/Returns' => $basePath . "ReturnTable.php",
    '/sls/Sales-Management' => $basePath . "SalesManagement.php",
    '/sls/ReturnProduct' => $basePath . "ReturnProduct.php",
    '/sls/ReturnDetails' => $basePath . "ReturnDetails.php",
    // ... other routes ...

    '/sls/Transaction-Details/sale={saleId}' => function ($saleId) use ($basePath) {
        $_GET['sale'] = $saleId;
        include $basePath . "transactionDetails.php";
    },

    '/sls/ReturnProduct/sale={saleId}/saledetails={saledetailsId}/product={productId}' => function ($saleId, $saledetailsId, $productId) use ($basePath) {
        $_GET['sale'] = $saleId;
        $_GET['saledetails'] = $saledetailsId;
        $_GET['product'] = $productId;
        include $basePath . "ReturnProduct.php";
    },

    // '/sls/ReturnDetails/returnID={returnId}' => function ($returnID) use ($basePath) {
    //     $_GET['returnID'] = $returnID;
    //     include $basePath . "ReturnDetails.php";
    // },

    '/sls/ReturnDetails/returnID={returnID}' => function ($returnID) use ($basePath) {
        $_GET['returnID'] = $returnID;
        include $basePath . "ReturnDetails.php";
    },

    // functions
    // can't recognize by the router logout can proceed
    '/sls/logout' => "./public/sales/views/function/logout.php",
];

// // Get the current URL path
// $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// // Loop through all routes
// foreach ($sls as $route => $action) {
//     // Check if the start of the URL path matches the route
//     if (strpos($urlPath, $route) === 0) {
//         // Get the sale ID from the URL path
//         $saleId = substr($urlPath, strlen($route));

//         // Execute the action for the route
//         $action($saleId);

//         // Stop the loop
//         break;
//     }
// }


// START: Add Sales
class Customer
{
    public function create($firstName, $lastName, $phone, $email)
    {
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO Customers (FirstName, LastName, Phone, Email) VALUES (:firstName, :lastName, :phone, :email)");
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $conn->lastInsertId();
    }
}

class Sale
{
    public function create($saleDate, $salePreference, $paymentMode, $totalAmount, $employeeId, $customerId, $cardNumber, $expiryDate, $cvv, $shippingFee)
    {
        $db = Database::getInstance();
        $conn = $db->connect();

        // Add the shippingFee to the totalAmount
        $totalAmount += $shippingFee;

        $stmt = $conn->prepare("INSERT INTO Sales (SaleDate, SalePreference, PaymentMode, TotalAmount, CustomerID, CardNumber, ExpiryDate, CVV, ShippingFee) VALUES (:saleDate, :salePreference, :paymentMode, :totalAmount, :customerId, :cardNumber, :expiryDate, :cvv, :shippingFee)");
        $stmt->bindParam(':saleDate', $saleDate);
        $stmt->bindParam(':salePreference', $salePreference);
        $stmt->bindParam(':paymentMode', $paymentMode);
        $stmt->bindParam(':totalAmount', $totalAmount);
        $stmt->bindParam(':customerId', $customerId);
        $stmt->bindParam(':cardNumber', $cardNumber);
        $stmt->bindParam(':expiryDate', $expiryDate);
        $stmt->bindParam(':cvv', $cvv);
        $stmt->bindParam(':shippingFee', $shippingFee);
        $stmt->execute();

        return $conn->lastInsertId();
    }
}

class SaleDetail
{
    public function create($saleId, $productId, $quantity, $unitPrice, $subtotal, $tax, $totalAmount, $productWeight)
    {
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO SaleDetails (SaleID, ProductID, Quantity, UnitPrice, Subtotal, Tax, TotalAmount, ProductWeight) VALUES (:saleId, :productId, :quantity, :unitPrice, :subtotal, :tax, :totalAmount, :productWeight)");
        $stmt->bindParam(':saleId', $saleId);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':unitPrice', $unitPrice);
        $stmt->bindParam(':subtotal', $subtotal);
        $stmt->bindParam(':tax', $tax);
        $stmt->bindParam(':totalAmount', $totalAmount);
        $stmt->bindParam(':productWeight', $productWeight);
        $stmt->execute();
    }
}
class DeliveryOrder
{
    public function create($saleId, $productId, $quantity, $province, $municipality, $streetBarangayAddress, $deliveryDate, $productWeight)
    {
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO DeliveryOrders (SaleID, ProductID, Quantity, Province, Municipality, StreetBarangayAddress, DeliveryDate, DeliveryStatus, ProductWeight) VALUES (:saleId, :productId, :quantity, :province, :municipality, :streetBarangayAddress, :deliveryDate, 'Pending', :productWeight)");
        $stmt->bindParam(':saleId', $saleId);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':municipality', $municipality);
        $stmt->bindParam(':streetBarangayAddress', $streetBarangayAddress);
        $stmt->bindParam(':deliveryDate', $deliveryDate);
        $stmt->bindParam(':productWeight', $productWeight);
        $stmt->execute();
    }
}


class Product
{
    public function decreaseQuantity($productId, $quantity)
    {
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("UPDATE Products SET Stocks = Stocks - :quantity WHERE ProductID = :productId");
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
    }

    public function getWeight($productId)
    {
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT ProductWeight FROM Products WHERE ProductID = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['ProductWeight'];
    }
}

Router::post('/addSales', function () {
    $customer = new Customer();
    $customerId = $customer->create($_POST['customerFirstName'], $_POST['customerLastName'], $_POST['customerPhone'], $_POST['customerEmail']);

    date_default_timezone_set('Asia/Manila');
    $sale = new Sale();
    $saleId = $sale->create(date('Y-m-d H:i:s'), $_POST['SalePreference'], $_POST['payment-mode'], $_POST['totalAmount'], '1', $customerId, $_POST['cardNumber'], $_POST['expiryDate'], $_POST['cvv'], $_POST['shippingFee']);

    $saleDetail = new SaleDetail();
    $deliveryOrder = new DeliveryOrder();
    $product = new Product();
    $cart = json_decode($_POST['cartData'], true);
    foreach ($cart as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $tax = $item['price'] * $item['TaxRate'];
        $totalAmount = ($item['price'] + $tax) * $item['quantity'];

        $productWeight = $product->getWeight($item['id']);
        $totalProductWeight = $productWeight * $item['quantity'];  // Calculate total weight of each product purchased
        $saleDetail->create($saleId, $item['id'], $item['quantity'], $item['price'], $subtotal, $tax, $totalAmount, $totalProductWeight);

        $product->decreaseQuantity($item['id'], $item['quantity']); // Decrease product quantity
        if ($_POST['SalePreference'] === 'delivery') {
            $deliveryOrder->create($saleId, $item['id'], $item['quantity'], $_POST['province'], $_POST['municipality'], $_POST['streetBarangayAddress'], $_POST['deliveryDate'], $totalProductWeight);
        }
    }

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/sls/POS/Receipt");
});
// END: Add Sales

Router::post('/AddTarget', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $monthYear = $_POST['month_year'] . '-01';  // Append '-01' to make it a valid date
    $targetSales = $_POST['target_sales'];

    $stmt = $conn->prepare("INSERT INTO TargetSales (MonthYear, TargetAmount) VALUES (:monthYear, :targetSales)");
    $stmt->bindParam(':monthYear', $monthYear);
    $stmt->bindParam(':targetSales', $targetSales);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/sls/Sales-Management");
});

Router::post('/returnProduct', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $saleId = $_POST['sale'];
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    $paymentReturned = $_POST['payment_returned'];
    $productStatus = $_POST['product_status']; // Get the product status from the form data

    $stmt = $conn->prepare("INSERT INTO ReturnProducts (SaleID, ProductID, Quantity, Reason, PaymentReturned, ProductStatus) VALUES (:saleId, :productId, :quantity, :reason, :paymentReturned, :productStatus)");
    $stmt->bindParam(':saleId', $saleId);
    $stmt->bindParam(':productId', $productId);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':paymentReturned', $paymentReturned);
    $stmt->bindParam(':productStatus', $productStatus); // Bind the product status parameter

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/sls/Returns");
});

Router::post('/remove', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("DELETE FROM name WHERE name = :name");
    $stmt->bindParam(':name', $name);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/test");
});
