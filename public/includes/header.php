<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$val['title']?> | <?=$val['slogan']?></title>
    <!-- standart meta tags -->
    <meta name="Author" content="Delta Ajans Ltd. Şti." />
    <meta name="dcterms.audience" content="Delta Ajans Ltd. Şti." />
    <meta name="Keywords" content="<?=$val['keywords']?>">
    <meta name="Description" content="<?=$val['aciklama']?>">
    <meta name="Robots" content="All" />
    <meta name="Revisit-After" content="<?=$val['revisit']?> days" />

    <!-- mobile meta -->
    <meta property="og:title" content="<?=$val['title']?>" />
    <meta property="og:description" content="<?=$val['aciklama']?>"/>
    <meta property="og:url" content="<?=$val['domain']?>">
    <meta property="og:site_name" content="<?=$val['title']?>" />
    <meta property="og:type" content="website">
    <meta property="og:locale:alternate" content="tr_TR" />

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="_icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="_icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="_icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="_icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="_icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="_icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="_icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="_icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="_icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="_icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="_icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="_icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="_icons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="_icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Load Bootstrap -->
    <link rel="stylesheet" href="<?=asset_url("ui/bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?=asset_url("ui/bootstrap/css/bootstrap-theme.min.css")?>">
    <!-- load Fontawasome -->
    <link rel="stylesheet" href="<?=asset_url("ui/fontawesome/css/font-awesome.min.css")?>">
    <!-- master silder -->
    <link rel="stylesheet" href="<?=asset_url("ui/slider/style/masterslider.css")?>" />
    <link rel="stylesheet" href="<?=asset_url("ui/slider/skins/default/style.css")?>" />
    <link rel="stylesheet" href="<?=asset_url("ui/slider/style.css")?>" />
    <!-- Animasyon -->
    <link rel="stylesheet" href="<?=asset_url("ui/animations/css/animations.css")?>">
    <!-- slick carousel -->
    <link rel="stylesheet" type="text/css" href="<?=asset_url("ui/slick/slick.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=asset_url("ui/slick/slick-theme.css")?>">
    <!-- fancybox load -->
    <link rel="stylesheet" href="<?=asset_url("ui/fancybox/dist/jquery.fancybox.min.css")?>">
    <!-- load modernize css -->
    <link rel="stylesheet" href="<?=asset_url("css/dist/master.css")?>">
</head>
<body>