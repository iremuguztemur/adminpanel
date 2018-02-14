# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.12-MariaDB)
# Database: missdb
# Generation Time: 2018-02-14 09:00:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `banner_link_url` varchar(191) DEFAULT NULL,
  `banner_link` int(11) DEFAULT NULL,
  `stats` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;

INSERT INTO `banners` (`id`, `title`, `slug`, `description`, `banner_link_url`, `banner_link`, `stats`)
VALUES
	(1,'asdasda','asdasda','testa sd','asdasdads',1,1),
	(2,'banner 2','','banner 2','',0,1);

/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table general_setting
# ------------------------------------------------------------

DROP TABLE IF EXISTS `general_setting`;

CREATE TABLE `general_setting` (
  `ayarid` int(11) NOT NULL AUTO_INCREMENT,
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
  `aktif` int(11) NOT NULL DEFAULT 1,
  `bakim` int(11) NOT NULL DEFAULT 0,
  `facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ayarid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

LOCK TABLES `general_setting` WRITE;
/*!40000 ALTER TABLE `general_setting` DISABLE KEYS */;

INSERT INTO `general_setting` (`ayarid`, `title`, `slogan`, `keywords`, `aciklama`, `copyright`, `robots`, `revisit`, `domain`, `analytic`, `mailserver`, `mailadres`, `mailsifre`, `telefon`, `faks`, `eposta`, `adres`, `harita`, `lisans_kodu`, `aktif`, `bakim`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`)
VALUES
	(1,'Taner Tombas','a coder','','','All right reserved','all',7,'www.tanertombas.com','','mail.tanertombas.com','taner@tanertombas.com','123456','','','','','','',1,0,'','','','','');

/*!40000 ALTER TABLE `general_setting` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table img_library
# ------------------------------------------------------------

DROP TABLE IF EXISTS `img_library`;

CREATE TABLE `img_library` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(191) DEFAULT NULL,
  `gallery_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `img_library` WRITE;
/*!40000 ALTER TABLE `img_library` DISABLE KEYS */;

INSERT INTO `img_library` (`img_id`, `module`, `gallery_id`, `image_name`, `url`, `add_date`)
VALUES
	(10,'banner',2,'5b8ae769b79392325de68372f2d6363ca2dc981d.jpg','','2018-02-14'),
	(2,'product',2,'8792ce2497fb6a71ef1d1ed7d60cc8ec0361f1c2.jpg','','2018-02-14'),
	(3,'product',3,'dd0c2f920a217a1f649cbb92af882d5a5f77fe20.jpg','','2018-02-14'),
	(4,'page',1,'a467bb685db36634cf31479fb0ef27e6c3305959.jpg','','2018-02-14'),
	(5,'page',1,'9c6ab6b76f05f0c6c462d8b43c1df3ea237ca078.jpg','','2018-02-14'),
	(6,'product',2,'0c05ed703c6b2e3f2467cbd96826023f1e76ca43.jpg','','2018-02-14'),
	(7,'product',2,'8c0b65439f9ceb2a9e74bf8e5cafa715d42ea5a1.jpg','','2018-02-14'),
	(11,'banner',1,'d8b2f3fb514c82017643fb0885c94e19c8f41b49.jpg','','2018-02-14');

/*!40000 ALTER TABLE `img_library` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table page_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page_categories`;

CREATE TABLE `page_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `isActive` varchar(3) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `page_categories` WRITE;
/*!40000 ALTER TABLE `page_categories` DISABLE KEYS */;

INSERT INTO `page_categories` (`id`, `title`, `slug`, `description`, `body`, `image`, `isActive`, `number`)
VALUES
	(1,'Ana Sayfa','ana-sayfa','','','','1',0);

/*!40000 ALTER TABLE `page_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` int(11) DEFAULT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_self` varchar(191) DEFAULT NULL,
  `page_description` text NOT NULL,
  `page_text` longtext NOT NULL,
  `add_date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT 0,
  `page_link_url` varchar(191) DEFAULT NULL,
  `page_video_url` varchar(191) DEFAULT NULL,
  `page_link` int(11) DEFAULT NULL,
  `page_video` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `categories`, `page_name`, `page_self`, `page_description`, `page_text`, `add_date`, `image`, `stats`, `page_link_url`, `page_video_url`, `page_link`, `page_video`)
VALUES
	(1,1,'Kurumsal','kurumsal','Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.','Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir','2018-02-13 14:37:20','',1,'','',0,0);

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_categori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_categori`;

CREATE TABLE `product_categori` (
  `categori_id` int(11) NOT NULL AUTO_INCREMENT,
  `categori_name` varchar(255) NOT NULL,
  `categori_self` varchar(255) NOT NULL DEFAULT '',
  `categori_description` text NOT NULL,
  `categori_image` varchar(150) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT 0,
  `categori_sira` int(11) NOT NULL,
  PRIMARY KEY (`categori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `product_categori` WRITE;
/*!40000 ALTER TABLE `product_categori` DISABLE KEYS */;

INSERT INTO `product_categori` (`categori_id`, `categori_name`, `categori_self`, `categori_description`, `categori_image`, `stats`, `categori_sira`)
VALUES
	(2,'Ürün Kategorisi','urun-kategorisi','Kategori Açıklaması','',1,0);

/*!40000 ALTER TABLE `product_categori` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `categori_id` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `product_self` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_description` text COLLATE utf8_turkish_ci NOT NULL,
  `product_text` longtext COLLATE utf8_turkish_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `product_link` int(11) NOT NULL DEFAULT 0,
  `product_link_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `product_video` int(255) NOT NULL DEFAULT 0,
  `product_video_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `stats` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`product_id`, `categori_id`, `product_name`, `product_self`, `product_description`, `product_text`, `product_image`, `product_link`, `product_link_url`, `product_video`, `product_video_url`, `stats`)
VALUES
	(1,'1','test urun','test-urun','text aciklama 1','text içerik yazısı','',1,'link url',0,'',1),
	(2,'1','test','test','asdasd','&amp;lt;p&amp;gt;asdasdasd&amp;lt;/p&amp;gt;','',0,'',0,'',1),
	(3,'1','test','test','aadasd','&amp;lt;p&amp;gt;asdasd&amp;lt;/p&amp;gt;','',0,'',0,'',1);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sub_pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sub_pages`;

CREATE TABLE `sub_pages` (
  `subpage_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `page_name` int(11) NOT NULL,
  `page_descripton` text NOT NULL,
  `page_text` longtext NOT NULL,
  `add_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`subpage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `password`, `rank`)
VALUES
	(1,'admin','e10adc3949ba59abbe56e057f20f883e',1),
	(2,'demo_admin','fe01ce2a7fbac8fafaed7c982a04e229',2);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
