<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Kullanıcı Ekle</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">Kullanıcı Ekle</li>
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
          <a href="<?= SITE ?>kullanici-liste" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
        </div>
      </div>
      <!----------------------------------------------------------------------------------------------------------------------------------->
      <?php
      if ($_POST) {
        if (!empty($_POST["adsoyad"]) && !empty($_POST["kullanici"]) && !empty($_POST["sifre"]) && !empty($_POST["telefonno"]) && !empty($_POST["kontrolsifre"]) && !empty($_POST["mail"])) {
          $usernamelastname = $VT->filter($_POST["adsoyad"]);
          $username = $VT->filter($_POST["kullanici"]);
          $userpassword = $VT->filter($_POST["sifre"]);
          $telefonno = $VT->filter($_POST["telefonno"]);
          $userconfirmpassword = $VT->filter($_POST["kontrolsifre"]);
          $usermail = $VT->filter($_POST["mail"]);
          if (!empty($_FILES["resim"]["name"])) {
            if ($userpassword == $userconfirmpassword) {
              $picyukle = $VT->upload("resim", "userimages/");
              if ($picyukle != false) {
                $ekleuser = $VT->SorguCalistir("INSERT INTO kullanicilar" ,"SET adsoyad=?, resim=?, kullanici=?, sifre=?, telefonno=?, mail=?, durum=?, tarih=?",array($usernamelastname, $picyukle, $username, md5($userpassword), $telefonno, $usermail, 1, date("y-m-d")));



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
              $ekleuser = $VT->SorguCalistir("INSERT INTO kullanicilar (`adsoyad`, `kullanici`, `sifre`, `telefonno`,`mail`,`durum`) 
              VALUES ('$usernamelastname','$username',MD5('$userpassword'),'$telefonno','$usermail',1)");
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
              <!-- user-namelastname -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Ad Soyad</label>
                  <input type="text" class="form-control" placeholder="Ad Soyad ..." name="adsoyad">
                </div>
              </div>

              <!--user-name  -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kullanıcı Adı</label>
                  <input type="text" class="form-control" placeholder="Kullanıcı Adı ..." name="kullanici">
                </div>
              </div>
              <!--user-password  -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Sifre</label>
                  <input type="password" class="form-control" placeholder="Şifre ..." name="sifre">
                </div>
              </div>
              <!--confirm-password  -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Sifre Kontrol</label>
                  <input type="password" class="form-control" placeholder="Şifre ..." name="kontrolsifre">
                </div>
              </div>
              <!--user-phonenumber  -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Telefon No</label>
                  <input type="text" class="form-control" placeholder="Telefon No ..." name="telefonno">
                </div>
              </div>
              <!--user-mail  -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>E-Mail</label>
                  <input type="text" class="form-control" placeholder="E-Mail ..." name="mail">
                </div>
              </div>
              <!--picture  -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kullanıcı Resmi</label>
                  <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                </div>
              </div>
              <!--button  -->
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