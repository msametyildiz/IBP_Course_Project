<link rel="stylesheet" href="<?= SITE ?>css/iletisim.css">
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>BAĞIŞ BİLDİRİM FORMU</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- about_mission  -->
<section id="iletisim" style="padding-bottom: 10%; padding-top:5%;">
    <div class="container">
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
                    $ekle=$VT->SorguCalistir("INSERT INTO bagisbilgilendirmeformu (`adsoyad`, `telefon`, `mail`, `konu`, `mesaj`) VALUES ('$adsoyad','$telefon','$mail','$konu','$mesaj')");
                    if($ekle!=false){
                        echo '<div class="alert alert-success">Veritabanına ekleme işlemi başarılı...</div>';
                    }
                    else{
                        echo '<div class="alert alert-danger">Veritabanına ekleme işlemi başarısız...</div>';
                    }
                    $metin="Ad Soyad : ".$adsoyad." Mail Adresi : ".$mail." Telefon Numarası : ".$telefon." Mesaj : ".$mesaj;
                    $maililet=$VT->MailGonder("$sitemail",$konu,$metin);
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Ad<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input class="form-control" autocomplete="off" type="text" data-val="true" data-val-maxlength="Ad&#x131;n&#x131;z 100 karakterden uzun olamaz!" data-val-maxlength-max="100" data-val-required="Ad&#x131;n&#x131;z zorunludur!" id="Name" maxlength="100" name="Name" value="" />
                            <span class="text-danger field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Soyad<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input class="form-control" autocomplete="off" type="text" data-val="true" data-val-maxlength="Soyad&#x131;n&#x131;z 100 karakterden uzun olamaz!" data-val-maxlength-max="100" data-val-required="Soyad&#x131;n&#x131;z zorunludur!" id="Surname" maxlength="100" name="Surname" value="" />
                            <span class="text-danger field-validation-valid" data-valmsg-for="Surname" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Email<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input class="form-control" autocomplete="off" type="email" data-val="true" data-val-email="L&#xFC;tfen ge&#xE7;erli bir mail adresi giriniz!" data-val-maxlength="Email adresiniz 255 karakterden uzun olamaz!" data-val-maxlength-max="255" data-val-required="Email adresiniz zorunludur!" id="Email" maxlength="255" name="Email" value="" />
                            <span class="text-danger field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Telefon<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input id="donator_phone" class="form-control" autocomplete="off" type="tel" data-val="true" data-val-required="Telefon numaran&#x131;z zorunludur!" pattern="[0-9]{11}" name="Phone" value="" />
                            <span class="text-danger field-validation-valid" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Bağış Kanalı<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <select class="form-control" data-val="true" data-val-required="Bu alan zorunludur!" id="DonationChannel" name="DonationChannel">
                                <option value="Havale">Havale</option>
                                <option value="EFT">Eft</option>
                                <option value="KrediKarti">Kredi Kartı</option>
                            </select>
                            <span class="text-danger field-validation-valid" data-valmsg-for="DonationChannel" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Bağış Tarihi<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" autocomplete="off" data-val="true" data-val-required="Bu alan zorunludur!" id="DonationDate" name="DonationDate" value="">
                            <span class="text-danger field-validation-valid" data-valmsg-for="DonationDate" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Bağış Miktarı<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input class="form-control" autocomplete="off" type="number" data-val="true" data-val-number="The field DonationAmount must be a number." data-val-required="Bu alan zorunludur!" id="DonationAmount" name="DonationAmount" value="" />
                            <span class="text-danger field-validation-valid" data-valmsg-for="DonationAmount" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Bağışınız şartlı bağış mı?<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <select class="form-control" data-val="true" data-val-required="Bu alan zorunludur!" id="ConditionalDonation" name="ConditionalDonation">
                                <option value="False" selected="selected">Hayır</option>
                                <option value="True">Evet</option>
                            </select>
                            <span class="text-danger field-validation-valid" data-valmsg-for="ConditionalDonation" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Varsa bağış şartınız<span class="text-danger"></span></span></label>
                        <div class="col-md-10">
                            <input class="form-control" autocomplete="off" type="text" data-val="true" data-val-maxlength="Bağış şartınız 200 karakterden uzun olamaz!" data-val-maxlength-max="200" id="sart" maxlength="200" name="sart" value="" />
                            <span class="text-danger field-validation-valid" data-valmsg-for="sart" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                <div id="conditionalDonationDesc" class="col-md-12 d-none">
                    <div class="form-group row">
                        <label class="col-md-2 font-weight-bold form-label"><span>Şartınız<span class="text-danger">*</span></span></label>
                        <div class="col-md-10">
                            <input class="form-control" autocomplete="off" type="text" id="ConditionDonationDescription" name="ConditionDonationDescription" value="">
                            <small>Örneğin: gıda kolilerinde kullanılmak üzere.</small>
                            <span class="text-danger field-validation-valid" data-valmsg-for="ConditionDonationDescription" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group form-center">
                        <div>
                            <label class="font-weight-bold"><span>Dekontunuz<span class="text-danger">*</span></span></label>
                            <div>
                                <input style="padding-left:12%;" type="file" accept=".jpg, .jpeg, .png, .pdf" id="Receipt" name="Receipt" />
                                <div>
                                    <small>Desteklenen Dosya Türleri: .png, .jpg, .jpeg, .pdf <br />Max Boyut: 10 MB</small>
                                </div>
                                <span class="text-danger field-validation-valid" data-valmsg-for="Receipt" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-center">
                        <div>
                            <div class="checkbox primary">
                                <input type="checkbox" id="checkbox1" data-val="true" data-val-required="The Kvkk field is required." name="Kvkk" value="true" />
                                <label for="checkbox1">
                                    <a class="btn-link btn-primary pr-0" href="javascript;" onclick="window.open('<?=SITE?>kvkk', 'Necat Derneği Kişisel Veriler Politikası', 'width=800,height=750'); return false;">Necat Derneği Kişisel Veriler Politikası</a>'nı okudum ve onaylıyorum.
                                </label>
                            </div>
                            <span class="text-danger field-validation-valid" data-valmsg-for="Kvkk" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5 text-center">
                    <button id="submitBtn" class="btn btn-primary btn-round btn-long" type="submit">Gönder</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!--/ about_mission -->
