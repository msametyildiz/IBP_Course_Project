
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
       <div class="container">
           <div class="row">
               <div class="col-xl-12">
                   <div class="bradcam_text text-center">
                       <h3>Güncel İhtiyaçlar</h3>
                       
                       <div class="search_form">
                            <form action="#" method="post">
                                <div class="row align-items-center" style="padding-top:10%;">
                                    <div class="col-xl-5 col-md-4" style="margin-left:25%;">
                                        <div class="input_field">
                                            <input type="text" class="form-control" name="kelime" placeholder="What are you finding?" required="required">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4" >
                                        <div class="button_search" style="text-align: left;">
                                            <button class="boxed-btn2" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
   <!--/ bradcam_area  -->
   
<!-- about_mission  -->
<div class="explorer_europe">
    <div class="container" style="padding-top:7%;padding-bottom:7%">
   <div class="row align-items-center">
       <?php
       if($_POST){
            if(!empty($_POST["kelime"])){
                $kelime=$VT->filter($_POST["kelime"]);
                $bloglar=$VT->VeriGetir("bloglar","WHERE durum=? AND (baslik LIKE ? OR metin LIKE ?)",array(1,'%'.$kelime.'%','%'.$kelime .'%'),"ORDER BY sirano ASC");
            }
            else{
                $bloglar=$VT->VeriGetir("bloglar","WHERE durum=?",array(1),"ORDER BY sirano ASC");
            }
       }
       else{
            $bloglar=$VT->VeriGetir("bloglar","WHERE durum=?",array(1),"ORDER BY sirano ASC");
       }
       
       if($bloglar!=false){
        for($i=0;$i<count($bloglar);$i++){
            if(!empty($bloglar[$i]["resim"])){$resim=$bloglar[$i]["resim"];}else{$resim='varsayilan.png';}
            ?>
            
            <div class="col-xl-4 col-lg-4 col-md-6" style="max-width:380px; max-height:392px;" onclick="location.href='<?=SITE?>blog-detay/<?=$bloglar[$i]['selflink']?>';">
                <div class="single_explorer" >
                    <div class="thumb">
                        <img src="<?=SITE?>images/bloglar/<?=$resim?>" alt="<?=stripslashes($bloglar[$i]["baslik"])?>" style="max-height:200px; max-width:350px">
                    </div>
                    <div class="explorer_bottom d-flex">
                        <div class="icon">
                            <i class="flaticon-beach"></i>
                        </div>
                        <div class="explorer_info">
                            <h3><a href="<?=SITE?>blog-detay/<?=$bloglar[$i]["selflink"]?>"><?=stripslashes($bloglar[$i]["baslik"])?></a></h3>
                            <p><?=mb_substr(strip_tags(stripslashes($bloglar[$i]["metin"])),0,120,"UTF-8")?>...</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
       }
       ?>

        </div>
    </div>
</div>
<!--/ about_mission -->
 