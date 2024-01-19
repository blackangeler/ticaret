-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 19 Oca 2024, 11:13:00
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `products`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

DROP TABLE IF EXISTS `sepet`;
CREATE TABLE IF NOT EXISTS `sepet` (
  `id` int NOT NULL,
  `isim` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `adet` int NOT NULL,
  `fiyat` int NOT NULL,
  `stok_adet` int NOT NULL,
  `koken` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kavurma` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`id`, `isim`, `adet`, `fiyat`, `stok_adet`, `koken`, `kavurma`, `icerik`) VALUES
(3, 'Hafif Sipariş', 10, 20, 40, 'Etiyopya', 'Hafif', '[\"Meyve\", \"Çiçek\", \"Nane\"]'),
(15, 'Sürpriz Karışım', 13, 39, 14, 'Dünya Geneli', 'Orta-Koyu', '[\"Karışık Notlar\"]'),
(16, 'Şeker Kamışı Rüyası', 1, 31, 31, 'Brasil', 'Orta', '[\"Şeker Kamışı\", \"Vanilya\", \"Çikolata\"]'),
(1, 'Harika Kahve', 1, 25, 50, 'Brezilya', 'Orta', '[\"Çikolata\", \"Fındık\", \"Vanilya\"]'),
(12, 'Kahve Çikolata Karışımı', 1, 33, 23, 'Karışık', 'Orta-Koyu', '[\"Çikolata\", \"Vanilya\", \"Fındık\"]');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tablo1`
--

DROP TABLE IF EXISTS `tablo1`;
CREATE TABLE IF NOT EXISTS `tablo1` (
  `product_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `category_id` int NOT NULL,
  `category_title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `price` int NOT NULL,
  `stock_quantity` int NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `roast_level` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `flavor_notes` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tablo1`
--

INSERT INTO `tablo1` (`product_id`, `title`, `category_id`, `category_title`, `description`, `price`, `stock_quantity`, `origin`, `roast_level`, `flavor_notes`) VALUES
(1, 'Harika Kahve', 2, 'Kahve', 'Özel karışım, harika lezzet!', 25, 50, 'Brezilya', 'Orta', '[\"Çikolata\", \"Fındık\", \"Vanilya\"]'),
(2, 'Yoğun Lezzet', 2, 'Kahve', 'Güçlü ve yoğun aromalar.', 30, 30, 'Kolombiya', 'Koyu', '[\"Karamel\", \"Kara Kiraz\", \"Baharatlı\"]'),
(3, 'Hafif Sipariş', 2, 'Kahve', 'Hafif ve ferahlatıcı bir deneyim.', 20, 40, 'Etiyopya', 'Hafif', '[\"Meyve\", \"Çiçek\", \"Nane\"]'),
(4, 'Espresso Gücü', 2, 'Kahve', 'Espresso severler için güçlü bir tercih.', 28, 25, 'İtalya', 'Orta-Koyu', '[\"Çikolata\", \"Fındık\", \"Kavrulmuş Ekmek\"]'),
(5, 'Özel Karışım', 2, 'Kahve', 'Uzmanlar tarafından özel olarak hazırlanan karışım.', 35, 20, 'Karışık', 'Orta', '[\"Karışık Notlar\"]'),
(6, 'Doğal Yollarla Yetiştirilmiş', 2, 'Kahve', 'Kimyasal gübre veya ilaç içermez.', 40, 15, 'Peru', 'Hafif', '[\"Meyve\", \"Çiçek\", \"Ahududu\"]'),
(7, 'Geleneksel Türk Kahvesi', 2, 'Kahve', 'Türk kahvesi keyfi evinizde!', 23, 35, 'Türkiye', 'Orta', ''),
(8, 'Vanilla Dream', 2, 'Kahve', 'Vanilya sevenler için rüya gibi bir kahve.', 32, 28, 'Madagaskar', 'Orta', '[\"Vanilya\", \"Karamel\", \"Hafif Baharatlı\"]'),
(9, 'Organik Karadeniz', 2, 'Kahve', 'Doğal ve organik, Karadeniz\'in en iyisi.', 27, 22, 'Türkiye', 'Orta-Koyu', '[\"Çikolata\", \"Fındık\", \"Hafif Baharatlı\"]'),
(10, 'Özel Filtrasyon', 2, 'Kahve', 'Özel filtre yöntemiyle hazırlanmış.', 30, 18, 'Kenya', 'Orta', '[\"Meyve\", \"Çiçek\", \"Şeker Kamışı\"]'),
(11, 'Iced Coffee', 2, 'Kahve', 'Soğuk kahve keyfi!', 18, 45, 'Kolombiya', 'Hafif', '[\"Çikolata\", \"Kara Kiraz\", \"Buzlu\"]'),
(12, 'Kahve Çikolata Karışımı', 2, 'Kahve', 'İki lezzet bir arada.', 33, 23, 'Karışık', 'Orta-Koyu', '[\"Çikolata\", \"Vanilya\", \"Fındık\"]'),
(13, 'Bergamot Burst', 2, 'Kahve', 'Bergamot aromasıyla canlanın!', 29, 27, 'Kosta Rika', 'Orta', '[\"Bergamot\", \"Çiçek\", \"Meyve\"]'),
(14, 'Dark Delight', 2, 'Kahve', 'Koyu kavrulmuş bir zevk.', 37, 16, 'Brexit Coffee Co.', 'Koyu', '[\"Koyu Çikolata\", \"Fındık\", \"Kavrulmuş Ekmek\"]'),
(15, 'Sürpriz Karışım', 2, 'Kahve', 'Her fincanda farklı bir lezzet sürprizi!', 39, 14, 'Dünya Geneli', 'Orta-Koyu', '[\"Karışık Notlar\"]'),
(16, 'Şeker Kamışı Rüyası', 2, 'Kahve', 'Doğal şeker kamışı notalarıyla tatlı bir deneyim.', 31, 31, 'Brasil', 'Orta', '[\"Şeker Kamışı\", \"Vanilya\", \"Çikolata\"]'),
(17, 'Honey Hike', 2, 'Kahve', 'Ballı bir yolculuk!', 26, 29, 'Etiyopya', 'Hafif', '[\"Bal\", \"Meyve\", \"Çiçek\"]'),
(18, 'Mocha Magic', 2, 'Kahve', 'Mocha severler için sihirli bir lezzet.', 34, 21, 'Gana', 'Orta-Koyu', '[\"Çikolata\", \"Kahve\", \"Karamel\"]'),
(19, 'Exotic Espresso', 2, 'Kahve', 'Espresso sevenler için egzotik bir seçenek.', 36, 19, 'Endonezya', 'Koyu', '[\"Çikolata\", \"Baharatlı\", \"Vanilya\"]'),
(20, 'Tropikal Rüya', 2, 'Kahve', 'Tropikal meyve notalarıyla dolu bir rüya.', 38, 17, 'Kosta Rika', 'Orta', '[\"Mango\", \"Ananas\", \"Kokos\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
