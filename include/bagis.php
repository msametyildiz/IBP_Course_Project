<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    
</div>
<!--/ bradcam_area  -->

<!-- about_mission  --><?php
              $kontrol = $VT->VeriGetir("bagisyap", "WHERE ID=?", array("1"), "ORDER BY ID ASC", 1);
              if ($kontrol != false) {
                
              ?>
<div class="explorer_europe">
    <div class="container" style="padding-top:7%; padding-bottom:8%;">
        <div class="row align-items-center">
            <div class="section background-white padding-top-small over-hide">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="main-title text-center">
                                <h3 class="mb-4" style="font-family:Raleway, sans-serif;">Necat Derneği Bağışçısı Ol !</h3>
                                <div class="main-subtitle-top mb-4"><?= $kontrol[0]["bankaadi"] ?></div>
                                <h6 style="font-weight: bold;">HESAP ADI: <?= $kontrol[0]["hesapadi"] ?></h6>
                                <div class="main-subtitle-top mb-4" style="opacity: 0.7;">Necat Derneği’ne yurtdışından bağış yapmak isteyenlerin dikkatine!</div>
                                <div class="main-subtitle-bottom mt-3" style="opacity: 0.7;">Dünyanın her yerindeki bankalardan Necat derneği resmî banka hesaplarına, döviz havalesi gönderilebilmektedir.</div>
                                <div class="main-subtitle-bottom mt-3" style="opacity: 0.7;">Yurtdışından yapılacak ödemeler için: Swift Kodu “<strong><?= $kontrol[0]["swiftkodu"] ?></strong>”</div>
                                <div class="mt-3" style="opacity: 0.7;">Necat yardımlarını, projelerini sürdürülebilir kılmak için Necat Derneği’ne ait hesap numaralarımız:</div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="col-xl-3 col-md-4 col-lg-3" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s" data-scroll-reveal-id="1" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                            <div class="pricing p-xl-5 background-white text-center">
                                <h5 style="font-family:Raleway, sans-serif;">TL Hesabı</h5>
                                <div class="pricing-sub mb-4"><?= $kontrol[0]["tlhesap"] ?></div>
                                <div class="pricing-line mt-4 mb-4"></div>
                                <h5 style="font-family:Raleway, sans-serif;">IBAN</h5>
                                <div class="pricing-sub"><?= $kontrol[0]["tliban"] ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-lg-3" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                            <div class="pricing p-xl-5 background-white text-center">
                                <h5 style="font-family:Raleway, sans-serif;">USD Hesabı</h5>
                                <div class="pricing-sub mb-4"><?= $kontrol[0]["usdhesap"] ?></div>
                                <div class="pricing-line mt-4 mb-4"></div>
                                <h5 style="font-family:Raleway, sans-serif;">IBAN</h5>
                                <div class="pricing-sub"><?= $kontrol[0]["usdiban"] ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-lg-3" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s" data-scroll-reveal-id="3" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                            <div class="pricing p-xl-5 background-white text-center">
                                <h5 style="font-family:Raleway, sans-serif;"> EUR Hesabı</h5>
                                <div class="pricing-sub mb-4"><?= $kontrol[0]["eurhesap"] ?></div>
                                <div class="pricing-line mt-4 mb-4"></div>
                                <h5 style="font-family:Raleway, sans-serif;">IBAN</h5>
                                <div class="pricing-sub"><?= $kontrol[0]["euriban"] ?></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-lg-3" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s" data-scroll-reveal-id="4" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                            <div class="pricing p-xl-5 background-white text-center">
                                <h5 style="font-family:Raleway, sans-serif;">GBP Sterlin Hesabı</h5>
                                <div class="pricing-sub mb-4"><?= $kontrol[0]["sterlinhesap"] ?></div>
                                <div class="pricing-line mt-4 mb-4"></div>
                                <h5 style="font-family:Raleway, sans-serif;">IBAN</h5>
                                <div class="pricing-sub"><?= $kontrol[0]["sterliniban"] ?></div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div><div class="col-md-12 text-center" >
                            <a href="<?=SITE?>bagis-bilgilendirme-formu" class="buttonIDBagis">Bağış Bildirim Formu</a>
                        </div>
            </div>

        </div>
    </div>
</div>
<?php
                } else {
                ?>
                  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
                <?php

                }
              
              ?>
<!--/ about_mission -->