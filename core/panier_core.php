<?php 
 
    class panier_core
    {
        function creationPanier()
        {
            if(!isset($_SESSION['panier']))
            {
                $_SESSION['panier']=array();
                $_SESSION['panier']['libelleProduit']=array();
                $_SESSION['panier']['qtePrduit']=array();
                $_SESSION['panier']['prixProduit']=array();
                $_SESSION['panier']['verrou']=false;
                $sql="SELECT tva FROM produits";
                $db=config::getConnexion();
                $tva=$db->query($sql);
                $_SESSION['panier']['tva']=$tva;

            }
        
            return true;
        }

        function ajouterArticle($libelleProduit,$qtePrduit,$prixProduit)
        {
            if(creationPanier()&& !isVerrouille())
            {
                $position_produit = array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);

                if($position_produit !== false)
                {
                    $_SESSION['panier']['libelleProduit'][$position_produit] += $qtePrduit;
                }
                else
                {
                    array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
                    array_push($_SESSION['panier']['qtePrduit'],$qtePrduit);
                    array_push($_SESSION['panier']['prixProduit'],$prixProduit);

                }
            }
            else
            {
                echo 'Erreur,veuillez contacter l\'administrateur';
            }
        }

        function ModifierQteProduit($libelleProduit,$qtePrduit)
        {
            if(creationPanier()&& !isVerrouille())
            {
                if($qtePrduit>0)
                {
                    $position_produit = array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);

                    if($position_produit !== false)
                    {
                        $_SESSION['panier']['libelleProduit'][$position_produit] = $qtePrduit;
                    }
                }
                else
                {
                    supprimerProduit($libelleProduit);
                }
            }
            else
            {
                echo 'Erreur,veuillez contacter l\'administrateur';
            }
        }

        function supprimerProduit($libelleProduit)
        {
            if(creationPanier()&& !isVerrouille())
            {
                $tmp=array();
                $tmp['libelleProduit']=array();
                $tmp['qtePrduit']=array();
                $tmp['prixProduit']=array();
                $tmp['verrou']=array();

                for($i=0;$i<count($_SESSION['panier']['libelleProduit']);$i++)
                {
                    if($_SESSION['panier']['libelleProduit'][$i]!==$libelleProduit)
                    {
                        array_push($_SESSION['panier']['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                        array_push($_SESSION['panier']['qtePrduit'],$_SESSION['panier']['$qtePrduit'][$i]);
                        array_push($_SESSION['panier']['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);  
                    }
                }
                $_SESSION['panier']=$tmp;
            }
            else
            {
                echo 'Erreur,veuillez contacter l\'administrateur';
            }
        }

        function montantGlobal()
        {
            $total =0;
            for($i=0;$i<count($_SESSION['panier']['libelleProduit']);$i++)   
            {
                $total+=$_SESSION['panier']['qtePrduit'][$i]*$_SESSION['panier']['prixProduit'];
            }
            return $total;
        }

        function montantGlobalTVA()
        {
            $total =0;
            for($i=0;$i<count($_SESSION['panier']['libelleProduit']);$i++)   
            {
                $total+=$_SESSION['panier']['qtePrduit'][$i]*$_SESSION['panier']['prixProduit'];
            }
            return $total+$total*$_SESSION['panier']['tva']/100;
        }

        function supprimerPanier()
        {
            if(isset($_SESSION['panier']))
            {
                unset($_SESSION['panier']);
            }
        }

        function isVerrouille()
        {
            if(isset($_SESSION['panier'])&&$_SESSION['isverrouille'])
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function compterArticle()
        {
            if(isset($_SESSION['panier']))
            {
                return count($_SESSION['panier']['libelleProduit']);
            }
            else
            {
                return 0;
            }
        }

        

    }




?>