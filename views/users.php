<?php
require 'controllers/check-session.php';
if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx13') || has_representative_access_level('sfx17') || has_representative_access_level('sfx22'))) {
    echo "403 Forbidden";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/views/assets/css/users.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/views/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/views/assets/img/neo-neo-logo_1.svg">

    <title>Interns</title>
</head>
<body>
<?php
  include('header.php');
  ?>

<main>
    <div class="hero">
        <div class="search">
            <input placeholder="firstname" class="component-2 search-for-an-offer valign-text-middle" id="firstname" type="text" oninput="document.getElementById('users-cards').innerHTML = '';searchUsers(document.getElementById('firstname').value, document.getElementById('lastname').value ,1)">
            <div>&nbsp;</div>
            <input placeholder="lastname" class="component-2 search-for-an-offer valign-text-middle" id="lastname" type="text" oninput="document.getElementById('users-cards').innerHTML = '';searchUsers(document.getElementById('firstname').value, document.getElementById('lastname').value ,1)">
        </div>
    </div>

  <div id="users-cards">

  </div>
    <h1>Users</h1>

    <script src="/views/assets/scripts/functions.js"></script>
    <script>
      <?php
  include('footer.php');
  ?>
    document.body.onload = () => {
      searchUsers('', '', 1);
      
    }
    // testfgsdgfds
  </script>
</main>

</body>
</html>