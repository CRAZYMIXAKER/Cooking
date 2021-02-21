<?php
require_once 'pdoconfig.php';
$connect = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if (!$connect) {
	die("Произошла непредвиденная ошибка! Мы работаем над устранением проблемы.");
}
	// echo "Connected to $dbname at $host successfully.";