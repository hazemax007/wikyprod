

<?php

class panier
{
    private $DB;
    private $id;

    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier']=array();
        }
        if(isset($_GET['delPanier']))
        {
            $this->del($_GET['delPanier']);
        } 
        
    }

    public function count()
    {
        return array_sum($_SESSION['panier']);
    }
    /*
    public function total()
    {
        $total = 0;
        $ids=array_keys($_SESSION['panier']);
        if(empty($ids))
        {
            $pro=array();
        }
        else
        {
           $sql = "SELECT id prix FROM produit WHERE id IN ('".implode("','", $ids)."')";
           $db = config::getConnexion();
           $pro = $db->query($sql);
        
          
        }
        foreach($pro as $produit)
        {
         
            $total += $produit['prix'] * $_SESSION['panier'][$produit['id']];
        }
        return $total;
    }
    */


    public function add($product_id)
    {
        if(isset($_SESSION['panier'][$product_id]))
        {
            $_SESSION['panier'][$product_id]++;
        }
        else
        {
            $_SESSION['panier'][$product_id]=1;
        }
       
    
    }

    public function del($product_id)
    {
        unset($_SESSION['panier'][$product_id]);
    }

   
}






?>