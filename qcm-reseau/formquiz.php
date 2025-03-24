<?php

$mysqli = new mysqli('localhost', 'root', '', 'qcm-reseau');

$scores = $mysqli->query("SELECT * FROM results ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<form method="POST" action="resultats.php">
			<!-- TITRE -->
			<h1>Testez vos connaissances sur l'adressage IP (version 4)</h1>
			<!-- QUESTION 1 -->
			<p><mark>Question 1</mark> : parmi les adresses IPv4 suivantes, cochez celles qui vous semblent valide (que l'on pourrait configurer sur un poste) :</p>
			<p><u>Attention</u> : 1 pt par bonne réponse mais -1 pt pour une mauvaise réponse</p>

			<div>
				<input type="checkbox" name="q1-1">
				<label>10.55.2.8</label>
			</div>

			<div>
				<input type="checkbox" name="q1-2">
				<label>127.0.0.1</label>
			</div>
			
			<div>
				<input type="checkbox" name="q1-3">
				<label>169.254.1.8</label>
			</div>
			
			<div>
				<input type="checkbox" name="q1-4">
				<label>192.168.4.89</label>
			</div>

			<div>
				<input type="checkbox" name="q1-5">
				<label>172.16.5.315</label>
			</div>
			<!-- QUESTION 2 -->
			<p><mark>Question 2</mark> : à quelle classe appartient l'adresse IP 10.55.1.5 :</p>
			<p><u>Attention</u> : 2pts si vous trouvez la bonne réponse sinon 0pt</p>

			<div>
				<input type="radio" name="q2" value="a" required>
				<label>Classe A</label>
			</div>
			<div>
				<input type="radio" name="q2" value="b">
				<label>Classe B</label>
			</div>
			<div>
				<input type="radio" name="q2" value="c">
				<label>Classe C</label>
			</div>
			<div>
				<input type="radio" name="q2" value="d">
				<label>Classe D</label>
			</div>
			<div>
				<input type="radio" name="q2" value="e">
				<label>Classe E</label>
			</div>
			<!-- QUESTION 3 -->
			<p><mark>Question 3</mark> : compléter les octets manquants pour que celle-ci soit l'adresse IP de broadcast (diffusion) du réseau 192.168.160.0/19 :</p>
			<p><u>Attention</u> : 2pts pour chaque octet bien répondu, soit 4pts en tout</p>

			<label>192.168.</label>
			<input type="number" name="q3-1" min=0 max=255 required>
			<label>.</label>
			<input type="number" name="q3-2" min=0 max=255 required>
			<!-- QUESTION 4 -->
			<p><mark>Question 4</mark> : quelle est la valeur du masque en notation décimale de /26 :</p>
			<p><u>Attention</u> : 1pt si vous trouvez la bonne réponse</p>

			<div>
				<select name="q4" required>
					<option value="1">255.255.0.0</option>
					<option value="2">255.255.255.248</option>
					<option value="3">255.0.255.0</option>
					<option value="4">255.255.128.0</option>
					<option value="5">255.255.255.192</option>
				</select>
			</div>
			<!-- RÉSULTAT -->
			<div style="margin-top: 20px;">
				<input type="reset" value="Effacer">
				<input type="submit" name="quizsubmit" value="Valider">
			</div>
		</form>
		<br>
		<table>
			<tr>
				<th>Score</th>
				<th>Date</th>
			</tr>
			<?php
			foreach ($scores->fetch_all(MYSQLI_ASSOC) as $score) {
			?>
			<tr>
				<td><?= $score['result_score']; ?></td>
				<td><?= date('d/m/Y H:i:s', $score['result_date']); ?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</body>
</html>