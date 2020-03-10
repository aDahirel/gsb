<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class modele extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	*	Function to connect to the database
	*	Return a bdd variable 
	*/
	function getDatabase()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gsbv6;charset=utf8', 'root', 'password');
		return $bdd;
	}

	/**
	*	Function to take all from a visiteur with the login previously entered
	*	Return a result variable
	*/
	function testConnexion()
	{
		$login = htmlspecialchars($_POST['login']);
		$bdd = $this->getDatabase();
		$req = $bdd->prepare('SELECT * FROM visiteur WHERE login = ?');
		$req->execute(array($login));
		$result = $req->fetch();
		return $result;
	}

	function insertFicheFrais($data)
	{
		if (isset($_POST['send'])) 
		{
			$this->db->insert('fichefrais', $data);
		}
	}

	function pullFicheFrais()
	{
		$this->db->select('*');
		$this->db->select_max('dateModif');
		$this->db->from('fichefrais');
		$this->db->where('idVisiteur', $_SESSION['id']);
		$req = $this->db->get();
		return $req;
	}
}

?>