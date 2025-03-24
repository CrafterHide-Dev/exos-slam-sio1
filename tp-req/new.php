<?php

session_start();

$mysqli = mysqli_connect('localhost', 'root', '', 'tpreq');

if (isset($_POST['formsubmit'])) {
	$valid = true;
	$err = [];

	if (!isset($_POST['lname']) OR empty($_POST['lname'])) {
		$valid = false;
		$err['lname'] = "Veuillez remplir ce champs !";
	}
	if (!isset($_POST['fname']) OR empty($_POST['fname'])) {
		$valid = false;
		$err['fname'] = "Veuillez remplir ce champs !";
	}
	if (!isset($_POST['street']) OR empty($_POST['street'])) {
		$valid = false;
		$err['street'] = "Veuillez remplir ce champs !";
	}
	if (!isset($_POST['postalcode']) OR empty($_POST['postalcode'])) {
		$valid = false;
		$err['postalcode'] = "Veuillez remplir ce champs !";
	}
	if (!isset($_POST['city']) OR empty($_POST['city'])) {
		$valid = false;
		$err['city'] = "Veuillez remplir ce champs !";
	}

	if ($valid) {
		$ln = htmlspecialchars($_POST['lname']);
		$fn = htmlspecialchars($_POST['fname']);
		$s = htmlspecialchars($_POST['street']);
		$cp = htmlspecialchars($_POST['postalcode']);
		$c = htmlspecialchars($_POST['city']);
		$req = 'INSERT INTO user (nom, prenom, rue, cp, ville) VALUES ("'.$ln.'", "'.$fn.'", "'.$s.'", "'.$cp.'", "'.$c.'")';

		if($mysqli->query($req) !== true) {
			die('Error in script');
			exit;
		}

		header('Location: users.php');
		exit;

	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Enregistrement</title>
		<link rel="stylesheet" type="text/css" href="assets/css/general.css">
		<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
		<link rel="stylesheet" type="text/css" href="assets/css/form.css">
	</head>
	<body>
		<?php
		require('assets/php/nav.php');
		?>
		<form method="POST">
			<div class="box">
				<h2 class="form-title">Enregistrer un utilisateur</h2>
			</div>
			<div class="box">
				<label for="lname">Nom</label>
				<input type="text" id="lname" name="lname">
				<?php
				if (isset($err['lname'])) {
				?>
				<label class="error"><?= $err['lname']; ?></label>
				<?php
				}
				?>
			</div>
			<div class="box">
				<label for="fname">Prénom</label>
				<input type="text" id="fname" name="fname">
				<?php
				if (isset($err['fname'])) {
				?>
				<label class="error"><?= $err['fname']; ?></label>
				<?php
				}
				?>
			</div>
			<div class="box">
				<label for="street">Rue</label>
				<input type="text" id="street" name="street">
				<?php
				if (isset($err['street'])) {
				?>
				<label class="error"><?= $err['street']; ?></label>
				<?php
				}
				?>
			</div>
			<div class="box">
				<label for="postalcode">Code postal</label>
				<input type="text" id="postalcode" name="postalcode">
				<?php
				if (isset($err['postalcode'])) {
				?>
				<label class="error"><?= $err['postalcode']; ?></label>
				<?php
				}
				?>
			</div>
			<div class="box">
				<label for="city">Ville</label>
				<input type="text" id="city" name="city">
				<?php
				if (isset($err['city'])) {
				?>
				<label class="error"><?= $err['city']; ?></label>
				<?php
				}
				?>
			</div>
			<div class="box">
				<input type="submit" name="formsubmit" value="Créer le client">
			</div>
		</form>
	</body>
</html>