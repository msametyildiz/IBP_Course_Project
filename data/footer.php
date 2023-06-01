<!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/footer_logo.png" alt="">
                                </a>
                            </div>
                            <div class="logo">
                                    <a href="<?=SITE?>" style="color:black;font-size:30px;background-image: url('<?=SITE?>img/about/counter.png')">
                                        PAYLASTIKCA
                                        <!--<img src="<?=SITE?>img/logo.png" alt="">-->
                                    </a>
                                </div>
                            <p><br> ELİNİZİ İYİLİK İÇİN UZATIN</p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="<?=$sitefacebook?>"><i class="ti-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?=$sitetelegram?>" ><i class="fa fa-telegram" style="color:#0088cc;"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?=$sitetwitter?>"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?=$siteinstagram?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Hizmetler
                            </h3>
                            <ul>
                                <?php
                                $services=$VT->VeriGetir("hizmetler","WHERE durum=?",array(1),"ORDER BY ID ASC");
                                if($services!=false){
                                    for($i=0;$i<count($services);$i++){
                                        ?>
                                        
                                <li><a href="<?=SITE?>hizmet-detay/<?= stripslashes($services[$i]["selflink"]) ?>"><?= stripslashes($services[$i]["baslik"]) ?></a></li>
                                <?php    }
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                            NECAT SOSYAL YARDIMLAŞMA EĞİTİM KÜLTÜR VE TURİZM DERNEĞİ</h3>
                            <ul style="display:inline-block;">
                                <li><a href="<?= SITE ?>kurumsal/hakkimizda">Hakkımızda</a></li>
                                <li><a href="<?= SITE ?>kurumsal/misyonumuz">Misyonumuz</a></li>
                                <li ><a href="<?= SITE ?>hizmetler">Hizmetler</a></li>
                                <li ><a href="<?= SITE ?>projeler">Projeler</a></li>
                            </ul>
                            <ul style="display:inline-block;padding-left:15%;" >
                                
                                <li ><a href="<?= SITE ?>blog">Bloglar</a></li>
                                <li ><a href="<?= SITE ?>iletisim">İletişim</a></li>
                                <li><a href="#">Destekçilerimiz</a></li>
                                <li><a href="#">Destekçilerimiz</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--<div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-right" style="font-size:10px;">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" style="text-align: right;">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->