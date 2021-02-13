drop database IF EXISTS Cooking;
CREATE DATABASE IF NOT EXISTS Cooking;

use Cooking;

CREATE TABLE Users
(
	IDUser INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Name varchar(20) NOT NULL,
    Surname varchar(20) NOT NULL,
    Email varchar(255) NOT NULL,
	Avatar varchar(500) NOT NULL,
	Login varchar(100) NOT NULL,
	Password varchar(32) NOT NULL,
	Block INT NOT NULL DEFAULT 0
);

CREATE TABLE TypeRecipe
(
	IDTypeRecipe INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NameTypeRecipe varchar(20) NOT NULL
);


CREATE TABLE Recipes
(
	IDRecipe INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Id_User INT NOT NULL,
    Id_TypeRecipe INT NOT NULL,
    NameRecipe varchar(50) NOT NULL,
    Author varchar(40),
    Likes INT NOT NULL,
    Comments INT NOT NULL,
    Favorites INT NOT NULL,
    Views INT NOT NULL,
    Times INT NOT NULL,
    
    FOREIGN KEY (Id_User) REFERENCES Users (IDUser),
    FOREIGN KEY (Id_TypeRecipe) REFERENCES TypeRecipe (IDTypeRecipe)
);

CREATE TABLE ProgressionSteps
(
	IDProgressionSteps INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Id_Recipe INT NOT NULL,
    Text varchar(150) NOT NULL,
    Picture varchar(500) NOT NULL,
    Nomber INT NOT NULL,
    
    FOREIGN KEY (Id_Recipe) REFERENCES Recipes (IDRecipe)
);

CREATE TABLE Comments
(
	IDComment INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Id_User INT NOT NULL,
    Id_Recipe INT NOT NULL,
    Comment varchar(500) NOT NULL,
    
    FOREIGN KEY (Id_User) REFERENCES Users (IDUser),
    FOREIGN KEY (Id_Recipe) REFERENCES Recipes (IDRecipe)
);

CREATE TABLE Products
(
	IDProduct INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name varchar(30) NOT NULL
);

CREATE TABLE Ingredients
(
	IDIngredients INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Id_Recipe INT NOT NULL,
    Id_Product INT NOT NULL,
    Quantity INT NOT NULL,
    
    FOREIGN KEY (Id_Recipe) REFERENCES Recipes (IDRecipe),
    FOREIGN KEY (Id_Product) REFERENCES Products (IDProduct)
);

CREATE TABLE FavoritsRecipes
(
	IDFavoritRecipe INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nomber INT NOT NULL
);



INSERT Users
(Name, Surname, Email, Avatar, Login, Password, Block)
VALUES
('Mark', 'William', 'William@gmail.com', 'sdsdsdsdsd', 'Mark', 'b82a9a13f4651e9abcbde90cd24ce2cb', 0),
('Misha', 'Noname', 'Admin@gmail.com', 'dfsgsdgdgs', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 1);

INSERT TypeRecipe
(NameTypeRecipe)
VALUES
('Десерт'),
('Напитки'),
('Китайская кухня'),
('Салаты'),
('Выпечка');

INSERT Recipes
(Id_User, Id_TypeRecipe, NameRecipe, Author, Likes, Comments, Favorites, Views, Times)
VALUES
(1, 1, 'Тыквенный рулет из шифонового бисквита', 'Nail Gail', 25, 4, 5, 130, 320),
(2, 2, 'Тальятелле в томатном соусе с креветками', 'Noname Noname', 32, 15, 2, 653, 120);

INSERT ProgressionSteps
(Id_Recipe, Text, Picture, Nomber)
VALUES
(1, 'sdgdgsgdsgd', 'dsgdsgdsg', 1),
(1, 'asasasasassa', 'asdsffagsa', 2),
(1, 'hrehehr', 'regre', 3),
(2, 'rrrrrrrrrrr', 'rrrrrr', 1),
(2, 'dsggggggggggg', 'gggggggggggggggggds', 2);

INSERT Comments
(Id_User, Id_Recipe, Comment)
VALUES
(1, 1, 'yzas'),
(1, 2, 'sazy'),
(2, 1, 'asyz');

INSERT Products
(Name)
VALUES
('Onion'),
('Potatoe'),
('Tomato');

INSERT Ingredients
(Id_Recipe, Id_Product, Quantity)
VALUES
(1, 1, 3),
(1, 2, 5),
(1, 3, 2),
(2, 2, 2);

INSERT FavoritsRecipes
(Nomber)
VALUES
(1),
(2);
