<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Applications</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <link href="/views/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  
  <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/views/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/views/assets/css/home.css" rel="stylesheet">
  <script src="/views/assets/vendor/aos/aos.js"></script>
  <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/views/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/views/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/views/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/views/assets/vendor/php-email-form/validate.js"></script>
  <script src="/views/assets/js/main.js"></script>
  <script src="/views/assets/scripts/functions.js"></script>

  <link rel="icon" href="https://img.icons8.com/external-smashingstocks-isometric-smashing-stocks/55/000000/external-web-link-seo-and-marketing-smashingstocks-isometric-smashing-stocks.png">
</head>

<body>
<?php
  include('header.php');
  ?>

    </div>
  </header>
  <main>
    <div id="applications-cards">
    
    

    </div>
  </main>
  <?php
  include('footer.php');
  ?>
  <script>
    document.body.onload = () => {
      getApplicationsAdmin();
    }
  </script>
</body>

</html>