<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Proje Konusu Ekle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Proje Konusu Ekle</li>
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
              <a href="<?= SITE ?>proje-liste/projekonulari" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
            </div>
          </div>
          <div class="col-md-12"><br></div>
    <?php
    if ($_POST) {
        if (!empty($_POST["konu"])) {
            $konu=$VT->filter($_POST["konu"]);
            if (!empty($_POST["durum"])) {$durum = 1;} else {$durum = 2;}
            $tablo = str_replace("-", "", $VT->selflink($konu));
            $kontrol = $VT->VeriGetir("projekonulari", "WHERE konu=?", array($tablo), "ORDER BY ID ASC", 1); // TODO
            if ($kontrol != false) {
                echo '<div class="alert alert-danger">! UYARI !<br>Proje konunuz eklenirken bir sorunla karşılaşıldı.Sorunlar şunlar olabilir.<br>
                                -Boş alan olabilir.<br>
                                -Aynı isimde mevcut bir kayıdınız olabilir.<br>
                                -Sistemsel bir sorun oluşmuş olabilir.</div>';
            } 
            else {
                $ekle = $VT->SorguCalistir("INSERT INTO projekonulari", "SET konu=?, selflink=?, durum=?, tarih=?", array($konu, $tablo, $durum,date("Y-m-d") ));
                $veri = $VT->VeriGetir("projekonulari", "WHERE selflink=?", array($tablo), "ORDER BY ID ASC");
                $sirano=$veri[0]["ID"];
                $guncelle = $VT->SorguCalistir("UPDATE projekonulari", "SET konu=?, selflink=?, durum=?, sirano=?, tarih=? WHERE selflink=?", array($konu, $tablo,$durum,$sirano ,date("y-m-d"), $tablo));
                if ($ekle != false) {
                    echo '<div class="alert alert-success">Proje konunuz basarıyla eklenmiştir.</div>';
                } else {
                    echo '<div class="alert alert-danger">! UYARI !<br>Proje konunuz eklenirken bir sorunla karşılaşıldı.Sorunlar şunlar olabilir.<br>
                                -Aynı isimde mevcut bir kayıdınız olabilir.<br>
                                -Sistemsel bir sorun oluşmuş olabilir.</div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger">İşlem başarısızzz...</div>';
        }
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Proje Konusu Ekleme Sayfası</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="#" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Konu Adı</label>
                                <input name="konu" type="text" class="form-control" placeholder="Proje konusunu yazınız">

                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="durum" value="1" checked="checked">
                                <label class="form-check-label" for="exampleCheck1">Aktif Yap</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div><!-- /.container-fluid -->
      </section>
</div>
