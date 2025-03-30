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
                            <img class="logo" src="asset/img/logo.jpg">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-container">
                            <input class="form-control" type="text" placeholder="Search...">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <ul class="custom-list">
                            <li>
                                <a class="btn btn-primary btn-sm" href="backend/index.php">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-info btn-sm" href="register.php">
                                    Sign Up
                                </a>
                            </li>
                            <li>
                                <button class="btn btn-info btn-sm" id="button-2">Log in</button>
                            </li>
                            <li>
                                <img class="profilePic" src="asset/img/profilePic.webp" alt="Profile Picture">
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <content>
        <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <h2>Sign Up</h2>
                                    <!-- <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                              Phone: +1 234 56789012
                            </p> -->
                                </div>
                            </div>
                            <div class="col-7">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">E-Mail</label>
                                        <input type="email" name="email" id="inputEmail" class="form-control"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Username</label>
                                        <input type="text" name="username" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">Password</label>
                                        <input type="password" name="password" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="register" class="btn btn-primary">Sign Up</button>
                                        <span class="ml-3">
                                            Already have an account? <a href="login.php">Sign In</a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </content>

    <footer>
        <section class="footer row">
            <div class="footer-row">
                <div class="footer-col">
                    <div class="img">
                        <img src="asset/img/logo.jpg" alt="">
                    </div>

                </div>

                <div class="footer-col">

                    <h4>Info</h4>
                    <ul class="links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Conditions</a></li>
                        <li><a href="#">Our Journals</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Collection</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="links">
                        <li><a href="#">Offers</a></li>
                        <li><a href="#">Discount Coupons</a></li>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Info</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Newsletter</h4>
                    <p>
                        Subscribe to our website for a weekly dose
                        of latest, updates, helpful tips, and
                        exclusive offers.
                    </p>
                    <form action="#">
                        <input type="text" placeholder="Your email" required>
                        <button type="submit">SUBSCRIBE</button>
                    </form>
                    <div class="icons">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-github"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-copy">
            <p>All rights reserved copyright@2025 startup landing page design</p>
        </section>
    </footer>


    <script src="asset/bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>