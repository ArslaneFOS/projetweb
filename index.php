<?php

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            include('views/home.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;
        case 'companies':
            include('views/companies.php');
            break;
        case 'wishlist':
            include('views/wishlist.php');
            break;
        case 'login':
<<<<<<< HEAD
            include('views/login.php');
            break;

            /*
=======
            include('views/login.html');
<<<<<<< HEAD
=======
            break;/*
>>>>>>> 756ea0bed142f9d00678e0ae60c027c8cc2c9079
        case 'offers':
            include('views/offers.php');
>>>>>>> 15db795fb188fba600929472728d6457dbfacd3e
            break;
        case 'users':
            include('views/users.php');
            break;/*
        case 'offers':
            include('views/offers.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;
        case 'offers':
            include('views/offers.php');
            break;*/
        case 'test/login':
            include('views/tests/login.html');
            break;

        case 'test/upload-company':
            include('views/tests/upload-company.html');
            break;

        case 'test/upload-offer':
            include('views/tests/upload-offer.html');
            break;
        case 'test/passhasher':
            include('views/tests/password-hasher.html');
            break;
        case 'test/update-offer':
            include('views/tests/update-offer.html');
            break;
        case 'test/update-company':
            include('views/tests/update-company.html');
            break;
        case 'test/setrepauth':
            include('views/tests/set-rep-auth.html');
            die();
        case 'test/application':
            include('views/tests/application.html');
            die();
        case 'test/application-update':
            include('views/tests/application-update.html');
            die();
        default:
            echo 404;
            die();
    }
} else {
    include('views/home.php');
}
