<?php
    class produit
    {
        private $nom;
        private $description;
        private $image;
        private $prix;
        private $quantite;
        private $idcat;
    
    function __construct($prix, $quantite,$nom, $image, $description,$idcat)
    {
        $this->prix=$prix;
        $this->quantite=$quantite;
        $this->image=$image;
        $this->nom=$nom;
        $this->description=$description;
        $this->idcat=$idcat;
    }
    function getprix()
    {
        return $this->prix;
    }
    function getquantite()
    {
        return $this->quantite;
    }
    function getimage()
    {
        return $this->image;
    }
    function getnom()
    {
        return $this->nom;
    }
    function getdescription()
    {
        return $this->description;
    }
    function getidcat()
   {
       return $this->idcat;  
   } 
   function setnom_produit($nom)
   {
       $this->nom=$nom;
   }
   function setprix($prix)
   {
       $this->prix=$prix;
   }
   function setdescription($description)
   {
       $this->description=$description;
   }
   function setnquantite($quantite)
   {
       $this->quantite=$quantite;
   }
   function setimage($image)
   {
       $this->image=$image;
   }
}