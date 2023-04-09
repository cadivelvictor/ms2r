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
                <h2>Gestion des membres</h2>
                <hr>
            </div>
            <h3>Ajouter un nouveau membre</h3>
            <button onclick="document.location='FormAjoutMembres.php'">Nouveau membre</button>
            <h3>Liste des membres</h3>
            <table>
               <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Qualifications</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Services</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    require_once 'connexionBD.php';
                    $sql = "SELECT * FROM membres";
                    $resultat = $connexion->query($sql) or die(print_r($connexion->errorInfo(), true));

                    while ($ligne = $resultat->fetch())
                    {
                        echo "<tr>
                        <td>". $ligne["nom"] . "</td>
                        <td>". $ligne["prenom"] . "</td>
                        <td>". $ligne["qualifications"] . "</td>
                        <td>". $ligne["mail"] . "</td>
                        <td>". $ligne["tel"] . "</td>
                        <td>". $ligne["idService"] . "</td>";

                        echo "<td><a href ='formModifMembres.php?id=".$ligne['id']."'><img alt='Modifier' src ='icon/modifier.png'></a>
                        <br>
                        <a href ='supprimerMembres.php?id=".$ligne['id']."'><img alt='Supprimer' src ='icon/supprimer.png'></a></tr>";
                    }
                ?>
            </table>
        </tbody>
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
