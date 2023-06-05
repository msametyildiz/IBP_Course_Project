<?php
if (!empty($_GET["ID"])) {

  $ID = $VT->filter($_GET["ID"]);
  $kontrol = $VT->VeriGetir("kitaplar", "WHERE durum=? AND ID", array(1,$ID), "ORDER BY ID ASC", 1);
  
  if ($kontrol != false) {
?>


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"><?= $kontrol[0]["baslik"] ?> Düzenleme Sayfası</h1>
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
                <a href="<?= SITE ?>kitap-liste/<?= $kontrol[0]["adsoyad"] ?>" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
              </div>
            </div>
            <!----------------------------------------------------------------------------------------------------------------------------------->
            <?php
            if ($_POST) {
              if (!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"]) && !empty($_POST["sirano"])) {
                $kategori = $VT->filter($_POST["kategori"]);
                $baslik = $VT->filter($_POST["baslik"]);
                $anahtar = $VT->filter($_POST["anahtar"]);
                $selflink = $VT->selflink($baslik);
                $description = $VT->filter($_POST["description"]);
                $sirano = $VT->filter($_POST["sirano"]);
                $metin = $VT->filter($_POST["metin"], true); //true yazılmasının sebebi editor kullnıldığı için html komutlarını temizlemesini istemiyorum

                foreach ($_FILES["resim"]["name"] as $key => $value) {
                  if (!empty($_FILES["resim"]["name"])) {
                    $yukle = $VT->upload("resim", "../images/" . $kontrol[0]["adsoyad"] . "/");
                    if ($yukle != false) {
                      $ekle = $VT->SorguCalistir("UPDATE " . $kontrol[0]["adsoyad"], "SET baslik=?, selflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?, durum=?,sirano=?,tarih=? WHERE ID=?", array($baslik, $selflink, $kategori, $metin, $yukle, $anahtar, $description, 1, $sirano, date("Y-m-d"), $veri[0]["ID"]));
                    } else { ?>
                      <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARISIZ !</div>
                <?php
                    }
                  } else {
                    $ekle = $VT->SorguCalistir("UPDATE " . $kontrol[0]["adsoyad"], "SET baslik=?, selflink=?, kategori=?, metin=?, anahtar=?, description=?, durum=?, sirano=?, tarih=? WHERE ID=?", array($baslik, $selflink, $kategori, $metin, $anahtar, $description, 1, $sirano, date("Y-m-d"), $veri[0]["ID"]));
                  }
                }

                ?>

                <?php

                if ($ekle != false) {
                  $veri = $VT->VeriGetir($kontrol[0]["adsoyad"], "WHERE ID=?", array($veri[0]["ID"]), "ORDER BY ID ASC", 1);
                ?>
                  <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                <?php
                } else {
                ?>
                  <div class="alert alert-danger">! İŞLEM SIRASINDA BİR SORUNLA KARŞILAŞILDI. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ !</div>
                <?php
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kategori Seç</label>
                        <select class="form-control select2" style="width: 100%;" name="kategori">

                          <?php
                          $sonuc = $VT->kategoriGetir($kontrol[0]["adsoyad"], $veri[0]["kategori"], -1);
                          if ($sonuc != false) {
                            echo $sonuc;
                          } else {
                            $VT->tekKategori($kontrol[0]["adsoyad"]);
                          }
                          ?>

                        </select>
                      </div>
                      <!-- /.col -->
                    </div>

                    <!-- header in form -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Adı</label>
                        <input type="text" class="form-control" placeholder="Kitap Adı ..." name="baslik" value="<?= stripslashes($veri[0]["baslik"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Kategorisi</label>
                        <input type="text" class="form-control" placeholder="Kitap KAtegorisi ..." name="kategori" value="<?= stripslashes($veri[0]["kategori"]) ?>">
                      </div>
                    </div><div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Fiytı</label>
                        <input type="text" class="form-control" placeholder="Kitap Fiyatı ..." name="fiyat" value="<?= stripslashes($veri[0]["fiyat"]) ?>">
                      </div>
                    </div><div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Yazarı</label>
                        <input type="text" class="form-control" placeholder="Kitap Yazarı ..." name="yazar" value="<?= stripslashes($veri[0]["yazar"]) ?>">
                      </div>
                    </div><div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Adı</label>
                        <input type="text" class="form-control" placeholder="Kitap Adı ..." name="baslik" value="<?= stripslashes($veri[0]["baslik"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Yayınevi</label>
                        <input type="text" class="form-control" placeholder="Kitap Yayınevi ..." name="yayinevi" value="<?= stripslashes($veri[0]["yayinevi"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Sayfası</label>
                        <input type="text" class="form-control" placeholder="Kitap Sayfası ..." name="sayfa" value="<?= stripslashes($veri[0]["sayfa"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Ebatı</label>
                        <input type="text" class="form-control" placeholder="Kitap Ebatı ..." name="ebat" value="<?= stripslashes($veri[0]["ebat"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Baskı Yılı</label>
                        <input type="text" class="form-control" placeholder="Kitap Baskı Yılı ..." name="baskiyili" value="<?= stripslashes($veri[0]["baskiyili"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kitap Dili</label>
                        <input type="text" class="form-control" placeholder="Kitap Dili ..." name="dil" value="<?= stripslashes($veri[0]["dil"]) ?>">
                      </div>
                    </div>
                    <!--pictures  -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Resimler</label>
                        <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim[]" multiple>
                      </div>
                    </div>
                    <!--Serial no  -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Sıra no</label>
                        <input type="number" class="form-control" placeholder="Sıra No ..." name="sirano" style="width:100px;" value="<?= stripslashes($veri[0]["sirano"]) ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
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
      <meta http-equiv="refresh" content="0;url=<?= SITE ?>liste/<?= $kontrol[0]["adsoyad"] ?>">
    <?php
    }
  } 
   else {
  ?>
  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>