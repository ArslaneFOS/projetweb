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
    <script src="/views/assets/scripts/functions.js"></script>
    <link href="/views/assets/css/companies.css" rel="stylesheet">

</head>

<body>
    <main>

    
    <div class="hero">
        <div class="search">

            <input placeholder="Search for a compagny" class="component-2 search-for-an-offer valign-text-middle" id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">

        </div>
    </div>
    <div id="companies-cards">

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
</body>

</html>