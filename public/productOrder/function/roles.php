<?php
// session_start();

function checkUserRole($requiredRole) {
    if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $requiredRole) {
        // Redirect to a different page or display an error message
        header("Location: /master/"); // Redirect to a no access page
        exit(); // Ensure no further code is executed
    }
}