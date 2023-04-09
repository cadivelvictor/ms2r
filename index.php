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
            <div id="titre-page">
                <h2 itemprop="name">Publications récentes</h2>
                <hr>
                <br/>
            </div>
                <?php
                    require_once 'connexionBD.php';

                    //Requête affichant toutes les informations de la table Articles par ordre décroissant (de la date la plus récente à la date la moins récente)
                    $sql = "SELECT * FROM article ORDER BY datePublication DESC;";

                    //Execution de la reqûete SQL
                    $resultat = $connexion->query($sql) or die(print_r($connexion->errorInfo(), true));

                    //Création de chaque article en fonction des valeurs de $ligne
                    while ($ligne = $resultat->fetch())
                    {
                        ?>
                        <article>
                            <header>
                                <h3><?php echo $ligne['titre']?></h3>
                                Posté par <cite><?php echo $ligne['auteur']?></cite> le <time><?php echo $ligne['datePublication']?></time>
                            </header>
                            <div>
                                <p><?php echo $ligne['contenu']?></p>
                                <?php

                                    //Entrée dans cette condition si l'article contient une image
                                    if($ligne['miniature'] != NULL || $ligne['miniature'] != "") {
                                        echo '<img src = "' . $ligne['miniature'] . '"/>';
                                    }
                                ?>
                            </div>
                        </article>
                        <br>
                    <?php
                    }
                ?>
            <br/>
        </div>
    </body>

    <!--Footer-->
    <?php include 'footer.php'; ?>

</html>
