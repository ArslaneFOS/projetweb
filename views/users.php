<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interns</title>
</head>
<body>
    <h1>Users</h1>
    <input id="firstname" type="text" oninput="searchUsers(document.getElementById('firstname').value, document.getElementById('lastname').value ,1)">
    <input id="lastname" type="text" oninput="searchUsers(document.getElementById('firstname').value, document.getElementById('lastname').value ,1)">

    <script src="/views/assets/scripts/functions.js"></script>
    <script>
        document.body.onload = () => {
            searchUsers('', '', 1);
        }
    </script>
</body>
</html>