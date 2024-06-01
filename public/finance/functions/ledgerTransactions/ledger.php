<?php 

function generateSelect($id, $name, $onchange, $sql) {
    $db = Database::getInstance();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<div class=\"mb-4 relative p-1\">";
    echo "<label for=\"$id\" class=\"block text-xs font-medium text-gray-900\"> $name </label>";
    echo "<select id=\"$id\" name=\"$id\" required class=\"mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm\" onchange=\"$onchange\">";
    echo "<option value=\"\" selected=\"selected\">...</option>";
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
        }
    } else {
        echo "0 results";
    }
    echo "</select>";
    echo "</div>";
}

// function getLedgerName($conn, $ledgerNo)
// {
//     $stmt = $conn->prepare("SELECT name FROM ledger WHERE ledgerno = :ledgerno");
//     $stmt->bindParam(':ledgerno', $ledgerNo);
//     $stmt->execute();
//     return $stmt->fetchColumn();
// }