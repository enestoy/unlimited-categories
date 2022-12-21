-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Ara 2022, 15:05:31
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinirsiz-kategori`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `id` int(10) UNSIGNED NOT NULL,
  `ustid` int(10) UNSIGNED NOT NULL,
  `menuadi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`id`, `ustid`, `menuadi`) VALUES
(1, 0, 'Giyim'),
(2, 0, 'Elektronik'),
(3, 0, 'Kitap'),
(4, 0, 'Bilgisayar Ürünleri'),
(5, 1, 'Kadın'),
(6, 1, 'Erkek'),
(7, 5, 'Elbise'),
(8, 5, 'Ayakkabı'),
(9, 5, 'Etek'),
(10, 5, 'Pantalon'),
(11, 3, 'Roman'),
(12, 3, 'Karikatür'),
(13, 3, 'Çizgi Roman'),
(14, 4, 'Masaüstü PC'),
(15, 4, 'Çevre Birimleri'),
(16, 4, 'Bileşenler'),
(18, 16, 'Ram'),
(19, 16, 'Ekran Kartı'),
(20, 16, 'Anakart'),
(21, 16, 'Harddisk'),
(22, 18, 'DDR3'),
(23, 18, 'DDR4'),
(24, 21, 'SSD'),
(25, 21, 'Katı Disk'),
(26, 3, 'Ansiklopedi'),
(28, 6, 'Tişört');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
