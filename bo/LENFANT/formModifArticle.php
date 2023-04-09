<?php
    session_start();
    if(isset($_SESSION['id'])) {
?>

<?php
    require_once 'connexionBD.php';

    if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $edition_id = htmlspecialchars($_GET['id']);
        $edit_article = $connexion->prepare('SELECT * FROM article WHERE id = ?');
        $edit_article->execute(array($edition_id));

        if($edit_article->rowCount() == 1) {
            $edit_article = $edit_article->fetch();

        } else {
            echo '<script>alert("L\'article à modifier n\'existe pas.")</script>';
            echo '<script>window.location="gestionArticles.php"</script>';
        }
    }
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
                <h2 itemprop="name">Modifier un article</h2>
                <hr>
            </div>
            <br>
            <form name="formModifArticle" method="POST">
                <input type="text" name="titreArticle" placeholder="Titre" autofocus="" required="" value="<?=$edit_article['titre']?>"><br>

                <textarea name="contenuArticle" placeholder="Contenu de l'article" style="" rows="15" cols="333"id="contenuArticle" required=""><?=$edit_article['contenu']?></textarea><br>

                <input type="submit" name="valider" value="Mettre à jour"><br>
            </form>
        </div>
    </body>

    <?php
        require_once 'connexionBD.php';

        if(isset($_POST['titreArticle'], $_POST['contenuArticle'])) {
            if(!empty($_POST['titreArticle']) AND !empty($_POST['contenuArticle'])) {

                $titre = htmlspecialchars($_POST['titreArticle']);
                $contenu = htmlspecialchars($_POST['contenuArticle']);

                $req = $connexion->prepare('UPDATE article SET titre = ?, contenu = ?, datePublication = NOW() WHERE id = ?');

                $req->execute(array($titre, $contenu, $edition_id));
                echo '<script>alert("Votre article a bien été mise à jour")</script>';
                echo '<script>window.location="gestionArticles.php"</script>';

            } else {
                echo '<script>alert("Veuillez remplir tous les champs")</script>';
            }
        }
    ?>

    <!--Footer-->
    <?php include 'footer.php'; ?>

</html>

<?php
    } else {
        header("Location:../index.php");
    }
?>
