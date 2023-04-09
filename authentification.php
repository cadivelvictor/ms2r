<!-- Script de vérification pour l'accès à l'espace administration -->

<?php
  session_start();

  // Si un utilisateur était déjà identifié on supprime sa session.
  if(isset($_SESSION["id"])) {
    session_unset();
    header("Location:pi.php");
    exit();
  }

  /*
    On vérifie que les données envoyées par le formulaire existent,
    sinon redirection vers le formulaire de connexion 'login.php'
  */
  if(!isset($_POST['login']) || !isset($_POST['mdp'])) {

    if(empty($_POST['login']) || empty($_POST['mdp'])) {
      header('Location:formEchecAuthen.php');
      exit();
    }

    header('Location:pi.php');
    exit();

  } else {

    require 'connexionBD.php';

    // Protection contre l'injection SQL
    $identifiant = addslashes($_POST['login']);
    $motdepasse = addslashes($_POST['mdp']);

    // Requête SQL préparée pour récupérer le mot de passe hashé dans la base
    $sth = $connexion->prepare("SELECT mdp FROM utilisateur WHERE login = ?");
    $sth->execute([$identifiant]);

    $hashMdp = $sth->fetch()['mdp'];

    /* On test pour voir si le mot de passe entrée correspond avec celui récupéré
    dans la base de données. */
    if(password_verify($motdepasse, $hashMdp)) {

      $sth1 =  $connexion->prepare("SELECT * FROM utilisateur WHERE login = :login");
      $sth1->execute([':login' => $identifiant]);
      $ligne = $sth1->fetch();

      if($identifiant == 'SKIMALKOS') {
        $_SESSION['id'] = $ligne['id'];
        $_SESSION['nom'] = $ligne['nom'];
        $_SESSION['prenom'] = $ligne['prenom'];
        header('Location:bo/SKIMALKOS/index.php');
      }

      if($identifiant == 'LENFANT') {
        $_SESSION['id'] = $ligne['id'];
        $_SESSION['nom'] = $ligne['nom'];
        $_SESSION['prenom'] = $ligne['prenom'];
        header('Location:bo/LENFANT/index.php');
      }

    } else {
      echo '<script>alert("Echec de la connexion. Identifiant ou mot de passe incorrect.")</script>';
      echo '<script>window.location="index.php"</script>';
      exit();
    }
  }
 ?>
