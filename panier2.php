<?php
//session_start();
include "../config.php";

?>
<?php
 require '../views\inc\header.php';
//include "addpanier.php";
$panier=new panier();
$baseUrl = "http://localhost/Projet Web/views/images".DIRECTORY_SEPARATOR;
 

    if(isset($_SESSION['panier'])) 
    {
        if(!isset($_SESSION['user']))
        {
            header('Location: login.php');
        }
    }
?>
 <?php
 if(isset($_GET['del']))
 {
     $panier->del($_GET['del']);
 }
 ?>
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Panier</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Panier</li>
                         </ol>
                    </nav>
				</div>
			</div>
        </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  

  <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Produit</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Prix</th>
                              <th scope="col">Quantité</th>
                              <th scope="col">Total</th>
                              <th scope="col">Actions</th>
                          </tr>
                      </thead>
                      <?php    
                            //include "../config.php";
                            $ids=array_keys($_SESSION['panier']);
                            if(empty($ids))
                            {
                                $products=array();
                            }
                            else
                            {
                                $sql = "SELECT * FROM produit WHERE ID IN ('".implode("','",$ids)."')";
                                $db = config::getConnexion();
                                $products=$db->query($sql);
                            }
                        ?>
                        <tbody>
                        <?php $total=0;  foreach ($products as $product):?>
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <p><img class="card-img"  src="<?=$baseUrl. $product['Image']?>" alt=""/></p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                    <h5><?=$product['Nom']?></h5>
                              </td>
                              <td>
                                  <h5><?=$product['Prix']?> TND</h5>
                              </td>
                              <td>
                                  <h5 style="text-align: center;"><?=$_SESSION['panier'][$product['ID']] ?></h5>
                              </td>
                              <td>
                                  <h5><?php $nb=$product['Prix']*$_SESSION['panier'][$product['ID']]; $total+= $nb; echo $nb;?> TND</h5>
                              </td>
                              <td>
                                  <ul class="nav-shop">
                                    <li class="nav-item"><button><a href="panier2.php?delPanier=<?= $product['ID'] ?>" class="del"><i class="ti-trash" ></i></a></button></li>
                        </ul>
                              </td>
                          </tr>
                            <?php  endforeach; ?> 
                          <tr>
                              <td>

                              </td>
                             
                              <td>
                                  <h5>Montant Global</h5>
                              </td>
                              <td>
                              <?php
                                 if( $panier->count($_SESSION['panier'])==0)
                                    {
                                        echo '<h5 style="color:blue;">panier vide</h5>' ;
                                       
                                    }
                                    else
                                    {
                                        echo  '<h5 style="color:blue;">',$total.' TND'; '</h5>';
                                    }            
                                      ?>
                                   
                              </td>
                          </tr>
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a href="category.php"><input type="submit" class="gray_btn" value="Continuez vos achats" /></a>
                                      <input type="submit" name="button" class="primary-btn ml-2" value="Commandez"/>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

<?php require '../views/inc/footer.php'; ?>