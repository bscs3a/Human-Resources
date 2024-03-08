<?php 

$path = './public/delivery/views';

Router::handle('GET', '/dlv/sample', "$path/dlv.sample.php");
Router::handle('GET', '/dlv/link', "$path/dlv.test-link.php");

Router::handle('GET', '/dlv/details', "$path/dlv.details.php");