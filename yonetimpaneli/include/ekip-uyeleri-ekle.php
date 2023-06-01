<?php
  $kontrol = $VT->VeriGetir("team", "WHERE durum=?", array(1), "ORDER BY ID ASC", 1);
  if ($kontrol != false) {
?>


    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Ekip Üyesi Ekleme Sayfası</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active">Ekip Üyesi Ekleme Sayfası</li>
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
              <a href="<?= SITE ?>ekip-uyeleri" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
            </div>
          </div>
          <div class="col-md-12"><br></div>
          <!----------------------------------------------------------------------------------------------------------------------------------->
          <?php
          if ($_POST) {
            if (!empty($_POST["adsoyad"]) && !empty($_POST["unvan"]) && !empty($_POST["facebook"]) && !empty($_POST["twitter"]) && !empty($_POST["instagram"])) {
              $adsoyad = $VT->filter($_POST["adsoyad"]);
              $selflink = $VT->selflink($adsoyad);
              $unvan = $VT->filter($_POST["unvan"]);
              $facebook= $VT->filter($_POST["facebook"]);
              $twitter= $VT->filter($_POST["twitter"]);
              $instagram= $VT->filter($_POST["instagram"]);
              if (!empty($_FILES["resim"]["name"])) {
                $yukle = $VT->upload("resim", "../images/team");
                if ($yukle != false) {
                  $ekleuye = $VT->SorguCalistir("INSERT INTO " .'team' , "SET adsoyad=?,selflink=?, unvan=?, facebook=?, twitter=?,instagram=?, resim=?, durum=?,date=?", array($adsoyad,$selflink ,$unvan, $facebook, $twitter,  $instagram,$yukle, 1,date("Y-m-d")));  
                } else {
          ?>
                  <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARISIZ !</div>
                <?php
                }
              }else {
                $ekleuye = $VT->SorguCalistir("INSERT INTO " . 'team', "SET adsoyad=?, selflink=?,unvan=?, facebook=?, twitter=?,instagram=?, durum=?,date=?", array($adsoyad, $selflink,$unvan, $facebook, $twitter,  $instagram, 1,date("Y-m-d")));
              }
              if ($ekleuye != false) {
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
                  <!-- header in form -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Ad Soyad</label>
                      <input type="text" class="form-control" placeholder="Ad Soyad ..." name="adsoyad" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Unvan</label>
                      <input type="text" class="form-control" placeholder="Unvan ..." name="unvan" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Facebook</label>
                      <input type="text" class="form-control" placeholder="Facebook Link..." name="facebook" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Twitter</label>
                      <input type="text" class="form-control" placeholder="Twitter Link ..." name="twitter" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Instagram</label>
                      <input type="text" class="form-control" placeholder="Instagram Link..." name="instagram" required>
                    </div>
                  </div>
                  <!--pictures  -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Resimler</label>
                      <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim" multiple>
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
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
  <?php

  }

?>