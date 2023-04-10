-- Tạo database
CREATE DATABASE IF NOT EXISTS DBTheCoffee;

-- Sử dụng database
USE DBTheCoffee;

CREATE TABLE `Role` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL
);

CREATE TABLE `User` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserName` varchar(25) NOT NULL,
  `Email` varchar(150),
  `PhoneNumber` varchar(13),
  `Address` varchar(200) NOT NULL,
  `Password` varchar(13) NOT NULL,
  `RoleID` int,
  `CreateDate` datetime,
  `UpdateDate` datetime,
  `Deleted` boolean NOT NULL
);

CREATE TABLE `Category` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL
);

CREATE TABLE `Product` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `CategoryID` int,
  `Name` varchar(250),
  `Thumbnail` varchar(100),
  `Description` longtext,
  `CreatedDate` datetime,
  `UpdatedDate` datetime,
  `Deleted` boolean NOT NULL,
  `Image` varchar(255),
  `S` int,
  `M` int,
  `L` int
);

CREATE TABLE `Contact` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `SubjectName` varchar(200) NOT NULL,
  `Message` varchar(500) NOT NULL
);

CREATE TABLE `Orders` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int,
  `Note` varchar(100),
  `OrderDate` datetime,
  `Status` int
);

CREATE TABLE `OrderDetails` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `OrderID` int,
  `ProductID` int,
  `Size` varchar(2),
  `Qty` int
);

ALTER TABLE `User` ADD FOREIGN KEY (`RoleID`) REFERENCES `Role` (`ID`);

ALTER TABLE `Product` ADD FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`ID`);

ALTER TABLE `OrderDetails` ADD FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`ID`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`);

ALTER TABLE `OrderDetails` ADD FOREIGN KEY (`ProductID`) REFERENCES `Product` (`ID`);

-- Tạo database
CREATE DATABASE IF NOT EXISTS DBTheCoffee;

-- Sử dụng database
USE DBTheCoffee;

-- Tạo bảng Role
CREATE TABLE Role (
  ID int primary key auto_increment,
  Name varchar(20) NOT NULL
);

-- Tạo bảng User
CREATE TABLE user (
  ID int primary key auto_increment,
  UserName varchar(50) NOT NULL,
  Email varchar(150),
  PhoneNumber varchar(20),
  Address varchar(200) NOT NULL,
  Password varchar(32) NOT NULL,
  RoleID int,
  CreateDate datetime,
  UpdateDate datetime,
  Deleted boolean NOT NULL,
  FOREIGN KEY (RoleID) REFERENCES Role(ID)
);

-- Tạo bảng Category
CREATE TABLE Category (
  ID int primary key auto_increment,
  Name varchar(100) NOT NULL
);

-- Tạo bảng Product
CREATE TABLE Product (
  ID int primary key auto_increment,
  CategoryID int,
  Name varchar(250),
  Thumbnail varchar(100),
  Description longtext,
  CreatedDate datetime,
  UpdatedDate datetime,
  Deleted boolean NOT NULL,
  Image varchar,
  S int,
  M int,
  L int,
  FOREIGN KEY (CategoryID) REFERENCES Category(ID)
);

-- Tạo bảng Contact
CREATE TABLE Contact (
  ID int primary key auto_increment,
  Name varchar(50) NOT NULL,
  Email varchar(150) NOT NULL,
  PhoneNumber int NOT NULL,
  SubjectName varchar(200) NOT NULL,
  Message varchar(500) NOT NULL
);

-- Tạo bảng Orders
CREATE TABLE Orders (
  ID int primary key auto_increment,
  UserID int,
  Note varchar(100),
  OrderDate datetime,
  Status int,
  TotalPrice int,
  FOREIGN KEY (UserID) REFERENCES User(ID)
);

-- Tạo bảng OrderDetails
CREATE TABLE OrderDetails (
  ID int primary key auto_increment,
  OrderID int,
  ProductID int,
  Size int,
  Qty int,
  Price int,
  FOREIGN KEY (OrderID) REFERENCES Orders(ID),
  FOREIGN KEY (ProductID) REFERENCES Product(ID)
);

-- Chèn dữ liệu vào bảng Category
INSERT INTO Category (Name) VALUES ('Coffee'), ('Tea'), ('Cake');

-- Chèn dữ liệu vào bảng Product
INSERT INTO Product (CategoryID, Name, Thumbnail, Description, CreatedDate, UpdatedDate, Deleted, Image, S, M, L) VALUES
(1, 'Espresso', 'espresso.jpg', 'A strong and flavorful coffee.', NOW(), NOW(), 0, 'espresso.jpg', 1, 1, 1),
(1, 'Americano', 'americano.jpg', 'Espresso with hot water added.', NOW(), NOW(), 0, 'americano.jpg', 1, 1, 1),
(1, 'Cappuccino', 'cappuccino.jpg', 'Espresso with steamed milk and foam.', NOW(), NOW(), 0, 'cappuccino.jpg', 1, 1, 1),
(1, 'Latte', 'latte.jpg', 'Espresso with steamed milk.', NOW(), NOW(), 0, 'latte.jpg', 1, 1, 1),
(2, 'Chocolate Croissant', 'croissant.jpg', 'A buttery and flaky croissant filled with rich chocolate.', NOW(), NOW(), 0, 'croissant.jpg', 0, 0, 1),
(2, 'Blueberry Muffin', 'muffin.jpg', 'A sweet and moist muffin filled with blueberries.', NOW(), NOW(), 0, 'muffin.jpg', 0, 1, 0),
(3, 'Coffee Mug', 'mug.jpg', 'A ceramic mug with The Coffee logo.', NOW(), NOW(), 0, 'mug.jpg', 1, 1, 1),
(3, 'Coffee Beans', 'coffee-beans.jpg', 'Freshly roasted coffee beans from around the world.', NOW(), NOW(), 0, 'coffee-beans.jpg', 0, 0, 1),
(3, 'Coffee Press', 'coffee-press.jpg', 'A stainless steel coffee press with a glass carafe.', NOW(), NOW(), 0, 'coffee-press.jpg', 1, 1, 0);

