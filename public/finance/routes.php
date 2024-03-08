<?php 
$path = './public/finance/views';

Router::handle('GET', '/fin/sample', "$path/fin.sample.php");
Router::handle('GET', '/fin/link', "$path/fin.test-link.php");
Router::handle('GET', '/fin/link2', "$path/fin.test-link2.php");


// Routes for Ledger Page
Router::handle('GET', '/fin/ledger', "$path/fin.ledger.gen.php");
Router::handle('GET', '/fin/ledger/accounts/investors', "$path/fin.ledger.investors.php");
Router::handle('GET', '/fin/ledger/accounts/payable', "$path/fin.ledger.payable.php");

// Routes for Reques Page
Router::handle('GET', '/fin/request', "$path/fin.requestInventory.php");
Router::handle('GET', '/fin/salary', "$path/fin.requestSalary.php");

Router::handle('GET', '/fin/test', "$path/test.php");

// Route for Dashboard Page
Router::handle(
    'GET',
    '/fin/dashboard',
    "$path/fin.dashboard.php",
);

Router::handle(
    'GET',
    '/fin/charts',
    "$path/fin.charts.php",
);

Router::handle(
    'GET',
    '/fin/reportIncome',
    "$path/fin.reportIncome.php",
);
Router::handle(
    'GET',
    '/fin/reportCash',
    "$path/fin.reportCash.php",
);
Router::handle(
    'GET',
    '/fin/reportEquity',
    "$path/fin.reportEquity.php",
);
Router::handle(
    'GET',
    '/fin/reportBalance',
    "$path/fin.reportBalance.php",
);


