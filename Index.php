<?php session_start();
require 'databaseconnect.php'; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Main | Cooking</title>
	<script src="./scripts/jquery-3.5.1.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
	<!-- <link
      rel="stylesheet"
      href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"
    /> -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css" />
	<link rel="shortcut icon" href="./img/logo.png" type="image/png" />
	<link rel="stylesheet" href="./main.css" />
</head>

<body>
	<div class="wrapper">
		<section class="hero">
			<header class="header">
				<a href="#" class="header__logo">
					<img src="./img/logo.png" alt="logo" class="header__logo-pic" />
				</a>
				<div class="header__menu">
					<div class="header__search">
						<form class="header__search-form" action="" method="GET">
							<input maxlength="35" type="text" class="header__search-input" placeholder="Поиск по названию" />
							<button class="header__search-button"></button>
						</form>
					</div>
					<a href="#" class="header__add-recipe"> Добавить рецепт </a>
					<? if(isset($_SESSION['User'])):?>
					<?else:?>
					<a href="sign-in-up.php?status=up" class="header__sign-up"> Регистрация </a>
					<a href="sign-in-up.php?status=in" class="header__sign-in"> Вход </a>
					<? endif;?>
				</div>
			</header>
			<div class="main">
				<div class="main__body">
					<div class="main__filter">
						<div class="main__filter-title">Рекомендуемые</div>
						<div class="main__filter-list">
							<div class="main__filter-text">Сортировать:</div>
							<div class="main__filter-desc">Новые</div>
							<div class="filter">
								<div class="filter__drop-box">
									<a href="#" class="filter__item">Новые</a>
									<a href="#" class="filter__item">Рекомендуемые</a>
									<a href="#" class="filter__item">Старые</a>
									<a href="#" class="filter__item">Популярные</a>
									<a href="#" class="filter__item">Пользовательские</a>
								</div>
							</div>
						</div>
					</div>
					<div class="main__recipes">
						<?php
						$sql = "SELECT * FROM Users JOIN Recipes ON Users.IDUser = Recipes.Id_User";
						$query = $connect -> query($sql);
						$countRecipes = $query->fetchAll();
						// echo "<h2>CountRecipes = ".count($countRecipes) . "</h2>";
						if(count($countRecipes) > 0):
							$prepare = $connect -> prepare($sql);
							$prepare -> execute();
							$Recipes = $prepare->fetchAll();

							for ($i = 0 ; $i < count($countRecipes) ; ++$i):
									// echo print_r($Recipes[$i])."</br></br>";
									$Image = $Recipes[$i]['Image'];
									$NameRecipe = $Recipes[$i]['NameRecipe'];
									$Avatar = $Recipes[$i]['Avatar'];
									$Name = $Recipes[$i]['Name'];
									$Likes = $Recipes[$i]['Likes'];
									$Favorites = $Recipes[$i]['Favorites'];
									$Comments = $Recipes[$i]['Comments'];
									$Views = $Recipes[$i]['Views'];
									// echo 
									// $Image . "</br>" . $NameRecipe . "</br>" . 
									// $Avatar . "</br>" . $Name . "</br>" . 
									// $Likes . "</br>" . $Favorites . "</br>" . 
									// $Comments . "</br>" . $Views . "</br></br>";
									// echo "</br></br></br>";
									?>
						<div class="recipe">
							<a href="" class="recipe__link-img">
								<img src="./img/Recipe/7.jpg" alt="Рецепт" class="recipe__img" />
							</a>
							<div class="recipe__link-name">
								<? echo $NameRecipe;?>
							</div>
							<a class="recipe__link-author">
								<img src="./img/profile.png" alt="Автор" class="recipe__img-author" />
								<div class="recipe__name-author">
									<? echo $Name;?>
								</div>
							</a>
							<div class="recipe__desc">
								<ul class="desc">
									<li class="desc__item">
										<img src="./img/icons8-heart-208.png" alt="Количество лайков рецепта" class="desc__item-icon" />
										<div class="desc__item-title">
											<? echo $Likes;?>
										</div>
									</li>
									<li class="desc__item">
										<img src="./img/icons8-star-96.png" alt="Количество добавлений рецепта" class="desc__item-icon" />
										<div class="desc__item-title">
											<? echo $Favorites;?>
										</div>
									</li>
									<li class="desc__item">
										<img src="./img/icons8-delete-message-52.png" alt="Количество сообщений рецепта"
											class="desc__item-icon" />
										<div class="desc__item-title">
											<? echo $Comments;?>
										</div>
									</li>
									<li class="desc__item">
										<img src="./img/icons8-eye-96.png" alt="Количество просмотров рецепта" class="desc__item-icon" />
										<div class="desc__item-title">
											<? echo $Views;?>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<? endfor; endif;?>
					</div>
				</div>
			</div>
			<div>

				<!-- 
				<div class="recipe">
					<a href="" class="recipe__link-img">
						<img src="./img/Recipe/7.jpg" alt="Рецепт" class="recipe__img" />
					</a>
					<div class="recipe__link-name">
						Тыквенный рулет из шифонового бисквита Тыквенный рулет из
						шифонового бисквита Тыквенный рулет из шифонового бисквита
						Тыквенный рулет из шифонового бисквита
					</div>
					<a class="recipe__link-author">
						<img src="./img/profile.png" alt="Автор" class="recipe__img-author" />
						<div class="recipe__name-author">Mark Willium</div>
					</a>
					<div class="recipe__desc">
						<ul class="desc">
							<li class="desc__item">
								<img src="./img/icons8-heart-208.png" alt="Количество лайков рецепта" class="desc__item-icon" />
								<div class="desc__item-title">222</div>
							</li>
							<li class="desc__item">
								<img src="./img/icons8-star-96.png" alt="Количество добавлений рецепта" class="desc__item-icon" />
								<div class="desc__item-title">12</div>
							</li>
							<li class="desc__item">
								<img src="./img/icons8-delete-message-52.png" alt="Количество сообщений рецепта"
									class="desc__item-icon" />
								<div class="desc__item-title">4</div>
							</li>
							<li class="desc__item">
								<img src="./img/icons8-eye-96.png" alt="Количество просмотров рецепта" class="desc__item-icon" />
								<div class="desc__item-title">210</div>
							</li>
						</ul>
					</div> -->
			</div>

			<?php
				// $sql = "select * from Users";
				// // $query = $connect->prepare($sql);
				// // $query->execute();
				// $query = $connect->query($sql);
				// $Users = $query->fetchAll(\PDO::FETCH_ASSOC);
				// $sss = print_r($Users);
				// echo '<p>' . $sss . '</p>';

				// foreach ($Users as $User) {
				// 	echo '<p>' . $User['Name'] . '</p>';
				// }
				?>
	</div>
	</section>

	<footer class="footer">
		<div class="footer__main">
			<div class="footer__information">
				<a class="footer__logo">
					<img class="footer__logo-icon" src="./img/logo.png" />
				</a>
				<div class="footer__rules">
					<div class="footer__rules-item">
						<a class="footer__rules-link">О сайте</a>
					</div>
					<div class="footer__rules-item">
						<a class="footer__rules-link">Правила</a>
					</div>
					<div class="footer__rules-item">
						<a class="footer__rules-link">Помощь</a>
					</div>
					<div class="footer__rules-item">
						<a class="footer__rules-link">Контакты</a>
					</div>
					<div class="footer__rules-item">
						<a class="footer__rules-link">Книга жалоб</a>
					</div>
				</div>
				<div class="footer__community">
					<a class="footer__community-link">
						<i class="fa fa-twitter footer__community-icon"></i>
					</a>
					<a class="footer__community-link">
						<i class="fa fa-vk footer__community-icon"></i>
					</a>
					<a class="footer__community-link">
						<i class="fa fa-instagram footer__community-icon"></i>
					</a>
				</div>
			</div>
			<div class="footer__law"></div>
		</div>
	</footer>

	<aside class="sidebar">
		<a href="#" class="sidebar__hamburger">
			<img src="./img/hamburger.png" alt="humburger-open" class="sidebar__hamburger-icon" />
		</a>
		<a href="#" class="sidebar__close">
			<img src="./img/close.png" alt="humburger-close" class="sidebar__close-icon" />
		</a>
		<div class="sidebar__aside sidebar__aside--hamburger">
			<?php if(isset($_SESSION['User'])):?>
			<div class="sidebar__profile">
				<div class="profile">
					<a href="#" class="profile__img">
						<img src="./img/profile.png" alt="profile-icon" class="profile__img-icon" />
					</a>
					<a href="#" class="profile__money">
						<img src="./img/money.png" alt="money" class="profile__money-icon" />
						<div class="profile__money-count">
							<? echo '+' . $_SESSION['User']['Login'];?>
						</div>
					</a>
				</div>
				<div class="profile__parlor">
					<a href="#" class="profile__name">
						<? echo $_SESSION['User']['Name'] . ' '. $_SESSION['User']['Surname'];?>
					</a>
					<div class="profile__list">
						<div class="profile__list-menu">
							<a href="#" class="profile__list-link">Личный кабинет</a>
							<a href="#" class="profile__list-link">Сообщения</a>
							<a href=logOut.php class="profile__list-link">Выход</a>
						</div>
					</div>
				</div>
			</div>
			<? endif;?>
			<nav class="sidebar__menu">
				<ul class="sidebar__menu-list">
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
					<li class="sidebar__menu-item">
						<a href="#" class="sidebar__menu-link">Рецепты</a>
					</li>
				</ul>
			</nav>
		</div>
	</aside>

	<div class="scrollup">
		<i class="fa fa-arrow-up"></i>
	</div>
	</div>

	<script src="./scripts/sidebar-menu.js"></script>
	<script src="./scripts/scroll.js"></script>
</body>

</html>