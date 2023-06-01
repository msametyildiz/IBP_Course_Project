<?php 
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","yonetimpaneli/class/");
include_once(DATA."baglanti.php");
define("SITE", $siteURL);

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$sitebaslik?></title>
    <meta http-equiv="keywords" content="<?=$siteanahtar?>">
    <meta http-equiv="description" content="<?=$siteaciklama?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE?>img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?=SITE?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=SITE?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=SITE?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?=SITE?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=SITE?>css/themify-icons.css">
    <link rel="stylesheet" href="<?=SITE?>css/nice-select.css">
    <link rel="stylesheet" href="<?=SITE?>css/flaticon.css">
    <link rel="stylesheet" href="<?=SITE?>css/gijgo.css">
    <link rel="stylesheet" href="<?=SITE?>css/animate.css">
    <link rel="stylesheet" href="<?=SITE?>css/slick.css">
    <link rel="stylesheet" href="<?=SITE?>css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?=SITE?>css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <!-- header-start -->
        <?php
        include_once(DATA."ust.php");
        ?>
    <!-- header-start -->

        <?php
        if($_GET && !empty($_GET["sayfa"])){
            $sayfa=$_GET["sayfa"].".php";//ornek.php olacak ornek dediğimiz için 
            
            if(file_exists(SAYFA.$sayfa)){
                include_once(SAYFA.$sayfa); // tODO
              }
            else{
                include_once(SAYFA."home.php");
              }
        }
        else{
          include_once(SAYFA."home.php");
        }
        ?>

    <!-- footer start -->

        <?php
            include_once(DATA."footer.php");
        ?>

    <!-- footer end -->
    

    <!-- link that opens popup -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <!-- JS here -->
    <script src="<?=SITE?>js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?=SITE?>js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?=SITE?>js/popper.min.js"></script>
    <script src="<?=SITE?>js/bootstrap.min.js"></script>
    <script src="<?=SITE?>js/owl.carousel.min.js"></script>
    <script src="<?=SITE?>js/isotope.pkgd.min.js"></script>
    <script src="<?=SITE?>js/ajax-form.js"></script>
    <script src="<?=SITE?>js/waypoints.min.js"></script>
    <script src="<?=SITE?>js/jquery.counterup.min.js"></script>
    <script src="<?=SITE?>js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=SITE?>js/scrollIt.js"></script>
    <script src="<?=SITE?>js/jquery.scrollUp.min.js"></script>
    <script src="<?=SITE?>js/wow.min.js"></script>
    <script src="<?=SITE?>js/nice-select.min.js"></script>
    <script src="<?=SITE?>js/jquery.slicknav.min.js"></script>
    <script src="<?=SITE?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?=SITE?>js/plugins.js"></script>
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="<?=SITE?>js/slick.min.js"></script>



    <!--contact js-->
    <script src="<?=SITE?>js/contact.js"></script>
    <script src="<?=SITE?>js/jquery.ajaxchimp.min.js"></script>
    <script src="<?=SITE?>js/jquery.form.js"></script>
    <script src="<?=SITE?>js/jquery.validate.min.js"></script>
    <script src="<?=SITE?>js/mail-script.js"></script>

    <script src="<?=SITE?>js/main.js"></script>
</body>

</html>