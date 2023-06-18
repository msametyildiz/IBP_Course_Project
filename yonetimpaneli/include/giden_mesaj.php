<?php

if (!empty($_GET["tablo"])) {

  $tablo = $VT->filter($_GET["tablo"]);
  
  $kontrol = $VT->VeriGetir("moduller", "WHERE tablo=? ", array($tablo), "ORDER BY ID ASC", 1);

  if ($kontrol != false) {

?>





    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <div class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1 class="m-0">Gönderilen Mesajlar</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>

                <li class="breadcrumb-item active">Gönderilen Mesajlar</li>

              </ol>

            </div><!-- /.col -->

          </div><!-- /.row -->

        </div><!-- /.container-fluid -->

      </div>

      <!-- /.content-header -->



      <!-- Main content -->

      <section class="content">

        <div class="container-fluid">

          <div class="row">

            
            <div class="col-md-12"><br></div>

          </div>

          <div class="card">

            <!-- /.card-header -->

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                  <tr>

                    <th style="width:50px;">Sıra</th>

                    <th style="width:20%;">Ad Soyad</th>
                    <th >Mesaj</th>

                    <th style="width:90px;">Tarih</th>

                    <th style="width:100px;">İşlem</th>

                  </tr>

                </thead>

                <tbody>

                  <!-----------------------------------------------------------PHP--------------------------------------------------------------------------->

                  <?php

                  $veriler = $VT->VeriGetir("iletisimcevap", "", "", "ORDER BY ID DESC");

                  if ($veriler != false) {

                    $sira = 0;

                    for ($i = 0; $i < count($veriler); $i++) {

                      $sira++;

                      if ($veriler[$i]["durum"] == 1) {
                        $aktifpasif = 'checked="checked"';
                      } else {
                        $aktifpasif = '';
                      }

                  ?>

                      <tr>

                        <td><?= $sira ?></td>

                        <td><?php

                            echo stripslashes($veriler[$i]["adsoyad"]); //stripslashes -->html taglarını temizlemiyor
                         ?>
                            </td>
                            <td><?php
echo '<br/>' . mb_substr(strip_tags(stripslashes($veriler[$i]["mesaj"])), 0, 130, "UTF-8") . "...";/*strip_tags -> html taglarını temizliyor*/ 
?></td>
                        

                        <td><?= $veriler[$i]["tarih"] ?></td>

                        <td>

                          <a href="<?= SITE ?>mesaj_detay/<?= $kontrol[0]["tablo"] ?>/<?= $veriler[$i]["ID"] ?>" class="btn btn-warning btn-sm">Detay</a>

                          
                        </td>

                      </tr>

                  <?php

                    }
                  }



                  ?>

                  <!-----------------------------------------------------------/PHP--------------------------------------------------------------------------->



                </tbody>

                

              </table>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->





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
} else {

  ?>

  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">

<?php

}

?>