const searchCompanies = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/search-companies.php?search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            companies = result.data;
            companies.forEach(company => {
                var logo = new Image();
                
                logo.src = 'data:image;base64,' + company.logo_com;
                logo.className = "company-logo";
                // generer les cards ici
                //...
                
                
            });

        }
        else { }
        
        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const searchOffers = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/search-offers.php?search=" + encodeURIComponent(search) + "&page=" + page, true);
    console.log("/controllers/search-offers.php?search=" + encodeURIComponent(search) + "&page=" + page);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            offers = result.data;
            offers.forEach(offer => {
                var logo = new Image();
                
                logo.src = 'data:image;base64,' + offer.logo_com;
                logo.className = "company-logo";
                logo.style = "width: 128px;";
                // generer les cards ici
                //...
                
                document.body.innerHTML += (`<p> ${offer.name_offer} ${offer.level_offer} ${offer.pay_offer} ${offer.date_offer} ${offer.available_places_offer} ${offer.description_offer} ${offer.name_com} ${offer.sector_com}</p>`);
                document.body.appendChild(logo);
            });
        }
        else { }
        
        //document.getElementById("offers-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const searchUsers = (firstname, lastname, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/search-users.php?firstname=" + encodeURIComponent(firstname) + "&lastname=" + encodeURIComponent(lastname) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            users = result.data;
            users.forEach(user => {
                // generer les cards ici
                
            });

        }
        else { }
        
        //document.getElementById("users-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const searchWishlist = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/search-wishlist.php?search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            offers = result.data;
            offers.forEach(offer => {
                var logo = new Image();
                
                logo.src = 'data:image;base64,' + offer.logo_com;
                logo.className = "company-logo";
                logo.style = "width: 128px;";
                // generer les cards ici
                //...
                
                document.body.innerHTML += (`<p> ${offer.name_offer} ${offer.level_offer} ${offer.pay_offer} ${offer.date_offer} ${offer.available_places_offer} ${offer.description_offer} ${offer.name_com} ${offer.sector_com}</p>`);
                document.body.appendChild(logo);
            });
        }
        else { }
        
        //document.getElementById("offers-cards").innerHTML = html;
        //document.body.innerHTML += html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};