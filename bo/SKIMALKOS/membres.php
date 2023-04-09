<?php

class Membres
{
	//Déclaration des attributs de la classe
	private $_id;					//identifiant du membre
	private $_nom;					//le nom du membre
	private $_prenom;					//le prénom du membre
	private $_qualifications;				//la qualification du membre 
	private $_mail;					//le mail du membre
	private $_telephone;			//le numéro de téléphone du membre
	private $_idService;			//l'id de service du membre
	private $_photos;			

	//Déclaration du constructeur
	public function __construct($idMembres, $nomMembres, $prenomMembres, $qualifMembres, $mailMembres, $telMembres, $idServiceMembres) 
	{
		$this->_id = $idMembres;
		$this->_nom = $nomMembres;
		$this->_prenom = $prenomMembres;
		$this->_qualifications = $qualifMembres;
		$this->_mail = $mailMembres;	
		$this->_tel = $telMembres;
		$this->_idService = $idServiceMembres;
		//$this->_photos = $photosMembres;			

	}
	
	//Déclaration de la méthode publique 'retrieve()' pour la recherche d'informations sur un membre
	public function retrieve() {
		require_once "connexionBD.php";
		$sql = "SELECT * FROM membres WHERE membres.id = '".$this->_id."';";
		$resultat = $bd->query($sql);
		$ligne = $resultat->fetch();

		$this->_nomMembres = $ligne['nom'];
		$this->_prenomMembres = $ligne['prenom'];
		$this->_qualifMembres = $ligne['qualifications'];
		$this->_mailMembres = $ligne['mail'];
		$this->_telMembres = $ligne['tel'];
		$this->_idServiceMembres = $ligne['idService'];
		//$this->_photoMembres = $ligne['photos'];
	}

	//Fonction permettant de retourner les valeurs des attributs de la classe
	public function get_identifiant(){
		return $this->_id;
	}

	public function get_nomMembres(){
		return $this->_nomMembres;
	}

	public function get_prenomMembres(){
		return $this->_prenomMembres;
	}

	public function get_qualifMembres(){
		return $this->_qualifMembres;
	}

	public function get_mailMembres(){
		return $this->_mailMembres;
	}

	public function get_telMembres() {
		return $this->_telMembres;
	}

	public function get_idServiceMembres(){
		return $this->_idServiceMembres;
	}

	// public function get_photosMembres(){
		// return $this->_photoMembres;
	// }
	
	//Déclaration de la méthode publique 'create' qui permet d'ajouter un nouveau membre à la Base de Données
	public function create() 
	{
		include "connexionBD.php";

		$req = "INSERT INTO membres VALUES 
		('".$this->_id ."',
		'".$this->_nom ."',
		'".$this->_prenom ."',
		'".$this->_qualifications ."',
		'".$this->_mail ."',
		'".$this->_telephone ."',
		'".$this->_idService ."', 
		NULL);";
		echo $req;
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
		echo $req;
		
	}
	
	//Déclaration de la méthode publique 'update' qui permettra de modifier les informations d'un membre dans la Base de Données
	public function update()
	{
		include "connexionBD.php";
		$req = "UPDATE membres SET nom ='".$this->_nom ."', 
		prenom = '".$this->_prenom ."', 
		qualifications = '".$this->_qualifications ."', 
		mail = '".$this->_mail ."', 
		tel = '".$this->_telephone ."', 
		idService = '".$this->_idService ."'
			WHERE id = '".$this->_id ."';" ; 		

		$bd->exec($req);
	}

	//Déclaration de la méthode publique 'delete' qui permettra de supprimer les informations d'un membre dans la Base de Données
	public function delete()
	{
		include "connexionBD.php";
		$req = "DELETE FROM membres WHERE id = '".$this->_id ."';" ; 		
		$bd->exec($req);
	}

}
?>

