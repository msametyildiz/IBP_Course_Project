<?php 

  if(!empty($_GET["tablo"]) && !empty($_GET["ID"])){

    $tablo=$VT->filter($_GET["tablo"]);
    $ID=$VT->filter($_GET["ID"]);
    $kontrol=$VT->VeriGetir("moduller","WHERE tablo=?",array($tablo),"ORDER BY ID ASC",1);

    if($kontrol!=false){
        $veri = $VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
        if ($veri != false) {
            $sil=$VT->SorguCalistir("DELETE FROM ".$tablo,"WHERE ID=?",array($ID),1);
                ?>
                <meta http-equiv="refresh" content="0;url=<?= SITE ?>kitap-liste/<?= $kontrol[0]["tablo"] ?>">
                <?php

            }
        else{
            ?>
                <meta http-equiv="refresh" content="0;url=<?= SITE ?>kitap-liste/<?= $kontrol[0]["tablo"] ?>">
            <?php
        }
    }
        else{
        ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
        }
    }

    else{
        ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
            <?php
    }

  ?>