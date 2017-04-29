-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Nis 2017, 14:29:28
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
-- Tablo için tablo yapısı `general_setting`
--

CREATE TABLE `general_setting` (
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
-- Tablo döküm verisi `general_setting`
--

INSERT INTO `general_setting` (`ayarid`, `title`, `slogan`, `keywords`, `aciklama`, `copyright`, `robots`, `revisit`, `domain`, `analytic`, `mailserver`, `mailadres`, `mailsifre`, `telefon`, `faks`, `eposta`, `adres`, `harita`, `lisans_kodu`, `aktif`, `bakim`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`) VALUES
(1, 'Delta Ajans', 'Tasarım Stüdyosu', 'delta, delta bilişim, delta bilisim, delta, bilişim, bilisim, samsun bilisim, samsun bilgisayar, samsun tasarım, tasarım stüdyosu, web sitesi, samsun web sitesi, samsun copter, samsun hexacopter, hexacopter, samsun helikopter, hosting, domain, 3d modelleme, havadan görüntüleme samsun, fotoğraf çekimi, interaktif medya, basılı medya, profesyonel çözümler, türkiye bilişim, türkiye web tasarım, web tasarım, reklam ajansı', '', 'All right reserved', 'all', 7, 'www.deltaajans.xyz', '', 'mail.deltaajans.xyz', 'bilgi@deltaajans.xyz', '123456', '', '', '', '', '', '', 1, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `img_library`
--

CREATE TABLE `img_library` (
  `img_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_text` longtext NOT NULL,
  `add_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_description`, `page_text`, `add_date`, `image`, `stats`) VALUES
(1, 'Kurumsal', 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. ', 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir.', '2017-04-28', '', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_group`
--

CREATE TABLE `product_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_image` varchar(150) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT '0',
  `group_sira` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sub_pages`
--

CREATE TABLE `sub_pages` (
  `subpage_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_name` int(11) NOT NULL,
  `page_descripton` text NOT NULL,
  `page_text` longtext NOT NULL,
  `add_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `rank`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'demo_admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`ayarid`);

--
-- Tablo için indeksler `img_library`
--
ALTER TABLE `img_library`
  ADD PRIMARY KEY (`img_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Tablo için indeksler `product_group`
--
ALTER TABLE `product_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Tablo için indeksler `sub_pages`
--
ALTER TABLE `sub_pages`
  ADD PRIMARY KEY (`subpage_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `ayarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `img_library`
--
ALTER TABLE `img_library`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `product_group`
--
ALTER TABLE `product_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `sub_pages`
--
ALTER TABLE `sub_pages`
  MODIFY `subpage_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
