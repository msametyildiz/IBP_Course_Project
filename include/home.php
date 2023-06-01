<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
<!-- slider_area_start -->
<div class="slider_area" style="max-height: 86px;background-color:white;">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-10">
                    <div class="slider_text text-center justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<div><div style="height:600px; background-image: url('<?= SITE ?>img/banner/mainpic.jpg');background-size: cover;background-attachment: fixed;	background-position:center; background-color:gray;opacity: 0.5;">
    <div class="  d-flex align-items-center ">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12">
                    <section id="anasayfa" style="height: 600px;">
                        <div id="back">

                        </div>
                        <div id="icerik" style="position: absolute;	top: 50%;left: 40%;transform:translate(-50%,-50%);color: white;	font-size: 20px;">
                            <h2 style="font-family: 'Alkalami', serif;color:black;">NECAT SOSYAL YARDIMLAŞMA EĞİTİM KÜLTÜR VE TURİZM DERNEĞİ</h2><br>
                            <hr style="width:50%;text-align:left;margin-left:0;height:2px;border-width:0;color:gray;background-color:white;">
                            <h1 style="margin-top:16%;font-family: 'Kalam', cursive;color:black;">" ELİNİZİ İYİLİK İÇİN UZATIN "</h1>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>

<!--
< <div class="popular_catagory_area" style="padding-top:5%;padding-bottom:4%">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-60 text-center">
                    <h3> Neler Yapıyoruz ?</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $counter = 0;
            //Burada yapılan şey ıd numarasında göre en son kaydedilen 3 hizmeti listeleme VeriGetir("hizmetler", "WHERE durum=?", array(1), "ORDER BY ID DESC",5) yazsaydık 5 tane listeleyecekti DESC ise sondan başla demek
            $hizmetler = $VT->VeriGetir("hizmetler", "WHERE durum=?", array(1), "ORDER BY ID DESC", 4);
            if ($hizmetler != false) {
                for ($i = 0; $i < count($hizmetler); $i++) {
                    if (!empty($hizmetler[$i]["resim"])) {
                        $resim = $hizmetler[$i]["resim"];
                    } else {
                        $resim = 'varsayilan.png';
                    }
            ?>

                    <div class="col-xl-3 col-md-4 col-lg-3" onclick="location.href='<?= SITE ?>hizmet-detay/<?= $hizmetler[$i]['selflink'] ?>';">
                        <div class="single_catagory">
                            <div class="thumb">
                                <img src="<?= SITE ?>images/hizmetler/<?= $resim ?>" style="max-height:200px; max-width:350px">
                            </div>
                            <div class="hover_overlay">
                                <div class="hover_inner">
                                    <a href="<?= stripslashes($hizmetler[$i]["baslik"]) ?>">
                                        <h3><a href="<?= SITE ?>hizmet-detay/<?= $hizmetler[$i]["selflink"] ?>"><?= stripslashes($hizmetler[$i]["baslik"]) ?></a></h3>
                                        <p><?= mb_substr(strip_tags(stripslashes($hizmetler[$i]["metin"])), 0, 120, "UTF-8") ?>...</p>

                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
    </div>

    -->
<div class="explorer_europe" style="padding-top:5%;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-60 text-center">
                    <h3> Neler Yapıyoruz ?</h3>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent" style="padding-top:4%;padding-bottom:4%">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <?php
                    $counter = 0;
                    //Burada yapılan şey ıd numarasında göre en son kaydedilen 3 hizmeti listeleme VeriGetir("hizmetler", "WHERE durum=?", array(1), "ORDER BY ID DESC",5) yazsaydık 5 tane listeleyecekti DESC ise sondan başla demek
                    $hizmetler = $VT->VeriGetir("hizmetler", "WHERE durum=?", array(1), "ORDER BY ID DESC", 4);
                    if ($hizmetler != false) {
                        for ($i = 0; $i < count($hizmetler); $i++) {
                            if (!empty($hizmetler[$i]["resim"])) {
                                $resim = $hizmetler[$i]["resim"];
                            } else {
                                $resim = 'varsayilan.png';
                            }
                    ?>
                            <div class="col-xl-3 col-md-4 col-lg-3" onclick="location.href='<?= SITE ?>hizmet-detay/<?= $hizmetler[$i]['selflink'] ?>';">
                                <div class="single_explorer">
                                    <div class="thumb">
                                        <img src="<?= SITE ?>images/hizmetler/<?= $resim ?>" alt="" style="max-height:200px; max-width:350px">
                                    </div>
                                    <div class="explorer_bottom d-flex">
                                        <div class="icon" style="background-color:white ;">
                                            <i class="fa fa-newspaper-o" aria-hidden="true" style="color: black;"></i>
                                        </div>
                                        <div class="explorer_info">
                                            <h3>
                                                <a href="<?= stripslashes($hizmetler[$i]["baslik"]) ?>">
                                                    <h4><a href="<?= SITE ?>hizmet-detay/<?= $hizmetler[$i]["selflink"] ?>"><?= stripslashes($hizmetler[$i]["baslik"]) ?></a></h4>
                                                    <p><?= mb_substr(strip_tags(stripslashes($hizmetler[$i]["metin"])), 0, 120, "UTF-8") ?>...</p>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

                </div>
            </div>


        </div>
    </div>


    <div class="explorer_europe">
        <div class="container">
            <div class="explorer_wrap">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-4">
                        <h3 style="padding-left:20%;">Projelerimiz</h3>
                    </div>
                    <div class="col-xl-6 col-md-8">
                        <div class="explorer_tab">
                            <nav>
                                <div class="nav" id="nav-tab" role="tablist">
                                    <?php
                                    $projeler = $VT->VeriGetir("projekonulari", "WHERE durum=?", array(1), "ORDER BY ID ASC");
                                    if ($projeler != false) {
                                        for ($i = 0; $i < count($projeler); $i++) {

                                    ?>
                                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?= $projeler[$i]["konu"] ?></a>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent" style="padding-top:4%;padding-bottom:6%">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php
                        $counter = 0;
                        //Burada yapılan şey ıd numarasında göre en son kaydedilen 3 hizmeti listeleme VeriGetir("hizmetler", "WHERE durum=?", array(1), "ORDER BY ID DESC",5) yazsaydık 5 tane listeleyecekti DESC ise sondan başla demek
                        $projeler = $VT->VeriGetir("projeler", "WHERE durum=?", array(1), "ORDER BY ID DESC", 6);
                        if ($projeler != false) {
                            for ($i = 0; $i < count($projeler); $i++) {
                                if (!empty($projeler[$i]["resim"])) {
                                    $resim = $projeler[$i]["resim"];
                                } else {
                                    $resim = 'varsayilan.png';
                                }
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6" onclick="location.href='<?= SITE ?>hizmet-detay/<?= $hizmetler[$i]['selflink'] ?>';">
                                    <div class="single_explorer">
                                        <div class="thumb">
                                            <img src="<?= SITE ?>images/projeler/<?= $resim ?>" alt="" style="max-height:200px; max-width:350px">
                                        </div>
                                        <div class="explorer_bottom d-flex">
                                            <div class="icon">
                                                <i class="flaticon-beach"></i>
                                            </div>
                                            <div class="explorer_info">
                                                <h3>
                                                    <a href="<?= stripslashes($projeler[$i]["baslik"]) ?>">
                                                        <h4><a href="<?= SITE ?>proje-detay/<?= $projeler[$i]["selflink"] ?>"><?= stripslashes($projeler[$i]["baslik"]) ?></a></h4>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>


            </div>
        </div>


        <!-- sprayed_area  -->
        <div class="sprayed_area overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="text text-center">
                            <h3>Bize Ulaşın </h3>
                            <p>Soru , fikir , öneri ve istekleriniz için bizimle iletişime geçebilirsiniz .</p>
                            <a href="<?= SITE ?>iletisim" class="boxed-btn2">İletişime Geç</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ sprayed_area end  -->
        <!-- testimonial_area  -->
        <div class="testimonial_area  ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-60 text-center">
                            <p>NECAT SOSYAL YARDIMLAŞMA EĞİTİM KÜLTÜR VE TURİZM DERNEĞİ</p>
                            <h3>
                                Günün Sözü
                                
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">

                            <!---------------------------------------------------------------------->
                            <?php
       
            $userblog=$VT->VeriGetir("userblog","WHERE durum=?",array(1),"ORDER BY ID ASC");
            if($userblog!=false){
            for($i=0;$i<count($userblog);$i++){
                 if(!empty($userblog[$i]["resim"])){$resim=$projeler[$i]["resim"];}else{$resim='varsayilan.png';}
                ?>
                            <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                    <div class="quote">
                                        <img src="img/svg_icon/quote.svg" alt="">
                                    </div>
                                    <p><?=$userblog[$i]["aciklama"]?></p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="<?=$resim?>" alt="">
                                        </div>
                                        <h3><?=$userblog[$i]["adsoyad"]?></h3>
                                        <span><?=$userblog[$i]["unvan"]?></span>
                                    </div>
                                </div>
                            </div>

                            <?php
                   }
                }    
                ?>
                            <!---------------------------------------------------------------------->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /testimonial_area  -->

        