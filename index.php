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
            include('views/login.php');
            break;
        case 'users':
            include('views/users.php');
            break;

        case 'admin/companies':
            include('views/admin-companies.php');
            break;
        case 'admin/offers':
            include('views/admin-offers.php');
            break;
        case 'admin/pilots':
            include('views/admin-pilots.php');
            break;
        case 'admin/students':
            include('views/admin-students.php');
            break;
        case 'admin/representatives':
            include('views/admin-reps.php');
            break;
        case 'admin/promotions':
            include('views/admin-promos.php');
            break;
        case 'admin/applications':
            include('views/admin-applications.php');
            break;

            
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
