<?php 

$path = './public/sales/views';

Router::handle('GET', '/sls/sample', "$path/sls.sample.php");
Router::handle('GET', '/sls/link', "$path/sls.test-link.php");
Router::handle('GET', '/sls/Product-Catalog', "$path/sls.ProductCatalog.php");
Router::handle('GET', '/sls/Transaction-History', "$path/sls.TransactionHistory.php");
Router::handle('GET', '/sls/Transaction-Details', "$path/sls.TransactionDetails.php");
Router::handle('GET', '/sls/Dashboard', "$path/sls.Dashboard.php");
Router::handle('GET', '/sls/POS', "$path/sls.POS.php");
