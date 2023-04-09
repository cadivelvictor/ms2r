<?php
    session_start();
    if(isset($_SESSION['id'])) {
?>

<?php
    require_once 'connexionBD.php';

    if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $edition_id = htmlspecialchars($_GET['id']);
        $edit_membre = $connexion->prepare('SELECT * FROM membres WHERE id = ?');
        $edit_membre->execute(array($edition_id));

        if($edit_membre->rowCount() == 1) {
            $edit_membre = $edit_membre->fetch();

        } else {
            echo '<script>alert("Le membre à modifier n\'existe pas.")</script>';
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
              <h2 itemprop="name">Ajouter un membre</h2>
              <hr>
          </div>
          <br>
            <form name="formModifMembres" method="POST" enctype="multipart/form-data">
              <p>
                <label for="nom">Prénom : </label> </br>
                <input type="text" id="Prénom" name="prenom" value="<?=$edit_membre['prenom']?>"/> </br>

                <label for="nom">Nom: </label> </br>
                <input type="text" id="Nom" name="nom" value="<?=$edit_membre['nom']?>"/> </br>


                <label for="nom">Qualifications : </label></br>
                <input type="text" id="Qualifications" name="qualifications" value="<?=$edit_membre['qualifications']?>"/> </br>

                <label for="nom">Mail : </label> </br>
                <input type="text" id="Mail" name="mail" value="<?=$edit_membre['mail']?>"/> </br>

                <label for="nom">Téléphone : </label></br>
                <input type="text" id="Téléphone" name="telephone" value="<?=$edit_membre['tel']?>" /> </br>

                <label for="nom"><b>Nouveau service : </b></label> </br>
                  <select id="idService" name="service"> </br>
                    <?php echo '<option disabled selected> <b> Service actuel : '?>
                    <?php
                      switch ($edit_membre['idService']) {
                        case 'ServAdm':
                            echo "Administration";
                            break;
                        case 'ServEco':
                            echo "Economie";
                            break;
                        case 'ServLog':
                            echo "Logistic";
                            break;
                        case 'ServProj':
                            echo "Projet";
                            break;
                        default:
                            break;
                      }
                      echo '</b></option>'
                    ?>
                    <option value="ServAdm"> Administration </option>
                    <option value="ServEco"> Economie </option>
                    <option value="ServLog"> Logistic </option>
                    <option value="ServProj"> Projet </option>
                  </select>
              <p>

                 <input type="submit" id="envoyer" name ="envoyer" value="Envoyer"></br>
                 <input type="reset" id="annule" name ="annule" value="Réinistialiser les champs">
              </form>
      </div>
      <?php
          require_once 'connexionBD.php';

          if(isset($_POST['envoyer'],
                  $_POST['prenom'],
                  $_POST['nom'],
                  $_POST['qualifications'],
                  $_POST['mail'],
                  $_POST['telephone'],
                  $_POST['service'],
                  $_FILES['image'])) {

              if(!empty($_POST['envoyer']) AND
                  !empty($_POST['prenom']) AND
                  !empty($_POST['nom']) AND
                  !empty($_POST['qualifications']) AND
                  !empty($_POST['mail']) AND
                  !empty($_POST['telephone']) AND
                  !empty($_POST['service']) AND
                  !empty($_FILES['image'])) {

                    $prenom = htmlspecialchars($_POST['prenom']);
                    $nom = htmlspecialchars($_POST['nom']);
                    $qualification = htmlspecialchars($_POST['qualifications']);
                    $mail = htmlspecialchars($_POST['mail']);
                    $telephone = htmlspecialchars($_POST['telephone']);
                    $service = htmlspecialchars($_POST['service']);

                    $req = $connexion->prepare('UPDATE membres SET nom = ?, prenom = ?, qualifications = ?, mail = ?, tel = ?, idService = ? WHERE id = ?');
                    $req->execute(array($nom, $prenom, $qualification, $mail, $telephone, $service, $edit_membre));

                    echo '<script>alert("Votre article a bien été mise à jour")</script>';
                    echo '<script>window.location="gestionArticles.php"</script>';
                  } else {
                      echo '<script>alert("Veuillez remplir tous les champs")</script>';
                  }
                }
      ?>
    </body>

    <!--Footer-->
    <?php include 'footer.php'; ?>

</html>

<?php
    } else {
        header("Location:../index.php");
    }
?>
