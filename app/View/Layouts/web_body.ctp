<?php
$cakeDescription = __d('cake_dev', 'The salesianito');
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?> -
            <?php echo $title_for_layout; ?>
        </title>

        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        ?>
        <link rel="stylesheet" href="css/web/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/web/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/web/layout.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/web/prettyPhoto.css" type="text/css" media="screen">

        <script src="js/web/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="js/web/cufon-yui.js" type="text/javascript"></script>
        <script src="js/web/cufon-replace.js" type="text/javascript"></script> 
        <script src="js/web/Dynalight_400.font.js" type="text/javascript"></script>
        <script src="js/web/FF-cash.js" type="text/javascript"></script>  
        <script src="js/web/jquery.equalheights.js" type="text/javascript"></script>    
        <script src="js/web/jquery.bxSlider.js" type="text/javascript"></script>
        <script src="js/web/jquery.prettyPhoto.js" type="text/javascript"></script> 
        <script src="js/web/hover-image.js" type="text/javascript"></script>
        <script src="js/web/jquery.easing.1.3.js" type="text/javascript"></script>  

        <script type="text/javascript">
            $(document).ready(function () {
                $('#slider').bxSlider({
                    pager: true,
                    controls: false,
                    moveSlideQty: 1,
                    displaySlideQty: 3
                });
            });
            $(document).ready(function () {
                $('#slider-2').bxSlider({
                    pager: true,
                    controls: false,
                    moveSlideQty: 1,
                    displaySlideQty: 5
                });
                $("a[data-gal^='prettyPhoto']").prettyPhoto({theme: 'facebook'});
            });
        </script>
        <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
                <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
        <![endif]-->
        <!--[if lt IE 9]>
                    <script type="text/javascript" src="js/html5.js"></script>
            <![endif]-->
    </head>
    <body id="<?php echo $pageNumber; ?>">
        <!--==============================header=================================-->
        <header>
            <div class="row-top">
                <?php echo $this->element('web_menu'); ?>
            </div>
            <div class="row-bot">
                <div class="row-bot-bg">
                    <div class="main">
                        <h2>Impressive Selection <span>for any Occasion</span></h2>
                    </div>
                </div>
            </div>
        </header>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('web_footer'); ?>
        <script type="text/javascript">
            Cufon.now();
            function run(a) {
                windows.a = a;
            }
        </script>        
    </body>
</html>
