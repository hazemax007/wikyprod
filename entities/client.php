<?php
  class client
  {
    private $nom;
    private $prenom;
    private $telephone;
    private $adresse;
    private $email;
    private $login;
    private $mdp;

    function __construct($nom,$prenom,$telephone,$adresse,$email,$login,$mdp)
    {
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->telephone=$telephone;
        $this->adresse=$adresse;
        $this->email=$email;
        $this->login=$login;
        $this->mdp=$mdp;
    }
    function getnom()
    {
		return $this->nom;
	}
    function getPrenom()
    {
		return $this->prenom;
	}
    function gettel()
    {
		return $this->telephone;
	}
    function getadresse()
    {
		return $this->adresse;
    }
    function getemail()
    {
		return $this->email;
    }
    function getlogin()
    {
		return $this->login;
    }
    function getmdp()
    {
		return $this->mdp;
	}
    function setNom($nom)
    {
		$this->nom=$nom;
	}
    function setPrenom($prenom)
    {
		$this->prenom=$prenom;
	}
    function settel($telephone)
    {
		$this->tel=$telephone;
	}
    function setadresse($adresse)
    {
		$this->adresse=$adresse;
    }
    function setmail($email)
    {
		$this->mail=$email;
    }
    function setlogin($login)
    {
		$this->login=$login;
    }
    function setmdp($mdp)
    {
		$this->mdp=$mdp;
	}
	
}
?>



	
	