<?php
require 'controllers/check-session.php';
if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level())) {
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
    <title>Companies</title>
    <style>
        .company-logo {
            width: 128px;
        }
    </style>
</head>
<body>
    <?='Logged in as: '.$_SESSION['name'];?>
    <h1>Companies</h1>
    <input id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">
    <script src="/views/assets/scripts/functions.js"></script>
    <script>
        document.body.onload = () => {
            searchCompanies('', 1);
        }
    </script>
</body>
</html>