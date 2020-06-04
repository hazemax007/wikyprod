<?php require '../views\inc\header.php';require '../core/client.php'; require '../entities/client.php'; ?>
  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>S'inscrire</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">S'inscrire</li>
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
							<h4>Vous avez déjà un compte?</h4>
							<p>Des progrès sont réalisés chaque jour dans le domaine de la science et de la technologie, et un bon exemple en est le</p>
							<a class="button button-account" href="login.php">Connecte-toi maintenant</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Creez un compte</h3>
						<form class="row login_form" id="register_form" method="POST" action="register_core.php" onsubmit="return Validate(this)" name="register">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="nom" placeholder="Nom" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="Prenom" placeholder="Prenom" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="tel" placeholder="Telephone" >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="Adresse" placeholder="Adresse" >
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Adresse Mail" >
								<div id="email_error" class="val_error"></div>
             				</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="login" placeholder="Login"  />
								<div id="login_error" class="val_error"></div>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="mdp" placeholder="Mot de passe">
								<div id="mdp_error" class="val_error"></div>
             				 </div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="envoi"  class="button button-register w-100">S'inscrire</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

<?php require '..\views\inc\footer.php'; ?>