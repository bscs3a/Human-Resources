<?php

$_SESSION['user'] = 'admin';
$_SESSION['role'] = 'admin';
$_SESSION['fullname'] = "Tagle, Aries";

$path = './public/finance/views';

$basePath = "$path/fin.";

$fin = [
    //dashboard
    '/fin/dashboard' => $basePath . "dashboard.php",

    //reports
    '/fin/reportIncome' => $basePath . "reportIncome.php",
    '/fin/reportCash' => $basePath . "reportCash.php",
    '/fin/reportEquity' => $basePath . "reportEquity.php",
    '/fin/reportBalance' => $basePath . "reportBalance.php",

    //ledger
    // '/fin/ledger' => $basePath . "ledger.gen.php",
    '/fin/ledger/page={pageNumber}' => function($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "ledger.gen.php";
    },
    '/fin/ledger/accounts/investors' => $basePath . "ledger.investors.php",
    '/fin/ledger/accounts/payable' => $basePath . "ledger.payable.php",

    //request
    '/fin/request' => $basePath . "requestInventory.php",
    '/fin/salary' => $basePath . "requestSalary.php",

    '/fin/test' => $basePath . "test.php",

    '/fin/test/id={id}' => function ($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "test2.php";
    },

    // functions
    // can't recognize by the router logout can proceed
    '/fin/logout' => "./public/finance/functions/logout.php",

];

Router::post('/test', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    // Input validation
    if (!isset($_POST['date'], $_POST['description'], $_POST['amount'], $_POST['debit'], $_POST['credit'])) {
        header("Location: $rootFolder/fin/ledger");
        echo "Missing input data.";
        return;
    }

    $datetime = DateTime::createFromFormat('F d, Y', $_POST['date']);
    $details = $_POST['description'];
    $amount = intval($_POST['amount']);
    $ledgerNo_Dr = ($_POST['debit']);
    $ledgerNo = ($_POST['credit']);
    $datetime = $datetime->format('Y-m-d H:i:s');

    // Function to get ledger number
    function getLedgerNumber($conn, $ledgerName) {
        $stmt = $conn->prepare("SELECT ledgerno FROM ledger WHERE name = :ledgername");
        $stmt->bindParam(':ledgername', $ledgerName);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Get ledger numbers
    $ledgerNo_Dr = getLedgerNumber($conn, $ledgerNo_Dr);
    $ledgerNo = getLedgerNumber($conn, $ledgerNo);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO ledgertransaction (DateTime, details, amount, LedgerNo_Dr, LedgerNo) VALUES (:datetime, :details, :amount, :ledgerNo_Dr, :ledgerNo)");
    $stmt->bindParam(':datetime', $datetime);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':ledgerNo_Dr', $ledgerNo_Dr);
    $stmt->bindParam(':ledgerNo', $ledgerNo);

    // Execute the statement and handle potential errors
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return;
    }

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger");
});




