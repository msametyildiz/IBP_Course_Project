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
            if($_POST){
                if(!empty($_POST["adsoyad"])&& !empty($_POST["telefon"]) && !empty($_POST["mail"]) && !empty($_POST["konu"]) && !empty($_POST["mesaj"])){
                    $adsoyad=$VT->filter($_POST["adsoyad"]);
                    $telefon=$VT->filter($_POST["telefon"]);
                    $mail=$VT->filter($_POST["mail"]);
                    $konu=$VT->filter($_POST["konu"]);
                    $mesaj=$VT->filter($_POST["mesaj"]);
                    include_once(SINIF."class.phpmailer.php");
                    include_once(SINIF."class.smtp.php");
                    $ekle=$VT->SorguCalistir("INSERT INTO iletisim (`adsoyad`, `telefon`, `mail`, `konu`, `mesaj`) VALUES ('$adsoyad','$telefon','$mail','$konu','$mesaj')");
                    if($ekle!=false){
                        echo '<div class="alert alert-success">Veritabanına ekleme işlemi başarılı...</div>';
                    }
                    else{
                        echo '<div class="alert alert-danger">Veritabanına ekleme işlemi başarısız...</div>';
                    }
                    $metin=$konu."Ad Soyad : ".$adsoyad." Mail Adresi : ".$mail." Telefon Numarası : ".$telefon." Mesaj : ".$mesaj;
                    
                    $maililet=$VT->MailGonder($sitemail,$konu,$metin);
                    if($maililet!=false){
                        echo '<div class="alert alert-success">Mesajınız Başarıyla İletilmiştir. </div>';
                    }
                    else{
                        echo '<div class="alert alert-danger">Mesaj Gönderme İşlemi Başarısız. Lütfen Daha Sonra Tekrar Deneyiniz...</div>';
                    }
                }
                else{
                    echo '<div class="alert alert-danger">Boş bırktığını alanı doldurunuz</div>';
                }
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
