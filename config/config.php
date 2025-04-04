<?php

// $baseUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME'], 1);
// define('BASE_URL', $baseUrl);

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$basePath = $protocol . "://" . $host . dirname($_SERVER['SCRIPT_NAME'], 2); // Get the parent directory of "backend"

define('BASE_URL', $basePath);
?>