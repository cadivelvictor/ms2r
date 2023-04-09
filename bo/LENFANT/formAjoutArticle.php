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
                <h2 itemprop="name">Ajouter un article</h2>
                <hr>
            </div>
            <br>
            <form name="formAjoutArticle" method="POST" action="ajoutArticle.php" enctype="multipart/form-data">
              <input type="text" name="titreArticle" placeholder="Titre" autofocus="" required=""><br>

              <textarea name="contenuArticle" placeholder="Contenu de l'article" style="" rows="15" cols="333"id="contenuArticle" required=""></textarea><br>

              <label for="image">Ajouter une miniature : </label><br>
              <input type="file" name="image" id="miniature" value="">

              <input type="submit" name="valider" value="Publier"><br>
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
