<?php

session_start();

if (!isset($_SESSION['connexion']) OR !$_SESSION['connexion']) {
	header('Location: connexion.php?e=403');
	exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Panel</title>
	</head>
	<body>
		<a href="index.php" style="color: blue; padding: 8px; background-color: rgba(0, 0, 0, 0.2); text-decoration-line: none;">Retour</a>
		<a href="logout.php" style="color: blue; padding: 8px; background-color: rgba(0, 0, 0, 0.2); text-decoration-line: none;">Déconnexion</a>
	</body>
</html>