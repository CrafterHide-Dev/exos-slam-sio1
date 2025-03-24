<?php

if (!isset($_POST['quizsubmit']) OR empty($_POST['quizsubmit'])) {
	header('Location: formquiz.php');
	exit;
}

var_dump($_POST);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<p style="font-weight: 900;">Question 1 :</p>

		<?php
		$pointsq1 = 0;
		$goodq1 = 0;
		$wrongq1 = 0;
		if (isset($_POST['q1-1'])) {
			$pointsq1++;
			$goodq1++;
		} else {
			$pointsq1--;
			$wrongq1++;
		}
		if (isset($_POST['q1-2'])) {
			$pointsq1--;
			$wrongq1++;
		} else {
			$pointsq1++;
			$goodq1++;
		}
		if (isset($_POST['q1-3'])) {
			$pointsq1--;
			$wrongq1++;
		} else {
			$pointsq1++;
			$goodq1++;
		}
		if (isset($_POST['q1-4'])) {
			$pointsq1++;
			$goodq1++;
		} else {
			$pointsq1--;
			$wrongq1++;
		}
		if (isset($_POST['q1-5'])) {
			$pointsq1--;
			$wrongq1++;
		} else {
			$pointsq1++;
			$goodq1++;
		}
		if ($pointsq1 < 0) {
			$pointsq1 = 0;
		}
		?>
		<p>Vous avez <?= $pointsq1; ?>/5 ( <?= $goodq1; ?> bonne(s) réponse(s) et <?= $wrongq1; ?> mauvaise(s) réponse(s) ).</p>

		<p style="font-weight: 900;">Question 2 :</p>

		<?php

		if (isset($_POST['q2']) AND $_POST['q2'] == "a") {
			$pointsq2 = 2;
		} else {
			$pointsq2 = 0;
		}

		?>

		<p>Vous avez <?= $pointsq2; ?>/2.</p>

		<p style="font-weight: 900;">Question 3 :</p>

		<?php
		$pointsq3 = 0;
		if ($_POST['q3-1'] == 175) {
			$pointsq3+=2;
		}
		if ($_POST['q3-2'] == 255) {
			$pointsq3+=2;
		}
		?>

		<p>Vous avez <?= $pointsq3; ?>/4.</p>

		<p style="font-weight: 900;">Question 4 :</p>

		<?php
		$pointsq4 = 0;
		if ($_POST['q4'] == "255.255.255.192") {
			$pointsq4++;
		}
		?>

		<p>Vous avez <?= $pointsq4; ?>/1.</p>

		<p style="font-weight: 900;">Total :</p>

		<p>Vous avez <?= $pointsq1+$pointsq2+$pointsq3+$pointsq4 ?>/12</p>

	</body>
</html>