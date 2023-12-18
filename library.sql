-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Ara 2023, 14:43:49
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
(51, 'Ay Işığı Sokağı', 'Stefan Zweig', 'https://i.dr.com.tr/cache/600x600-0/originals/0001857114001-1.jpg', 'güzel bir kitap          ', 88, 'Karbon Kitaplar', b'1'),
(54, 'Olağanüstü Bir Gece', 'Stefan Zweig', 'https://img.kitapyurdu.com/v1/getImage/fn:6340674', 'Ravaruska’da çatışmada hayatını kaybeden Friedrich Michael von R…’nin başından geçen tuhaf olaylar dizgesini içeriyor ‘Olağanüstü Bir Gece’.\r\nStefan  Zweig’in psikolojik tahlilleriyle kılcal damarlarına ineceğiniz kısa öykü, zihin akışları bezeli. Hayatta her şeye sahip birinin, nelere muhtaç olduğunu fark ettiriyor. Kitap, sadece tek bir gecede yaşanan büyülü olaylarla benliğin değişebildiğini haykırıyor.', 63, 'Karbon Kitaplar', b'1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
