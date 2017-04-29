<?php // include "head.php"; ?>
<meta charset="utf-8">
<?php
function pozisyon_ayikla ($veri) {
    return mb_strtolower (str_replace (array ('opoz_1', 'opoz_2', 'opoz_3', 'opoz_4', 'opoz_5', 'opoz_6', 'opoz_7' ), array ('Ekspertiz ve Kaporta Elemanı', 'Muhasebe Şefi', 'Otomotiv Satış Şefi', 'Tahsilat Elemanı', 'Sigorta Danışmanı İstanbul', 'Sigorta Danışmanı Samsun', 'Otomotiv Servis Danışmanı' ), $veri), 'UTF-8');
}
	if(($_POST['adsoyad']!='') and ($_POST['eposta']!='') and ($_POST['dogum']!='') and ($_POST['telefon']!='') and ($_POST['adres']!='') and ($_POST['aciklama']!='')){
		include 'class.phpmailer.php';
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'mail.ercal.com.tr';
		$mail->Port = 587;
		$mail->Username = 'webform@ercal.com.tr';
		$mail->Password = 'OZyg21W9';
		$mail->SetFrom($mail->Username, 'ercal.com.tr');
		$mail->AddAddress('info@ercal.com.tr', 'Erçal Group');
		$mail->AddAddress('yaseminkaya@ercal.com.tr', 'Yasemin Kaya');
		$mail->AddReplyTo($_POST["eposta"], $_POST["adsoyad"]);
		if(is_array($_FILES)) {
			$mail->AddAttachment($_FILES['dosya']['tmp_name'],$_FILES['dosya']['name']); 
		}
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'ercal.com.tr: web sitesinden kariyer başvurusu var!';
		$mail->MsgHTML("Pozisyon: ".pozisyon_ayikla($_POST["pozisyon"])."<br><br>"."İsim Soyisim: ".$_POST["adsoyad"]."<br>"."Doğum tarihi: ".$_POST["dogum"]."<br><br>"."E-posta: ".$_POST["eposta"]."<br><br>"."Telefon: ".$_POST["telefon"]."<br><br>"."Adres: ".$_POST["adres"]."<br><br>"."Ek açıklama: ".$_POST["aciklama"]);
		if($mail->Send()) {			
			echo "<script>alert('Kariyer formunuz gönderildi, teşekkür ederiz.');</script>";
			echo '<script>document.location.href="../kariyer.php";</script>';
		} else {			
			echo "<script>alert('Form gönderilirken bir hata oluştu.');</script>";
			echo '<script>document.location.href="../kariyer.php";</script>';
		}
	}
?>