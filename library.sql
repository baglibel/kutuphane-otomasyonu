-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2024, 21:25:28
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `library`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Rank` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`ID`, `Username`, `Password`, `Name`, `Surname`, `Email`, `Rank`) VALUES
(5, 'admin', '$2y$10$WbgxRBC6hXeT7WwUJqs/XOAjIj/BCLsAn57nqqmJFUBftY1OIY9rC', 'John', 'Doe', 'johndoe@gmail.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Writer` varchar(100) NOT NULL,
  `Cover` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `NumberOfPages` int(11) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `IsFree` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`ID`, `Name`, `Writer`, `Cover`, `Description`, `NumberOfPages`, `Publisher`, `IsFree`) VALUES
(47, 'Bir Kalbin Çöküşü', 'Stefan Zweig', 'https://img.kitapyurdu.com/v1/getImage/fn:6922448/', 'O gece yine karanlık odasında yalnızdı. Yarı uyur, yarı uyanık pinekliyordu. Kalbinin derinliklerinde yaşadığı acılar içinde kargaşa oluşturmuştu. Sessiz ama sıcak bir şeydi. Acı çekmiyordu. Daha önce yaşamadığı tuhaf durum neydi? Kanı titriyordu. Damarlarından akarken damla damla akışını duyuyordu. Tıpkı trenlerin raylar üzerinde yavaş yavaş geçişine benziyordu. Gerip olan bunların hepsi kalbinin içinde yaşanıyordu. Ancak kalp karanlık odalar gibiydi.', 37, 'Karbon Kitaplar', b'0'),
(51, 'Ay Işığı Sokağı', 'Stefan Zweig', 'https://i.dr.com.tr/cache/600x600-0/originals/0001857114001-1.jpg', 'Fransa’nın bir liman kentinin denizci mahallesinde gezinirken duyduğu arya söyleyen sesi izleyerek tanımadığı insanların marazi hayatlarına dalan bir gezgin; patronuna kölece bağlılığı yüzünden korkunç bir eyleme sürüklenen karanlık, itici ve yabani bir hizmetçi; 1810 yılında İspanya’daki savaşta yaralanan, düşman bir ülkede amansız bir hayatta kalma mücadelesine girişen bir Fransız albay; 1918 yılının bir yaz gecesi Leman gölünde bulunup kurtarılan, ancak sonra yüreğini kavuran yurt özlemine ye', 88, 'Karbon Kitaplar', b'1'),
(54, 'Olağanüstü Bir Gece', 'Stefan Zweig', 'https://img.kitapyurdu.com/v1/getImage/fn:6340674', 'Ravaruska’da çatışmada hayatını kaybeden Friedrich Michael von R…’nin başından geçen tuhaf olaylar dizgesini içeriyor ‘Olağanüstü Bir Gece’.\r\nStefan  Zweig’in psikolojik tahlilleriyle kılcal damarlarına ineceğiniz kısa öykü, zihin akışları bezeli. Hayatta her şeye sahip birinin, nelere muhtaç olduğunu fark ettiriyor. Kitap, sadece tek bir gecede yaşanan büyülü olaylarla benliğin değişebildiğini haykırıyor.', 63, 'Karbon Kitaplar', b'0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `history`
--

CREATE TABLE `history` (
  `ID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StartDate` timestamp NULL DEFAULT current_timestamp(),
  `EndDate` timestamp NULL DEFAULT NULL,
  `ResponsibleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `history`
--

INSERT INTO `history` (`ID`, `BookID`, `UserID`, `StartDate`, `EndDate`, `ResponsibleID`) VALUES
(41, 51, 50, '2024-01-03 19:50:52', '2024-01-03 19:50:58', 5),
(42, 51, 48, '2024-01-03 19:51:30', '2024-01-03 19:53:42', 5),
(43, 47, 50, '2024-01-03 19:51:34', '2024-01-03 19:53:42', 5),
(44, 54, 50, '2024-01-03 19:51:36', '2024-01-03 19:51:39', 5),
(45, 54, 51, '2024-01-03 19:53:34', '2024-01-03 19:53:41', 5),
(46, 47, 48, '2024-01-03 19:53:43', '2024-01-03 19:53:44', 5),
(47, 51, 48, '2024-01-03 19:53:43', '2024-01-03 19:53:44', 5),
(48, 54, 48, '2024-01-03 19:53:44', '2024-01-03 19:53:45', 5),
(49, 47, 48, '2024-01-03 19:53:47', '2024-01-03 19:53:52', 5),
(50, 51, 48, '2024-01-03 19:53:47', '2024-01-03 19:54:05', 5),
(51, 47, 48, '2024-01-03 19:54:06', '2024-01-03 19:54:13', 5),
(52, 51, 48, '2024-01-03 19:54:06', '2024-01-03 19:54:16', 5),
(53, 47, 48, '2024-01-03 19:54:19', '2024-01-03 19:54:21', 5),
(54, 47, 48, '2021-01-03 19:57:51', NULL, 5),
(55, 54, 51, '2022-01-03 20:00:46', NULL, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `RegistryDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ID`, `Name`, `Surname`, `RegistryDate`) VALUES
(48, 'Namık', 'Kemal', '2023-12-18 13:31:29'),
(50, 'Süleyman', 'Seba', '2023-12-18 13:31:40'),
(51, 'Azer', 'Bülbül', '2023-12-18 13:31:51');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `history`
--
ALTER TABLE `history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
