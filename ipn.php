<?php

$email_account="sb-xondk1764891@business.example.com";
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}

//renvoyer au systeme paypal pr validation
$header ="POST /cgi-bin/webscr HTTP/1.0\r\n"
$header .= "content-Type: application/x-www-form-urlencode\r\n";
$header .= "content-Length: " . strlen($req) . "\r\n\r\n;
$fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status=$_POST['payment_status'];
$payment_amount=$_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
//$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
parse_str($_POST['custom'],$custom);

if (!$fp){

	}else {
		fputs(!$fp, header . $req);
		while (!feof($fp)) {
			$res=fgets($fp,1024);
			if (strcmp($res, "VERIFIED")==0) {
				if ($payment_status == "completed"){
					if ($email_account == $receiver_email){
						
						file_put_contents('log', print_r($_POST, true));

						$db = new PDO("mysql:host=localhost;dbname=max","max","Hitmanmax47");
						$req = $db->query('SELECT * FROM produits WHERE price ='.$payment_amount.' LIMIT');
						$d = $req->fetch(PDO::FETCH_ASSOC);
						if(!empty($d)){
							$data=serialize($_POST);

							$db->query ("INSERT INTO panier set idclient=$uid, prix=$payment_amount, creation=NOW(), datas='$data'");
							file_put_contents('log', 'le paiement a bien ete effectue');
							else {
								file_put_contents('log', 'le paiement ne correspond a aucune offre');
							}
						}


					}
				}
				else {
					//statut de paiement: Echec
				}
				exit();
			}
			else if (strcmp($res, "INVALID") == 0) {
				//transaction invalide
			}
		}
		fclose($fp);
	}



?>