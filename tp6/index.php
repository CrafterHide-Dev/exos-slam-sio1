<?php

session_start();

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<?php
		if (isset($_SESSION['connexion']) AND $_SESSION['connexion']) {
		?>
		<a href="admin.php" style="color: blue; padding: 8px; background-color: rgba(0, 0, 0, 0.2); text-decoration-line: none;">Admin Panel</a>
		<?php
		} else {
		?>
		<a href="connexion.php" style="color: blue; padding: 8px; background-color: rgba(0, 0, 0, 0.2); text-decoration-line: none;">Connexion</a>
		<?php
		}
		?>
	</body>
</html>