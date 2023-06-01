<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kullanıcı Yazıları Ekle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Kullanıcı Yazıları Ekle</li>
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
                    <a href="<?= SITE ?>userblog-list/<?= $moduller[0]["tablo"] ?>" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
                </div>
            </div>
            <div class="col-md-12"><br></div>
            <?php
            if ($_POST) {
                if (!empty($_POST["adsoyad"])&&!empty($_POST["aciklama"])&&!empty($_POST["unvan"])) {
                    $adsoyad = $VT->filter($_POST["adsoyad"]);
                    $aciklama = $VT->filter($_POST["aciklama"]);
                    $unvan = $VT->filter($_POST["unvan"]);
                    $tablo = str_replace("-", "", $VT->selflink($aciklama));
                    
                    $kontrol = $VT->VeriGetir("userblog", "WHERE tablo=?", array($tablo), "ORDER BY ID ASC", 1); // TODO
                    if ($kontrol != false) {
                        echo '<div class="alert alert-danger">! UYARI !<br>Proje konunuz eklenirken bir sorunla karşılaşıldı.Sorunlar şunlar olabilir.<br>
                                -Aynı yazıya sahip mevcut bir kayıdınız olabilir.<br>
                                -Sistemsel bir sorun oluşmuş olabilir.</div>';
                    } else {


                        if (!empty($_FILES["resim"]["name"])) {
                            $yukle = $VT->upload("resim", "../images/" .  "userblog" . "/");
                            if ($yukle != false) {
                            $ekle= $VT->SorguCalistir("INSERT INTO userblog", "SET adsoyad=?,tablo=?, unvan=? ,resim=?, aciklama=?, durum=?, tarih=?", array($adsoyad, $tablo,$unvan,$yukle, $aciklama,1,date("y-m-d")));
                            ?>
                              <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARILI !</div>
                            <?php
                            } else {
                      ?>
                              <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARISIZ !</div>
                            <?php
                            }
                          } else {
                            $ekle= $VT->SorguCalistir("INSERT INTO userblog", "SET adsoyad=?,tablo=?, unvan=?, aciklama=?, durum=?, tarih=?", array($adsoyad, $tablo,$unvan, $aciklama,1,date("y-m-d")));
                            
                        }
                          if ($ekle != false) {
                            ?>
                            <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                          <?php
                          } else {
                          ?>
                            <div class="alert alert-danger">! İŞLEM SIRASINDA BİR SORUNLA KARŞILAŞILDI. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ !</div>
                          <?php
                          }
                    }
                } else {
                    echo '<div class="alert alert-danger">İşlem başarısız. Lütfen boş bırakılan yereleri doldurun.</div>';
                }
            }
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="#" method="post">
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
                                            <!-- user-namelastname -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Unvan</label>
                                                    <input type="text" class="form-control" placeholder="Unvan ..." name="unvan">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Açıklama</label>
                                                    <input type="text" class="form-control" placeholder="Açıklama ..." name="aciklama">
                                                </div>
                                            </div>
                                            <!-- Text area
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea id="summernote" name="aciklama" placeholder="Metin Alanı..."></textarea>
                                </div>
                            </div>-->
                                            <!--pictures  -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Resimler</label>
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

                                    </div>
                                    <!-- /.card -->
                                </div>
                            </form>
                       
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div><!-- /.container-fluid -->
    </section>
</div>  