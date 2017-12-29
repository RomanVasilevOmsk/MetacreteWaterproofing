<?php

require_once 'cpc.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Metacrete - смеси для гидроизоляции</title>
    <link rel="stylesheet" href="css/app.css">
    @@include('partial/common/head.html')
</head>
<body>
<!--<div id="preloader">-->
<!--    <div id="loader"></div>-->
<!--</div>-->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKKGPR8"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="l-page">
        <div class="l-page__inner">
            @@include('./partial/common/header.html')
        </div>

        <div class="l-page__inner">
            <!--@@include('./partial/video.html')-->
            @@include('./partial/main-screen.html')
        </div>
    <div class="l-page__container">
        @@include('./partial/info-block.html')
    </div>
        <div class="l-page__container">
            <!--<div class="l-page__application">-->
                @@include('./partial/application.html')
            <!--</div>-->
        </div>

<!---->
<!--        <div class="l-page__container">-->
<!--            @@include('./partial/employment.html')-->
<!--        </div>-->
        <div class="l-page__container">
             @@include('./partial/saving.html')
        </div>

        <!--<div class="l-page__container">-->
            <!--@@include('./partial/designation-ico.html')-->
        <!--</div>-->

         <!--<div class="l-page__container">-->
            <!--@@include('./partial/catalog-title.html')-->
        <!--</div>-->

        <!--<div class="l-page__container">-->
            <!--@@include('./partial/catalog.html')-->
        <!--</div>-->
        <!--<div class="l-page__container">-->
            <!--@@include('./partial/table-block.html')-->
        <!--</div>-->
        <!--<div class="l-page__container">-->
            <!--@@include('./partial/girl-block.html')-->
        <!--</div>-->
        <div class="l-page__container">
            @@include('./partial/key-objects.html')
        </div>
        <div class="l-page__container">
            @@include('./partial/certificates.html')
        </div>

        <div class="l-page__container">
            @@include('./partial/clients.html')
        </div>

        <div class="l-page__container">
            @@include('./partial/map.html')
        </div>

        <div class="l-page__footer">
            @@include('./partial/common/footer.html')
        </div>
</div>
@@include('partial/common/modal.html')


<!-- Google Tag Manager -->

<!-- EndGoogleTagManager -->
<link rel="stylesheet" href="css/vendor.css">
<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-beta.2/lazyload.js"></script>-->
<!--<script src="js/map/jquery.maphilight.min.js"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPbn32_WlBQp_zLSXAcotipuI8xFcenEQ" ></script>
<script  src="js/vendor.min.js"></script>
<!--<script src="js/lightgallery/lightgallery.min.js"></script>-->
<!--<script src="js/lightgallery/lg-thumbnail.min.js"></script>-->
<!--<script src="js/lightgallery/lg-fullscreen.min.js"></script>-->
<!--<script src="js/vendor/slick.min.js"></script>-->
<script src="js/app.js"></script>
<script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TKKGPR8');
</script>

</body>
</html>
