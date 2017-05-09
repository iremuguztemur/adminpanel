<?php

if(!url(1)){
	$_url[1] = 'index';
};



$config['menu'] = [
	'pages' => [
    'title' => 'Sayfalar',
    'icon' => 'icmn-file-plus',
    'submenu' => [
			'page-categori' => [
				'title' => 'Sayfa kategorisi'
			],
      'page' => [
        'title' => 'Sayfa listesi'
      ],
      'pages/new-page' => [
        'title' => 'Yeni Ekle'
      ]
    ]
  ],
  'products' => [
    'title' => 'Ürünler',
    'icon' => 'icmn-store',
    'submenu' => [
			'product-categori' => [
				'title' => 'Ürün kategorisi'
			],
      'products' => [
        'title' => 'Ürün listesi'
      ],
      'product/new-product' => [
        'title' => 'Yeni Ekle'
      ]
    ]
  ],
  'banners' => [
    'title' => 'Banner Yönetimi',
    'icon' => 'icmn-image-compare',
    'submenu' => [
      'banners' => [
        'title' => 'Bannerlar'
      ],
      'new-banner' => [
        'title' => 'Banner Ekle'
      ]
    ]
  ],
  'settings' => [
    'title' => 'Ayarlar',
    'icon' => 'icmn-cog5 util-spin-delayed-pseudo'
  ],
  'logout' => [
    'title' => 'Çıkış Yap',
    'icon' => 'icmn-cancel'
  ]
];

if (!file_exists(panel_controller(url(1)))){
  $_url[1] = 'index';
};

if(!control_session('login')){
	$_url[1] = 'login';
}

require panel_controller(url(1));
