
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">İletişim Ayarları</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
          <li class="breadcrumb-item active">İletişim Ayarları</li>
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
if($_POST){
  if(!empty($_POST["telefon"]) && !empty($_POST["mail"]) && !empty($_POST["adres"]) && !empty($_POST["fax"]) && !empty($_POST["facebook"]) && !empty($_POST["twitter"]) && !empty($_POST["instagram"]) && !empty($_POST["telegram"])){
        $telefon=$VT->filter($_POST["telefon"]);
        $mail=$VT->filter($_POST["mail"]);
        $adres=$VT->filter($_POST["adres"]);
        $fax=$VT->filter($_POST["fax"]);
        $facebook=$VT->filter($_POST["facebook"]);
        $twitter=$VT->filter($_POST["twitter"]);
        $instagram=$VT->filter($_POST["instagram"]);
        $telegram=$VT->filter($_POST["telegram"]);
        $guncelle=$VT->SorguCalistir("UPDATE ayarlar","SET telefon=?, mail=?, adres=?, fax=? , facebook=?, twitter=?, telegram=? , instagram=? WHERE ID=?",array($telefon,$mail,$adres,$fax,$facebook,$twitter,$telegram,$instagram,1),1);
        if($guncelle!=false){
              ?>
                <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                <meta http-equiv="refresh" content="0;url=<?=SITE?>iletisim-ayarlari"/>
              <?php
        }
        else{
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
                  <label>Telefon</label>
                  <input type="text" class="form-control" placeholder="Telefon ..." name="telefon" value="<?=$sitetelefon?>">
                </div>
            </div>
            
             <!--mail  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Mail</label>
                  <input type="text" class="form-control" placeholder="Mail ..." name="mail" value="<?=$sitemail?>">
                </div>
            </div>
            <!--adres  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Adres</label>
                  <input type="text" class="form-control" placeholder="Adres ..." name="adres" value="<?=$siteadres?>">
                </div>
            </div>
            <!--description  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Fax</label>
                  <input type="text" class="form-control" placeholder="Fax ..." name="fax" value="<?=$sitefax?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" class="form-control" placeholder="Facebook Link ..." name="facebook" value="<?=$sitefacebook?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" class="form-control" placeholder="Twitter Link ..." name="twitter" value="<?=$sitetwitter?>">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" class="form-control" placeholder="Instagram Link ..." name="instagram" value="<?=$siteinstagram?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Telegram</label>
                  <input type="text" class="form-control" placeholder="Telegram Link ..." name="telegram" value="<?=$sitetelegram?>">
                </div>
            </div>
            <!--button  -->
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Güncelle</button>
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
