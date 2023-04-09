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
                <h2 itemprop="name">Liste des membres</h2>
                <hr>
                <br>
            </div>
            <table>
               <thead>
                    <tr>
                        <th>Photos</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Qualifications</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    require_once 'connexionBD.php';
                    $sql = "SELECT * FROM membres";
                    $resultat = $connexion->query($sql) or die(print_r($connexion->errorInfo(), true));

                    while ($ligne = $resultat->fetch())
                    {
                        echo '<tr>';
                        echo'<td>' .
                        '<img src = "' . $ligne['photos'] . '" width = "60px" height = "60px"/>' . '</td>';
                        echo'<td>' . $ligne["nom"] . '</td>';
                        echo '<td>'. $ligne["prenom"] . '</td>';
                        echo '<td>'. $ligne["qualifications"] . '</td>';
                        echo '<td>'. $ligne["mail"] . '</td>';
                        echo '<td>'. $ligne["tel"] . '</td>';
                        echo '</tr>';

                    }
                ?>
            </table>
        </div>
    </body>

    <!--Footer-->
    <?php include 'footer.php'; ?>

</html>
