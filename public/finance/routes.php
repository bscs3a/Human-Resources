<?php

require_once "public/finance/functions/reportGeneration/TrialBalance.php";
require_once "public/finance/functions/specialTransactions/investors.php";
require_once "public/finance/functions/specialTransactions/payable.php";
require_once "public/finance/functions/generalFunctions.php";

require_once "public/finance/functions/pondo/generalPondo.php";
require_once "public/finance/functions/pondo/insertPondo.php";



$path = './public/finance/views';

$basePath = "$path/fin.";

$fin = [
    //dashboard
    '/fin/dashboard' => $basePath . "dashboard.php",
    '/fin/logs/page={pageNumber}' => function ($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "audit_logs.php";
    },
    //ledger
    // '/fin/ledger' => $basePath . "ledger.gen.php",
    '/fin/ledger/page={pageNumber}' => function ($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "ledger.gen.php";
    },
    '/fin/ledger/accounts/investors' => $basePath . "ledger.investors.php",
    '/fin/ledger/accounts/payable' => $basePath . "ledger.payable.php",
    '/fin/ledger/accounts/taxPayable' => $basePath . "ledger.taxPayable.php",

    //funds
    '/fin/funds/HR/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.HR.php";
    },
    '/fin/funds/PO/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.PO.php";
    },
    '/fin/funds/Sales/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.sales.php";
    },
    '/fin/funds/Inventory/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.inventory.php";
    },
    '/fin/funds/Delivery/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.delivery.php";
    },
    '/fin/funds/finance/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.finance.php";
    },

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
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/report");
    exit;
});

// for accounts payable
Router::post('/addPayable', function () {
    addPayable($_POST['name'], $_POST['contact'], $_POST['contactName'], $_POST['acctype']);
    header("Location: " . $_SERVER['HTTP_REFERER']);
});


Router::post('/payPayable', function () {
    // credit-ledgerno is positive. debit-ledgerno_dr is negative in this account
    $amount = intval($_POST['amount']);
    $account = ($_POST['ledgerNo']);
    $item = ($_POST['ledgerName']);
    
    payPayable($account, $item, $amount);
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
});

Router::post('/borrowPayable', function () {
    // credit-ledgerno is positive. debit-ledgerno_dr is negative in this account
    $amount = intval($_POST['amount']);
    
    $account = ($_POST['ledgerNo']);
    $item = ($_POST['ledgerName']);
    
    borrowPayable($account, $item, $amount);
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
});

// for investors
Router::post('/addInvestor', function () {
    addInvestor($_POST['name'], $_POST['contact'], $_POST['contactName']);
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger/accounts/investors");
});

Router::post('/investAsset', function () {
    // credit-ledgerno is positive. debit-ledgerno_dr is negative in this account
     $amount = intval($_POST['amount']);
 
     $investingAccount = ($_POST['ledgerNo']);
     $item = ($_POST['ledgerName']);
     
    investAsset($investingAccount, $item, $amount);
 
     $rootFolder = dirname($_SERVER['PHP_SELF']);
     header("Location: $rootFolder/fin/ledger/accounts/investors");
 });

 Router::post('/withdrawAsset', function () {
    // credit-ledgerno is positive. debit-ledgerno_dr is negative in this account
     $amount = intval($_POST['amount']);
 
     $investingAccount = ($_POST['ledgerNo']);
     $item = ($_POST['ledgerName']);
     
    withdrawAsset($investingAccount, $item, $amount);
 
     $rootFolder = dirname($_SERVER['PHP_SELF']);
     header("Location: $rootFolder/fin/ledger/accounts/investors");
 });
// end

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

//chart Reports 
Router::post('/chartGeneration/getBalanceReport', function(){
    // Get the JSON data from the request
    $json = file_get_contents('php://input');

    // Convert the JSON data to an associative array
    $data = json_decode($json, true);

    // Now you can access the fromDate and toDate values like this:
    $fromDate = $data['fromDate'];
    $toDate = $data['toDate'];
    
    $fromYear = explode("-",$fromDate)[0];
    $fromMonth = explode("-",$fromDate)[1];
    $toYear = explode("-",$toDate)[0];
    $toMonth = explode("-",$toDate)[1];

    
    $return = [];
    $assetValue = getTotalOfGroupV3("Asset",$fromYear, $fromMonth, $toYear, $toMonth);
    $liabilityValue = getTotalOfAccountTypeV3("Accounts Payable",$fromYear, $fromMonth, $toYear, $toMonth);
    $liabilityValue += getTotalOfAccountTypeV3("Tax Payable",$fromYear, $fromMonth, $toYear, $toMonth);
    $total = $assetValue + $liabilityValue;

    if ($total == 0) {
        $total = 1;
        $return["asset"] = 0;
        $return["liability"] = 0;
    }
    else {
        $return["asset"] = $assetValue/($total);
        $return["liability"] = $liabilityValue/($total);
    }

    header('Content-Type: application/json');
    echo json_encode($return);
});

Router::post('/chartGeneration/getEquityReport', function (){
    // Get the JSON data from the request
    $json = file_get_contents('php://input');

    // Convert the JSON data to an associative array
    $data = json_decode($json, true);

    // Now you can access the fromDate and toDate values like this:
    $fromDate = $data['fromDate'];
    $toDate = $data['toDate'];
    
    $fromYear = explode("-",$fromDate)[0];
    $fromMonth = explode("-",$fromDate)[1];
    $toYear = explode("-",$toDate)[0];
    $toMonth = explode("-",$toDate)[1];


    $return = [];
    $return["owners"] = getAllLedgerAccounts("Capital Accounts");
    foreach ($return["owners"] as $key => $owner) {
        $return["owners"][$key]["dividedShare"] = calculateShareV2($owner["ledgerno"], $fromYear,$fromMonth,$toYear, $toMonth);
    }

    header('Content-Type: application/json');
    echo json_encode($return);
});

Router::post('/chartGeneration/getCashFlowReport', function(){
    // Get the JSON data from the request
    $json = file_get_contents('php://input');

    // Convert the JSON data to an associative array
    $data = json_decode($json, true);

    // Now you can access the fromDate and toDate values like this:
    $fromDate = $data['fromDate'];
    $toDate = $data['toDate'];
    
    $fromYear = explode("-",$fromDate)[0];
    $fromMonth = explode("-",$fromDate)[1];
    $toYear = explode("-",$toDate)[0];
    $toMonth = explode("-",$toDate)[1];

    $return = [];

    $currentYear = $fromYear;
    $currentMonth = $fromMonth;

    while ($currentYear < $toYear || ($currentYear == $toYear && $currentMonth <= $toMonth)) {
        $key = sprintf('%04d-%02d', $currentYear, $currentMonth);
        $return[$key] = getAccountBalance("Cash on Hand", true, $currentYear, $currentMonth) + getAccountBalance("Cash on Bank", true, $currentYear, $currentMonth);
        
        // Increment month and check if it's December
        if ($currentMonth == 12) {
            // If it's December, increment the year and reset the month to January
            $currentYear++;
            $currentMonth = 1;
        } else {
            // If it's not December, just increment the month
            $currentMonth++;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($return);
});

Router::post('/chartGeneration/getIncomeReport', function(){
    // Get the JSON data from the request
    $json = file_get_contents('php://input');

    // Convert the JSON data to an associative array
    $data = json_decode($json, true);

    // Now you can access the fromDate and toDate values like this:
    $fromDate = $data['fromDate'];
    $toDate = $data['toDate'];
    
    $fromYear = explode("-",$fromDate)[0];
    $fromMonth = explode("-",$fromDate)[1];
    $toYear = explode("-",$toDate)[0];
    $toMonth = explode("-",$toDate)[1];

    $return = [];

    $currentYear = $fromYear;
    $currentMonth = $fromMonth;

    while ($currentYear < $toYear || ($currentYear == $toYear && $currentMonth <= $toMonth)) {
        $key = sprintf('%04d-%02d', $currentYear, $currentMonth);
        $return[$key] = calculateNetSalesOrLoss($currentYear, $currentMonth);
        
        // Increment month and check if it's December
        if ($currentMonth == 12) {
            // If it's December, increment the year and reset the month to January
            $currentYear++;
            $currentMonth = 1;
        }    {
            // If it's not December, just increment the month
            $currentMonth++;
        }
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


Router::post("/chartGenerator", function () {
    // Get the image data from the request
    $data = json_decode(file_get_contents('php://input'), true);
    $imageData = $data['imageData'];

    // Remove the data URL prefix
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    // Decode the image data
    $imageData = base64_decode($imageData);

    $filePath = __DIR__ . '/img/charts/chart.png';
    file_put_contents($filePath, $imageData);
});

Router::post("/fin/genSearch", function(){
    $_SESSION['postdata']['generalLedgerSelected'] = $_POST['generalLedgerSelected'] == "" ? null : $_POST['generalLedgerSelected'];
    $_SESSION['postdata']['recent'] = $_POST['recent'];
    $page = $_POST['pageNumber'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/ledger/page=$page");
});

Router::post("/auditlogSearch", function(){
    $_SESSION['postdata']['searchQueryAudit'] = $_POST['searchQueryAudit'];
    $page = $_POST['pageNumber'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/logs/page=$page");
});