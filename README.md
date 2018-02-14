> ## KULLANIMI
* Birinci adım : `` clone repository ``

```
$ git clone https://github.com/taner-in-code/adminpanel.git && cd adminpanel
```

* İkinci adım : `` app\system\config.php ``

```

#database connect veriables example : ( $config['db']['host'] ) [ - LOCALhOST - ]
$config['db'] = [
  'host' => 'localhost',
  'name' => 'your_database_name',
  'user' => 'your_username',
  'pass' => 'your_password'
];

```

* Üçüncü adım : `` anadizinde bulunan sql dump dosyasını oluşturduğunuz veritabanına import edin | db\adminpanel_2018-02-13.sql  ``

* Son adım : http://siteadi.com/panel adresinden giriş yapın.

```
username: admin
password: 123456
```

tebrikler artık kullanıp geliştirebilirsiniz 💪🏼
