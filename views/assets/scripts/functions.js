
const getCompaniesNames = () => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-company-names.php", true);
    xhr.withCredentials = true;
    xhr.onload = function () {

        if (xhr.status == 200) {
            var companies = JSON.parse(xhr.response);

            companies.forEach(company => {
                var option = new Option(company.name_com, company.id_com);
                document.getElementById('id_com').appendChild(option);
            });

        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const getCompanyAdmin = (id_com) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-company.php?id_com=" + id_com, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var company = JSON.parse(xhr.response);
            document.getElementById('id_com').value = company.id_com;
            document.getElementById('name_com').value = company.name_com;
            document.getElementById('sector_com').value = company.sector_com;
            document.getElementById('nb_interns_com').value = company.nb_interns_com;
            document.getElementById('email_com').value = company.email_com;
            document.getElementById('description_com').value = company.description_com;
            var logo = new Image();
            logo.src = 'data:image;base64,' + company.logo_com;
            logo.className = 'company-logo';
            logo.style = 'width:100%;';
            //document.getElementById('logo').replaceChildren(logo);
            document.querySelector('#update').disabled = false;
            document.querySelector('#create').disabled = true;
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const deleteCompanyAdmin = (id_com) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/delete-company.php?id_com=" + id_com, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            window.location.reload(true);
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const searchCompaniesAdmin = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-companies.php?limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
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
                logo.style = "width: 40px";
                const table = document.querySelector('tbody');


                table.innerHTML += `<tr>
                <td>${company.id_com}</td>
                <td>${company.name_com}</td>
                <td>${company.sector_com}</td>
                <td>${company.nb_interns_com}</td>
                <td>${company.description_com.substring(0, 50) + '...'}</td> 
                <td>${company.email_com}</td> 
                <td id='logo-${company.id_com}'></td> 
                <td><a type="button" onclick="deleteCompanyAdmin(${company.id_com})" class="btn btn-danger">Delete</a></td>
                <td><a href="#" type="button" onclick="getCompanyAdmin(${company.id_com})" class="btn btn-warning">Upload</a></td>
                </tr>`;
                document.getElementById("logo-" + company.id_com).replaceChildren(logo);


            });

        }
        else { }

        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const searchOffers = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-offers.php?limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            offers = result.data;
            offers.forEach(offer => {
                var src = 'data:image;base64,' + offer.logo_com;
                

                document.getElementById('offers-cards').innerHTML += `
                <div class="card-offer" style="width: 80%;">
                <div class="card mb-3" >
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="${src}" class="img-fluid" alt="${offer.name_offer}" style="height: 160px; margin: 20px; border-radius: 10px;
                        object-fit: contain;
                        width: 145px;
                        background-color: #efefef;">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h5 class="card-title">${offer.name_offer}</h5>
                          <p class="card-text"><small class="text-muted">from ${offer.name_com}</small></p>
                          <p class="card-text">${offer.description_offer.substring(0, 200) + '...'}</p>
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center align-items-center flex-column">
                      <h6 class="card-title">${offer.internship_length_offer} Months</h5>
                      <h6 class="card-title">${offer.available_places_offer} Places</h5>
                      <h6 class="card-title">${offer.level_offer} Level</h5>
                      </div>
                    </div>
                  </div>
            </div>`

            });
        }
        else { }

        //document.getElementById("offers-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const searchUsers = (firstname, lastname, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-users.php?firstname=" + encodeURIComponent(firstname) + "&lastname=" + encodeURIComponent(lastname) + "&page=" + page, true);
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
    xhr.open("GET", "http://localhost/controllers/search-wishlist.php?search=" + encodeURIComponent(search) + "&page=" + page, true);
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
                /*
                document.body.innerHTML += (`<p> ${offer.name_offer} ${offer.level_offer} ${offer.pay_offer} ${offer.date_offer} ${offer.available_places_offer} ${offer.description_offer} ${offer.name_com} ${offer.sector_com}</p>`);
                document.body.appendChild(logo);
                */
            });
        }
        else { }

        //document.getElementById("offers-cards").innerHTML = html;
        //document.body.innerHTML += html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const company = () => {
    // define URL and for element
    const create = document.querySelector('#create');
    const form = document.querySelector('form');
    // add event listener
    create.addEventListener('click', e => {
        const url = "/controllers/create-company.php";

        // disable default action
        e.preventDefault();

        // collect files
        const files = document.querySelector('[name=logo_com]').files;
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'logo_com' && name_input != 'id_com') {
                value = input.value;
                formData.append(name_input, value);
            }
        });

        formData.append('logo_com', files[0]);

        // post form data
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        // log response
        xhr.onload = () => {
            alert(xhr.responseText);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        //window.location.reload(true);
    });

    const update = document.querySelector('#update');

    update.addEventListener('click', e => {
        const url = "/controllers/update-company.php";

        // disable default action
        e.preventDefault();

        // collect files
        const files = document.querySelector('[name=logo_com]').files;
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'logo_com') {
                value = input.value;
                formData.append(name_input, value);
            }
        });

        formData.append('logo_com', files[0]);

        // post form data
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        // log response
        xhr.onload = () => {
            alert(xhr.responseText);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        window.location.reload(true);
    });

}

const offer = () => {
    // define URL and for element
    const create = document.querySelector('#create');
    const form = document.querySelector('form');
    // add event listener
    create.addEventListener('click', e => {
        const url = "/controllers/create-offer.php";

        // disable default action
        e.preventDefault();

        // collect files
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'id_offer' && name_input != 'date_offer') {
                value = input.value;
                formData.append(name_input, value);
            }

        });

        // post form data
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        // log response
        xhr.onload = () => {
            alert(xhr.responseText);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
    });

    const update = document.querySelector('#update');

    update.addEventListener('click', e => {
        const url = "/controllers/update-offer.php";

        // disable default action
        e.preventDefault();

        // collect files
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;

            value = input.value;
            formData.append(name_input, value);

        });

        // post form data
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        // log response
        xhr.onload = () => {
            alert(xhr.responseText);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        window.location.reload(true);
    });
}

const getOfferAdmin = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-offer.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var offer = JSON.parse(xhr.response);
            document.getElementById('id_offer').value = offer.id_offer;
            document.getElementById('name_offer').value = offer.name_offer;
            document.getElementById('level_offer').value = offer.level_offer;
            document.getElementById('internship_length_offer').value = offer.internship_length_offer;
            document.getElementById('pay_offer').value = offer.pay_offer;
            document.getElementById('date_offer').value = offer.date_offer;
            document.getElementById('available_places_offer').value = offer.available_places_offer;
            document.getElementById('description_offer').value = offer.description_offer;
            document.getElementById('id_com').value = offer.id_com;
            document.querySelector('#update').disabled = false;
            document.querySelector('#create').disabled = true;
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const deleteOfferAdmin = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/delete-offer.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            window.location.reload(true);
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const searchOfferAdmin = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-offers.php?limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            var offers = result.data;
            offers.forEach(offer => {
                var src = 'data:image;base64,' + offer.logo_com;
                const table = document.querySelector('tbody');


                table.innerHTML += `<tr>
                <td>${offer.id_offer}</td>
                <td>${offer.name_offer}</td>
                <td>${offer.level_offer}</td>
                <td>${offer.internship_length_offer}</td>
                <td>${offer.pay_offer}</td> 
                <td>${offer.date_offer}</td>
                <td>${offer.available_places_offer}</td>
                <td>${offer.description_offer.substring(0, 50) + '...'}</td>
                <td>${offer.id_com}</td> 

                <td id='logo-${offer.id_offer}'></td> 
                <td><a type="button" onclick="deleteOfferAdmin(${offer.id_offer})" class="btn btn-danger">Delete</a></td>
<<<<<<< HEAD
                <td><a href="#" type="button" onclick="getOffer(${offer.id_offer})" class="btn btn-warning">Upload</a></td>
=======
                <td><a href="#" type="button" onclick="getOfferAdmin(${offer.id_offer})" class="btn btn-warning">Upload</a></td>
>>>>>>> 77aade622c87587bcee1bd91fdda59430ab9803d
                </tr>`;
                //document.getElementById("logo-" + offer.id_offer).replaceChildren(logo);


            });

        }
        else { }

        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const searchCompanies = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-companies.php?limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            companies = result.data;
            companies.forEach(company => {
                var src = 'data:image;base64,' + company.logo_com;
                var card_area = document.querySelector('#companies-cards');

                card_area.innerHTML += `<div class="mini-card-4" id="card-${company.id_com}">
                <div class="overlap-group1">
                  <img class="image-3" src="${src}" id="logo-${company.id_com}"/>
                </div>
                <div class="flex-row-1">
                  <div class="productivity">${company.sector_com}</div>
                  <div class="x3-days-ago">${company.nb_interns_com} Interns</div>
                </div>
                <div class="heading-description">
                  <div class="x7-skills-of-highly-e">${company.name_com}</div>
                  <p class="our-team-was-inspire">
                    ${company.description_com.substring(0, 150) + '...'}
                  </p>
                </div>
                <div class="read-more opensans-semi-bold-azure-radiance-11px">
                  <a href="#" class="opensans-semi-bold-azure-radiance-11px">Read more </a>
                </div>
              </div>`;
                //document.getElementById("logo-" + company.id_com).replaceChildren(logo);


            });

        }
        else { }

        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};
