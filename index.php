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
            /*
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
        default:
            echo '404';
            break;
    }
} else {
    include('views/home.php');
}
