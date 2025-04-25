<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../config/Session.php';
    include_once $filepath.'/../config/config.php';
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
    <link rel="stylesheet" href="asset/css/custom.css" />
    <link rel="stylesheet" href="asset/css/footer.css" />

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
    <header class="frontHeader rounded-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-ligh">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="navbar-brand" href="index.php">
                    <div class="logo-container">
                        <img class="logo" src="asset/img/logo.jpg">
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <form class="d-flex" style="width: 70% !important;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Category 1</a></li>
                                <li><a class="dropdown-item" href="#">Category 2</a></li>
                                <li><a class="dropdown-item" href="#">Category 3</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">All Categories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <?php
                        $isLogin = Session::get("login");
                        $userPhoto = null;
                        if (isset($isLogin) & $isLogin) {
                            $userData = Session::get('userData');
                            $userPhoto = $userData->image;
                    ?>

                        <li class="nav-item">
                            <a class="nav-link" href="cart-checkout.php">Carts</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if ($userPhoto) { ?>
                                <img class="profilePic"
                                    src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $userPhoto; ?>" alt="Avatar">

                                <?php } else { ?>

                                <img class="profilePic" src="asset/img/profile/profile.png" alt="Avatar">
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="backend/profile_view.php">Profile</a></li>
                                <li><a class="dropdown-item" href="backend/dashboard.php">Dashboard</a></li>
                                <li><a class="dropdown-item" href="?action=logout">Sign Out</a></li>
                            </ul>
                        </li>

                        <?php } else { ?>
                        <li>
                            <a href="sign_in.php" class="nav-link btn btn-info">Sign In</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

    </header>