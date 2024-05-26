<?php
require_once './vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isJavascriptEnabled', TRUE);


$fileNeeded = $_SESSION['postdata']['file'];
$typeOfReport = $_SESSION['postdata']['writtenOrChart'];
if($fileNeeded === null){
    echo "No file selected";
    header ("Location: /fin/dashboard");
    exit();
}

// Start output buffering
ob_start();

$basePath = 'written';
// types of report
if (strcasecmp($typeOfReport, "chart") === 0) {
    $basePath = 'chart';
}

// Include the script
if($fileNeeded === "Income"){
    require_once "$basePath/incomeReport.php";
}
else if($fileNeeded === "OwnerEquity"){
    require_once "$basePath/OwnersEquityReport.php";
}
else if($fileNeeded === "TrialBalance"){
    require_once "$basePath/TrialBalance.php";
}
else if($fileNeeded === "CashFlow"){
    require_once "$basePath/cashFlow.php";
}

// Get the output of the script
$html = ob_get_clean();

// Instantiate Dompdf class
$dompdf = new Dompdf($options);

// Load HTML content
$dompdf->loadHtml($html);

// (Optional) Set paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render PDF (output)
$dompdf->render();

// Output PDF to browser for download
$dompdf->stream("income_report.pdf", array("Attachment" => 0));
// Or save PDF to file: $dompdf->output(); and write to file
?>