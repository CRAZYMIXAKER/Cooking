<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['image']) && isset($_POST['login']) && isset($_POST['password'])) {
		if (!empty(trim($_POST['name'])) && !empty(trim($_POST['surname'])) && !empty(trim($_POST['image'])) && !empty(trim($_POST['login'])) && !empty(trim($_POST['password']))) {
			$_SESSION['Message'] = 'Good Registration';

			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$image = $_POST['image'];
			$login = $_POST['login'];
			$password = $_POST['password'];
		} else {
			$_SESSION['Error'] = 'Поля не должны быть пустыми или с пробелами (Registration)';
		}
	} elseif (isset($_POST['sign_in-login']) && isset($_POST['sign_in-password'])) {
		if (!empty(trim($_POST['sign_in-login'])) && !empty(trim($_POST['sign_in-password']))) {
			$_SESSION['Message'] = 'Good Autorization';
		} else {
			$_SESSION['Error'] = 'Поля не должны быть пустыми или с пробелами (Autorization)';
		}
	}
	header('Location: sign-in-up.php');
	// $_GET['Message'] = 'POSTP';
}
// echo $_SERVER['REQUEST_METHOD'];
// echo '<br/>';
// echo $_GET['status'];

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
// 	// if ($_GET['status'] === 'up') {
// 	// 	$status = $_GET['status'];
// 	// } else if ($_GET['status'] === 'in') {
// 	// 	$status = $_GET['status'];
// 	// }
// 	$_GET['Message'] = 'GETG';
// 	// header("Location: sign-in-up.php");
// } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// 	$_GET['Message'] = 'POSTP';
// 	header('Location: sign-in-up.php');
// 	echo 'LOL';
// }


// function signInUp()
// {
// }