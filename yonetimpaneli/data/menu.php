 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?= SITE ?>" class="brand-link">
     <img src="<?= SITE ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">LOGO</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image" style="padding:12px 0px 0px 0px">
         <a href="<?= SITE ?>kullanici-ayarlari">
           <img src="<?= SITE ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </a>
       </div>
       <div class="info" style="padding-top:12px">
         <a href="<?= SITE ?>kullanici-ayarlari" class="d-block"><?= $_SESSION["adsoyad"] ?></a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->




         <li class="nav-item ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Sayfalar
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <?php
              $moduller = $VT->VeriGetir("moduller", "WHERE durum=?", array(1), "ORDER BY ID ASC");
              if ($moduller != false) {
                for ($i = 0; $i < count($moduller); $i++) {
              ?>
                 <li class="nav-item">
                   <a href="<?= SITE ?>liste/<?= $moduller[$i]["tablo"] ?>" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p><?= $moduller[$i]["baslik"] ?></p>
                   </a>
                 </li>
             <?php
                }
              }
              ?>
           </ul>
         </li>
         <li class="nav-item ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Kitaplar
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <?php
              $moduller = $VT->VeriGetir("moduller", "WHERE tablo=?", array("kitapkonulari"), "ORDER BY ID ASC");
              if ($moduller != false) {
              ?>
               <li class="nav-item">
                 <a href="<?= SITE ?>kitap-liste/<?= $moduller[0]["tablo"] ?>" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p><?= $moduller[0]["baslik"] ?></p>
                 </a>
               </li>
             <?php
              }
              ?>
           </ul>
           <ul class="nav nav-treeview">
             <?php
              $moduller = $VT->VeriGetir("moduller", "WHERE tablo=?", array("kitaplar"), "ORDER BY ID ASC");
              if ($moduller != false) {
              ?>
               <li class="nav-item">
                 <a href="<?= SITE ?>kitaplar-liste/<?= $moduller[0]["tablo"] ?>" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p><?= $moduller[0]["baslik"] ?></p>
                 </a>
               </li>
             <?php
              }
              ?>
           </ul>
         </li>


         <li class="nav-item">
           <?php
            $moduller = $VT->VeriGetir("moduller", "WHERE tablo=?", array("userblog"), "ORDER BY ID ASC");
            if ($moduller != false) {
            ?>
             <a href="<?= SITE ?>userblog-list/<?= $moduller[0]["tablo"] ?>" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>Kitaptan Bir Söz<span class="right badge badge-danger"></span></p>
             </a>
           <?php
            }
            ?>
         </li>
         

         <li class="nav-item">
           <?php
            $moduller = $VT->VeriGetir("moduller", "WHERE tablo=?", array("iletisim"), "ORDER BY ID ASC");
            if ($moduller != false) {
            ?>
             <a href="<?= SITE ?>iletisim.y/<?= $moduller[0]["tablo"] ?>" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>Mesajlar<span class="right badge badge-danger"></span></p>
             </a>
           <?php
            }
            ?>
         </li>
         
         <li class="nav-item">
           <?php
            $moduller = $VT->VeriGetir("moduller", "WHERE tablo=?", array("iletisimcevap"), "ORDER BY ID ASC");
            if ($moduller != false) {
            ?>
             <a href="<?= SITE ?>giden_mesaj/<?= $moduller[0]["tablo"] ?>" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>Giden Mesajlar<span class="right badge badge-danger"></span></p>
             </a>
           <?php
            }
            ?>
         </li>
         <li class="nav-item">
           <a href="<?= SITE ?>seo-ayarlari" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Seo Ayarları
               <span class="right badge badge-danger"></span>
             </p>
           </a>
         </li>
         
         <li class="nav-item">
           <a href="<?= SITE ?>iletisim-ayarlari" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Iletişim Ayarları
               <span class="right badge badge-danger"></span>
             </p>
           </a>
         </li>

        


         <li class="nav-item">
           <?php
            $moduller = $VT->VeriGetir("moduller", "WHERE tablo=?", array("kullanicilar"), "ORDER BY ID ASC");
            if ($moduller != false) {
            ?>
             <a href="<?= SITE ?>kullanici-liste/<?= $moduller[0]["tablo"] ?>" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>Kullanıcılar<span class="right badge badge-danger"></span></p>
             </a>
           <?php
            }
            ?>
         </li>

         <li class="nav-item">
           <a href="<?= SITE ?>ekip-uyeleri" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Ekip Üyeleri
               <span class="right badge badge-danger"></span>
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= SITE ?>cikis" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Çıkış Yap
               <span class="right badge badge-danger"></span>
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>