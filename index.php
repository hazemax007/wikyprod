<?php session_start(); ?>
<?php
$db = new PDO("mysql:host=localhost;dbname=max","max","Hitmanmax47");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$req = $db->query('SELECT * FROM client WHERE IdClient=1');
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
					<li><a href="#" title="">Connecte en tant que <?php echo $_SESSION['User']['NomClient']; ?> </a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container" style="padding-top: 60px;">
		<div class="page-header">
			<h1>Finaliser le paiement </h1>

			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				<select name="name">
					<?php
					$req = $db->query('SELECT * FROM type_paiement');
					while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
					?>
					<option value="<?php echo $d['prix']; ?>"> 
						<?php 
						echo $d['id']; ?> - <?php 
						$total = $_POST['total'];
						echo $d['prix']; ?> dinars </option>
					<?php } ?>
				</select>
				
				<input type=" hidden" name="total" value="<?php echo $total ?>" />
				<input type="hidden" name="currency_code" value="TND"/>
				<input type="hidden" name="shipping" value="0.00"/>
				<input type="hidden" name="tax" value="0.00"/>
				<input type="hidden" name="return" value="http://88.122.237.107/max/Paypal/success.php" />
				<input type="hidden" name="cancel_return" value="http://88.122.237.107/max/Paypal/success.php" />
				<input type="hidden" name="notify_url" value="http://88.122.237.107/max/Paypal/ipn.php" />
				<input type="hidden" name="cmd" value="xclick" />
				<input type="hidden" name="business" value="sb-xondk1764891@business.example.com" />
				<input type="hidden" name="item_name" value="produits"/>
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="lc" value="fr" />
				<input type="hidden" name="bn" value="PP-BuyNowBF" />
				<input type="hidden" name="custum" value="idclient=1" />
				<input type="submit" value="payer" class="btn primary">
			</form>
	</div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/lips/jquery/1.6.2/jquery.min.js"></script>