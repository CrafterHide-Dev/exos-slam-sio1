<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tp6');

if (isset($_POST['login'])) {

	if (isset($_POST['user']) AND !empty($_POST['user'])) {
		$userSearch = $mysqli->query("SELECT * FROM user WHERE username = '".htmlspecialchars($_POST['user'])."'");
		if ($userSearch->num_rows == 0) {
			$valid = false;
			$err = "Nom d'utilisateur ou mot de passe invalide.";
		} elseif ($userSearch->num_rows == 1) {

			if (isset($_POST['pswd']) AND !empty($_POST['pswd'])) {

				$cryptedPass = crypt('$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/', $_POST['pswd']);

				foreach ($userSearch as $foundUser) {
					if ($foundUser['password'] == $cryptedPass) {
						$valid = true;
						$tempId = $foundUser['id'];
						$tempUser = $foundUser['username'];
					} else {
						$valid = false;
						$err = "Nom d'utilisateur ou mot de passe invalide.";
					}
				}

			} else {
				$valid = false;
				$err = "Nom d'utilisateur ou mot de passe invalide.";
			}

		} else {
			$valid = false;
			$err = "Cet utilisateur est en conflit avec un autre utilisateur. Connexion impossible.";
		}
	}

	if ($valid) {
		$_SESSION['connexion'] = true;
		$_SESSION['user']['id'] = $tempId;
		$_SESSION['user']['user'] = $tempUser;
	} else {
		$err = true;
	}

}

if (isset($_SESSION['connexion']) AND $_SESSION['connexion']) {
	header('Location: admin.php');
	exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Connexion</title>
	</head>
	<body>

		<a href="index.php" style="color: blue; padding: 8px; background-color: rgba(0, 0, 0, 0.2); text-decoration-line: none;">Retour</a>

		<form method="POST">

			<input type="text" name="user" placeholder="Username">
			<input type="password" name="pswd" placeholder="Password">
			<input type="submit" name="login" value="Log In">

			<?php
			if (isset($_GET['e']) AND !empty($_GET['e'])) {
				if($_GET['e'] == "403") {
			?>
			<label style="color: orangered;">Vous devez d'abord vous connecter pour accéder à cette page !</label>
			<?php
				}
			}
			?>

			<?php
			if (isset($err) AND $err) {
			?>
			<label style="color: red;">Le nom d'utilisateur ou le mot de passe est incorrect.</label>
			<?php
			}
			?>

		</form>

	</body>
</html>