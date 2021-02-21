<?php
session_start();
include_once("databaseconnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['button_sign-up'])) {
		if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['login']) && isset($_POST['password'])) {
			if (!empty(trim($_POST['name'])) && !empty(trim($_POST['surname'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['login'])) && !empty(trim($_POST['password']))) {

				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$email = $_POST['email'];
				$image = "./profile.png";
				$login = $_POST['login'];
				$password = md5($_POST['password']);

				$sql = "SELECT * FROM Users WHERE Login = '$login'";
				$query = $connect->query($sql);
				$checkLogin = $query->fetchColumn();
				if ($checkLogin = 0) {
					$sql = "INSERT Users (Name, Surname, Email, Avatar, Login, Password) 
				VALUES ('$name', '$surname', '$email', '$image', '$login', '$password')";
					$connect->exec($sql);
					$_SESSION['Message'] = 'Регистрация прошла успешно';
					header('Location: index.php');
				} else {
					$_SESSION['Error'] = 'Пользователь с таким логином уже существует, введите пожалуйста другой';
					header('Location: sign-in-up.php?status=up');
				}

				// $user = $query->fetchAll(\PDO::FETCH_ASSOC);

				unset($sql);
			} else {
				$_SESSION['Error'] = 'Поля не должны быть пустыми или с пробелами (Registration)';
				header('Location: sign-in-up.php?status=up');
			}
		}
	} else if (isset($_POST['button_sign-in'])) {
		if (isset($_POST['sign_in-login']) && isset($_POST['sign_in-password'])) {
			if (!empty(trim($_POST['sign_in-login'])) && !empty(trim($_POST['sign_in-password']))) {
				$login = $_POST['sign_in-login'];
				$password = md5($_POST['sign_in-password']);

				$sql = "SELECT * FROM Users WHERE Login = '$login' and password = '$password'";
				$query = $connect->query($sql);
				$checkUser = $query->fetchColumn();
				if ($checkUser > 0) {
					$_SESSION['Message'] = 'Вы авторизовались успешно';
					header('Location: index.php');
				} else {
					$_SESSION['Error'] = 'Неправильный логин или пароль';
					header('Location: sign-in-up.php?status=in');
				}
				unset($sql);
			} else {
				$_SESSION['Error'] = 'Поля не должны быть пустыми или с пробелами (Autorization)';
				header('Location: sign-in-up.php?status=in');
			}
		}
	}
	// header('Location: sign-in-up.php?status=in');
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