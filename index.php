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
        default:
            echo '404';
            break;
    }
} else {
    include('views/home.php');
}
