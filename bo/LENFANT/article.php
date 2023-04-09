<?php 

class Article {
	//Déclaration des attributs de la classe
	private $_id;				//id de l'article
	private	$_titre;			//titre de l'article
	private	$_description;		//description de l'article
	private	$_contenu;			//contenu de l'article
	private	$_datePublication;			//contenu de l'article
	private	$_images;			//image de l'article

	//Déclaration du constructeur
	public function __construct($titreArticle, $descriptionArticle, $contenuArticle) {
		$this->_titre = $titreArticle;									//initialisation du titre
		$this->_description = $descriptionArticle;						//initialisation de la description
		$this->_contenu = $contenuArticle;								//initialisation du contenu
	}

	//Déclaration de la méthode publique retrieve() pour la lecture d'informations sur un article
	public function	retrieve() {
		include "connexionBD.php";
		$sql = "SELECT * FROM articles WHERE id = '".$this->id."';";
		$resultat = $bd->query($sql);
		$ligne = $resultat->fetch();

		$this->_id = $ligne['id'];
		$this->_titre = $ligne['titre'];
		$this->_description = $ligne['description'];
		$this->_contenu = $ligne['contenu'];
		$this->_datePublication = $ligne['datePublication'];
		$this->_images = $ligne['images'];

	}

	//Fonction permettant de retourner les valeurs des attributs de la classe
	public function get_identifiant()
	{
		return $this->_id;
	}

	public function get_titre()
	{
		return $this->_titre;
	}

	public function get_description()
	{
		return $this->_description;
	}

	public function get_contneu()
	{
		return $this->_contenu;
	}

	public function get_datePublication()
	{
		return $this->_datePublication;
	}

	public function get_images()
	{
		return $this->_images;
	}	

	public function create(){
		require_once "connexionBD.php";
		$sql = "INSERT INTO	articles VALUES (NULL,'".$this->_titre."','".$this->_description."','".$this->_contenu."', NOW(), NULL);";
		$bd->exec($sql) or die(print_r($bd->errorInfo(), true));
	}

	public function update()
	{
		include "connexionBD.php";
		$req = "UPDATE articles SET titre = '".$this->_titre."', description = '".$this->_description."', contenu = '".$this->_contenu."', '".$this->_datePublication = NOW()."', ? WHERE id = '".$this->id."';)";
		$bd->exec($req);
	}

	public function delete()
	{
		include "connexionBD.php";
		$req = "DELETE FROM articles WHERE id = '".$this->_id ."';" ; 		
		$bd->exec($req);
	}
}


?>