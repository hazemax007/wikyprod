<?php
 require '..\views\inc\header.php';
 //session_start();

 if(isset($_GET['section']))
 {
     $section=htmlspecialchars($_GET['section']);
 }
 else
 {
     $section="";
 }  ?>  

  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>RECUPERATION DU MOT DE PASSE DU CLIENT </h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
           
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Nouveau sur notre site?</h4>
							<p>Des progrès sont réalisés chaque jour dans le domaine de la science et de la technologie, et un bon exemple en est le</p>
							<a class="button button-account" href="register_views.php">Creer un compte</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Recuperer votre mot de passe</h3>
						
						<?php if($section == 'code') { ?>
							Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_mail'] ?>
							<br/>
						<form class="row login_form" method="POST" action="recuperation.php" id="contactForm">
						<div class="col-md-12 form-group">
							   <input type="text" placeholder="Code de vérification" name="verif_code"/><br/>
						</div>
						<div class="col-md-12 form-group">
							   <button type="submit" value="Valider" class="button button-login w-100" name="verif_submit">Valider</button>
						</div>
						</form>
						<?php } elseif($section == "changemdp") { ?>
							Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?>
						<form class="row login_form" method="POST" action="recuperation.php" id="contactForm">
						<div class="col-md-12 form-group">
							<input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/><br/>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/><br/>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="Valider" class="button button-login w-100" name="change_submit">Valider</button
						</div>
						</form>
						<?php } else { ?>
						<form class="row login_form" method="POST" action="recuperation.php" id="contactForm">
						<div class="col-md-12 form-group">
							<input type="email" placeholder="Votre adresse mail" name="recup_mail"/><br/>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="Valider" class="button button-login w-100" name="recup_submit">Valider</button>
						</div>	
						</form>
						<?php } ?>
						<?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <?php require '../views\inc\footer.php'; ?>


