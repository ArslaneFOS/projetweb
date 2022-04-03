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
    <link href="/views/assets/css/companies.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/views/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/views/assets/scripts/functions.js"></script>
    <style>
        #overlay {
            position: fixed;
            /* Sit on top of the page content */
            display: none;
            /* Hidden by default */
            width: 100%;
            /* Full width (cover the whole page) */
            height: 100%;
            /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black background with opacity */
            z-index: 1000;
            /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer;
            /* Add a pointer on hover */
        }

        #stat-card {
            margin: 100px 25%;
            width: 50%;
            background-color: white;
            border-radius: 18.5px;
            padding: 20px;
        }

        @media screen and (max-width: 800px) {
            #stat-card {
                width: 90%;
                margin: 0 5%;                
                height: max-content;
            }
        }
    </style>
</head>

<body>
<?php
  include('header.php');
  ?>
    <main>


        <div class="hero" >
            <div class="search">

                <input placeholder="Search for a compagny" class="component-2 search-for-an-offer valign-text-middle" id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">

            </div>
        </div>
        <div id="companies-cards">
        </div>
        <div id="overlay">


        </div>
    </main>
    
    <script>
        document.body.onload = () => {
            searchCompanies('', 1);
            document.getElementById('search').oninput = () => {
                document.getElementById('companies-cards').innerHTML = '';
                searchCompanies(document.getElementById('search').value, 1);
            }
        }
    </script>
    <?php
  include('footer.php');
  ?>
</body>

</html>