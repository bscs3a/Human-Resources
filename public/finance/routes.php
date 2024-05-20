<?php

require_once "public/finance/functions/reportGeneration/TrialBalance.php";
require_once "public/finance/functions/pondo/requestExpense.php";
require_once "public/finance/functions/specialTransactions/payable.php";
require_once "public/finance/functions/generalFunctions.php";

require_once "public/finance/functions/pondo/generalPondo.php";
require_once "public/finance/functions/pondo/insertPondo.php";




$path = './public/finance/views';

$basePath = "$path/fin.";

$fin = [
    //dashboard
    '/fin/dashboard' => $basePath . "dashboard.php",
    '/fin/logs' => $basePath . "auditLog.php",

    //ledger
    // '/fin/ledger' => $basePath . "ledger.gen.php",
    '/fin/ledger/page={pageNumber}' => function ($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "ledger.gen.php";
    },
    '/fin/ledger/accounts/investors' => $basePath . "ledger.investors.php",
    '/fin/ledger/accounts/payable' => $basePath . "ledger.payable.php",


    //request
    '/fin/expense' => $basePath . "requestExpense.php",
    '/fin/request' => $basePath . "requestInventory.php",
    '/fin/salary' => $basePath . "requestSalary.php",

    //funds
    '/fin/funds/HR' => $basePath . "funds.HR.php",
    '/fin/funds/PO' => $basePath . "funds.PO.php",
    '/fin/funds/Sales' => $basePath . "funds.sales.php",
    '/fin/funds/Inventory' => $basePath . "funds.inventory.php",
    '/fin/funds/Delivery' => $basePath . "funds.delivery.php",
    '/fin/funds/finance' => $basePath . "funds.finance.php",

    '/fin/test' => $basePath . "test.php",

    '/fin/test/id={id}' => function ($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "test2.php";
    },

    // functions
    // can't recognize by the router logout can proceed
    '/fin/logout' => "./public/finance/functions/logout.php",
    '/fin/report' => $path . "/reports/generateReport.php",
];

Router::post('/test', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    // Input validation
    if (!isset ($_POST['date'], $_POST['description'], $_POST['amount'], $_POST['debit'], $_POST['credit'])) {
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
    function getLedgerNumber($conn, $ledgerName)
    {
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
    header("Location: $rootFolder/fin/ledger/page=1");
});

Router::post('/reportGeneration', function () {
    $_SESSION['postdata'] = $_POST;
    list ($_SESSION['postdata']['year'], $_SESSION['postdata']['month']) = explode("-", $_SESSION['postdata']['monthYear']);
    header('Location: Master/fin/report');
    exit;
});

Router::post('/addPayable', function () {
    addPayable($_POST['name'], $_POST['contact'], $_POST['contactName']);
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger/accounts/payable");
});

Router::post('/addInvestor', function () {
    addInvestor($_POST['name'], $_POST['contact'], $_POST['contactName']);
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger/accounts/investors");
});

//does not seem to work or execute at all idk why

Router::post('/addToLoan', function () {
   
    
    // $datetime = DateTime::createFromFormat('F d, Y', $_POST['date']);
    $details = isset($_POST['description']) ? $_POST['description'] : null;
    $amount = intval($_POST['amount']);
    $ledgerNo = ($_POST['ledgerNo']);
    $ledgerNo_Dr = ($_POST['ledgerName']);
    // $datetime = $datetime->format('Y-m-d H:i:s');

    // borrowAsset($ledgerNo, $ledgerNo_Dr, $amount);
  
  
    $db = Database::getInstance();
    $conn = $db->connect();

    
    $sql = "SELECT ledgerno FROM ledger WHERE ledgerno = ? OR name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ledgerNo_Dr, $ledgerNo_Dr]);
    $ledgerName = $stmt->fetchColumn();

    $sql = "INSERT INTO ledgertransaction (LedgerNo, details, amount, LedgerNo_Dr) VALUES (:modalId, :details, :amount, :ledgerNo_Dr)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':modalId', $ledgerNo);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':ledgerNo_Dr', $ledgerName);
    // $stmt->bindParam(':DateTime', $datetime);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return;
    }

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger/accounts/payable");
});

Router::post('/inveees', function () {
   
    
    // $datetime = DateTime::createFromFormat('F d, Y', $_POST['date']);
    $details = isset($_POST['description']) ? $_POST['description'] : null;
    $amount = intval($_POST['amount']);
    $ledgerNo = ($_POST['ledgerNo']);
    $ledgerNo_Dr = ($_POST['ledgerName']);
    // $datetime = $datetime->format('Y-m-d H:i:s');

    // borrowAsset($ledgerNo, $ledgerNo_Dr, $amount);
  
  
    $db = Database::getInstance();
    $conn = $db->connect();

    
    $sql = "SELECT ledgerno FROM ledger WHERE ledgerno = ? OR name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ledgerNo_Dr, $ledgerNo_Dr]);
    $ledgerName = $stmt->fetchColumn();

    $sql = "INSERT INTO ledgertransaction (LedgerNo, details, amount, LedgerNo_Dr) VALUES (:modalId, :details, :amount, :ledgerNo_Dr)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':modalId', $ledgerNo);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':ledgerNo_Dr', $ledgerName);
    // $stmt->bindParam(':DateTime', $datetime);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return;
    }

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger/accounts/investors");
});



Router::post('/fin/getEquityReport', function (){
    $year = date('Y');
    $month = date('m');

    $return = [];
    $return["owners"] = getAllLedgerAccounts("Capital Accounts");
    foreach ($return["owners"] as $key => $owner) {
        $return["owners"][$key]["dividedShare"] = calculateShare($owner["ledgerno"], $year, $month);
    }

    header('Content-Type: application/json');
    echo json_encode($return);
});

Router::post('/fin/getBalanceReport', function(){
    $return = [];
    $assetValue = getTotalOfGroupV2("Asset");
    $liabilityValue = getTotalOfAccountTypeV2("Accounts Payable");
    $liabilityValue += getTotalOfAccountTypeV2("Tax Payable");

    $return["asset"] = $assetValue/($assetValue + $liabilityValue);
    $return["liability"] = $liabilityValue/($assetValue + $liabilityValue);

    header('Content-Type: application/json');
    echo json_encode($return);
});

Router::post('/fin/updateRequestExpense', function(){
    $id = $_POST['id'];
    $decision = $_POST['decision'];
    updateRequest($id, $decision);
    if($decision === "confirm"){
        $amount = $_POST['amount'];
        $debit = $_POST['debit'];
        $credit = $_POST['credit'];
        $description = $_POST['description'];
        insertLedgerXact($debit,$credit,$amount,$description);
    }
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/expense");
});

Router::post('/fin/getCashFlowReport', function(){
    $return = [];
    
    $currentYear = date('Y');
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
    } else {
        $year = $currentYear;
    }
    $month = 12;
    if($year >= $currentYear){
        $year = $currentYear;
        $month = date('m');
    }
    for($i = 1; $i <= $month; $i++){
        $return[$i] = getAccountBalance("Cash on Hand",true,$year, $i) + getAccountBalance("Cash on Bank",true,$year,$i);
    }
    header('Content-Type: application/json');
    echo json_encode($return);
});



Router::post("/pondo/transaction", function () {
    $debitLedger = $_POST['payFor'];
    $creditLedger = $_POST['payUsing'];
    $amount = $_POST['amount'];
    addTransactionPondo($debitLedger, $creditLedger, $amount);

    header("Location: " . $_SERVER['HTTP_REFERER']);
});