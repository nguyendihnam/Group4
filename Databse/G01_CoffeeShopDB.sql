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
  `Password` varchar(32) NOT NULL,
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
