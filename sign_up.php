<?php
    include 'layout/header.php';
    include 'lib/User.php';
    Session::checkLogin();
?>

<?php 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $usrRegi = $user->userRegistration($_POST);
 	}
 ?>

    <content>
        <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <div class="content mb-3">
                <div class="container">
                    <?php
                        if (isset($usrRegi)) {
                            echo $usrRegi;
                        }
                    ?>
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <h2>Sign Up</h2>
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
                                    <div class="form-group mt-2">
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

<?php
    include 'layout/footer.php';
?>