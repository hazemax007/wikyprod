<?php require "../views/inc/header.php"; require "../config.php";?>

<!-- ================ category section start ================= -->		  
<section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head nav nav-item active">Votre Compte Aroma</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                      <li><a href="#">Vos Informations</a></li>
                  </ul>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
          </div>
          <!-- End Filter Bar -->
          <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <div class="col-sm-4 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="card-header">
                                     VOTRE COMPTE AROMA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="info_modif.php"><i style="text-align:right;" class="ti-pencil"></i></a>
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $user = $_SESSION['user'];
                               
                                    $db = config::getConnexion();
                                    $req = $db->prepare('SELECT * from client WHERE LoginClient= ?');
                                    $req->execute(array($user));
                                    $cli=$req->fetch();

                                    echo $cli['PrenomClient'].' '.$cli['NomClient']; 
                                    echo "<br/>";
                                    echo $cli['MailClient'];
                                    echo "<br/>";
                                    echo "<br/>";
                                    echo "<br/>";
                                    echo "<a href='modif_mdp.php'><p style='color:blue';>MODIFIER VOTRE MOT DE PASSE</p></a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-6 col-lg-5">
                        <div  class="card">
                            <div class="card-horizontal">
                                <div class="card-header">
                                     VOS ADRESSES &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="adresse_modif.php"><i style="text-align:right;" class="ti-pencil"></i></a>
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $user = $_SESSION['user'];
                               
                                    $db = config::getConnexion();
                                    $req = $db->prepare('SELECT * from client WHERE LoginClient= ?');
                                    $req->execute(array($user));
                                    $cli=$req->fetch();

                                   
                                    echo $cli['PrenomClient'].' '.$cli['NomClient'];
                                    echo "<br/>";
                                    echo "Adresse Client :".' '.$cli['AdresseClient']; 
                                    echo "<br/>";
                                    echo "Telephone :".' '.$cli['TelClient'];
                                    echo "<br/>";
                                    echo "<br/>";
                                  
                                   ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                </div>
            </div>
           </section>
         
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>


<?php require "../views/inc/footer.php";?>