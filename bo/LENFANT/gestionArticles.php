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
                <h2>Gestion des articles</h2>
                <hr>
            </div>
            <h3>Ajouter une nouvelle publication</h3>
            <button onclick="document.location='formAjoutArticle.php'">Nouvel article</button>
            <h3>Liste des articles</h3>
            <table>
               <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Date de publication</th>
                        <th>Auteur</th>
                        <th>Miniature</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once 'connexionBD.php';
                    $sql = "SELECT * FROM article ORDER BY datePublication DESC;";
                    $resultat = $connexion->query($sql) or die(print_r($connexion->errorInfo(), true));

                    while ($ligne = $resultat->fetch())
                    {
                        echo "<tr>
                        <td>". $ligne["titre"] . "</td>
                        <td>". $ligne["contenu"] . "</td>
                        <td>". $ligne["datePublication"] . "</td>
                        <td>". $ligne["auteur"] . "</td>
                        <td><a href='../../". $ligne["miniature"] . "' target='_blank'> ".$ligne["miniature"]."</a> </td>";

                        echo "<td><a href='formModifArticle.php?id=".$ligne['id']."'><img src ='icon/modifier.png'></a>
                        <br>
                        <a href ='supprimerArticle.php?id=".$ligne['id']."'><img src ='icon/supprimer.png'></a></tr>";
                    }
                ?>
                </tbody>
           </table>

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
