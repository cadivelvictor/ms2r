<?php
    require_once 'connexionBD.php';
    session_start();
    if(isset($_SESSION["id"])) {
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
          $supprimer_id = htmlspecialchars($_GET['id']);

          $req = $connexion->prepare('DELETE FROM article WHERE id = ?');
          $req->execute(array($supprimer_id));

          echo '<script>alert("L\'article a bien été supprimé !")</script>';
          echo '<script>window.location="gestionArticles.php"</script>';
      }
    } else {
      header('Location: ../index.php');
    }
?>
