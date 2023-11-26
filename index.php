<?php
include('./functions.php');
include('./secrets.php');

$app_secrets = getSecrets();

echo printName("Foster Amponsah Asante");

echo "<br>";
echo "<br>";

echo $app_secrets["apiKey"];