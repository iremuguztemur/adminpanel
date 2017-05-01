<?php

if(!url(1)){
	$_url[1] = 'index';
};



$config['menu'] = [
  'pages' => [
    'title' => 'Sayfalar',
    'icon' => 'icmn-files-empty2',
    'submenu' => [
      'pages' => [
        'title' => 'Sayfalar'
      ],
      'new-page' => [
        'title' => 'Sayfa Ekle'
      ]
    ]
  ],
  'products' => [
    'title' => 'Ürünler',
    'icon' => 'icmn-store',
    'submenu' => [
			'product-group' => [
				'title' => 'Gruplar'
			],
      'product-categori' => [
        'title' => 'Kategoriler'
			],
      'products' => [
        'title' => 'Ürünler'
      ],
      'product/new-product' => [
        'title' => 'Ürün Ekle'
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
