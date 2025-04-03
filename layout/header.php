<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../config/Session.php';
	Session::init();
?>

<?php
	if(isset($_GET['action']) && $_GET['action'] == "logout"){
		Session::destroy();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>swadeshi</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="asset/bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <!-- link for css file -->
    <link rel="stylesheet" href="asset/css/style.css" />
    <link rel="stylesheet" href="asset/css/style2.css" />
    <!-- link font-awesome for all icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link font Awesome for brands icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.min.css"
        integrity="sha512-58P9Hy7II0YeXLv+iFiLCv1rtLW47xmiRpC1oFafeKNShp8V5bKV/ciVtYqbk2YfxXQMt58DjNfkXFOn62xE+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- nav Bar -->
    <header>
        <nav class="navbar">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo-container">
                            <a href="index.php"><img class="logo" src="asset/img/logo.jpg"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-container">
                            <input class="form-control" type="text" placeholder="Search...">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <ul class="custom-list">
                        <?php
                            $isLogin = Session::get("login");
                            if (isset($isLogin) && $isLogin) {
                        ?>

                            <li>
                                <a class="btn btn-primary btn-sm" href="backend/index.php">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="?action=logout" class="btn btn-warning btn-sm" id="button-2">Sign Out</a>
                            </li>
                            <li>
                                <img class="profilePic" src="asset/img/profilePic.webp" alt="Profile Picture">
                            </li>

                        <?php
                            } else {
                        ?>
                            <li>
                                <a href="sign_in.php" class="btn btn-info btn-sm" id="button-2">Sign In</a>
                            </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <hr />
