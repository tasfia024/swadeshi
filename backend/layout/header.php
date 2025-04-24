<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../../config/Session.php';
	include_once $filepath.'/../../config/config.php';
	Session::init();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swadeshi Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 (Icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/backend/css/custom.css">
    <style>

    </style>
</head>

<body>
    <?php
        $userData = Session::get('userData');
        $userType = Session::get('userType');
        $panelTitle = $userType == 1 ? 'Admin Panel' : ($userType == 2 ? 'Vendor Panel' : Session::get('name'));

        $userRole = $userType == 1 ? 'Admin' : ($userType == 2 ? 'Vendor' : 'Buyer');
    ?>

    <div id="wrapper">
        <?php
            include 'sidebar.php';
        ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Topbar -->
            <?php
                include 'navbar.php';
            ?>