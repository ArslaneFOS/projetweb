<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
</head>
<body>
    <h1>Wishlist</h1>
    <input id="search" type="text" oninput="searchWishlist(document.getElementById('search').value ,1)">

    <script src="/views/assets/scripts/functions.js"></script>
    <script>
        document.body.onload = () => {
            searchWishlist('', 1);
        }
    </script>
</body>
</html>