<?php
if (!empty($_GET["tablo"]) && !empty($_GET["ID"])) {

    $tablo = $VT->filter($_GET["tablo"]);
    $ID = $VT->filter($_GET["ID"]);
    $kontrol = $VT->VeriGetir("moduller", "WHERE tablo=? AND durum=?", array($tablo, 9), "ORDER BY ID ASC", 1);

    if ($kontrol != false) {
        $veri = $VT->VeriGetir("iletisimcevap", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
        if ($veri != false) {
?>


            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"><?= $veri[0]["adsoyad"] ?></h1>
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
                                <a href="<?= SITE ?>giden_mesaj/<?= $kontrol[0]["tablo"] ?>" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
                            </div>
                        </div>
                        
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="col-md-8">
                                <div class="card-body card card-primary">
                                    <div class="row">
                                        <!-- header in form -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gönderilen Kişi Adı</label>
                                                <input type="text" class="form-control" placeholder="Gönderilen Kişi Adı ..." name="adsoyad" value="<?= stripslashes($veri[0]["adsoyad"]) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gönderilen Mesaj</label>
                                                <textarea class="form-control" placeholder="Gönderilen Mesaj" name="mesaj"><?= stripslashes($veri[0]["mesaj"]) ?></textarea>
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
            <meta http-equiv="refresh" content="0;url=<?= SITE ?>giden_mesaj/<?= $kontrol[0]["tablo"] ?>">
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
