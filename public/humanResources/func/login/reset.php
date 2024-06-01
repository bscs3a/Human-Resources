<?php 

require_once 'src/dbconn.php';

function passwordReset($account_id, $password = null){
    $db = Database::getInstance();
    $conn = $db->connect();
    if($password === null){
        $password = generatePassowrd();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE account_info SET password = :password WHERE account_id = :id");
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':id', $account_id);
    try{
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    return $password; 
}

function usernameReset($account_id, $username){
    $db = Database::getInstance();
    $conn = $db->connect();

    $stmt = $conn->prepare("UPDATE account_info SET username = :username WHERE account_id = :id");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':id', $account_id);
    try{
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

//throws an error if account already exist
function creationOfAccount($employee_id){
    $db = Database::getInstance();
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT * FROM account_info WHERE employee_id = :id");
    $stmt->bindParam(':id', $employee_id);
    $stmt->execute();
    $result = $stmt->fetch();
    if (!empty($result)) {
        throw new Exception("Account has been created already.");
    }

    $username = generateUsername($employee_id);
    $password = generatePassowrd();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM employees WHERE employee_id = :id");
    $stmt->bindParam(':id', $employee_id);
    $stmt->execute();
    $result = $stmt->fetch();

    $role = $result['role'];
    $stmt = $conn->prepare("INSERT INTO account_info (username, password, employee_id,role) VALUES (:username, :password, :employee_id,role)");
    
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->bindParam(':role', $role);

    try{
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    return [$username, $password];
}

function generatePassowrd(){
    $passwordLength = random_int(7, 12);
    $password = substr(bin2hex(random_bytes(12)), 0, $passwordLength);

    return $password;
}

function generateUsername($employee_id){
    $db = Database::getInstance();
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT * FROM employees WHERE employee_id = :id");
    $stmt->bindParam(':id', $employee_id);
    $stmt->execute();
    $result = $stmt->fetch();
    $username = $result['firstname'] . $result['lastname'] . $result['employee_id'];

    return $username;
}