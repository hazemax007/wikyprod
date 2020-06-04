<?php
   class categorie
   {
       private $idcat;
       private $nomcat;
   }
   function construct($nomcat)
   {
       $this->nomcat=$nomcat;
   }
   function getidcat()
   {
       return $this->idcat;
   }
   function getnomcat()
   {
       return $this->nomcat;
   }
   function setnomcat($nomcat)
   {
       $this->nomcat=$nomcat;
   }
   