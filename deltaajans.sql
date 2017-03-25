-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Mar 2017, 10:04:38
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deltaajans`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_text` text NOT NULL,
  `page_categori` int(11) NOT NULL,
  `page_archive` int(11) NOT NULL,
  `page_delete` int(11) NOT NULL,
  `page_number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_categories`
--

CREATE TABLE `page_categories` (
  `categori_id` int(11) NOT NULL,
  `categori_name` varchar(255) NOT NULL,
  `categori_description` text NOT NULL,
  `categori_number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `seo` varchar(255) NOT NULL,
  `portfolio_name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `categori_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_categori`
--

CREATE TABLE `portfolio_categori` (
  `id` int(11) NOT NULL,
  `categori_name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_settings`
--

CREATE TABLE `site_settings` (
  `ayarid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slogan` text COLLATE utf8_turkish_ci NOT NULL,
  `keywords` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `robots` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `revisit` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `analytic` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mailserver` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mailsifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `faks` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `harita` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `lisans_kodu` text COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1',
  `bakim` int(11) NOT NULL DEFAULT '0',
  `facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_settings`
--

INSERT INTO `site_settings` (`ayarid`, `title`, `slogan`, `keywords`, `aciklama`, `copyright`, `robots`, `revisit`, `domain`, `analytic`, `mailserver`, `mailadres`, `mailsifre`, `telefon`, `faks`, `eposta`, `adres`, `harita`, `lisans_kodu`, `aktif`, `bakim`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`) VALUES
(3, 'Delta Ajans', 'Tasarım Studyosu', 'delta, delta bilişim, delta bilisim, delta, bilişim, bilisim, samsun bilisim, samsun bilgisayar, samsun tasarım, tasarım stüdyosu, web sitesi, samsun web sitesi, samsun copter, samsun hexacopter, hexacopter, samsun helikopter, hosting, domain, 3d modelleme, havadan görüntüleme samsun, fotoğraf çekimi, interaktif medya, basılı medya, profesyonel çözümler, türkiye bilişim, türkiye web tasarım, web tasarım, reklam ajansı', 'Profesyonel Çözümler | Tasarım | Web | Seo | 3d | Barındırma | Yenimahalle Mah. Kılıçarslan Caddesi No:1 Kat:2 55080 Canik/SAMSUN | Telefon: 0362 233 57 94 | E-Posta: info@deltabilisim.net', '© 2017 Delta Bilişim Ltd. | Tüm Hakları Saklıdır', 'all', 7, 'www.deltabilisim.net', '', 'mail.deltabilisim.net', 'bilgi@deltabilisim.net', '123456', '0 (362) 233 57 94', '', 'info@deltabilisim.net', 'Yenimahalle Mah. Kılıçarslan Cad. No:1 Kat:2 55080 Canik/SAMSUN', '', 'delta arge', 1, 0, 'deltaajans', 'deltaajans', 'deltaajans', 'deltaajans', 'deltaajans');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Tablo için indeksler `page_categories`
--
ALTER TABLE `page_categories`
  ADD PRIMARY KEY (`categori_id`);

--
-- Tablo için indeksler `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Tablo için indeksler `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`ayarid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `categori_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- Tablo için AUTO_INCREMENT değeri `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `ayarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
