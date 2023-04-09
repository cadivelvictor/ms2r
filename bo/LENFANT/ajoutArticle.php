<!-- Script exécuté pour l'ajout d'un nouvel article -->
<?php
    require 'connexionBD.php';

    session_start();
    if(isset($_SESSION["id"])) {
      //On vérifie que toutes les informations reçues par le formulaire formAjoutArticle.php existent et ne sont pas vides
      if(isset($_POST['valider'], $_POST['titreArticle'], $_POST['contenuArticle'], $_FILES['image'])) {
          if(!empty($_POST['valider']) AND !empty($_POST['titreArticle']) AND !empty($_POST['contenuArticle']) AND !empty($_FILES['image'])) {

              $titre = htmlspecialchars($_POST['titreArticle']);                  //Stockage en mémoire du titre de l'article à ajouter
              $contenu = htmlspecialchars($_POST['contenuArticle']);              //Stockage en mémoire du contenu de l'article

              $auteur = $_SESSION['prenom'] . ' ' . $_SESSION['nom'];

              //On récupére les informations du fichier choisi
              $nomFichier = $_FILES['image']['name'];             //nom du fichier
              $adresseFichier = $_FILES['image']['full_path'];    //adresse du fichier
              $typeFichier = $_FILES['image']['type'];            //type de fichier
              $poidsFichier = $_FILES['image']['size'];           //poids du fichier
              $erreur = $_FILES['image']['error'];                //erreur
              $image = $_FILES['image']['tmp_name'];              //contenu du fichier

              if($erreur === 0){
                $extensionFichier = pathinfo($nomFichier, PATHINFO_EXTENSION);    //récupère l'extension du fichier
                $extensionFichier = strtolower($extensionFichier);                //conversion en minuscule

                //Liste des extensions images autorisées à être importées par l'utilisateur
                $extAutorisees = array('jpg', 'jpeg', 'png', 'svg', 'jfif', 'bmp', 'tiff', 'tif', 'gif', 'webp');

                //Si l'extension du fichier traité fait parti de cette liste alors
                if(in_array($extensionFichier, $extAutorisees)) {
                  $nomFichier = uniqid('IMG-',true).'.'.$extensionFichier; //On renomme le fichier avec comme préfixe 'IMG-'
                  $dossierUpload = '../../img/'.$nomFichier; //On mémorise le répertoire contenant les images du site
                  move_uploaded_file($image,$dossierUpload); //On effectue la copie dans le dossier contenant les images

                  $miniature = 'img/'.$nomFichier; //La variable servira à enregistrer l'emplacement dans la base de données
                } else {
                  echo '<script>alert("Type de fichier non pris en charge")</script>';
                  echo '<script>window.location="formAjoutArticle.php"</script>';
                }
              } else {
                $miniature = NULL; //Si pas d'icone renseignée, alors $miniature est null.
              }
              $req = $connexion->prepare('INSERT INTO article (titre, contenu, datePublication, auteur, miniature) VALUES (?, ?, NOW(), ?, ?)');
              $req->execute(array($titre, $contenu, $auteur, $miniature));
              echo '<script>alert("Votre article a bien été posté")</script>';
              echo '<script>window.location="gestionArticles.php"</script>';

          } else {
              echo '<script>alert("Veuillez remplir tous les champs")</script>';
          }
      }
    } else {
    header('Location: ../index.php');
  }
?>
