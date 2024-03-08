<?php

$path = './public/inventory/views';

Router::handle('GET', '/inv/sample', "$path/inv.sample.php");
Router::handle('GET', '/inv/link', "$path/inv.test-link.php");
Router::handle('GET', '/inv/main', "$path/inv-main.php");
Router::handle('GET', '/inv/prod-edit', "$path/inv-prodEdit.php");
Router::handle('GET', '/inv/product_order', "$path/prod.ord.main.php");
Router::handle('GET', '/inv/product_shop', "$path/prod.ord.shop.php");
Router::handle('GET', '/inv/product_checkout', "$path/prod.ord.orders.php");