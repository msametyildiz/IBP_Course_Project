<?php
if (!empty($_GET["ID"])) {
  $ID = $VT->filter($_GET["ID"]);
  $kontrol = $VT->VeriGetir("kullanicilar", "WHERE durum=? AND ID=?", array(1,$ID), "ORDER BY ID ASC", 1);
  
  if ($kontrol != false) {
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Kullanıcı Ayarları</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">Kullanıcı Ayarları</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <!----------------------------------------------------------------------------------------------------------------------------------->
      <?php
      if ($_POST) {
        if (!empty($_POST["adsoyad"]) && !empty($_POST["kullanici"]) && !empty($_POST["sifre"]) && !empty($_POST["telefonno"]) && !empty($_POST["kontrolsifre"]) && !empty($_POST["mail"])) {
          $adsoyad = $VT->filter($_POST["adsoyad"]);
          $kullanici = $VT->filter($_POST["kullanici"]);
          $userpassword = $VT->filter($_POST["sifre"]);
          $telefonno = $VT->filter($_POST["telefonno"]);
          $userconfirmpassword = $VT->filter($_POST["kontrolsifre"]);
          $mail = $VT->filter($_POST["mail"]);
          $user=$_SESSION["adsoyad"];
          if (!empty($_FILES["resim"]["name"])) {
            if ($userpassword == $userconfirmpassword) {
              $picyukle = $VT->upload("resim", "userimages/");
              if ($picyukle != false) {
                $ekleuser = $VT->SorguCalistir("UPDATE kullanicilar " ,"SET adsoyad=?, resim=?, kullanici=?, sifre=?, telefonno=?,
                mail=? WHERE adsoyad=?", array($adsoyad, $resim, $kullanici, MD5("$userpassword"), $telefonno,$mail,$user),1);
                if ($ekleuser != false) {
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
                <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARISIZ !</div>
                <div class="alert alert-danger">! İŞLEM SIRASINDA BİR SORUNLA KARŞILAŞILDI. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ !</div>
              <?php

              }
            } else {
              ?>
              <div class="alert alert-danger">! GİRİLEN ŞİFRELER UYUŞMUYOR. LÜTFEN TEKRAR DENEYİNİZ !</div>
              <?php
            }
          } else {
            if ($userpassword == $userconfirmpassword) {
              $ekleuser = $VT->SorguCalistir("UPDATE kullanicilar " ,"SET adsoyad=?, kullanici=?, sifre=?, telefonno=?,
                mail=? WHERE adsoyad=?", array($adsoyad, $kullanici, MD5("$userpassword"), $telefonno,$mail,$user),1);
              if ($ekleuser != false) {
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
              <div class="alert alert-danger">! GİRİLEN ŞİFRELER UYUŞMUYOR. LÜTFEN TEKRAR DENEYİNİZ !</div>
          <?php
            }
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
            <div class="row" style="margin-left:3%;">

            <?php
              $user=$_SESSION["adsoyad"];
              $kontrol = $VT->VeriGetir("kullanicilar", "WHERE adsoyad=?", array("$user"), "ORDER BY ID ASC", 1);
              if ($kontrol != false) {
                
              ?>
              <!-- user-namelastname -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>Ad Soyad</label>
                  <input type="text" class="form-control" placeholder="Ad Soyad ..." name="adsoyad" value="<?= $kontrol[0]["adsoyad"] ?>">
                </div>
              </div>

              <!--user-name  -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>Kullanıcı Adı</label>
                  <input type="text" class="form-control" placeholder="Kullanıcı Adı ..." name="kullanici" value="<?= $kontrol[0]["kullanici"] ?>">
                </div>
              </div>
              <!--user-password  -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>Sifre</label>
                  <input type="password" class="form-control" placeholder="Şifre ..." name="sifre" value="<?= $kontrol[0]["sifre"] ?>">
                </div>
              </div>
              <!--confirm-password  -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>Sifre Kontrol</label>
                  <input type="password" class="form-control" placeholder="Şifre ..."  name="kontrolsifre" value="<?= $kontrol[0]["sifre"] ?>">
                </div>
              </div>
              <!--user-phonenumber  -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>Telefon No</label>
                  <input type="text" class="form-control" placeholder="Telefon No ..." name="telefonno" value="<?= $kontrol[0]["telefonno"] ?>">
                </div>
              </div>
              <!--user-mail  -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>E-Mail</label>
                  <input type="text" class="form-control" placeholder="E-Mail ..." name="mail" value="<?= $kontrol[0]["mail"] ?>">
                </div>
              </div>
              <!--picture  -->
              <div class="col-md-10">
                <div class="form-group">
                  <label>Kullanıcı Resmi</label>
                  <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                </div>
              </div>
              <!--button  -->
              <div class="col-md-10">
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            
<?php
                } else {
                ?>
                  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
                <?php

                }
              
              ?>

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
      <meta http-equiv="refresh" content="0;url=<?= SITE ?>liste/<?= $kontrol[0]["kullanici"] ?>">
    <?php
    }
  } else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
  <?php

  }

?>