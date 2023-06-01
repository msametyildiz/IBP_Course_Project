
<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Modül Sil</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>

              <li class="breadcrumb-item active">Modül Sil</li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">

      <div class="card">

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                      <th style="width:50px;">Sıra</th>
                      <th>Modül Adı</th>
                      <th style="width:120px;">Tarih</th>
                      <th style="width:120px;">İşlem</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
                  if($moduller!=false){
                    $sira=0;
                    for($i=0;$i<count($moduller);$i++){
                        $sira++;
                      ?>
                      <tr>
                        <td><?=$sira?></td>
                        <td>
                            <?php
                            echo stripslashes($moduller[$i]["baslik"]); //stripslashes -->html taglarını temizlemiyor
                            ?>
                        </td>
                        <td><?=$moduller[$i]["tarih"]?></td>
                        <td><a href="<?=SITE?>modul-sil-func/<?=$moduller[$i]["tablo"]?>/<?=$moduller[$i]["ID"]?>" class="btn btn-danger btn-sm">Kaldır</a></td>
                      </tr>
                      <?php
                    }
                  }
               ?> 

                  </tbody>

                  <tfoot>
                  <tr>
                      <th>Sıra</th>
                      <th>Modül Adı</th>
                      <th>Tarih</th>
                      <th>İşlem</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

 
