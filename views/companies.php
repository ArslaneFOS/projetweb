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
    <style>
        @import url("https://fonts.googleapis.com/css?family=Quicksand:400,700,600|Open+Sans:400,700,600|DM+Serif+Display:400|Roboto:400,700|Nunito+Sans:400");

        * {
            box-sizing: border-box;
        }

        body {
            background-color: ivory;
            margin: 0;
            padding: 0;
        }

        .mini-card-4 {
            align-items: center;
            align-self: flex-end;
            background-color: var(--white);
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            height: 407px;
            margin: 0 20px 20px 20px;
            overflow: hidden;
            width: 318px;
        }

        .read-more {
            align-self: flex-end;
            letter-spacing: 0;
            margin-right: 25px;
            margin-top: 11px;
            min-height: 15px;
            min-width: 70px;
            text-align: right;
        }

        .span1 {
            color: var(--azure-radiance);
            font-family: var(--font-family-open_sans);
            font-size: var(--font-size-s);
            font-weight: 400;
        }

        .flex-row-1 {
            /*align-items: flex-start;*/
            justify-content: space-between;
            display: flex;
            /*height: 15px;*/
            /*margin-right: 2px;*/
            padding: 5px;
            margin-top: 14px;
            min-width: 270px;
            width: 100%;
        }

        .productivity {
            align-self: flex-end;
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-s);
            font-weight: 600;
            letter-spacing: 0;
            padding: 5px;
            min-height: 14px;
            min-width: 35px;
            white-space: nowrap;
        }

        .x3-days-ago {
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-s);
            font-weight: 400;
            letter-spacing: 0;
            margin-left: 177px;
            min-height: 14px;
            min-width: 58px;
            text-align: right;
        }

        .heading-description {
            align-items: flex-start;
            display: flex;
            flex-direction: column;
            margin-left: 3px;
            margin-top: 11px;
            min-height: 149px;
            width: 273px;
        }

        .our-team-was-inspire {
            color: #374a59;
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-m);
            font-weight: 400;
            letter-spacing: 0;
            line-height: 19px;
            margin-top: 29px;
            min-height: 95px;
            width: 269px;
        }

        .x7-skills-of-highly-e {
            color: #081f32;
            overflow-wrap: break-word;
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xl);
            font-weight: 700;
            letter-spacing: 0;
            line-height: 25px;
            min-height: 25px;
            white-space: normal;
        }

        .overlap-group1 {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            background-color: #C0B8DA;
            background-position: 50% 50%;
            background-size: cover;
            height: 168px;
            min-width: 318px;
            padding: 11px 80px;
        }

        .image-3 {
            height: 145px;
            object-fit: contain;
            width: 145px;
            border-radius: 10px;
            background-color: white;
        }

        #companies-cards {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        :root {
            --black-2: rgba(0, 0, 0, 0.8);
            --black: rgba(0, 0, 0, 1);
            --azure-radiance: rgba(0, 122, 233, 1);
            --cerulean: rgba(0, 154, 221, 1);
            --daintree: rgba(8, 31, 50, 1);
            --steel-gray: rgba(36, 38, 53, 1);
            --outer-space: rgba(45, 55, 72, 1);
            --mine-shaft: rgba(51, 51, 51, 1);
            --oxford-blue: rgba(55, 74, 89, 1);
            --masala: rgba(61, 61, 61, 1);
            --tundora: rgba(68, 68, 68, 1);
            --gravel: rgba(74, 74, 74, 1);
            --fiord: rgba(74, 85, 104, 1);
            --chicago: rgba(89, 89, 89, 1);
            --granite-gray: rgba(102, 102, 102, 1);
            --raven: rgba(110, 121, 140, 1);
            --star-dust: rgba(160, 160, 160, 1);
            --mist-gray: rgba(196, 196, 196, 1);
            --cloud: rgba(198, 198, 198, 1);
            --bon-jour: rgba(226, 226, 226, 1);
            --mercury: rgba(231, 231, 231, 1);
            --wild-sand: rgba(243, 244, 245, 1);
            --soapstone: rgba(255, 251, 251, 1);
            --ivory: rgba(255, 255, 240, 1);
            --white: rgba(255, 255, 255, 1);

            --font-size-s: 11px;
            --font-size-m: 13px;
            --font-size-l: 14px;
            --font-size-xl: 20px;
            --font-size-xxl: 22px;
            --font-size-xxxl: 24px;
            --font-size-xxxxl: 36px;

            --font-family-dm_serif_display: "DM Serif Display";
            --font-family-nunito_sans: "Nunito Sans";
            --font-family-open_sans: "Open Sans";
            --font-family-quicksand: "Quicksand";
            --font-family-roboto: "Roboto";
        }






        .quicksand-normal-oxford-blue-13px {
            color: var(--oxford-blue);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-m);
            font-weight: 400;
            font-style: normal;
        }



        .opensans-semi-bold-azure-radiance-11px {
            color: var(--azure-radiance);
            font-family: var(--font-family-open_sans);
            font-size: var(--font-size-s);
            font-weight: 600;
            font-style: normal;
        }



        .quicksand-bold-white-24px {
            color: var(--white);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxxl);
            font-weight: 700;
            font-style: normal;
        }



        .quicksand-bold-daintree-20px {
            color: var(--daintree);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xl);
            font-weight: 700;
            font-style: normal;
        }



        .border-1px-white {
            border-width: 1px;
            border-style: solid;
            border-color: var(--white);
        }



        .dmserifdisplay-normal-daintree-20px {
            color: var(--daintree);
            font-family: var(--font-family-dm_serif_display);
            font-size: var(--font-size-xl);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-bold-raven-36px {
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxxxl);
            font-weight: 700;
            font-style: normal;
        }



        .quicksand-bold-raven-24px {
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxxl);
            font-weight: 700;
            font-style: normal;
        }



        .border-2px-star-dust {
            border-width: 2px;
            border-style: solid;
            border-color: var(--star-dust);
        }



        .quicksand-semi-bold-white-16px {
            font-family: var(--font-family-quicksand);
            font-size: 16px;
            font-weight: 600;
            font-style: normal;
        }



        .quicksand-semi-bold-daintree-16px {
            color: var(--daintree);
            font-family: var(--font-family-quicksand);
            font-size: 16px;
            font-weight: 600;
            font-style: normal;
        }



        .opensans-normal-azure-radiance-11px {
            color: var(--azure-radiance);
            font-family: var(--font-family-open_sans);
            font-size: var(--font-size-s);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-semi-bold-white-24px {
            color: var(--white);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxxl);
            font-weight: 600;
            font-style: normal;
        }



        .opensans-normal-oxford-blue-13px {
            color: var(--oxford-blue);
            font-family: var(--font-family-open_sans);
            font-size: var(--font-size-m);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-normal-gravel-14px {
            color: var(--gravel);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-l);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-semi-bold-raven-11px {
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-s);
            font-weight: 600;
            font-style: normal;
        }



        .roboto-normal-outer-space-14px {
            color: var(--outer-space);
            font-family: var(--font-family-roboto);
            font-size: var(--font-size-l);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-normal-raven-16px {
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
        }



        .opensans-normal-raven-18px {
            color: var(--raven);
            font-family: var(--font-family-open_sans);
            font-size: 18px;
            font-weight: 400;
            font-style: normal;
        }



        .roboto-normal-fiord-16px {
            color: var(--fiord);
            font-family: var(--font-family-roboto);
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
        }



        .border-1px-mercury {
            border-width: 1px;
            border-style: solid;
            border-color: var(--mercury);
        }



        .quicksand-normal-granite-gray-14px {
            color: var(--granite-gray);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-l);
            font-weight: 400;
            font-style: normal;
        }



        .border-2-5px-bon-jour {
            border-width: 2.5px;
            border-style: solid;
            border-color: var(--bon-jour);
        }



        .quicksand-semi-bold-tundora-22px {
            color: var(--tundora);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxl);
            font-weight: 600;
            font-style: normal;
        }



        .opensans-semi-bold-oxford-blue-13px {
            color: var(--oxford-blue);
            font-family: var(--font-family-open_sans);
            font-size: var(--font-size-m);
            font-weight: 600;
            font-style: normal;
        }



        .quicksand-semi-bold-white-22px {
            color: var(--white);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxl);
            font-weight: 600;
            font-style: normal;
        }



        .quicksand-normal-black-36px {
            color: var(--black);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxxxl);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-normal-black-14px {
            color: var(--black);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-l);
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-bold-black-36px {
            color: var(--black);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-xxxxl);
            font-weight: 700;
            font-style: normal;
        }



        .quicksand-normal-mine-shaft-16px {
            color: var(--mine-shaft);
            font-family: var(--font-family-quicksand);
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
        }



        .quicksand-normal-raven-11px {
            color: var(--raven);
            font-family: var(--font-family-quicksand);
            font-size: var(--font-size-s);
            font-weight: 400;
            font-style: normal;
        }

        .search {
            background-color: #c6c6c6;
            border-radius: 14px;
            box-shadow: 0px 4px 0px #00000040;
            height: 186px;
            /*left: 272px;*/
            position:relative;
            top: 0px;
            width: 60%;
            display: flex;
            justify-content:center;
            padding: 75px;
            margin: 20px 10%;
        }
    </style>
</head>

<body>
    <h1>Companies</h1>
    <div class="search">
        <input id="search" type="text" oninput="searchCompanies(document.getElementById('search').value ,1)">
    </div>
    <div id="companies-cards">

    </div>

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