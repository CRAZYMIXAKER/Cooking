<?php
include_once('functions.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sign | Cooking</title>
	<script src="./scripts/jquery-3.5.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css" />
	<link rel="shortcut icon" href="./img/logo.png" type="image/png" />
	<link rel="stylesheet" href="./sign-in-up.css" />
</head>

<body>
	<div class="main">
		<div class="main__title">
			<a class="main__title-registration">Регистрация</a>
			<a class="main__title-autorization">Авторизация</a>
		</div>
		<div class="form">
			<div class="form__sign-up">
				<form class="form__sign" method="POST" action="./functions.php">
					<div class="form__sign-item">
						<input class="form__sign-input" type="text" name="name" maxlength="12" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Имя</label>
					</div>
					<div class="form__sign-item">
						<input class="form__sign-input" type="text" name="surname" maxlength="12" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Фамилия</label>
					</div>
					<div class="form__sign-item">
						<input class="form__sign-input" type="text" name="email" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Почта</label>
					</div>
					<div class="form__sign-item">
						<input class="form__sign-input" type="text" name="login" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Логиин</label>
					</div>
					<div class="form__sign-item">
						<input class="form__sign-input" type="password" name="password" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Пароль</label>
					</div>
					<button class="form__sign-button" name="button_sign-up">Регистрация</button>
				</form>
				<div class="form__question-sign">
					<div class="form__question-text">Уже зарегистрированы?</div>
					<a class="form__question-link form__question-link--in">Войти</a>
				</div>
			</div>

			<div class="form__sign-in">
				<form class="form__sign" method="POST" action="./functions.php">
					<div class="form__sign-item">
						<input class="form__sign-input" type="text" name="sign_in-login" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Логиин</label>
					</div>
					<div class="form__sign-item">
						<input class="form__sign-input" type="password" name="sign_in-password" required />
						<span class="form__sign-bar"></span>
						<label class="form__sign-label">Пароль</label>
					</div>
					<button class="form__sign-button" name="button_sign-in">Вход</button>
				</form>
				<div class="form__question-sign">
					<div class="form__question-text">У вас нет аккаунта?</div>
					<a class="form__question-link form__question-link--up">Зарегистрироваться</a>
				</div>
			</div>
		</div>
	</div>

	<div class="back">
		<a href="index.php" class="back__link">На главную</a>
	</div>
	<? if (isset($_SESSION['Error'])){echo "<h2>".$_SESSION['Error']."</h2>"; unset($_SESSION['Error']);}?>

	<!-- <div class="mouse"></div> -->

	<!-- <script src="./scripts/sign-in-up.js"></script> -->
	<script type="text/javascript">
	var status = <?php echo json_encode($_GET['status']) ?>;

	const registration = document.querySelector(".main__title-registration");
	const autorization = document.querySelector(".main__title-autorization");
	const questionUp = document.querySelector(".form__question-link--up");
	const questionIn = document.querySelector(".form__question-link--in");
	const signUp = document.querySelector(".form__sign-up");
	const signIn = document.querySelector(".form__sign-in");

	if (status == 'in') {
		SignIn();
	} else if (status == 'up') {
		SignUp();
	}

	registration.addEventListener("click", SignUp);
	questionUp.addEventListener("click", SignUp);
	autorization.addEventListener("click", SignIn);
	questionIn.addEventListener("click", SignIn);

	function SignUp() {
		registration.classList.add("main__title--background");
		autorization.classList.remove("main__title--background");
		signUp.classList.add("form__sign--opened");
		signIn.classList.remove("form__sign--opened");
	}

	function SignIn() {
		autorization.classList.add("main__title--background");
		registration.classList.remove("main__title--background");
		signIn.classList.add("form__sign--opened");
		signUp.classList.remove("form__sign--opened");
	}
	</script>
</body>

</html>