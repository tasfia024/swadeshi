<?php

$baseUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME'], 1);
define('BASE_URL', $baseUrl);
?>