  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=SITE?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php 

       
  $sonuc = $VT->VeriGetir("iletisim", "", array(), "ORDER BY ID DESC", 1);
          ?><?=$sonuc[0]["ID"]?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">





        <?php
            $ilet = $VT->VeriGetir("iletisim", "", array(), "ORDER BY ID DESC",3);
            if ($ilet != false) {
                for ($i = 0; $i < count($ilet); $i++) {
            ?>
          <a href="<?= SITE ?>iletisim.cevapla/iletisim/<?= $ilet[$i]["ID"] ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media"  >
              <img src="dist/img/userspic.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title"><?= $ilet[$i]["adsoyad"] ?><span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo '<br/>' . mb_substr(strip_tags(stripslashes($ilet[$i]["mesaj"])), 0, 30, "UTF-8") . "...";/*strip_tags -> html taglarını temizliyor*/ ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php
                                                        $simdikiZaman = new DateTime();

                                                        // Veritabanından tarihi alın (veritabanında bir değişken olan $dbZaman ile temsil edildiğini varsayalım)
                                                        $dbZaman = new DateTime($ilet[$i]["tarih"]); // $dbZaman değişkenini, gerçek veritabanı tarihi ile değiştirin

                                                        // Şu anki tarih/saat ile veritabanı tarihi/saat arasındaki farkı hesaplayın
                                                        $fark = $dbZaman->diff($simdikiZaman);

                                                        // Farktan saat sayısını alın
                                                        $saatler = $fark->h;
                                                        ?>
                        <?php $saatler ?></p></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <?php
                }
            }
            ?>
          

          
          <a href="<?= SITE ?>iletisim.y/iletisim" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->