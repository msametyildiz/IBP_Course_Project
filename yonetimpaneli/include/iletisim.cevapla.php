<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'inc/config.php';
if (!empty($_GET["tablo"]) && !empty($_GET["ID"])) {

    $tablo = $VT->filter($_GET["tablo"]);
    $ID = $VT->filter($_GET["ID"]);
    $kontrol = $VT->VeriGetir("moduller", "WHERE tablo=? AND durum=?", array($tablo, 10), "ORDER BY ID ASC", 1);


    if ($kontrol != false) {
        $veri = $VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
        if ($veri != false) {
?>


            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"><?php
                                                    $kisi = $VT->VeriGetir("iletisim", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
                                                    ?>
                                <h1 class="m-0"><?= $kisi[0]["adsoyad"] ?> Mesajı</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                    <li class="breadcrumb-item active"><?= $kontrol[0]["baslik"] ?></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= SITE ?>iletisim.y/<?= $kontrol[0]["tablo"] ?>" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
                            </div>
                        </div>
                        <!----------------------------------------------------------------------------------------------------------------------------------->
                        
                        <?php
                        if ($_POST) {
                            if (!empty($_POST["mesaj"])) {
                                $adsoyad = $VT->filter($_POST["adsoyad"]);
                                $konu = $VT->filter($_POST["konu"]);
                                $mailadres = $VT->filter($_POST["mailadres"]);
                                $telefon = $VT->filter($_POST["telefon"]);
                                $gelenmesaj = $VT->filter($_POST["gelenmesaj"]);
                                $mesaj = $VT->filter($_POST["mesaj"], true); //true yazılmasının sebebi editor kullnıldığı için html komutlarını temizlemesini istemiyorum

                                $ekle = $VT->SorguCalistir("INSERT INTO iletisimcevap", "SET adsoyad=?, mesaj=?, durum=?, tarih=?", array($adsoyad, $mesaj, 1, date("Y-m-d")));

                                if ($ekle != false) {
                        ?>
                                    <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                                <?php
                                } else {
                                ?>
                                    <div class="alert alert-danger">! İŞLEM SIRASINDA BİR SORUNLA KARŞILAŞILDI. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ !</div>
                                <?php
                                }
                                $mail_icerik = "Merhaba, sitede doldurduğunuz iletişim formuna cevap geldi. Bilgileri aşağıdadır.<br>";
                                $mail_icerik .= "Gönderen: $sitebaslik<br>";
                                $mail_icerik .= "Telefon: $sitetelefon<br>";
                                $mail_icerik .= "Konu: $konu<br>";
                                $mail_icerik .= "Mesaj: <br>$mesaj<br>";
                        
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
                        $mail->setFrom('msametyildiz.msy@gmail.com', 'FORM CEVAP');
                        $mail->addAddress("$mailadres", 'MUHAMMED SAMET YILDIZ');     
                
                
                
                        $mail->isHTML(true);  
                        $mail->CharSet = 'UTF-8';                 
                        $mail->Subject = 'Siteden forma cevap gönderildi.';
                        $mail->Body    = $mail_icerik;
                        $mail->AltBody = $mail_icerik;
                
                        $mail->send();
                        
                    } 
                    catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        die();
                    }



                            } else {
                                ?>
                                <div class="alert alert-danger">! BOŞ BIRAKILAN ALANLARI DOLDURUNUZ !</div>
                        <?php
                            }
                        }
                        ?>
                        <!----------------------------------------------------------------------------------------------------------------------------------->
                        <!-- SELECT2 EXAMPLE -->
                        <!-- /.card-header -->,
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="col-md-8">
                                <div class="card-body card card-primary">
                                    <div class="row">
                                        <!-- header in form -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gönderici Adı</label>
                                                <input type="text" class="form-control" placeholder="Gönderici Adı ..." name="adsoyad" value="<?= stripslashes($veri[0]["adsoyad"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gelen Mesaj Konusu</label>
                                                <input type="text" class="form-control" placeholder="Gelen Mesaj Konusu ..." name="konu" value="<?= stripslashes($veri[0]["konu"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gelen Mesaj</label>
                                                <input type="text" class="form-control" placeholder="Gelen Mesaj ..." name="gelenmesaj" value="<?= stripslashes($veri[0]["mesaj"]) ?>">
                                            </div>
                                        </div>


                                        <!--keywords  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Telefon</label>
                                                <input type="tel" class="form-control" placeholder="Telefon Numarası" name="telefon" value="<?= stripslashes($veri[0]["telefon"]) ?>">


                                            </div>
                                        </div>
                                        <!--description  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gönderici Mail Adresi</label>
                                                <input type="text" class="form-control" placeholder="Gönderici Mail Adresi ..." name="mailadres" value="<?= stripslashes($veri[0]["mail"]) ?>">
                                            </div>
                                        </div>

                                        <!-- Text area-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cevapla </label>
                                                <textarea id="summernote" name="mesaj" placeholder="  Text Area  " style="width:100%; height:450px; line-height:18px; font-size:14px; border:1px solid #dddddd; padding:10px;">

                        </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-primary">Gönder</button>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.card -->
                            </div>
                        </form>

                        <!----------------------------------------------------------------------------------------------------------------------------------->

                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>


        <?php
        } else {
        ?>
            <meta http-equiv="refresh" content="0;url=<?= SITE ?>iletisim.y/<?= $kontrol[0]["tablo"] ?>">
        <?php
        }
    } else {
        ?>
        <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
    <?php

    }
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>