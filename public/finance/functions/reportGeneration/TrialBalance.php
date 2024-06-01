<?php
require_once "public\\finance\\functions\\reportGeneration\\OwnersEquityReport.php";

function generateTrialBalance($year, $month) {
    $db = Database::getInstance();
    $conn = $db->connect();
    $asset = getGroupCode("Asset");
    $LiabilityAndOE = getGroupCode("liabilities and owner's equity");
    $retained = getAccountCode("Retained");
    // Query data
    $grouptype_data = $conn->query('SELECT * FROM grouptype')->fetchAll();
    $accounttype_data = $conn->query('SELECT * FROM accounttype')->fetchAll();
    $ledger_data = $conn->query('SELECT * FROM ledger')->fetchAll();

    // Sort grouptype_data(in descending order -- needed)
    usort($grouptype_data, function($a, $b) {
        return strcmp($a['grouptype'], $b['grouptype']);
    });

    $html = "<section>\n";
    foreach ($grouptype_data as $group) {
        if ($group['grouptype'] != $asset && $group['grouptype'] != $LiabilityAndOE) {
            continue;
        }
        $html .= "<table>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th colspan='2' class='text-left'>{$group['description']}</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        foreach ($accounttype_data as $account) {
            if ($account['AccountType'] == $retained) {
                continue;
            }
            if ($account['grouptype'] == $group['grouptype']) {
                $html .= "<tr class='table-classifier'>";
                $html .= "<td class='classifier'>{$account['Description']}</td>";
                $html .= "</tr>";
                foreach ($ledger_data as $ledger) {
                    if ($ledger['AccountType'] == $account['AccountType']) {
                        $balance = abs(getAccountBalanceV2($ledger['ledgerno'],true, $year, $month));
                        // dont show ledger if balance is 0
                        if($balance == 0){
                            continue;
                        }
                        $balance = abs($balance);
                        $html .= "<tr class='table-content'>";
                        $html .= "<td class='content'>{$ledger['name']}</td>";
                        $html .= "<td class='content-amount'>{$balance}</td>";
                        $html .= "</tr>";
                    }
                }
            }
        }
        $html .= "</tbody>";

        //result of group
        $total = abs(getTotalOfGroupV2($group['grouptype'], $year, $month));
        $resultText = $group['grouptype'] == $asset ? "Asset" : "Liabilities and Owner's Equity";
        $html .= "<tfoot>";
        $html .= "<tr>";
        $html .= "<td>{$resultText}</td>";
        $html .= "<td class='content-amount'>{$total}</td>";
        $html .= "</tr>";
        $html .= "</tfoot>";
        $html .= "</table>";
    }
    $html .= "</section>";
    return $html;
}

?>