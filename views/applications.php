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
    <title>My Applications</title>
    <link href="/views/assets/css/companies.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/views/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/views/assets/scripts/functions.js"></script>
</head>

<body>
    <main>


        <!--<div class="hero" >
            <div class="search">

                <input placeholder="Search for a compagny" class="component-2 search-for-an-offer valign-text-middle" id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">

            </div>
        </div>
        <div id="overlay">
            
            
            </div>-->
        <div id="applications-cards">
        <div class="card">
                <h5 class="card-header" style="color:  #198754 ; background-color: lightgreen;">${application.name_offer} - <em>Validation Form Received</em></h5>
                <div class="card-body">
                    <h5 class="card-title">Applied: ${application.app_date}</h5>
                    <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                    <p>A Validation Form was received by you pilot and will be signed as soon as possible</p>
                    <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="3">
                    </div>
            </div>
        </div>
    </main>
    <script>
        document.body.onload = () => {
            getApplications();
        }
    </script>
</body>

</html>