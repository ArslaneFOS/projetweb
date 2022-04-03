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
            alert(xhr.response);
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
                <td><a type="button" onclick="deleteCompanyAdmin(${company.id_com})" class="btn btn-secondary">Delete</a></td>
                <td><a href="#" type="button" onclick="getCompanyAdmin(${company.id_com})" class="btn btn-light">Upload</a></td>
                <td><a href="/admin/companylocations?id_com=${company.id_com}" type="button" class="btn btn-light">Locations</a></td>
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
                        <img src="${src}" class="img-fluid" alt="${offer.name_offer}" style="height: 145px; margin: 20px; border-radius: 10px;
                        object-fit: contain;
                        width: 145px;
                        background-color: #efefef;">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h5 class="card-title">${offer.name_offer}</h5>
                          <p class="card-text"><small class="text-muted">from ${offer.name_com}</small></p>
                          <p class="card-text">${offer.description_offer.substring(0, 200)}...&nbsp;<a href="#" onclick="getOfferOverlay(${offer.id_offer})">Read&nbsp;More</a></p>
                          <div class="btn btn-secondary col-md-4 col-12" onclick="addToWishlist(${offer.id_offer})">Add&nbsp;To&nbsp;Wishlist</div>
                          <div class="btn btn-primary col-md-7 col-12" onclick="getApplyOverlay(${offer.id_offer})">Apply</div>
                          </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center align-items-center flex-column">
                      <h6 class="card-title">${offer.internship_length_offer} Months</h5>
                      <h6 class="card-title">${offer.available_places_offer} Places</h5>
                      <h6 class="card-title">${offer.level_offer} Level</h5>
                      <div class="btn btn-info" onclick="getOfferStats(${offer.id_offer})">Statistics</div>
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
            var src = '/views/assets/images/user-icon.png';
            users.forEach(user => {
                document.getElementById('users-cards').innerHTML += `
                <div class="card-offer" style="width: 80%;">
                <div class="card mb-3" >
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="${src}" class="img-fluid" alt="${user.lastname}" style="height: 160px; margin: 20px; border-radius: 10px;
                        object-fit: contain;
                        width: 145px;
                        background-color: #efefef;">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h5 class="card-title">${user.lastname} ${user.firstname}</h5>
                          <p class="card-text"><small class="text-muted">from ${user.name_center}</small></p>
                          
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>`
                //<p class="card-text"><small class="text-muted">from ${user.name_prom}</small></p>
                //<p class="card-text"><small class="text-muted">from ${user.level_prom}</small></p>

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
                var src = 'data:image;base64,' + offer.logo_com;


                document.getElementById('wishlist-cards').innerHTML += `
                <div class="card-offer" style="width: 80%;" id="offer-${offer.id_offer}">
                <div class="card mb-3" >
                <div class="btn btn-danger" style="position: absolute;right:10px;top: 10px;" onclick="deleteFromWishlist(${offer.id_offer});">X</div>
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
                                <h6 class="card-title">${offer.level_offer} Level</h5>
                            </div>
                        </div>
                    </div>
                </div>`
            });
        }
        else { }

        //document.getElementById("offers-cards").innerHTML = html;
        //document.body.innerHTML += html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const deleteFromWishlist = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/delete-from-wishlist.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            alert(xhr.response);
            window.location.reload(true);
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const addToWishlist = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/add-to-wishlist.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            alert(xhr.responseText);
            //window.location.reload(true);
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

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
            window.location.reload(true);
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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        //window.location.reload(true);
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
            window.location.reload(true);
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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        //window.location.reload(true);
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
            alert(xhr.response);

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
                <td><a type="button" onclick="deleteOfferAdmin(${offer.id_offer})" class="btn btn-secondary">Delete</a></td>
                <td><a href="#" type="button" onclick="getOfferAdmin(${offer.id_offer})" class="btn btn-light">Upload</a></td>
                <td><a href="/admin/offer-skills?id_offer=${offer.id_offer}" type="button" class="btn btn-light">Skills</a></td>
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
                    <div class="btn btn-primary" onclick="getCompanyStats(${company.id_com})">Statistics</div>
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


/*const user = () => {
    // define URL and for element
    const create = document.querySelector('#create');
    const form = document.querySelector('form');
    // add event listener
    create.addEventListener('click', e => {
        const url = "/controllers/create-user.php";

        // disable default action
        e.preventDefault();

        // collect files
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'id_user') {
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
        const url = "/controllers/update-user.php";

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
        //window.location.reload(true);
    });
}*/

const deleteUserAdmin = (login) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/delete-user.php?login=" + login, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            alert(xhr.response);
            window.location.reload(true);
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const searchStudentsAdmin = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-users.php?user_type=student&limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            users = result.data;
            users.forEach(user => {

                const table = document.querySelector('tbody');


                table.innerHTML += `<tr>
                <td>${user.id_user}</td>
                <td>${user.lastname}</td>
                <td>${user.firstname}</td>
                <td>${user.id_prom}</td>
                <td>${user.login}</td>
                <td>${user.password.substring(0, 15)}...</td>
                <td>${user.id_center} - ${user.name_center}</td>
                <td><button type="button" onclick="deleteUserAdmin('${user.login}')" class="btn btn-secondary">Delete</button></td>
                <td><button type="button" onclick="getStudentAdmin(${user.id_user})" class="btn btn-light">Upload</button></td>
                <td><button type="button" onclick="getStudentStats(${user.id_user})" class="btn btn-secondary">Statistics</button></td>
                </tr>`;
            });

        }
        else { }

        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const getStudentAdmin = (id_user) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-user.php?user_type=student&id_user=" + id_user, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var user = JSON.parse(xhr.response);
            document.getElementById('id_user').value = user.id_user;
            document.getElementById('lastname').value = user.lastname;
            document.getElementById('firstname').value = user.firstname;
            document.getElementById('id_prom').value = user.id_prom
            document.getElementById('login').value = user.login;
            document.getElementById('id_center').value = user.id_center;

            //document.getElementById('logo').replaceChildren(logo);
            document.querySelector('#update').disabled = false;
            document.querySelector('#create').disabled = true;
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}
const student = () => {
    // define URL and for element
    const create = document.querySelector('#create');
    const form = document.querySelector('form');
    // add event listener
    create.addEventListener('click', e => {
        const url = "/controllers/create-student.php";

        // disable default action
        e.preventDefault();

        // collect files
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'id_user') {
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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
    });

    const update = document.querySelector('#update');

    update.addEventListener('click', e => {
        const url = "/controllers/update-student.php";

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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        //window.location.reload(true);
    });
}

const representative = () => {
    // define URL and for element
    const create = document.querySelector('#create');
    const form = document.querySelector('form');
    // add event listener
    create.addEventListener('click', e => {
        const url = "/controllers/create-representative.php";

        // disable default action
        e.preventDefault();

        // collect files
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'id_user') {
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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
    });

    const update = document.querySelector('#update');

    update.addEventListener('click', e => {
        const url = "/controllers/update-representative.php";

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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        //window.location.reload(true);
    });
}

const searchRepresentativesAdmin = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-users.php?user_type=representative&limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            var reps = result.data;
            reps.forEach(rep => {
                const table = document.querySelector('tbody');


                table.innerHTML += `<tr>
                <td>${rep.id_user}</td>
                <td>${rep.lastname}</td>
                <td>${rep.firstname}</td>
                <td>${rep.login}</td>
                <td>${rep.password.substring(0, 15)}...</td>
                <td>${rep.id_center} - ${rep.name_center}</td>
                <td><button class="btn btn-secondary" type="button" onclick="deleteUserAdmin('${rep.login}')">Delete</button></td>
                <td><a href="#" class="btn btn-light" type="button" onclick="getRepresentativeAdmin(${rep.id_user})">Upload</a></td>
                <td><a href="/admin/repauth?id_rep=${rep.id_user}" type="button" class="btn btn-dark">Auths</a></td>
            </tr>`;
                //document.getElementById("logo-" + offer.id_offer).replaceChildren(logo);


            });

        }
        else { }

        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};

const getRepresentativeAdmin = (id_rep) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-user.php?user_type=representative&id_user=" + id_rep, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var user = JSON.parse(xhr.response);
            document.getElementById('id_user').value = user.id_user;
            document.getElementById('lastname').value = user.lastname;
            document.getElementById('firstname').value = user.firstname;
            document.getElementById('id_center').value = user.id_center;
            document.getElementById('login').value = user.login;
            document.getElementById('id_center').value = user.id_center

            //document.getElementById('logo').replaceChildren(logo);
            document.querySelector('#update').disabled = false;
            document.querySelector('#create').disabled = true;
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}
const pilot = () => {
    // define URL and for element
    const create = document.querySelector('#create');
    const form = document.querySelector('form');
    // add event listener
    create.addEventListener('click', e => {
        const url = "/controllers/create-pilot.php";

        // disable default action
        e.preventDefault();

        // collect files
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            //console.log(input);
            name_input = input.name;
            if (name_input != 'id_user') {
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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
    });

    const update = document.querySelector('#update');

    update.addEventListener('click', e => {
        const url = "/controllers/update-pilot.php";

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
            window.location.reload(true);
        };

        // create and send the reqeust
        xhr.open('POST', url);
        xhr.send(formData);
        form.reset();
        create.disabled = false;
        update.disabled = true;
        //window.location.reload(true);
    });
}
const searchPilotsAdmin = (search, page) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/controllers/search-users.php?user_type=pilot&limit=10000&search=" + encodeURIComponent(search) + "&page=" + page, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        var html = "";
        if (xhr.status == 200) {
            result = JSON.parse(xhr.response);
            var pilots = result.data;
            pilots.forEach(pilot => {
                const table = document.querySelector('tbody');


                table.innerHTML += `<tr>
                <td>${pilot.id_user}</td>
                <td>${pilot.lastname}</td>
                <td>${pilot.firstname}</td>
                <td>${pilot.login}</td>
                <td>${pilot.password.substring(0, 15)}...</td>
                <td>${pilot.id_center} - ${pilot.name_center}</td>
                <td><button class="btn btn-secondary" type="button" onclick="deleteUserAdmin('${pilot.login}')">Delete</button></td>
                <td><a href="#" class="btn btn-light" type="button" onclick="getPilotAdmin(${pilot.id_user})">Upload</a></td>
                <td><button type="button">Modify</button></td>
            </tr>`;
                //document.getElementById("logo-" + offer.id_offer).replaceChildren(logo);


            });

        }
        else { }

        //document.getElementById("companies-cards").innerHTML = html;
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
};
const getPilotAdmin = (id_pilot) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-user.php?user_type=pilot&id_user=" + id_pilot, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var user = JSON.parse(xhr.response);
            document.getElementById('id_user').value = user.id_user;
            document.getElementById('lastname').value = user.lastname;
            document.getElementById('firstname').value = user.firstname;
            document.getElementById('id_center').value = user.id_center;
            document.getElementById('login').value = user.login;
            document.getElementById('id_center').value = user.id_center

            //document.getElementById('logo').replaceChildren(logo);
            document.querySelector('#update').disabled = false;
            document.querySelector('#create').disabled = true;
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getRepAuths = (id_rep) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-rep-auths.php?id_user=" + id_rep, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var auths = JSON.parse(xhr.response);
            //console.log(auths);

            Object.entries(auths).forEach(auth => {
                document.getElementById('checkboxes').innerHTML += `<input type="checkbox" name="auth[]" id="${auth[0]}" value="${auth[0]}" ${auth[1] ? 'checked' : ''}/><label for="${auth[0]}">${auth[0].toUpperCase()}</label><br/>
                    `;
                //document.getElementById(auth[0]).checked = auth[1];


            });
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getCompanyLocs = (id_com) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-company-locations.php?id_com=" + id_com, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var locations = JSON.parse(xhr.response);
            //console.log(auths);

            Object.entries(locations).forEach(location => {
                document.getElementById('checkboxes').innerHTML += `<input type="checkbox" name="local[]" id="${location[0]}" value="${location[0]}" ${location[1] ? 'checked' : ''}/><label for="${location[0]}">${location[0]}</label><br/>`;


            });
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getOfferSkills = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-offer-skills.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var skills = JSON.parse(xhr.response);
            //console.log(auths);

            Object.entries(skills).forEach(skill => {
                document.getElementById('checkboxes').innerHTML += `<input type="checkbox" name="skill[]" id="${skill[0]}" value="${skill[0]}" ${skill[1] ? 'checked' : ''}/><label for="${skill[0]}">${skill[0].toUpperCase()}</label><br/>`;


            });
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getCompanyStats = (id_com) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/stats-company.php?id_com=" + id_com, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var stats = JSON.parse(xhr.response);
            //console.log(auths);
            var overlay = document.getElementById('overlay');
            overlay.innerHTML =
                `<div id="stat-card" >
                <button  type="button" class="close btn btn-danger" aria-label="Close" onclick="document.getElementById('overlay').style.display = 'none';">x</button>
                <canvas height="max-content" id="companyChart"></canvas>
                <table>
                    <tr>
                        <th>Latest offers</th>
                    </tr>
                    <tbody></tbody>
                </table>
            </div>`
            const ctx = document.getElementById('companyChart');
            const companyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Offers',
                        'Total Locations',
                        'Average Student Rating',
                        'Average Pilot Rating'],
                    datasets: [{
                        label: '',
                        data: [stats.total_offers, stats.total_locations, stats.average_student_rating, stats.average_pilot_rating],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            stats.last_ten_offers.forEach(offer => {
                document.querySelector('tbody').innerHTML += `<tr><td>${offer}</td></tr>`
            });
            overlay.style.display = 'block';
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getOfferStats = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/stats-offer.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var stats = JSON.parse(xhr.response);
            console.log(stats);
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'block';
            overlay.innerHTML =
                `<div id="stat-card">
                <button  type="button" class="close btn btn-danger" aria-label="Close" onclick="document.getElementById('overlay').style.display = 'none';">x</button>
                <canvas height="max-content" id="offerChart"></canvas>
            </div>`
            const ctx = document.getElementById('offerChart');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total App.',
                        'Total Active App.',
                        'Total Skills',
                        'Total Accepted App.',
                        'Total Refused App.'],
                    datasets: [{
                        label: '',
                        data: [stats.total_applications, stats.total_active_applications, stats.total_required_skills, stats.total_accepted_applications, stats.total_refused_applications],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getStudentStats = (id_student) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/stats-student.php?id_student=" + id_student, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var stats = JSON.parse(xhr.response);

            var overlay = document.getElementById('overlay');
            overlay.innerHTML =
                `<div id="stat-card" >
                <button  type="button" class="close btn btn-danger" aria-label="Close" onclick="document.getElementById('overlay').style.display = 'none';">x</button>
                <canvas height="max-content" id="studentChart"></canvas>
                <table>
                    <tr>
                        <th>Latest Applications</th>
                    </tr>
                    <tbody id="stat"></tbody>
                </table>
            </div>`
            const ctx = document.getElementById('studentChart');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total App.',
                        'Total Accepted App.',
                        'Total Refused App.',
                        'Total Evals',
                        'Total Wishlist'],
                    datasets: [{
                        label: '',
                        data: [stats.total_student_applications, stats.total_accepted_applications, stats.total_refused_applications, stats.total_student_evals, stats.total_student_wishlist],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            stats.last_ten_applications.forEach(offer => {
                document.querySelector('#stat').innerHTML += `<tr><td>${offer}</td></tr>`
            });
            overlay.style.display = 'block';
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getOfferOverlay = (id_offer) => {

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-offer.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var offer = JSON.parse(xhr.response);
            var overlay = document.getElementById('overlay');
            overlay.innerHTML =
                `<div class="card" id="offer-card" style="background-color: white; width:90%;margin:0 5%">
                <button type="button" class="close btn btn-danger" aria-label="Close" onclick="document.getElementById('overlay').style.display = 'none';">x</button>
                <div class="card-body">
                  <h3 class="card-title">${offer.name_offer}</h3>
                  <br>
                    <div class="container ">
                      <div class="row">
                        <div class="col-md-4">
                          <h5 class="card-subtitle mb-2 text-muted">Offer Name by ${offer.name_com}</h5>
                          <br>
                          <ul>
                            <li><p>Available from: ${offer.level_offer}</p></li>
                            <li><p>Lenght: ${offer.internship_length_offer} Months</p></li>
                            <li><p>Pay: ${offer.pay_offer} Euro/h.</p></li>
                            <li><p>Available Places: ${offer.available_places_offer}</p></li>
                          </ul>
                        </div>
                        
                      </div>
                    </div>
                  <h3>Description :</h3>
                  <div class="col-md-12 d-flex align-items-center flex-column">
                    <br>
                    <p>${offer.description_offer}</p>
                    
                  </div>
                  <br>
                  <br>
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-2">
                      <i class="bi bi-calendar-check"></i>
                      <h5 class="card-subtitle mb-1 text-muted">${offer.internship_length_offer} Months</h5>
                    </div>
                    <div class="col-md-2">
                      <i class="bi bi-briefcase-fill"></i>
                      <h5 class="card-subtitle mb-1 text-muted">${offer.available_places_offer} Places</h5>
                    </div>
                    <div class="col-md-2">
                      <i class="bi bi-person"></i>
                      <h5 class="card-subtitle mb-1 text-muted">Level: ${offer.level_offer}</h5>
                    </div>
            
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-mb-6 bg-light d-flex justify-content-between flex-column">
                    <h3>Contact company:</h3>
                    <br>
                    <br>
                    <p class="text-muted">${offer.email_com}</p>
              
                  </div>
              
                </div>
                
              </div>
              </div>`
            overlay.style.display = 'block';
            document.getElementById('offer-card').style.height = '100%';
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)

}

const getApplyOverlay = (id_offer) => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-offer.php?id_offer=" + id_offer, true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var offer = JSON.parse(xhr.response);
            var overlay = document.getElementById('overlay');
            overlay.innerHTML =
            `<div class="card" id="apply-card" style="background-color: white; width:90%;margin:0 5%">
            <button  type="button" class="close btn btn-danger" aria-label="Close" onclick="document.getElementById('overlay').style.display = 'none';">x</button>
        
            <div class="card-body d-flex align-items-center flex-column">
              <h2 class="card-title">Apply to ${offer.name_offer}</h3>
                <br>
                <h4 class="text-muted">Resume :</h3>
                  <br>
                  <div class="container d-flex align-items-center flex-column">
                  <form method="post" action="/controllers/apply-offer.php" enctype="multipart/form-data">
                  <input type="number" name="id_offer" id="id_offer" style="display: none;" value="${offer.id_offer}"/><br>
                        <div class="row d-flex align-items-center flex-column">
                        <div class="col-mb-8 bg-light d-flex align-items-center flex-column">
                        <i class="bi bi-upload"></i>
                        <h4>Drag and drop resume here or</h4>
                        <br>
                        <br>
                        <label for="resume" class="btn btn-primary">Resume</label>
                        <input type="file" id="resume" name="resume" style="display: none;"/>
                      </div>
                    </div>
                    <br>
                    <h4 class="text-muted">Motivation letter :</h3>
                      <br>
                      <div class="row">
                        <div class="col-mb-8 bg-light d-flex align-items-center flex-column">
                          <i class="bi bi-upload"></i>
                          <h4>Drag and drop letter here or</h4>
                          <br>
                          <br>
                          <label for="motivation"  class="btn btn-primary">Motivation Letter</label>
                          <input type="file" id="motivation" name="motivation" style="display: none;"/>
                        </div>
                      </div>
                      <br>
                      <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        
                    </form>
        
                  </div>
            </div>
        
        
        
        
          </div>`
            overlay.style.display = 'block';
            document.getElementById('apply-card').style.height = '100%';
            console.log(window.innerHeight);
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getApplications = () => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-applications.php?limit=10000", true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var result = JSON.parse(xhr.response);
            var cards = document.getElementById('applications-cards');
            var applications = result.data;
            applications.forEach(application => {
                switch (application.status) {
                    case 'step 1':
                        cards.innerHTML += `
                        <div class="card">
                            <h5 class="card-header">${application.name_offer}</h5>
                            <div class="card-body">
                                <h5 class="card-title">Applied: ${application.app_date}</h5>
                                <p class="card-text ">${application.description_offer.substring(0, 100)}... </p>
                                <form method="post" action="/controllers/update-application.php" enctype="multipart/form-data">
                                    <input type="number" name="id_offer" id="id_offer" value="${application.id_offer}" style="display: none;">
                                    <button type="submit" name="submit" value="step 2-response" class="btn btn-primary">Company Responded</button>
                                    <button type="submit" name="submit" value="step 2-no-response" class="btn btn-primary">Company Didn't Respond</button>
                                </form>
                                <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                                <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>

                                <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="1">
                            </div>
                        </div>
                        `
                        break;
                    case 'step 2-no-response':
                        cards.innerHTML += `<div class="card">
                    <h5 class="card-header" style="color: #dc3545; background-color: lightpink;">${application.name_offer} - <em>No Response</em></h5>
                    <div class="card-body">
                        <h5 class="card-title">Applied: ${application.app_date}</h5>
                        <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                        <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                        <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>

                        <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="2">
                        </div>
                </div>`;
                        break;
                    case 'step 2-response':
                        cards.innerHTML += `
                        <div class="card">
                <h5 class="card-header" style="color: #0d6efd; background-color: lightcyan;">${application.name_offer} - <em>Response Received</em></h5>
                <div class="card-body">
                    <h5 class="card-title">Applied: ${application.app_date}</h5>
                    <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                    <p>A Validation Form will be sent as soon as possible</p>
                    <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                        <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                    <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="2">
                    </div>
            </div>
                        `;
                        break;
                    case 'step 3':
                        cards.innerHTML += `
                        <div class="card">
                <h5 class="card-header" style="color:  #198754 ; background-color: lightgreen;">${application.name_offer} - <em>Validation Form Received</em></h5>
                <div class="card-body">
                    <h5 class="card-title">Applied: ${application.app_date}</h5>
                    <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                    <p>A Validation Form was received by you pilot and will be signed as soon as possible</p>
                    <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                        <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                        <a download="validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>

                    <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="3">
                </div>
            </div>
                        `;
                        break;
                    case 'step 4':
                        cards.innerHTML += `
                    <div class="card">
                        <h5 class="card-header" style="color:  #6f42c1 ; background-color: #E2D9F3;">${application.name_offer} - <em>Validation Form Signed</em></h5>
                        <div class="card-body">
                            <h5 class="card-title">Applied: ${application.app_date}</h5>
                            <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                            <p>Validation Form was signed by your pilot, an internship agreement will be sent very soon.</p>
                            <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                            <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                            <a download="signed-validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>
        
                            <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="4">
                        </div>
                    </div>
                        `
                        break;
                    case 'step 5':
                        cards.innerHTML += `
                        <div class="card">
                        <h5 class="card-header" style="color:  #664D03 ; background-color:#FFE69C;">${application.name_offer} - <em>Contract Sent</em></h5>
                        <div class="card-body">
                            <h5 class="card-title">Applied: ${application.app_date}</h5>
                            <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                            <p>Internship Contract was sent to ${application.name_com}. You should receive a response very soon</p>
                            <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                            <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                            <a download="signed-validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>
                            <a download="agreement.pdf" href="data:application/pdf;base64,${application.internship_agreement}">Validation Form</a>
                            <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="5">
                        </div>
                    </div>
                        `
                        break;
                    case 'step 6':
                        cards.innerHTML += `
                        <div class="card">
                        <h5 class="card-header" style="color:  #D1E7DD ; background-color: #0A3622;">${application.name_offer} - <em>You Got It!</em></h5>
                        <div class="card-body">
                            <h5 class="card-title">Applied: ${application.app_date}</h5>
                            <p class="card-text">${application.description_offer.substring(0, 100)}... </p>
                            <p>Internship Contract was signed by ${application.name_com}. You are accepted for this internship! Your Center will handle the rest.</p>
                            <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                            <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                            <a download="signed-validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>
                            <a download="signed-agreement.pdf" href="data:application/pdf;base64,${application.internship_agreement}">Internship Contract</a>
                            <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="6">
                        </div>
                    </div>
                        `
                        break;
                    default:
                        break;
                }
                
            });
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}

const getApplicationsAdmin = () => {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/controllers/get-applications.php?limit=10000", true);
    xhr.withCredentials = true;
    xhr.onload = function () {
        if (xhr.status == 200) {
            var result = JSON.parse(xhr.response);
            var cards = document.getElementById('applications-cards');
            var applications = result.data;
            applications.forEach(application => {
                switch (application.status) {
                    case 'step 1':
                        cards.innerHTML += `
                        <div class="card">
        <h5 class="card-header">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
        <div class="card-body">
          <h5 class="card-title">Applied: ${application.app_date}</h5>
          <form method="post" action="/controllers/update-application.php" enctype="multipart/form-data">
              <input type="number" name="id_offer" id="id_offer" value="${application.id_offer}" style="display: none;"/>
              <input type="number" name="id_student" id="id_student" value="${application.id_student}" style="display: none;"/>
              <button type="submit" name="submit" value="step 2-response" class="btn btn-primary">Response</button>
              <button type="submit" name="submit" value="step 2-no-response" class="btn btn-danger">No Response</button>
          </form>
          <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
          <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>

          <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="1">
        </div>
      </div>
                        `
                        break;
                    case 'step 2-no-response':
                        cards.innerHTML += `<div class="card">
                    <h5 class="card-header" style="color: #dc3545; background-color: lightpink;">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
                    <div class="card-body">
                        <h5 class="card-title">Applied: ${application.app_date}</h5>
                        <p class="card-text" style="color: #dc3545;">No Response</p>
                        <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                        <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>

                        <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="2">
                        </div>
                </div>`;
                        break;
                    case 'step 2-response':
                        cards.innerHTML += `
                        <div class="card">
                <h5 class="card-header" style="color: #0d6efd; background-color: lightcyan;">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
                <div class="card-body">
                    <h5 class="card-title">Applied: ${application.app_date}</h5>
                    <form method="post" action="/controllers/update-application.php" enctype="multipart/form-data">
                        <input type="number" name="id_student" id="id_student" value="${application.id_student}" style="display:none;"/>
                        <input type="number" name="id_offer" id="id_offer" value=${application.id_offer} style="display:none;"/>
                        <label for="validation_form" class="btn btn-primary">Upload Validation Form</label>
                        <input type="file" id="validation_form" name="validation_form" style="display:none;"/><br>
                        <button type='submit' name='submit' value='step 3' class='btn btn-secondary'>Submit</button>
                    </form>
                    <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                        <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                    <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="2">
                    </div>
            </div>
                        `;
                        break;
                    case 'step 3':
                        cards.innerHTML += `
                        <div class="card">
                <h5 class="card-header" style="color:  #198754 ; background-color: lightgreen;">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
                <div class="card-body">
                    <h5 class="card-title">Applied: ${application.app_date}</h5>
                        <form method="post" action="/controllers/update-application.php" enctype="multipart/form-data">
                            <input type="number" name="id_student" id="id_student" value="${application.id_student}" style="display:none;"/>
                            <input type="number" name="id_offer" id="id_offer" value=${application.id_offer} style="display:none;"/>
                            <label for="validation_form" class="btn btn-primary">Upload Signed Validation Form</label>
                            <input type="file" id="validation_form" name="validation_form" style="display:none;"/><br>
                            <button type='submit' name='submit' value='step 4' class='btn btn-secondary'>Submit</button>
                        </form>
                        <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                        <a download="validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>

                    <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="3">
                </div>
            </div>
                        `;
                        break;
                    case 'step 4':
                        cards.innerHTML += `
                    <div class="card">
                        <h5 class="card-header" style="color:  #6f42c1 ; background-color: #E2D9F3;">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Applied: ${application.app_date}</h5>
                            <form method="post" action="/controllers/update-application.php" enctype="multipart/form-data">
                                <input type="number" name="id_student" id="id_student" value="${application.id_student}" style="display:none;"/>
                                <input type="number" name="id_offer" id="id_offer" value=${application.id_offer} style="display:none;"/>
                                <label for="internship_agreement" class="btn btn-primary">Upload Internship Agreement</label>
                                <input type="file" id="internship_agreement" name="internship_agreement" style="display:none;"/><br>
                                <button type='submit' name='submit' value='step 5' class='btn btn-secondary'>Submit</button>
                            </form>
                            <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                            <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                            <a download="signed-validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>
        
                            <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="4">
                        </div>
                    </div>
                        `
                        break;
                    case 'step 5':
                        cards.innerHTML += `
                        <div class="card">
                        <h5 class="card-header" style="color:  #664D03 ; background-color:#FFE69C;">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Applied: ${application.app_date}</h5>
                            <form method="post" action="/controllers/update-application.php" enctype="multipart/form-data">
                                <input type="number" name="id_student" id="id_student" value="${application.id_student}" style="display:none;"/>
                                <input type="number" name="id_offer" id="id_offer" value=${application.id_offer} style="display:none;"/>
                                <label for="internship_agreement" class="btn btn-primary">Upload Internship Agreement</label>
                                <input type="file" id="internship_agreement" name="internship_agreement" style="display:none;"/><br>
                                <button type='submit' name='submit' value='step 6' class='btn btn-secondary'>Submit</button>
                            </form>
                            <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                            <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                            <a download="signed-validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>
                            <a download="agreement.pdf" href="data:application/pdf;base64,${application.internship_agreement}">Validation Form</a>
                            <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="5">
                        </div>
                    </div>
                        `
                        break;
                    case 'step 6':
                        cards.innerHTML += `
                        <div class="card">
                        <h5 class="card-header" style="color:  #D1E7DD ; background-color: #0A3622;">${application.id_student} - ${application.id_offer} - ${application.firstname} ${application.lastname} - ${application.name_offer} ${application.status}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Applied: ${application.app_date}</h5>
                            <p>Accepted</p>
                            <a download="resume.pdf" href="data:application/pdf;base64,${application.resume}">Resume</a>
                            <a download="motivation.pdf" href="data:application/pdf;base64,${application.motivation_letter}">Motivation Letter</a>
                            <a download="signed-validation.pdf" href="data:application/pdf;base64,${application.validation_form}">Validation Form</a>
                            <a download="signed-agreement.pdf" href="data:application/pdf;base64,${application.internship_agreement}">Internship Contract</a>
                            <input type="range" min="1" max="6" class="form-range" id="disabledRange" disabled value="6">
                        </div>
                    </div>
                        `
                        break;
                    default:
                        break;
                }
                
            });
        }
        else { }
    };
    xhr.send(); //Envoi de la requête au serveur (asynchrone par défaut)
}