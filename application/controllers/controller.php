<!-- @author aDahirel -->
<?php
/** To make sure that the request has gone through index.php */
defined('BASEPATH') OR exit('No direct script access allowed');

/** Controller class */
class controller extends CI_Controller
{
	/** Constructor function */
	public function __construct()
	{
		/** Call the parent constructor */
		parent::__construct();
		/** Call the modele.php file */
		$this->load->model("modele");
	}

	/** Front controller */
	public function index()
	{
		/** If the state isn't null */
		if (isset($_GET['state'])) 
		{
			/** If user wants to connect by clicking the Connexion Button */
			if ($_GET['state']=='connexion') 
			{
				$this->tryLogin(); /** Redirects to the tryLogin function */
			}
			/** If user wants to connect by clicking the Accueil button */
			if ($_GET['state']=='home') 
			{
				$this->home(); /** Redirects to the home function */
			}
			/** If user wants to connect by clicking the Fiche Frais Button */
			if ($_GET['state']=='insertFrais') 
			{
				$this->insertFrais(); /** Redirects to the insertFrais function */
			}
			/** If user wants to connect by clicking the Fiche Hors-Frais Button */
			if ($_GET['state']=='insertHorsFrais') 
			{
				$this->insertHorsFrais(); /** Redirects to the insertHorsFrais function */
			}
			/** If user wants to connect by clicking the Dernière Fiche Button */
			if($_GET['state']=='last')
			{
				$this->last(); /** Redirects to the last function */
			}
			/** If user wants to connect by clicking the Envoyer Button */
			if ($_GET['state']=='addFicheFrais') 
			{
				$this->addFicheFrais(); /** Redirects to the addFicheFrais function */
			}
			/** If user wants to connect by clicking the Déconnexion Button */
			if($_GET['state']=='deconnexion')
			{
				$this->deconnexion(); /** Redirects to the deconnexion function */
			}
		}
		else
		{
			$this->connexionPage(); /** Else redirects to the connexion page function */
		}
	} /** End of the front controller */

	/** Function that redirects to the main connexion page */
	public function connexionPage()
	{
		$this->load->view('connexion');
	}

	/** Function who find if the login and the password field exists and corresponds */
	public function tryLogin()
	{
		/** Crypt the inputs to avoid html scripts to be sent  */
		$login = htmlspecialchars($_POST['login']);
		$password = htmlspecialchars($_POST['password']);

		/** Redirect into the textConnexion function in the modele */
		$result = $this->modele->testConnexion();

		/** If the inputs are not empty */
		if (!empty($login) && !empty($password))
		{
			/** If the login and the password corresponds in the database */
			if ($result['login'] == $login && $result['mdp'] == $password) 
			{
				session_start(); // Start a session

				/** Put the user data from the database in session variables */
				$_SESSION['id']=$result['id'];
				$_SESSION['login']=$result['login'];
				$_SESSION['password']=$result['mdp'];
				$_SESSION['nom']=$result['nom'];
				$_SESSION['prenom']=$result['prenom'];
				$_SESSION['adresse']=$result['adresse'];
				$_SESSION['cp']=$result['cp'];
				$_SESSION['ville']=$result['ville'];
				$_SESSION['dateEmbauche']=$result['dateEmbauche'];

				/** Send a javascript alert */
				echo '<script>alert("Connexion réussie !");</script>';

				/** Redirects to the connected page */
				$this->load->view('connected');
			}
			/** If the login and the password dont corresponds in the database */
			else
			{
				/** Send a javascript alert */
				echo '<script>alert("Mauvais login ou mot de passe !");</script>';

				/** Redirects to the same page */
				$this->load->view('connexion');
			}
		}
		/** If one or two input(s) are empty */
		else
		{
			/** Send a javascript alert */
			echo '<script>alert("Tout les champs doivent être remplies !");</script>';

			/** Redirects to the same page */
			$this->load->view('connexion');
		}
	}

	/** Function that destroy the session and disconnect the user */
	public function deconnexion()
	{
		session_start(); // Start a session
		$_SESSION = array(); // Put the session data in an array
		session_destroy(); // Destroy the session
		$this->load->view('connexion'); // Redirects to the main connexion page
	}

	/** Function that redirects to the insertFrais page */
	public function insertFrais()
	{
		session_start(); // Start a session
		$this->load->view('insertFrais'); // Redirects to the main connexion page
	}

	/** Function that redirects to the insertHorsFrais page */
	public function insertHorsFrais()
	{
		session_start(); // Start a session
		$this->load->view('insertHorsFrais'); // Redirects to the insertHorsFrais page
	}

	/** Function that display the last fichefrais */
	public function last()
	{
		session_start(); // Start a session
     	$data['fetch_data'] = $this->modele->pullFicheFrais(); 
        $this->load->vars($data);
		$this->load->view('last');
	}

	public function home()
	{
		session_start();
		$this->load->view('connected');
	}

	public function addFicheFrais()
	{
		session_start();
		if (isset($_POST['send'])) 
		{
			if (!empty($_POST['nbJustificatifs']) && !empty($_POST['forfaitEtape']) && !empty($_POST['fraisKm']) && !empty($_POST['nuiteHotel']) && !empty($_POST['restaurant'])) 
			{
				if (strlen($_POST['nbJustificatifs']) > 6) 
				{
					echo '<script>alert("Trop de justificatifs !");</script>';
				}
				elseif (strlen($_POST['forfaitEtape']) > 6) 
				{
					echo '<script>alert("Forfait trop élevé !");</script>';	
				}
				elseif (strlen($_POST['fraisKm']) > 6)
				{
					echo '<script>alert("Frais trop importants !");</script>';
				}
				elseif (strlen($_POST['nuiteHotel']) > 6) 
				{
					echo '<script>alert("Coût de nuite trop importante !");</script>';
				}
				elseif (strlen($_POST['restaurant']) > 6) 
				{
					echo '<script>alert("Restaurant trop coûteux !");</script>';
				}
				else
				{
					$idVisiteur = $_SESSION['id'];
					$dateModif = date('Y-m-d');
					$mois = $this->input->post('mois');
					$nbJustificatifs = $this->input->post('nbJustificatifs');
					$idEtat = 'CR';
					$forfaitEtape = $this->input->post('forfaitEtape');
					$fraisKm = $this->input->post('fraisKm');
					$nuiteHotel = $this->input->post('nuiteHotel');
					$restaurant = $this->input->post('restaurant');

					$data = array(
						'idVisiteur' => $idVisiteur,
						'mois' => $mois,
						'nbJustificatifs' => $nbJustificatifs,
						'dateModif' => $dateModif,
						'idEtat' => $idEtat,
						'forfaitEtape' => $forfaitEtape,
						'fraisKm' => $fraisKm,
						'nuiteHotel' => $nuiteHotel,
						'restaurant' => $restaurant
					);

					$this->modele->insertFicheFrais($data);
					echo '<script>alert("Fiche renseignée !");</script>';
					$this->load->view('connected');
				}
			}
			else
			{
				echo "Tout les champs doivent être remplies !";
			}
		}
	}
}

?>