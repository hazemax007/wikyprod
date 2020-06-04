<?php
 require '..\views\inc\header.php';
 //session_start();
  ?>  

  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>S'identifier/S'enregistrer</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">S'identifier/S'enregistrer</li>
            </ol>
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
						<h3>Connectez-vous pour entrer</h3>
						<form class="row login_form" method="POST" action="verification.php" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="login" placeholder="Login">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="mdp" placeholder="Mot de passe">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="envoi" class="button button-login w-100">S'identifier</button>
								<a href="recuperation_views.php">Mot de passe oublié?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <?php require '../views\inc\footer.php'; ?>


