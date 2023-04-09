<?php
        //Enregistrement des valeurs collectées dans le formulaire dans des variables
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $qualifications = $_POST['qualifications'];
    $mail = $_POST['mail'];
    $telephone = $_POST['telephone'];
    
    include "membres.php";
    
    //Création d'une nouvelle instance de la classe Club
    $modifierClub = NEW Club($id, $nom, $prenom, $qualifications, $mail, $telephone);
    
    //Appel de la méthode update()
    $modifierClub -> update();
?>