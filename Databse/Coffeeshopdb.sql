-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2023 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffeeshopdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `Name`) VALUES
(1, 'Cake'),
(2, 'Tea'),
(3, 'Coffee');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `SubjectName` varchar(200) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Size` varchar(2) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`ID`, `OrderID`, `ProductID`, `Size`, `Qty`) VALUES
(1, 1, 47, 'S', 1),
(2, 1, 48, 'S', 2),
(3, 2, 76, 'S', 28),
(4, 1, 77, 'S', 2),
(5, 3, 77, 'S', 5),
(6, 3, 77, 'M', 7),
(7, 4, 47, 'S', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Note` varchar(100) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`ID`, `UserID`, `Note`, `OrderDate`, `Status`) VALUES
(1, 1, '', '2023-04-22 19:03:51', 2),
(2, 2, NULL, NULL, 0),
(3, 1, 'DOn 1', '2023-04-22 19:52:59', 1),
(4, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Thumbnail` varchar(100) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `S` int(11) DEFAULT NULL,
  `M` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `CategoryID`, `Name`, `Thumbnail`, `Description`, `CreatedDate`, `UpdatedDate`, `Deleted`, `Image`, `S`, `M`, `L`) VALUES
(1, 3, 'Espresso', 'espresso', 'Espresso is a concentrated form of coffee served in small, strong shots and is the base for many coffee drinks', '2023-04-22 20:00:20', '2023-04-22 20:00:20', 0, 'espresso', 1, 2, 3),
(2, 1, 'Croissant', 'croissant', 'A croissant (French pronunciation: [kʁwasɑ̃] ( listen)) is a buttery, flaky, viennoiserie pastry inspired by the shape of the Austrian kipferl but using the French yeast-leavened laminated dough.', '2023-04-20 15:18:59', '2023-04-20 15:18:59', 0, 'croissant', 1, 2, 5),
(3, 3, 'Coffee milk', 'Cafe sữa', 'Pure Dak Lak coffee is mixed with a traditional filter combined with condensed milk to create a rich and harmonious taste between the sweetness of the tongue and the elegant bitterness of the aftertaste.', '2023-04-22 18:22:31', '2023-04-22 18:22:31', 0, 'Cafesua', 1, 2, 3),
(4, 3, 'Coffee Caramen', 'Cafe kem caramen', 'Caramel coffee is a drink present on the menus of many famous restaurants, hotels, and coffee brands. This drink is a blend of passionate coffee juice, fatty fresh milk and a little bit of bitter caramel.', '2023-04-22 18:23:47', '2023-04-22 18:23:47', 0, 'Cafekemcaramen', 1, 2, 3),
(5, 3, 'Coffee Bac Xiu', 'Bạc xỉu', 'Coffee Bac Xiu is a drink made from coffee with milk, but the milk part will be more than the coffee part.', '2023-04-22 18:24:48', '2023-04-22 18:24:48', 0, 'Bacxiu', 1, 2, 3),
(6, 3, 'Coffee Mocha', 'Mocha cafe', 'Cà phê Mocha là cà phê được tạo ra từ cà phê espresso và sữa nóng, có thêm bột hoặc nước sốt socola.', '2023-04-22 19:04:58', '2023-04-22 19:04:58', 0, 'Mochacafe', 1, 2, 3),
(7, 3, 'Capuccino', 'Capuccino', 'A cappuccino is an espresso-based coffee drink and is traditionally prepared with steamed milk foam (microfoam)', '2023-04-22 19:47:46', '2023-04-22 19:47:46', 0, 'capuccino', 1, 2, 3),
(8, 1, 'Cake Custard', 'Bánh bông lan', 'Cake is a traditional cake made from ingredients such as flour, baking powder, eggs, milk, sugar combined with many other ingredients.', '2023-04-22 19:05:15', '2023-04-22 19:05:15', 0, 'Banhbonglan', 1, 2, 3),
(9, 1, 'Cake donut ice', 'Bánh donut kem trứng', 'Donut is a delicious cake with a creamy filling inside a crispy crust', '2023-04-22 20:13:37', '2023-04-22 20:13:37', 0, 'Banhdonutkemtrung', 1, 2, 3),
(10, 2, 'Tea Fresh milk', ' Trà sữa trân châu trắng', 'White pearl milk tea has always been a favorite drink of many people since its appearance on the Vietnamese market until now.', '2023-04-22 18:29:33', '2023-04-22 18:29:33', 0, 'Trasuatranchautrang', 1, 2, 3),
(11, 2, 'Tea Taro Milk', 'Trà sữa khoai môn', 'Taro milk tea is a delicious drink with fresh taro flavor that is popularly used in big brands such as Gongcha, Bobapop, Tocotoco.', '2023-04-22 19:05:42', '2023-04-22 19:05:42', 0, 'Trasuakhoaimon', 1, 2, 3),
(12, 2, 'Tea Mist Milk', 'Trà sữa sương sáo', 'Dew flute milk tea is a cool milk tea dish, great for cooling off on hot summer days.', '2023-04-22 19:05:59', '2023-04-22 19:05:59', 0, 'Trasuasuongsao', 1, 2, 3),
(13, 2, 'Tea Butterfly Pea', 'Trà sữa hoa đậu biếc', 'Butterfly pea flower milk tea is an attractive drink, attracting people to enjoy with the greasy, acrid taste of milk tea, the faint aroma and especially the characteristic blue-violet color from the butterfly pea flower.', '2023-04-22 18:58:49', '2023-04-22 18:58:49', 0, 'Trasuahoadaubiec', 1, 2, 3),
(14, 1, 'Cake Pancake', 'Bánh Pancake.', 'Pancake is a flat, thin and round cake made from basic ingredients including flour, eggs, milk and butter.', '2023-04-22 18:59:28', '2023-04-22 18:59:28', 0, 'Pancake', 1, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`ID`, `Name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `PhoneNumber` varchar(13) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `UserName`, `Email`, `PhoneNumber`, `Address`, `Password`, `RoleID`, `CreateDate`, `UpdateDate`, `Deleted`) VALUES
(1, 'ddmin', 'admin@gmail.com', '1234567890', 'admin', '123', 1, NULL, '2023-04-12 20:39:32', 0),
(2, 'user', 'user@gmail.com', '1234567890', 'user', '123', 2, NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`ID`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
