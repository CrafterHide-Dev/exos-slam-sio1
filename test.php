<?php

$mysqli = new mysqli('localhost', 'root', '', 'tp6');

$request = mysqli_query($mysqli, "SELECT * FROM user");

$requestSet = mysqli_fetch_assoc($request);

var_dump($requestSet);

?>