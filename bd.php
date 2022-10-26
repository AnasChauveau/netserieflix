<?php
$host = "mysql-anavic.alwaysdata.net";
$dbname = "anavic_netserieflix";
$user = "anavic_admin";
$pass = "anavic38100@";

$conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>