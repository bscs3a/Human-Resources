<?php 
// require_once 'public/finance/functions/supportingFunctions/supportingExpense.php';
function displayRequestTable($department = null){
    if(!is_null($department)){
        if (!checkDepartment($department)) {
            throw new Exception("Department does not exist");
        }
    }
    
    $db = Database::getInstance();
    $conn = $db->connect();

    if($department === null){
        $sql = "SELECT re.re_id, re.payusing, re.details, re.amount, re.payfor, re.department, re.status, dr.name as payfor_name, cr.name as payusing_name 
        FROM RequestExpense re
        JOIN Ledger dr ON re.payfor = dr.ledgerno
        JOIN Ledger cr ON re.payusing = cr.ledgerno";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    $sql = "SELECT re.re_id, re.payusing, re.details, re.amount, re.payfor, re.department, re.status, dr.name as payfor_name, cr.name as payusing_name 
    FROM RequestExpense 
    JOIN Ledger dr ON re.payusing = dr.ledgerno
    JOIN Ledger cr ON re.payfor = cr.ledgerno
    WHERE department = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$department]);
    $result = $stmt->fetchAll();
    return $result;
}

function updateRequest($id, $decision){
    if ($id === null){
        throw new Exception("Id cannot be null");
    }
    if (!checkDecision($decision)){
        throw new Exception("Decision must be pending,confirm,or deny");
    }
    if(!checkRequestId($id)){
        throw new Exception("Id does not exist");
    }
    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "UPDATE requestexpense SET status = ? WHERE re_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$decision, $id]);

    return true;
}


function checkDecision($decision){
    if ($decision === null){
        throw new Exception("Decision cannot be null");
    }
    if ($decision !== "pending" && $decision !== "deny" && $decision !== "confirm"){
        throw new Exception("Decision must be pending,confirm,or deny");
    }
    return true;
}

function checkRequestId($id){
    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT * FROM requestexpense WHERE re_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll();
    if (count($result) === 0){
        throw new Exception("Id does not exist");
    }
    return true;
}
?>