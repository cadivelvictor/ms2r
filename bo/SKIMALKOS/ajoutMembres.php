<!-- Script exécuté pour l'ajout d'un nouveau membre -->
<?php
    require 'connexionBD.php';

    session_start();
    if(isset($_SESSION["id"])) {
      //On vérifie que toutes les informations reçues par le formulaire formAjoutMembres.php existent et ne sont pas vides
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
                  $dossierUpload = '../../img/Membres/'.$nomFichier; //On mémorise le répertoire contenant les images du site
                  move_uploaded_file($image,$dossierUpload); //On effectue la copie dans le dossier contenant les images

                  $photo = 'img/Membres/'.$nomFichier; //La variable servira à enregistrer l'emplacement dans la base de données
                } else {
                  echo '<script>alert("Type de fichier non pris en charge")</script>';
                  echo '<script>window.location="formAjoutMembres.php"</script>';
                }
              } else {
                $photo = NULL; //Si pas de photo renseignée, alors $photo est null.
              }
              $req = $connexion->prepare('INSERT INTO membres (nom, prenom, qualifications, mail, tel, idService, photos) VALUES (?, ?, ?, ?, ?, ?, ?)');
              $req->execute(array($nom, $prenom, $qualification, $mail, $telephone, $service, $photo));
              echo '<script>alert("Le membre a bien été ajouté")</script>';
              echo '<script>window.location="gestionMembres.php"</script>';

          } else {
              echo '<script>alert("Veuillez remplir tous les champs")</script>';
          }
      }
    } else {
    header('Location: ../index.php');
  }
?>
