<?php 

$path = './public/admin/views';

Router::handle('GET', '/adm/dashboard', "$path/dashboard.php");
Router::handle('GET', '/adm/edit-employee', "$path/edit-employee.php");
Router::handle('GET', '/adm/product', "$path/product.php");
Router::handle('GET', '/adm/login', "$path/adm.login.php");

