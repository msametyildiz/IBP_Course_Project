<?php
if (!empty($_GET["tablo"]) && !empty($_GET["ID"])) {

  $tablo = $VT->filter($_GET["tablo"]);
  $ID = $VT->filter($_GET["ID"]);
  $kontrol = $VT->VeriGetir("moduller", "WHERE tablo=? ", array($tablo), "ORDER BY ID ASC", 1);
  if ($kontrol != false) {
    $veri = $VT->VeriGetir("userblog", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
    
    if ($veri != false) {
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $veri[0]["adsoyad"] ?> Düzenleme Sayfası</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Blog Düzenleme Sayfası</li>
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
          <a href="<?= SITE ?>userblog-list\userblog" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
        </div>
      </div>
<!----------------------------------------------------------------------------------------------------------------------------------->
<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if($_POST){
  if (!empty($_POST["adsoyad"]) && !empty($_POST["aciklama"])) {
    $adsoyad = $VT->filter($_POST["adsoyad"]);
    $aciklama = $VT->filter($_POST["aciklama"]);
    $tablo = str_replace("-", "", $VT->selflink($aciklama));
    $guncelle = $VT->SorguCalistir("UPDATE userblog", "SET adsoyad=?, aciklama=?, tablo=?, durum=?, tarih=? WHERE ID=?", array($adsoyad, $aciklama, $tablo, 1,date("y-m-d"), $ID));
     if($guncelle!=false){
                  ?>
                    <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                    <meta http-equiv="refresh" content="1.5;url=<?= SITE ?>userblog-edit/<?= $kontrol[0]["tablo"] ?>/<?=$ID?>">
                    
                  <?php
            }
            else{
              $info=false;
                  ?>
                  <div class="alert alert-danger">! İŞLEM SIRASINDA BİR SORUNLA KARŞILAŞILDI. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ !</div>
                  <?php
            }
      }
      else{
            ?>
            <div class="alert alert-danger">! BOŞ BIRAKILAN ALANLARI DOLDURUNUZ !</div>
            <?php
      }
}
?>

<form action="#" method="post" enctype="multipart/form-data">
              <div class="col-md-8">
                <div class="card-body card card-primary">
                  <div class="row">


                    <!-- header in form -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Ad Soyad</label>
                        <input type="text" class="form-control" placeholder="Ad Soyad ..." name="adsoyad" value="<?= stripslashes($veri[0]["adsoyad"]) ?>">
                      </div>
                    </div>
                    <!-- Text area-->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Açıklama</label>
                        <textarea id="summernote" name="aciklama" placeholder="  Text Area  " style="width:100%; height:450px; line-height:18px; font-size:14px; border:1px solid #dddddd; padding:10px;">
                                <?= stripslashes($veri[0]["aciklama"]) ?>
                        </textarea>
                      </div>
                    </div>

                    <!--pictures  -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Resimler</label>
                        <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim" multiple>
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
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
      <meta http-equiv="refresh" content="0;url=<?= SITE ?>userblog-list/<?= $kontrol[0]["tablo"] ?>">
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