<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Promotions</title>
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
  <link rel="icon" href="https://img.icons8.com/external-smashingstocks-isometric-smashing-stocks/55/000000/external-web-link-seo-and-marketing-smashingstocks-isometric-smashing-stocks.png">
</head>
<body>
<?php
  include('header.php');
  ?>
  <main>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>ID Pilot</th>
                <th>ID Representative</th> 
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th> <input size="5" id="input" type="text" name="ID"></th>
                <th><input size="15" id="Name" type="Name" name="Name"></th>
                <th><input size="15" id="example" type="text" name="First Name"></th>
                <th><input size="5" list="Id Pilot"><datalist id="Id Pilot"><option value="1"><option value="2"><option value="3"><option value="4"><option value="5"></datalist></th> 
                <th><input size="5" list="Id Representative"><datalist id="Id Representative"><option value="1"><option value="2"><option value="3"><option value="4"><option value="5"></datalist></th> 
                <th><button type="button">Add</button></th>
                <th><button type="button">Download</button></th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>1</td>
                <td>Sahlaka</td>
                <td>3</td>
                <td>17</td>
                <td>99</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Sahlaka</td>
                <td>3</td>
                <td>17</td>
                <td>99</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Sahlaka</td>
                <td>3</td>
                <td>17</td>
                <td>99</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Sahlaka</td>
                <td>3</td>
                <td>17</td>
                <td>99</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Sahlaka</td>
                <td>3</td>
                <td>17</td>
                <td>99</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
              
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>ID Pilot</th>
                <th>ID Representative</th> 
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</main>
<?php
  include('footer.php');
  ?>
</body>
</html>