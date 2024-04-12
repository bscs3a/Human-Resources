<?php 
// $audit_activity = "Logged out";

session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    if (isset($_SESSION['employee_name'])) {

        $db = Database::getInstance();
        $pdo = $db->connect();
        
        $logAction = "Log out";

        $sql = "INSERT INTO tbl_sls_audit (employee_name, log_action) VALUES (:employee_name, :log_action)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":employee_name", $_SESSION['employee_name']);
        $stmt->bindParam(":log_action", $logAction);
        
        if ($stmt->execute()) {

            session_destroy();
            header("Location: /master/");
        }   


    }
}


?>
<!-- <script src="./../src/route.js"></script> -->