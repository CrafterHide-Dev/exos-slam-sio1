<?php

session_start();

$mysqli = mysqli_connect('localhost', 'root', '', 'tpreq');

if (isset($_GET['q']) AND !empty($_GET['q'])) {
	$users = $mysqli->query("SELECT * FROM user WHERE nom LIKE '%".$_GET['q']."%' OR prenom LIKE '%".$_GET['q']."%' ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
} else {
	$users = $mysqli->query("SELECT * FROM user ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Utilisateurs</title>
		<link rel="stylesheet" type="text/css" href="assets/css/general.css">
		<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
		<link rel="stylesheet" type="text/css" href="assets/css/table.css">
		<link rel="stylesheet" type="text/css" href="assets/css/searchbar.css">
	</head>
	<body>
		<?php
		require('assets/php/nav.php');
		?>

		<form method="GET" style="margin: 20px;">
			<div id="searchbar">
				<input type="text" name="q" placeholder="Rechercher" style="flex-grow: 1;">
				<input type="submit" value="&#x1F50E;&#xFE0E;">
			</div>
			<?php
			if (isset($_GET['q']) AND !empty($_GET['q'])) {
			?>
			<div style="margin: 10px; color: white;">
				<p>Résultats pour "<b><?= $_GET['q']; ?></b>" (<?= count($users); ?>)</p>
			</div>
			<?php
			}
			?>
		</form>

		<div class="table">
			<div class="row header">
				<div class="box semi">
					ID
				</div>
				<div class="box">
					Prénom
				</div>
				<div class="box">
					Nom
				</div>
				<div class="box">
					Rue
				</div>
				<div class="box semi">
					Code Postal
				</div>
				<div class="box">
					Ville
				</div>
			</div>
			<?php
			foreach ($users as $user) {
			?>
			<div class="row">
				<div class="box semi">
					<?= $user['id']; ?>
				</div>
				<div class="box">
					<?= $user['prenom']; ?>
				</div>
				<div class="box">
					<?= $user['nom']; ?>
				</div>
				<div class="box">
					<?= $user['rue']; ?>
				</div>
				<div class="box semi">
					<?= $user['cp']; ?>
				</div>
				<div class="box">
					<?= $user['ville']; ?>
				</div>
			</div>
			<?php
			}
			?>
		</div>

	</body>
</html>