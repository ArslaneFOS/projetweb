<?php
require 'controllers/check-session.php';

// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level() || (has_representative_access_level('sfx17') && has_representative_access_level('sfx18') && has_representative_access_level('sfx19') && has_representative_access_level('sfx20')))) {
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
  <title>Admin Representatives</title>
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

  <link rel="icon" href="/views/assets/img/neo-neo-logo_1.svg">
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
          <th>Last Name</th>
          <th>FirstName</th>
          <th>Login</th>
          <th>Password</th>
          <th>Id Center</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <form>
            <th> <input size="5" id="id_user" type="text" name="id_user" disabled></th>
            <th><input size="15" id="lastname" type="text" name="lastname"></th>
            <th><input size="15" id="firstname" type="text" name="firstname"></th>
            <th><input size="10" id="login" type="text" name="login"></th>
            <th><input size="10" id="password" type="text" name="password"></th>
            <th><select name="id_center" id="id_center">
                <option value="1">Exia Alger</option>
                <option value="2">CESI EXIA Alger</option>
                <option value="3">CESI lyon</option>
                <option value="4">CESI Springfield</option>
                <option value="5">CESI South Park</option>
                <option value="6">CESI New York</option>
                <option value="7">CESI Gotham City</option>
                <option value="8">CESI Metropolis</option>
                <option value="9">CESI Tokyo</option>
                <option value="10">CESI Moscou</option>
                <option value="11">CESI Sin City</option>
              </select></th>
            <th><button class="btn btn-primary" type="button" id="create">Add</button></th>
            <th><button class="btn btn-info" type="button" id="update" disabled>Download</button></th>
            
            <th><button class="btn btn-secondary" type="reset" onclick="document.getElementById('create').disabled = false; document.getElementById('update').disabled = true;">Reset</button></th>
            </th>
          </form>
        </tr>
      </thead>
      <tbody>
        </tr>

      </tbody>
      <tfoot>
        <th>ID</th>
        <th>Last Name</th>
        <th>FirstName</th>
        <th>Login</th>
        <th>Password</th>
        <th>Id Center</th>
        <th></th>
        <th></th>
        <th></th>
      </tfoot>
    </table>
  </main>
  <?php
  include('footer.php');
  ?>
  <script>
    document.body.onload = () => {
      representative();
      searchRepresentativesAdmin('', 1);
      //document.getElementById('id_com').oninput = () => getCompany(document.getElementById('id_com').value);
    }
  </script>
</body>

</html>