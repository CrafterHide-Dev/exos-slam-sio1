<?php

$cryptedPass = "";

if (isset($_POST['ok'])) {

	if (isset($_POST['psw'])) {
		$cryptedPass = crypt('$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/', $_POST['psw']);
	}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<form method="POST">
			<input type="text" name="psw">
			<input type="submit" name="ok" value="Crypter !!!">
		</form>
		<?= $cryptedPass; ?>
	</body>
</html>