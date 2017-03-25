<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$val['title']?> | <?=$val['slogan']?></title>

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- favicon edit
	<link href="../assets/common/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="../assets/common/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="../assets/common/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="../assets/common/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="../assets/common/img/favicon.png" rel="icon" type="image/png">
	<link href="favicon.ico" rel="shortcut icon">
	-->

    <!-- UI CSS Link's
    -->
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("ui/bootstrap/dist/css/bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/jscrollpane/style/jquery.jscrollpane.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/sweetalert/dist/sweetalert.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/ladda/dist/ladda-themeless.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/select2/css/select2.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/chartist/dist/chartist.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/fullcalendar/dist/fullcalendar.min.css")?>">


    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/nprogress/nprogress.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/jquery-steps/demo/css/jquery.steps.css")?>">

    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/select2/dist/css/select2.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/bootstrap-select/dist/css/bootstrap-select.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/ui/dropify/dist/css/dropify.min.css")?>">

    <!-- Theme fixed css -->
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/css/main.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=admin_asset_url("theme/css/main.css")?>">

    <script src="<?=admin_asset_url("ui/jQuery/jquery.min.js")?>"></script>
</head>
<body class="theme-red">
<?php if($module != 'sitekapali'){ ?>
	<?php if($module != 'bakimmodu'){ ?>
        <nav class="left-menu">
            <div class="logo-container">
                <a href="<?=surl?>" class="logo">
                    <img src="<?=admin_asset_url("images/logo.png")?>" alt="Delta Ajans | Müşteri Bilgilendirme Sistemi" />
                    <img class="logo-inverse" src="<?=admin_asset_url("images/logo_white.png")?>" alt="Delta Ajans | Müşteri Bilgilendirme Sistemi" />
                </a>
            </div>
            <div class="left-menu-inner scroll-pane">
                <ul class="left-menu-list left-menu-list-root list-unstyled">
                    <li class="left-menu-list-separator"><!-- --></li>
                    <li class="left-menu-list-active">
                        <a class="left-menu-link " href="<?=panel_url()?>">
                            <i class="left-menu-link-icon icmn-home"><!-- --></i>
                            <span class="menu-top-hidden">Ana Sayfa</span>
                        </a>
                    </li>
                    <li class="left-menu-list-separator"><!-- --></li>
                    <li class="left-menu-list-submenu">
                        <a class="left-menu-link" href="javascript: void(0);">
                            <i class="left-menu-link-icon icmn-pacman"><!-- --></i>
                            Kategori Yönet
                        </a>
                        <ul class="left-menu-list list-unstyled">
                            <li>
                                <a class="left-menu-link" href="kategori-olustur">
                                    <i class="left-menu-link-icon icmn-pencil5" style="margin-right: 5px"><!-- --></i> Yeni Oluştur
                                </a>
                            </li>
                            <li>
                                <a class="left-menu-link" href="kategori-listele">
                                    <i class="fa fa-list" style="margin-right: 5px"><!-- --></i> Kategori Listesi
                                </a>
                            </li>
                        </ul>
                    </li><li class="left-menu-list-submenu">
                        <a class="left-menu-link" href="javascript: void(0);">
                            <i class="left-menu-link-icon icmn-file-empty"><!-- --></i>
                            Sayfaları Yönet
                        </a>
                        <ul class="left-menu-list list-unstyled">
                            <li>
                                <a class="left-menu-link" href="sayfa-olustur">
                                    <i class="left-menu-link-icon icmn-pencil5" style="margin-right: 5px"><!-- --></i> Yeni Oluştur
                                </a>
                            </li>
                            <li>
                                <a class="left-menu-link" href="sayfa-listesi">
                                    <i class="fa fa-list" style="margin-right: 5px"><!-- --></i> Tüm Sayfalar
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="left-menu-list-submenu">
                        <a class="left-menu-link" href="javascript: void(0);">
                            <i class="left-menu-link-icon icmn-stack2"><!-- --></i>
                            Portfolyoları Yönet
                        </a>
                        <ul class="left-menu-list list-unstyled">
                            <li>
                                <a class="left-menu-link" href="liste-olustur">
                                    <i class="left-menu-link-icon icmn-pencil5" style="margin-right: 5px"><!-- --></i> Yeni Oluştur
                                </a>
                            </li>
                            <li>
                                <a class="left-menu-link" href="tum-listeler">
                                    <i class="fa fa-list" style="margin-right: 5px"><!-- --></i> Tüm Portfolyo
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="left-menu-list-separator"><!-- --></li>
                    <li class="left-menu-list">
                        <a href="settings" class="left-menu-link" href="javascript: void(0);">
                            <i class="left-menu-link-icon icmn-cog util-spin-delayed-pseudo"><!-- --></i>
                            Site Ayarları
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
	<?php }; }; ?>

<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div><!-- --></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <img src="<?=updir."/avatars/kucuk/1.jpg"?>" alt="Alternative text to the image">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">Sistem</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> Sistem Ayarı</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> Kullanıcı Ayarı</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> Bildirim Ayarları</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item logout" href="javascript:void(0)"><i class="dropdown-icon icmn-exit"></i> Çıkış Yap</a>
                </ul>
            </div>
        </div>
        <div class="menu-user-block menu-notifications">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="menu-notification-icon icmn-bullhorn"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <div class="notification-block">
                        <div class="item">
                            <i class="notification-icon icmn-star-full"></i>
                            <div class="inner">
                                <div class="title">
                                    <span class="pull-right">Şimdi</span>
                                    <a href="javascript: void(0);">Güncelleme Raporu: <span class="label label-danger font-weight-700">Yeni</span></a>
                                </div>
                                <div class="descr">
                                    Sistem, kullanıcı yetkilendirme güncellemeleri..
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>
<section class="page-content">
    <div class="page-content-inner">
        <div class="dashboard-container">