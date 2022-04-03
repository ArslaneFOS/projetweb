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

        case 'admin/repauth':
            include('views/admin-rep-auth.php');
            break;
            
        case 'admin/companylocations':
            include('views/admin-com-locations.php');
            break;

        case 'admin/offer-skills' :
            include('views/admin-off-skills.php');
            break;

        case 'logout':
            include('controllers/session-destroy.php');
            break;
        case 'applications':
            include('views/applications.php');
            die();
        default:
            echo 404;
            die();
    }
} else {
    include('views/home.php');
}
