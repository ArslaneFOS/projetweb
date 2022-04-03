<?php
require_once('/home/arslane/www-prj/projetweb-1/controllers/check-session.php');
if (!(has_admin_access_level() || has_pilot_access_level() || (has_representative_access_level('sfx3') && has_representative_access_level('sfx4') && has_representative_access_level('sfx5') && has_representative_access_level('sfx6')))) {
  echo "Access Denied.";
  die();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Offers</title>
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
  <main>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>duration</th>
                <th>Pay(Euro/h)</th> 
                <th>Date Posted</th> 
                <th>Places</th> 
                <th>Description</th> 
                <th>Id Company</th> 
                <th></th>
                <th></th>
            </tr>
            <tr>
              <form>
                <th> <input size="5" id="id_offer" type="text" name="id_offer" disabled> </th>
                <th><input size="15" id="name_offer" type="text" name="name_offer"></th>
                <th><input size="5" name="level_offer" id="level_offer" list="Level"><datalist id="Level"><option value="A1"><option value="A2"><option value="A3"><option value="A4"><option value="A5"></datalist></th> 
                <th><input size="5" name="internship_length_offer" id="internship_length_offer" list="Duration"><datalist id="Duration"><option value="1"><option value="2"><option value="3"><option value="4"><option value="5"><option value="6"><option value="7"><option value="8"><option value="9"><option value="10"><option value="11"><option value="12"></datalist></th>
                <th><input type="number" id="pay_offer" name="pay_offer" min="12" max="150"></th>
                <th><input id="date_offer" name="date_offer" type="date" value="01/01/1970" disabled></th>
                <th><input size="5" name="available_places_offer" id="available_places_offer" type="number"></th> 
                <th><textarea rows="1" size="25" id="description_offer" type="text" name="description_offer"></textarea></th>
                <th><select name="id_com" id="id_com">

                </select></th> 
                <th><button type="button" id="create" class="btn btn-primary">Add</button></th>
                <th><button type="button" id="update" class="btn btn-info" disabled>Download</button></th>
                <th><button class="btn btn-secondary" type="reset" onclick="document.getElementById('create').disabled = false; document.getElementById('update').disabled = true;">Reset</button></th>
              </form>
            </tr>
        </thead>
        <tbody>
            

        </tbody>
        <tfoot>
           <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>duration</th>
                <th>Pay(Euro/h)</th> 
                <th>Date Posted</th> 
                <th>Places</th> 
                <th>Description</th> 
                <th>Id Company</th> 
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</main>
<?php
  include('footer.php');
  ?>
  <script>
    document.body.onload = () => {
      getCompaniesNames();
      offer();
      searchOfferAdmin('', 1);
      document.getElementById('id_offer').oninput = () => getOffer(document.getElementById('id_offer').value);
    }
  </script>
</body>
</html>