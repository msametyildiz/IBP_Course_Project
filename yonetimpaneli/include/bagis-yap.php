<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0 text-dark">Bağış Yap</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>

            <li class="breadcrumb-item active">Bağış Yap</li>

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

      ini_set('display_errors', '1');

      ini_set('display_startup_errors', '1');

      error_reporting(E_ALL);

      if ($_POST) {

        if (
          !empty($_POST["bankaadi"]) && !empty($_POST["hesapadi"]) && !empty($_POST["swiftkodu"]) && !empty($_POST["tlhesap"]) && !empty($_POST["tliban"])
          && !empty($_POST["usdhesap"]) && !empty($_POST["usdiban"]) && !empty($_POST["eurhesap"]) && !empty($_POST["euriban"]) && !empty($_POST["sterlinhesap"])
          && !empty($_POST["sterliniban"])
        ) {

          $bankaadi = $VT->filter($_POST["bankaadi"]);
          $hesapadi = $VT->filter($_POST["hesapadi"]);
          $swiftkodu = $VT->filter($_POST["swiftkodu"]);
          $tlhesap = $VT->filter($_POST["tlhesap"]);
          $tliban = $VT->filter($_POST["tliban"]);
          $usdhesap = $VT->filter($_POST["usdhesap"]);
          $usdiban = $VT->filter($_POST["usdiban"]);
          $eurhesap = $VT->filter($_POST["eurhesap"]);
          $euriban = $VT->filter($_POST["euriban"]);
          $sterlinhesap = $VT->filter($_POST["sterlinhesap"]);
          $sterliniban = $VT->filter($_POST["sterliniban"]);

          $guncelle = $VT->SorguCalistir(
            "UPDATE bagisyap",
            "SET bankaadi=?, hesapadi=?, swiftkodu=? ,tlhesap=?,
          tliban=?,usdhesap=?,usdiban=?,eurhesap=?,euriban=?,sterlinhesap=?,sterliniban=?",
            array($bankaadi, $hesapadi, $swiftkodu, $tlhesap, $tliban, $usdhesap, $usdiban, $eurhesap, $euriban, $sterlinhesap, $sterliniban),
            1
          );

          if ($guncelle != false) {

      ?>

            <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>

            <meta http-equiv="refresh" content="0;url=<?= SITE ?>bagis-yap" />

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


              <?php
              $kontrol = $VT->VeriGetir("bagisyap", "WHERE ID=?", array("1"), "ORDER BY ID ASC", 1);
              if ($kontrol != false) {
                
              ?>


                  <!-- header in form -->

                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Banka Adı</label>

                      <input type="text" class="form-control" placeholder="Banka Adı ..." name="bankaadi" value="<?= $kontrol[0]["bankaadi"] ?>">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Hesap Adı</label>

                      <input type="text" class="form-control" placeholder="Hesap Adı ..." name="hesapadi" value="<?= $kontrol[0]["hesapadi"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>Swift Kodu</label>

                      <input type="text" class="form-control" placeholder="Swift Kodu ..." name="swiftkodu" value="<?= $kontrol[0]["swiftkodu"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>TL Hesap</label>

                      <input type="text" class="form-control" placeholder="TL Hesap ..." name="tlhesap" value="<?= $kontrol[0]["tlhesap"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>TL Iban</label>

                      <input type="text" class="form-control" placeholder="TL Iban ..." name="tliban" value="<?= $kontrol[0]["tliban"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>USD Hesap</label>

                      <input type="text" class="form-control" placeholder="USD Iesap ..." name="usdhesap" value="<?= $kontrol[0]["usdhesap"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>USD Iban</label>

                      <input type="text" class="form-control" placeholder="USD Iban ..." name="usdiban" value="<?= $kontrol[0]["usdiban"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>EUR Hesap</label>

                      <input type="text" class="form-control" placeholder="EUR Hesap ..." name="eurhesap" value="<?= $kontrol[0]["eurhesap"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>EUR Iban</label>

                      <input type="text" class="form-control" placeholder="EUR Iban ..." name="euriban" value="<?= $kontrol[0]["euriban"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>GBP Sterlin Hesap </label>

                      <input type="text" class="form-control" placeholder="GBP Sterlin Hesap ..." name="sterlinhesap" value="<?= $kontrol[0]["sterlinhesap"] ?>">

                    </div>

                  </div>
                  <div class="col-md-12">

                    <div class="form-group">

                      <label>GBP Sterlin Iban</label>

                      <input type="text" class="form-control" placeholder="GBP Sterlin Iban ..." name="sterliniban" value="<?= $kontrol[0]["sterliniban"] ?>">

                    </div>

                  </div>


                  <!--button  -->

                  <div class="col-md-12">

                    <div class="form-group">

                      <button type="submit" class="btn btn-block btn-primary">Güncelle</button>

                    </div>

                  </div>

                <?php
                } else {
                ?>
                  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
                <?php

                }
              
              ?>

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