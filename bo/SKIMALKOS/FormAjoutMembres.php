<?php
    session_start();
    if(isset($_SESSION['id'])) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

    <html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site internet officiel de la MS2R">
        <meta name="robots" content="index,follow">

        <link rel="icon" href="">

        <!--Feuille de style-->
        <link rel="stylesheet" type="text/css" href="styles/styles.css">

        <title>Maison Régionale des Sports de la Réunion</title>
    </head>

    <!--Header-->
    <?php include 'header.php'; ?>

    <!--Menu de navigation-->
    <?php include 'menu.php';?>

    <body>
        <div id="contenu-body">
            <div id="titre-connexion">
                <h2 itemprop="name">Ajouter un membre</h2>
                <hr>
            </div>
            <br>
            	<form name="formAjoutMembres" action="ajoutMembres.php" method="POST" enctype="multipart/form-data">
                <p>
                  <label for="nom">Prénom : </label> </br>
                  <input type="text" id="Prénom" name="prenom"/> </br>

                  <label for="nom">Nom: </label> </br>
                  <input type="text" id="Nom" name="nom"/> </br>


                  <label for="nom">Qualifications : </label></br>
                  <input type="text" id="Qualifications" name="qualifications"/> </br>

                  <label for="nom">Mail : </label> </br>
                  <input type="text" id="Mail" name="mail"/> </br>

                  <label for="nom">Téléphone : </label></br>
                  <input type="text" id="Téléphone" name="telephone"  /> </br>

                  <label for="nom">Service : </label> </br>
                    <select id="idService" name="service"> </br>
                      <option value="ServAdm"> Administration </option>
                      <option value="ServEco"> Economie </option>
                      <option value="ServLog"> Logistic </option>
                      <option value="ServProj"> Projet </option>
                    </select>

                  <label for="image">Ajouter une photo : </label><br>
                  <input type="file" name="image" id="miniature" value="">
                <p>

                   <input type="submit" id="envoyer" name ="envoyer" value="Envoyer"></br>
                   <input type="reset" id="annule" name ="annule" value="Réinistialiser les champs">
                </form>
        </div>
    </body>

    <!--Footer-->
    <?php include 'footer.php'; ?>

</html>

<?php
    } else {
        header("Location:../index.php");
    }
?>
