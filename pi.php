<?php session_start();?>
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
                <h2 itemprop="name">Connexion</h2>
                <hr>
                </br>
            </div>
            <div id="container">
                <form name="formConnexion" method="post" action="authentification.php" class="formConnex">
                    <p>
                        <label for="identifiant">Identifiant : </label>
                        <input type="identifiant" placeholder="Entrez votre identifiant" name="login" autofocus="" required="" /> </br>

                        <label for="mdp">Mot de passe : </label></br>
                        <input type="password" placeholder="Saisissez votre mot de passe" id="idmdp" name="mdp" autofocus="" required="" /></br>
                    </p>
                    <p>
                        <input type="submit" id="connexion" name ="connexion" value="Connexion">
                    </p>
                </form>
            </div>
        </div>
        <br>
    </body>

    <!--Footer-->
    <?php include 'footer.php'; ?>

</html>
