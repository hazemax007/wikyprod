<?php session_start(); ?>
<?php
$db = new PDO("mysql:host=localhost;dbname=max","max","Hitmanmax47");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$req = $db->query('SELECT * FROM client WHERE id=1');
while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
	$_SESSION['User'] = $d;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.2.0.min.css">
</head>
<body>
	<div class="topbar">
		<div class="topbar-inner">
			<div class="container">
				<h3><a href="#">projet</a></h3>
				<ul class="nav">
					<li><a href="#" title="">Connecte en tant que <?php echo $_SESSION['User']['name']; ?> </a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container" style="padding-top: 60px;">
		<div class="page-header">
			<h1>Paiement effectue </h1>
	</div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/lips/jquery/1.6.2/jquery.min.js"></script>