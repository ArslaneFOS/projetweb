<?php
require_once('models/model.php');
require 'controllers/check-session.php';

// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}

if (!isset($_GET['id_rep'])) {
    echo "Error: No id provided.";
    die();
}

$id_rep = $_GET['id_rep'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <link href="/views/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="/views/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/views/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/views/assets/css/style.css" rel="stylesheet">
  <script src="/views/assets/vendor/aos/aos.js"></script>
  <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/views/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/views/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/views/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/views/assets/vendor/php-email-form/validate.js"></script>
  <script src="/views/assets/js/main.js"></script>
    <script src="/views/assets/scripts/functions.js"></script>
</head>
<body>
<?php
  include('header.php');
  ?>

    <main>
    <form action="/controllers/set-rep-auths.php" method="post">
        <div id="checkboxes">

        </div>
        <input type="number" name="id_user" value="<?=$id_rep?>" style="display: none;">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </form>
    </main>
    <?php
  include('footer.php');
  ?>
<script>
    document.body.onload = () => {
        getRepAuths(<?=$id_rep?>);
    }
</script>
</body>
</html>


<!--
<input type="checkbox" name="auth[]" id="sfx2" value="sfx2"/><label title="Rechercher une entreprise" for="sfx2">SFX-2</label><br/>
<input type="checkbox" name="auth[]" id="sfx3" value="sfx3"/><label title="Créer une entreprise" for="sfx3">SFX-3</label><br/>
<input type="checkbox" name="auth[]" id="sfx4" value="sfx4"/><label title="Modifier une entreprise" for="sfx4">SFX-4</label><br/>
<input type="checkbox" name="auth[]" id="sfx5" value="sfx5"/><label title="Evaluer une entreprise" for="sfx5">SFX-5</label><br/>
<input type="checkbox" name="auth[]" id="sfx6" value="sfx6"/><label title="Supprimer une entreprise" for="sfx6">SFX-6</label><br/>
<input type="checkbox" name="auth[]" id="sfx7" value="sfx7"/><label title="Consulter les stats des entreprises" for="sfx7">SFX-7</label><br/>
<input type="checkbox" name="auth[]" id="sfx8" value="sfx8"/><label title="Rechercher une offre" for="sfx8">SFX-8</label><br/>
<input type="checkbox" name="auth[]" id="sfx9" value="sfx9"/><label title="Créer une offre" for="sfx9">SFX-9</label><br/>
<input type="checkbox" name="auth[]" id="sfx10" value="sfx10"/><label title="Modifier une offre" for="sfx10">SFX-10</label><br/>
<input type="checkbox" name="auth[]" id="sfx11" value="sfx11"/><label title="Supprimer une offre" for="sfx11">SFX-11</label><br/>
<input type="checkbox" name="auth[]" id="sfx12" value="sfx12"/><label title="Consulter les stats des offres" for="sfx12">SFX-12</label><br/>
<input type="checkbox" name="auth[]" id="sfx13" value="sfx13"/><label title="Rechercher un compte pilote" for="sfx13">SFX-13</label><br/>
<input type="checkbox" name="auth[]" id="sfx14" value="sfx14"/><label title="Créer un compte pilote" for="sfx14">SFX-14</label><br/>
<input type="checkbox" name="auth[]" id="sfx15" value="sfx15"/><label title="Modifier un compte pilote" for="sfx15">SFX-15</label><br/>
<input type="checkbox" name="auth[]" id="sfx16" value="sfx16"/><label title="Supprimer un compte pilote" for="sfx16">SFX-16</label><br/>
<input type="checkbox" name="auth[]" id="sfx17" value="sfx17"/><label title="Rechercher un compte délégué" for="sfx17">SFX-17</label><br/>
<input type="checkbox" name="auth[]" id="sfx18" value="sfx18"/><label title="Créer un compte délégué" for="sfx18">SFX-18</label><br/>
<input type="checkbox" name="auth[]" id="sfx19" value="sfx19"/><label title="Modifier un compte délégué" for="sfx19">SFX-19</label><br/>
<input type="checkbox" name="auth[]" id="sfx20" value="sfx20"/><label title="Supprimer un compte délégué" for="sfx20">SFX-20</label><br/>
<input type="checkbox" name="auth[]" id="sfx22" value="sfx22"/><label title="Rechercher un compte étudiant" for="sfx22">SFX-22</label><br/>
<input type="checkbox" name="auth[]" id="sfx23" value="sfx23"/><label title="Créer un compte étudiant" for="sfx23">SFX-23</label><br/>
<input type="checkbox" name="auth[]" id="sfx24" value="sfx24"/><label title="Modifier un compte étudiant" for="sfx24">SFX-24</label><br/>
<input type="checkbox" name="auth[]" id="sfx25" value="sfx25"/><label title="Supprimer un compte étudiant" for="sfx25">SFX-25</label><br/>
<input type="checkbox" name="auth[]" id="sfx26" value="sfx26"/><label title="Consulter les stats des étudiants" for="sfx26">SFX-26</label><br/>
<input type="checkbox" name="auth[]" id="sfx32" value="sfx32"/><label title="Informer le système de l'avancement de la candidature step 3" for="sfx32">SFX-32</label><br/>
<input type="checkbox" name="auth[]" id="sfx33" value="sfx33"/><label title="Informer le système de l'avancement de la candidature step 4" for="sfx33">SFX-33</label><br/>
-->