<link rel="stylesheet" href="<?= SITE ?>css/iletisim.css">
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>İletişim</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- about_mission  -->
<section id="iletisim">
    <div class="container">
        <h3 id="h3iletisim">İletişim</h3>
        <form action="#" method="post">
        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        require 'inc/config.php';
            if($_POST){
                if(!empty($_POST["adsoyad"])&& !empty($_POST["telefon"]) && !empty($_POST["mail"]) && !empty($_POST["konu"]) && !empty($_POST["mesaj"])){
                    $adsoyad=$VT->filter($_POST["adsoyad"]);
                    $telefon=$VT->filter($_POST["telefon"]);
                    $mail=$VT->filter($_POST["mail"]);
                    $konu=$VT->filter($_POST["konu"]);
                    $mesaj=$VT->filter($_POST["mesaj"]);
                    
                    $ekle = $VT->SorguCalistir("INSERT INTO iletisim (`adsoyad`, `telefon`, `mail`, `konu`, `mesaj`,`durum`, `tarih`) VALUES ('$adsoyad', '$telefon', '$mail', '$konu', '$mesaj',1, CURDATE())");
                    if($ekle!=false){
                        echo '<div class="alert alert-success">İşlem Başarılı...</div>';
                    }
                    else{
                        echo '<div class="alert alert-danger">Veritabanına ekleme işlemi başarısız...</div>';
                    }
                    
                    $mail_icerik = "Merhaba yönetici, sitenizden yeni bir iletişim formu gönderildi. Bilgileri aşağıdadır.";
                    $mail_icerik .= "Adı Soyadı: $adsoyad<br>";
                    $mail_icerik .= "Telefon: $telefon<br>";
                    $mail_icerik .= "E-mail: $mail<br>";
                    $mail_icerik .= "Konu: $konu<br>";
                    $mail_icerik .= "Mesaj: $mesaj<br>";

	                require 'phpmailler/src/Exception.php';
	                require 'phpmailler/src/PHPMailer.php';
	                require 'phpmailler/src/SMTP.php';



	                $mail = new PHPMailer(true);

	try {

		$mail->SMTPDebug = 0;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'ssl://smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'samet.saray.06@gmail.com';                     // SMTP username
		$mail->Password   = 'sazjvbfajhwnketb';                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		//Recipients
		$mail->setFrom('samet.saray.06@gmail.com', 'iletisim - formu');
		$mail->addAddress('samet.saray.06@gmail.com', 'MUHAMMED SAMET YILDIZ');     



		$mail->isHTML(true);  
		$mail->CharSet = 'UTF-8';                 
		$mail->Subject = 'Sitenizden iletisim formu gönderildi.';
		$mail->Body    = $mail_icerik;
		$mail->AltBody = $mail_icerik;

		$mail->send();
		
	} 
	catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		die();
	}
                }
                else{
                    echo '<div class="alert alert-danger">Boş bırktığını alanı doldurunuz</div>';
                }
               ?> <meta http-equiv="refresh" content="2;url=<?= SITE ?>iletisim"><?php
            }
            
            ?>
            <div id="iletisimopak">
                <div id="formgroup">
                    <div id="solform">
                        <input type="text" name="adsoyad" class="form-control" placeholder="Ad Soyad" required="required" data-val-required="Ad Soyad&#x131;z zorunludur!">
                        <input type="text" name="telefon" class="form-control" placeholder="Telefon Numarası" required="required" data-val-required="Telefon numaran&#x131;z zorunludur!" maxlength="11">
                    </div>
                    <div id="sagform">
                        <input type="email" name="mail" class="form-control" placeholder="E-mail " required="required" data-val-required="Mail&#x131;z zorunludur!">
                        <input type="text" name="konu" class="form-control" placeholder="Konu Başlığı" required="required" data-val-required="Konu Başlığı&#x131;z zorunludur!">
                    </div>
                    <textarea name="mesaj" class="form-control" cols="30" rows="10" placeholder="Mesaj giriniz " required="required" data-val-required="Mesaş&#x131;z zorunludur!"></textarea>
                    <input type="submit" class="form-control" name="GonderButton" value="Gönder">
                </div>
                <div id="adres">
                    <h4 style="font-family: 'Lobster', cursive;">BİZE ULAŞIN</h4>
                    <br>
                    <p>Telefon : <?= $sitetelefon ?></p>
                    <p>Fax : <?= $sitefax ?></p>
                    <p>E-Posta : <?= $sitemail ?></p>
                    <p>Adres : <?= $siteadres ?></p>
                </div>
            </div>
        </form>
    </div>
</section>
<!--/ about_mission -->
