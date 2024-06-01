<?php
 session_start();
 // database conncetion
require_once './src/dbconn.php';


// router
require_once './router.php';

// routes
require_once './web.php';


Router::post('/login', function(){
    $db = Database::getInstance();
    $conn = $db->connect();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM account_info WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    $base_url = 'master'; // Define your base URL here
    if ($user && password_verify($password, $user['password'])) {
    // if ($user && $password == $user['password']) { // ung passwords namin from HR di naka-hash HAUSHDASDH
        $_SESSION['user'] = array();
        // Password is correct
        $_SESSION['user']['account_id'] = $user['id'];
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['employee_id'] = $user['employees_id'];
        
  // Insert log entry for successful login audit log
            $user_id = $user['username'];
            $action = "Logged In";
            $time_out = "00:00:00"; // Set the time_out value to '00:00:00'

            $sql = "INSERT INTO poauditlogs (user, action, time_out) VALUES (:user_id, :action, :time_out)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':action', $action);
            $stmt->bindValue(':time_out', $time_out);
            $stmt->execute();

        $stmt = $conn->prepare("SELECT department FROM employees WHERE id = :id");
        $stmt->bindParam(':id', $user['employees_id']);
        $stmt->execute();
        $department = $stmt->fetch();
        $_SESSION['user']['role'] = $department['department'];

        Router::audit_log();
        //redirects to the right page
        if ($_SESSION['user']['role'] == 'Product Order') {
            header("Location: /$base_url/po/dashboard");
            exit();
        } 
        if ($_SESSION['user']['role'] == 'Human Resources') {
            header("Location: /$base_url/hr/dashboard");
            exit();
        } 
        if ($_SESSION['user']['role'] == 'Point of Sales') {
            header("Location: /$base_url/sls/Dashboard");
            exit();
        } 
        if ($_SESSION['user']['role'] == 'Inventory') {
            header("Location: /$base_url/inv/main");
            exit();
        } 
        if ($_SESSION['user']['role'] == 'Finance') {
            header("Location: /$base_url/fin/dashboard");
            exit();
        } 
        if ($_SESSION['user']['role'] == 'Delivery') {
            header("Location: /$base_url/dlv/dashboard");
            exit();
        } 
    } else {
        header("Location: /$base_url/?error=1");
        exit();
    }
});

Router::post('/logout', function(){
    session_destroy();
    $base_url = 'Master'; // Define your base URL here
    header("Location: /$base_url/");
    exit();
});


// header("Location: /Master/");



