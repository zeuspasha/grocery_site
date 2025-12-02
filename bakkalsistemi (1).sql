-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Haz 2025, 17:29:05
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bakkalsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cinsiyet`
--

CREATE TABLE `cinsiyet` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cinsiyet`
--

INSERT INTO `cinsiyet` (`id`, `ad`) VALUES
(1, 'Erkek'),
(2, 'Kadın'),
(3, 'Hepsi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmalar`
--

CREATE TABLE `firmalar` (
  `id` int(11) NOT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `firtel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `firmalar`
--

INSERT INTO `firmalar` (`id`, `firma`, `firtel`) VALUES
(9, 'Ekmekçi - Fırın', '053470184656'),
(10, 'Erikli Su', '05555545454'),
(11, 'Lays Cips AŞ', '052457454554'),
(12, 'Algida Dondurma AŞ', '1323543554'),
(13, 'Yetişkin Ürün A.ş', '564564564'),
(14, 'Pepsico', '024545244245'),
(15, 'Pepsica', '06457018573');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hitap`
--

CREATE TABLE `hitap` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hitap`
--

INSERT INTO `hitap` (`id`, `ad`) VALUES
(1, 'Yetişkin'),
(2, 'Yaşlı'),
(3, 'Çocuklar'),
(4, 'Bebek'),
(5, 'Yetişkin ve Yaşlı'),
(6, 'Hepsi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `id` int(11) NOT NULL,
  `barkod_kodu` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `fiyat` decimal(10,2) NOT NULL,
  `adet` int(11) NOT NULL,
  `teslim` enum('inceleniyor','Sipariş yolda','teslim edildi') DEFAULT 'inceleniyor',
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`id`, `barkod_kodu`, `telefon`, `fiyat`, `adet`, `teslim`, `tarih`) VALUES
(159, '56456775', NULL, '64.00', 4, 'inceleniyor', '2024-05-07 22:10:31'),
(160, '4564564', NULL, '11.00', 1, 'inceleniyor', '2024-05-07 22:10:31'),
(161, '123123123', NULL, '21.00', 3, 'inceleniyor', '2024-05-07 22:10:31'),
(162, '124124', NULL, '15.00', 1, 'inceleniyor', '2024-05-07 22:10:31'),
(163, '4545645', NULL, '26.00', 2, 'inceleniyor', '2024-05-07 22:10:31'),
(164, '4545645', NULL, '65.00', 5, 'inceleniyor', '2024-05-08 00:00:56'),
(165, '124124', NULL, '15.00', 1, 'inceleniyor', '2024-05-08 00:00:56'),
(166, '56456775', NULL, '32.00', 2, 'inceleniyor', '2024-05-08 00:00:56'),
(167, '123123123', NULL, '14.00', 2, 'inceleniyor', '2024-05-08 00:00:56'),
(168, '454456456', NULL, '64.00', 2, 'inceleniyor', '2024-05-08 00:00:56'),
(169, '123123123', NULL, '21.00', 3, 'inceleniyor', '2024-05-08 13:38:01'),
(170, '56456775', NULL, '32.00', 2, 'inceleniyor', '2024-05-08 13:38:01'),
(171, '124124', NULL, '15.00', 1, 'inceleniyor', '2024-05-08 13:38:01'),
(172, '454456456', NULL, '192.00', 6, 'inceleniyor', '2024-05-08 13:38:01'),
(174, '454456456', NULL, '96.00', 3, 'inceleniyor', '2024-05-09 12:49:00'),
(175, '56456775', NULL, '48.00', 3, 'inceleniyor', '2024-05-09 12:49:00'),
(176, '4545645', NULL, '65.00', 5, 'inceleniyor', '2024-05-09 12:49:00'),
(177, '124124', NULL, '30.00', 2, 'inceleniyor', '2024-05-09 12:49:00'),
(178, '123123123', NULL, '14.00', 2, 'inceleniyor', '2024-05-09 12:49:00'),
(179, '454456456', NULL, '128.00', 4, 'inceleniyor', '2024-05-09 12:49:51'),
(180, '4568922', NULL, '120.00', 2, 'inceleniyor', '2025-06-13 11:36:13'),
(181, '123123123', NULL, '14.00', 2, 'inceleniyor', '2025-06-13 11:36:13'),
(182, '124124', NULL, '45.00', 3, 'inceleniyor', '2025-06-13 11:36:13'),
(183, '4545645', NULL, '39.00', 3, 'inceleniyor', '2025-06-13 11:36:13'),
(184, '4568922', NULL, '180.00', 3, 'inceleniyor', '2025-06-13 11:38:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stokkont`
--

CREATE TABLE `stokkont` (
  `id` int(11) NOT NULL,
  `urun_ismi` varchar(255) DEFAULT NULL,
  `turu` varchar(255) DEFAULT NULL,
  `anavatani` varchar(255) DEFAULT NULL,
  `iklim` varchar(255) DEFAULT NULL,
  `aciklama` text DEFAULT NULL,
  `barkod_kodu` varchar(255) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `fiyat` int(11) DEFAULT 0,
  `fiyatson` int(11) DEFAULT 0,
  `tarih` datetime DEFAULT NULL,
  `gorsel` varchar(255) DEFAULT NULL,
  `durum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `stokkont`
--

INSERT INTO `stokkont` (`id`, `urun_ismi`, `turu`, `anavatani`, `iklim`, `aciklama`, `barkod_kodu`, `adet`, `firma`, `fiyat`, `fiyatson`, `tarih`, `gorsel`, `durum`) VALUES
(45, 'Odun Ekmek', 'Yiyecek', 'Hepsi', 'Unisex', 'Ekmek yemek için  --- şart değil bruası', '123123123', 50, 'Ekmekçi - Fırın', 7, 350, '2024-05-06 00:00:00', 'Odun EkmekHepsiUnisexekmek.png', 'ekledi'),
(46, 'Erikli Su 5 litre', 'İçecek', 'Hepsi', 'Unisex', 'Su', '124124', 666, 'Erikli Su', 15, 9990, '2024-05-06 00:00:00', 'Erikli Su 5 litreHepsiUnisexerikli.jpg', 'ekledi'),
(47, 'Algida Kornet Keyif Dondurma', 'Yiyecek', 'Hepsi', 'Unisex', 'Dondurma', '4545645', 89, 'Algida Dondurma AŞ', 13, 1157, '2024-05-06 00:00:00', 'Algida Kornet Keyif DondurmaHepsiUnisexkornet.png', 'ekledi'),
(48, 'Lays Cips', 'Yiyecek', 'Hepsi', 'Unisex', 'Cips', '4564564', 456, 'Lays Cips AŞ', 11, 5016, '2024-05-06 00:00:00', 'Lays CipsHepsiUnisexcips.jpg', 'ekledi'),
(50, 'Erikli Su 5 litre', 'İçecek', 'Hepsi', 'Unisex', 'Su', '124124', 6, 'Erikli Su', 15, 90, '1970-01-01 00:00:00', 'Erikli Su 5 litreHepsiUnisexerikli.jpg', 'çıkardı'),
(51, 'Lays Fırından', 'Yiyecek', 'Hepsi', 'Unisex', 'cips...', '56456775', 50, 'Ekmekçi - Fırın', 16, 800, '2024-05-02 00:00:00', 'Lays FırındanHepsiUnisexcipsfırından.png', 'ekledi'),
(52, 'Pepsi', 'İçecek', 'Hepsi', 'Unisex', 'Pepsi içicek içmek için çok satılır', '454456456', 456, 'Pepsico', 32, 14592, '2024-05-08 00:00:00', 'PepsiHepsiUnisexpepsi.jpg', 'ekledi'),
(53, 'Pepsi', 'İçecek', 'Hepsi', 'Unisex', 'Pepsi içicek içmek için çok satılır', '454456456', 6, 'Pepsico', 32, 192, '2024-05-08 00:00:00', 'PepsiHepsiUnisexpepsi.jpg', 'çıkardı'),
(54, 'Pepsi', 'İçecek', 'Hepsi', 'Unisex', 'Pepsi içicek içmek için çok satılır', '454456456', 5, 'Pepsico', 32, 160, '2024-05-09 00:00:00', 'PepsiHepsiUnisexpepsi.jpg', 'çıkardı'),
(55, 'Fanta Kola 2.5 Litre', 'İçecek', 'Hepsi', 'Hepsi', 'Kola', '4568922', 20, 'Pepsica', 60, 1200, '2025-06-13 00:00:00', 'Fanta Kola 2.5 LitreHepsiHepsifanta.png', 'ekledi'),
(56, 'Fanta Kola 2.5 Litre', 'İçecek', 'Hepsi', 'Hepsi', 'Kola', '4568922', 5, 'Pepsica', 60, 300, '2025-06-12 00:00:00', 'Fanta Kola 2.5 LitreHepsiHepsifanta.png', 'çıkardı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `turu`
--

CREATE TABLE `turu` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `turu`
--

INSERT INTO `turu` (`id`, `ad`) VALUES
(1, 'Yiyecek'),
(2, 'İçecek'),
(3, 'Hediyelik Eşya'),
(4, 'Teknoloji Aleti'),
(5, 'Oyuncaklar'),
(6, 'Ev Eşyası'),
(7, 'Bahçe Dekorasyon'),
(8, 'Yardımcı Aletler'),
(9, 'Fantezi Eşyaları'),
(10, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunver`
--

CREATE TABLE `urunver` (
  `id` int(11) NOT NULL,
  `urun_ismi` varchar(255) DEFAULT NULL,
  `turu` varchar(255) DEFAULT NULL,
  `anavatani` varchar(255) DEFAULT NULL,
  `iklim` varchar(255) DEFAULT NULL,
  `aciklama` text DEFAULT NULL,
  `barkod_kodu` varchar(255) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `fiyat` int(11) DEFAULT 0,
  `begeni` int(11) DEFAULT 0,
  `gorsel` varchar(255) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urunver`
--

INSERT INTO `urunver` (`id`, `urun_ismi`, `turu`, `anavatani`, `iklim`, `aciklama`, `barkod_kodu`, `adet`, `firma`, `fiyat`, `begeni`, `gorsel`, `tarih`) VALUES
(59, 'Odun Ekmek', 'Yiyecek', 'Hepsi', 'Unisex', 'Ekmek yemek için  --- şart değil bruası', '123123123', 33, 'Ekmekçi - Fırın', 7, 0, 'Odun EkmekHepsiUnisexekmek.png', '2024-05-06 00:53:41'),
(60, 'Erikli Su 5 litre', 'İçecek', 'Hepsi', 'Unisex', 'Su', '124124', 625, 'Erikli Su', 15, 0, 'Erikli Su 5 litreHepsiUnisexerikli.jpg', '2024-05-06 00:54:50'),
(61, 'Algida Kornet Keyif Dondurma', 'Yiyecek', 'Hepsi', 'Unisex', 'Dondurma', '4545645', 68, 'Algida Dondurma AŞ', 13, 0, 'Algida Kornet Keyif DondurmaHepsiUnisexkornet.png', '2024-05-06 00:56:10'),
(62, 'Lays Cips', 'Yiyecek', 'Hepsi', 'Unisex', 'Cips', '4564564', 455, 'Lays Cips AŞ', 11, 0, 'Lays CipsHepsiUnisexcips.jpg', '2024-05-06 00:56:54'),
(64, 'Lays Fırından', 'Yiyecek', 'Hepsi', 'Unisex', 'cips...', '56456775', 36, 'Ekmekçi - Fırın', 16, 0, 'Lays FırındanHepsiUnisexcipsfırından.png', '2024-05-06 01:03:24'),
(65, 'Pepsi', 'İçecek', 'Hepsi', 'Unisex', 'Pepsi içicek içmek için çok satılır', '454456456', 430, 'Pepsico', 32, 0, 'PepsiHepsiUnisexpepsi.jpg', '2024-05-07 23:58:06'),
(66, 'Rocco Lolipop', 'Yiyecek', 'Hepsi', 'Hepsi', 'Çeşit çeşit lolipop. Adet Gram 15', '', NULL, NULL, 0, 0, 'Rocco LolipopHepsiHepsilolipop.jpeg', '2025-04-12 17:05:25'),
(67, 'Solo Havlu', 'Ev Eşyası', 'Hepsi', 'Hepsi', 'Peçete adet 12. 100 yaprak adet başı', '', NULL, NULL, 0, 0, 'Solo HavluHepsiHepsisolo-dev-havlu.jpg', '2025-04-12 17:14:07'),
(68, 'Fanta Kola 2.5 Litre', 'İçecek', 'Hepsi', 'Hepsi', 'Kola', '4568922', 10, 'Pepsica', 60, 0, 'Fanta Kola 2.5 LitreHepsiHepsifanta.png', '2025-06-13 11:31:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `isim`, `telefon`, `pin`, `tarih`) VALUES
(1, 'pasha', '1234', '1234', '2025-06-13 11:29:17');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cinsiyet`
--
ALTER TABLE `cinsiyet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `firmalar`
--
ALTER TABLE `firmalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hitap`
--
ALTER TABLE `hitap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stokkont`
--
ALTER TABLE `stokkont`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `turu`
--
ALTER TABLE `turu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunver`
--
ALTER TABLE `urunver`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `firmalar`
--
ALTER TABLE `firmalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Tablo için AUTO_INCREMENT değeri `stokkont`
--
ALTER TABLE `stokkont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Tablo için AUTO_INCREMENT değeri `urunver`
--
ALTER TABLE `urunver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
