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
    <link rel="stylesheet" href="asset/backend/css/custom.css">
    <style>
        /* Full height layout */
        html,
        body {
            height: 100%;
        }

        /* Wrapper for Sidebar and Content */
        #wrapper {
            display: flex;
            min-height: 100%;
        }

        /* Sidebar Styles */
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            background-color: #343a40;
        }

        #page-content-wrapper {
            margin-left: 250px;
            width: 100%;
            flex-grow: 1;
        }

        /* Footer */
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
        }

        /* Responsive Sidebar */
        @media (max-width: 767px) {
            #sidebar-wrapper {
                display: none;
            }

            #page-content-wrapper {
                margin-left: 0;
            }

            #sidebar-wrapper.active {
                display: block;
            }

            .navbar-nav {
                margin-left: auto;
            }
        }
    </style>
</head>

<body>
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