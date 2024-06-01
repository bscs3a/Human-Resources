<?php
// ROUTE IS IN HR's routes.php
// Please see /clock-in and /clock-out
    $db = Database::getInstance();
    $conn = $db->connect();

    $username = $_SESSION['user']['username'];

    // Fetch the employees_id based on the username
    $stmt = $conn->prepare("SELECT employees_id FROM account_info WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $employees_id = $user['employees_id'];

    // Use the current date for attendance_date
    date_default_timezone_set('Asia/Manila');
    $attendance_date = date('Y-m-d');

    // Check if a row exists for the current date and employees_id
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE attendance_date = :attendance_date AND employees_id = :employees_id");
    $stmt->execute([
        ':attendance_date' => $attendance_date,
        ':employees_id' => $employees_id,
    ]);
    $attendance = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo=null;
    $stmt=null;

    $stmt = $conn->prepare("SELECT * FROM attendance WHERE attendance_date = :attendance_date AND employees_id = :employees_id AND clock_out IS NULL");
    $stmt->execute([
        ':attendance_date' => $attendance_date,
        ':employees_id' => $employees_id,
    ]);
    $clockOut = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo=null;
    $stmt=null;
    ?>

    <?php if (!$attendance): ?>
        <form method="post" action="/clock-in">
            <button id="clockInButton" type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded">Clock In</button>
        </form>
    <?php elseif ($clockOut): ?>
        <form method="post" action="/clock-out">
            <button id="clockOutButton" type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">Clock Out</button>
        </form>
    <?php elseif (!$clockOut): ?>
        <button id="workDoneButton" type="button" class="bg-gray-300 text-black px-2 py-1 rounded">See You Tomorrow!</button>
    <?php endif; ?>
