<?php
if (!empty($_GET["selflink"])) {
    $selflink = $VT->filter($_GET["selflink"]);
    $veri = $VT->VeriGetir("kitaplar", "WHERE selflink=? AND durum=?", array($selflink, 1), "ORDER BY ID ASC", 1);
    if ($veri != false) {
?>
<link rel="stylesheet" href="<?=SITE?>css/styles.css">


        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3><?= stripslashes($veri[0]["baslik"]) ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->

        <!-- about_mission  -->
        <div class="about_mission">
            <div class="container" style="padding-bottom:7%;">
                <div class="row align-items-center">
                    <?php
                    if (!empty($veri[0]["resim"])) {
                    ?>
                        <div class="col-xl-4 col-md-4" style="padding-top: 0px; ">
                            <img src="<?= SITE ?>images/kitaplar/<?= $veri[0]["resim"] ?>" style="width: 80%;height: 80%;">
                        </div>
                        <div class="col-xl-8 col-md-8" style="border-style: ridge;  padding-bottom:4%; padding-top:3%;">
                            <div class="col col-12 infoKitap"><?php echo $veri[0]["baslik"]; ?></div>
                            <div class="col cilt col-12" >
                                <div class="fl col-6">
                                    <span>FİYAT: <?php echo $veri[0]["fiyat"]; ?> TL</span>
                                </div>
                                <div class="fl col-6">
                                    
                                </div>
                                <div class="fl col-6">
                                    <span>Yazar: <?php echo $veri[0]["yazar"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Türü: <?php echo $veri[0]["turu"]; ?></span>
                                </div>

                                <div class="fl col-6">
                                    <span>Sayfa Sayısı: <?php echo $veri[0]["sayfasayisi"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Yayınevi: <?php echo $veri[0]["yayinevi"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Boyut: <?php echo $veri[0]["ebat"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Stok Sayısı: <?php echo $veri[0]["stok"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Dil: <?php echo $veri[0]["dil"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Basım Tarihi: <?php echo $veri[0]["baskiyili"]; ?></span>
                                </div>
                            </div>
                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="col col-6 col-sm-12 centerBlock">
                            <div class="col col-12 infoKitap"><?php echo $veri[0]["baslik"]; ?></div>
                            <div class="col cilt col-12" style="border-style: ridge;">
                            <div class="fl col-6">
                                    <span>FİYAT: <?php echo $veri[0]["fiyat"]; ?> TL</span>
                                </div>
                                <div class="fl col-6">
                                    
                                </div>
                                <div class="fl col-6">
                                    <span>Yazar: <?php echo $veri[0]["yazar"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Türü: <?php echo $veri[0]["turu"]; ?></span>
                                </div>

                                <div class="fl col-6">
                                    <span>Sayfa Sayısı: <?php echo $veri[0]["sayfasayisi"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Yayınevi: <?php echo $veri[0]["yayinevi"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Boyut: <?php echo $veri[0]["ebat"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Stok Sayısı: <?php echo $veri[0]["stok"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Dil: <?php echo $veri[0]["dil"]; ?></span>
                                </div>
                                <div class="fl col-6">
                                    <span>Basım Tarihi: <?php echo $veri[0]["baskiyili"]; ?></span>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
        <!--/ about_mission -->

<?php
    }
}
?>