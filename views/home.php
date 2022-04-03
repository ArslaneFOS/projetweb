<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!--<link href="/views/assets/img/favicon.png" rel="icon">-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <link href="/views/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="/views/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="/views/assets/css/home.css" rel="stylesheet">
  <script src="/views/assets/vendor/aos/aos.js"></script>
  <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/views/assets/js/main.js"></script>
  <link rel="icon" href="https://img.icons8.com/external-smashingstocks-isometric-smashing-stocks/55/000000/external-web-link-seo-and-marketing-smashingstocks-isometric-smashing-stocks.png">

</head>

<body>
  <?php
  include('header.php');
  ?>

  <main>
    <div class="home-hero">
      <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/views/assets/img/neo-neo-logo_1.svg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">JOB INTERN</h1>
        <h6 class="display-5">The best web site for your internships</h6>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a name="Check out our partners" href="www.google.ru"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Find Out More</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div id="offerz" class="col-10 col-sm-8 col-lg-6">
          <img src="https://images.pexels.com/photos/4240580/pexels-photo-4240580.jpeg?cs=srgb&dl=pexels-ivan-samkov-4240580.jpg&fm=jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold lh-1 mb-3">Internships, just for you.</h1>
          <h4 class="display-8 fw-bold lh-1 mb-3">They do be just for you.</h4>
          <p class="lead">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a name="Browse our offers" href="/views/offers.php"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Browse our offers</button></a>
          </div>
        </div>
      </div>
    </div>


    <div class="container col-xxl-8 px-4 py-5 background-color-black">
      <div id="companiz" class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold lh-1 mb-3">Trustworty Hirers</h1>
          <h4 class="display-8 fw-bold lh-1 mb-3">MULTIPLE COMPAGNIES AVAILABLE IN A CLICK.</h4>
          <p class="lead">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a name="Check out our partners" href="/views/companies.php"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Check Out Our Partners</button></a>

          </div>
        </div>
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="https://images.pexels.com/photos/7793921/pexels-photo-7793921.jpeg?cs=srgb&dl=pexels-yan-krukov-7793921.jpg&fm=jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
      </div>
    </div>



    <div class="container col-xxl-8 px-4 py-5">
      <div id="internz" class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="https://images.pexels.com/photos/6615092/pexels-photo-6615092.jpeg?cs=srgb&dl=pexels-tima-miroshnichenko-6615092.jpg&fm=jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold lh-1 mb-3">Are You looking for new interns?</h1>
          <h4 class="display-8 fw-bold lh-1 mb-3">Hire some of the best students out here.</h4>
          <p class="lead">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a name="Find a student button" href="/views/users.php"> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Find a Student</button></a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include('footer.php');
  ?>
</body>



</html>

<?php
if (@$_SESSION['status'] != 'logged-in') {
  session_destroy();
}
?>