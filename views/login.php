<?php
require_once('controllers/check-session.php');
if (isset($_SESSION['id_user'])) {
    header('location: /');
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <link href="/views/assets/css/login.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/views/assets/img/neo-neo-logo_1.svg">

</head>

<body>

    <main>
        <div id="main-wrapper" class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="mb-5">
                                            <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                        </div>

                                        <h6 class="h5 mb-0">Welcome back!</h6>
                                        <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                                        <form method="post" action="/controllers/login.php">
                                            <div class="form-group">
                                                <label for="login">Email address</label>
                                                <input type="text" id="login" name="login" placeholder="login" class="form-control"/>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password" placeholder="****" class="form-control"/>
                                            </div>
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>


                                        </form>
                                    </div>
                                </div>

                                <div class="col-lg-6 d-none d-lg-inline-block">
                                    <div class="account-block rounded-right">
                                        <div class="overlay rounded-right"></div>
                                        <div class="account-testimonial">
                                            <h4 class="text-white mb-4">INTERNSHIP</h4>
                                            <p class="lead text-white">"Your futur in our hands"</p>
                                            <p>- CESI EXIA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <p class="text-muted text-center mt-3 mb-0"> <a href="/views/home.php" class="text-primary ml-1">Home</a></p>

                    <!-- end row -->

                </div>
                <!-- end col -->
            </div>
            <!-- Row -->
        </div>
    </main>

    <footer>

        <div class="footer">
            <div class="container">
                <div class="row">


                    <div class="col-md-6 col-xs-12">
                        <div class="second">
                            <h4> Navigate</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Offers</a></li>
                                <li><a href="#">Compagnies</a></li>
                                <li><a href="#">Interns</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="third">
                            <h4> Contact</h4>
                            <ul>
                                <li>CESI Exia </li>
                                <li></li>


                                <li><i class="far fa-envelope"></i> Random Adress</li>
                                <li><i class="far fa-envelope"></i> email@yahoo.com</li>


                                <li><i class="fas fa-map-marker-alt"></i> Algier, Algeria </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-8">
                        <p class="copyright">
                            Copyright © 2022 All rights reserved |Cesi EXIA </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="line"></div>
                        <div class="second2">


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </footer>


</body>

</html>