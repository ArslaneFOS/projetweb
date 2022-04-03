<?php
require 'controllers/check-session.php';
if (!(has_student_access_level())) {
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
    <link href="/views/assets/css/wishlist.css" rel="stylesheet">

    <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/views/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/views/assets/img/neo-neo-logo_1.svg">
    <title>My Wishlist</title>
</head>
<body>
  <?php
include('header.php');?>
          <div class="hero">
        <div class="search">

            <input placeholder="Search for an Offer In Your Wishlist" class="component-2 search-for-an-offer valign-text-middle" id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">

        </div>
    </div>

  <div id="wishlist-cards">

  </div>
  
    <script src="/views/assets/scripts/functions.js"></script>
    <script>
    document.body.onload = () => {
      searchWishlist('', 1);
      document.getElementById('search').oninput = () => {
        document.getElementById('wishlist-cards').innerHTML = '';
        searchWishlist(document.getElementById('search').value, 1);
      }
    }
    // testfgsdgfds
  </script>
</body>
</html>