<?php
if (!empty($_GET["selflink"])) {
    $selflink = $VT->filter($_GET["selflink"]);
    $veri = $VT->VeriGetir("kurumsal", "WHERE selflink=? AND durum=?", array($selflink, 1), "ORDER BY ID ASC", 1);
    if ($veri != false) {
?>
        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3><?= stripslashes(($veri[0]["baslik"])) ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->

        <!-- about_mission  -->
        <div class="about_mission" style="padding-bottom: 5%;">
            <div class="container">
                <div class="row align-items-center">
                    <?php
                    if (!empty($veri[0]["resim"])) {
                    ?><div class="col-xl-6 col-md-6">
                            <img src="<?= SITE ?>images/kurumsal/<?= $veri[0]["resim"] ?>" style="width:100%; height:auto">
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="about_text">
                                <?= stripslashes($veri[0]["metin"]) ?>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-xl-12 col-md-12">
                            <div class="about_text">
                                <?= stripslashes($veri[0]["metin"]) ?>
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
        if ($veri[0]["selflink"]=="hakkimizda"){
        ?>


            <!-- counter_area  -->
            <div class="counter_area" style="margin-top: 7%;">
                <div class="container">
                    <div class="border_bottom">
                        <div class="row">
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3> <span class="counter">1503</span> </h3>
                                    <p>Bursiyerlerimiz</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3> <span class="counter">328</span></h3>
                                    <p>Ailelerimiz</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 ">
                                <div class="single_counter text-center">
                                    <h3> <span class="counter">2263</span></h3>
                                    <p>Happy Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--/ counter_area  -->

            <!-- team_area  -->
            <div class="team_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title mb-40 text-center">
                                <h3>
                                    Yönetim Kurulu
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $counter = 0;
                        //Burada yapılan şey ıd numarasında göre en son kaydedilen 3 hizmeti listeleme VeriGetir("hizmetler", "WHERE durum=?", array(1), "ORDER BY ID DESC",5) yazsaydık 5 tane listeleyecekti DESC ise sondan başla demek
                        $team = $VT->VeriGetir("team", "WHERE durum=?", array(1), "ORDER BY ID ASC", 4);
                        if ($team != false) {
                            for ($i = 0; $i < count($team); $i++) {
                                if (!empty($team[$i]["resim"])) {
                                    $resim = $team[$i]["resim"];
                                } else {
                                    $resim = 'varsayilan.png';
                                }
                        ?>
                                <div class="col-xl-3 col-lg-3 col-md-6">
                                    <div class="single_team">
                                        <div class="team_thumb">
                                            <img src="<?= SITE ?>images/team/<?= $resim ?>" alt="">
                                            <div class="social_link">
                                                <ul>
                                                    <li><a href="<?= $team[$i]["facebook"] ?>">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="<?= $team[$i]["twitter"] ?>">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="<?= $team[$i]["instagram"] ?>">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="team_info text-center">
                                            <h3><?= stripslashes($team[$i]["adsoyad"]) ?></h3>
                                            <p> <?= stripslashes($team[$i]["unvan"]) ?></p>
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
            <!-- /team_area  -->
        <?php
                            }
                                ?>

<?php
    }
}
?>