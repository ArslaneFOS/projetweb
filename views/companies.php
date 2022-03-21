<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <style>
        .company-logo {
            width: 128px;
        }
    </style>
</head>
<body>
    <h1>Companies</h1>
    <script>
        const getLogos = () => {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "http://127.0.0.1/controllers/search-companies.php", true);
            xhr.onload = function () {
                var html = "";
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.response);
                    var data = response.data;
                    data.forEach(company => {
                        var image = new Image();
                        
                        image.src = 'data:image;base64,' + company.logo_com;
                        image.className = 'company-logo';
                        document.body.appendChild(image);
                    });
                }
                else { }
            };
            xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
        };

        document.body.onload = () => {
            getLogos();
        }

    </script>
</body>
</html>