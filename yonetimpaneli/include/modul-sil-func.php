<?php
if (!empty($_GET["tablo"]) && !empty($_GET["ID"])) {

$tablo = $VT->filter($_GET["tablo"]);
$ID = $VT->filter($_GET["ID"]);
$kontrol = $VT->VeriGetir("moduller", "WHERE tablo=? AND ID=?", array($tablo, $ID), "ORDER BY ID ASC", 1);
$kontrol2 = $VT->VeriGetir("kategoriler", "WHERE selflink=? AND ID=?", array($tablo, $ID), "ORDER BY ID ASC", 1);

if ($kontrol != false && $kontrol2 != false ) {
    $sil = $VT->SorguCalistir("DELETE FROM  moduller", "WHERE ID=?", array($ID), 1);
    $sil2 = $VT->SorguCalistir("DELETE FROM  kategoriler", "WHERE ID=?", array($ID), 1);
    if ($sil != false && $sil2 != false) {
        ?>
                <meta http-equiv="refresh" content="0;url=<?= SITE ?>modul-sil">
                <?php
    }  else{
        if($sil == false){
            echo '<div class="alert alert-danger">Modul Silinemedi...</div>';
            ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
        }else{
            echo '<div class="alert alert-danger">Kategori Silinemedi...</div>';
            ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
        }
        }
        
        ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
        }

    

}  else{
    ?>
    <meta http-equiv="refresh" content="0;url=<?=SITE?>">
    <?php
}


?>
