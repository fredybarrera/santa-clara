    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Fundacion Santa Clara</title>
  <meta charset="utf-8">
  <meta name = "format-detection" content = "telephone=no" />
  <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/grid.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/camera.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/search.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery-migrate-1.2.1.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.equalheights.js"></script>
  <script src="<?php echo base_url(); ?>js/camera.js"></script>
  
  <!-- start gallery scripts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>gallery/css/tmMultimediaGallery.css">
  <script src="<?php echo base_url(); ?>gallery/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/tmFileList.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/tmPaginationGenerator.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/jquery.ui.touch-punch.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/tmDraggablePagination.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/tmMultimediaGallery.js"></script>
  <script src="<?php echo base_url(); ?>gallery/js/tmMultimediaGallery_init.js"></script>
  <!--[if (gt IE 9)|!(IE)]><!-->
  <script src="<?php echo base_url(); ?>gallery/js/jquery.touchSwipe.min.js"></script>
  <!--<![endif]-->

  <!-- end gallery scripts -->
  <!--[if (gt IE 9)|!(IE)]><!-->
  <script src="<?php echo base_url(); ?>js/jquery.mobile.customized.min.js"></script>
  <script src="<?php echo base_url(); ?>js/wow/wow.js"></script>

  <script>
    $(document).ready(function () {
      if ($('html').hasClass('desktop')) {
        new WOW().init();
      }
    });
  </script>
  <!--<![endif]-->
  <script>
    $(document).ready(function () {
      $('#camera_wrap').camera({
        loader: true,
        pagination: false,
        minHeight: '',
        thumbnails: false,
        height: '42.08664898320071%',
        caption: false,
        navigation: true,
        fx: 'simpleFade',
        onLoaded: function () {
          $('.slider-wrapper')[0].style.height = 'auto';
        }
      });
    });
  </script>
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/ie.css"/>
  <script src="js/html5shiv.js"></script>
  <div id="ie6-alert" style="width: 100%; text-align:center;">
    <img src="http://beatie6.frontcube.com/images/ie6.jpg" alt="Upgrade IE 6" width="640" height="344" border="0" usemap="#Map" longdesc="http://die6.frontcube.com" />
    <map name="Map" id="Map"><area shape="rect" coords="496,201,604,329" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target="_blank" alt="Download Interent Explorer" /><area shape="rect" coords="380,201,488,329" href="http://www.apple.com/safari/download/" target="_blank" alt="Download Apple Safari" /><area shape="rect" coords="268,202,376,330" href="http://www.opera.com/download/" target="_blank" alt="Download Opera" /><area shape="rect" coords="155,202,263,330" href="http://www.mozilla.com/" target="_blank" alt="Download Firefox" />
      <area shape="rect" coords="35,201,143,329" href="http://www.google.com/chrome" target="_blank" alt="Download Google Chrome" />
    </map>
  </div>
  <![endif]-->




</head>
<body>
<!--========================================================
                          HEADER
=========================================================-->
<div class="background-wrapper">
  <div class="big-wrapper">
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="socials">
              <ul class="socials1">
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#"><img src="<?php echo base_url(); ?>images/twitter.png" alt=""/></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"><a href="#"><img src="<?php echo base_url(); ?>images/facebook.png" alt=""/></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"><a href="#"><img src="<?php echo base_url(); ?>images/youtube.png" alt=""/></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="info">
              <h1>
                <a href="inicio"><span class="first wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s"><img src="<?php echo base_url(); ?>images/logo.png" alt=""/></span></a>
              </h1>
              <h1>
                <a href="http://www.ayudar.cl/web/"><span class="first wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s"><img src="<?php echo base_url(); ?>images/logo_ayudar.png" alt=""/></span></a>
              </h1>
              <h1>  
                <a href="http://www.comunidad-org.cl/"><span class="first wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s"><img src="<?php echo base_url(); ?>images/logo_comunidad.png" alt=""/></span></a>
              </h1>

              
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="stuck_container">
        <div class="container">
          <div class="row">
            <div class="grid_12">
              <div class="menu-wrapper">
                <nav>
                  <ul class="sf-menu">
                    <li><?php echo anchor('', 'Home'); ?></li>
                    <li><?php echo anchor('welcome/historia', 'La fundación'); ?>
                      <ul>
                        <li><?php echo anchor('welcome/historia', 'Historia'); ?></li>
                        <li><?php echo anchor('welcome/equipo', 'Equipo'); ?></li>
                      </ul>
                    </li>
                    <li><?php echo anchor('welcome/entorno', 'Que hacemos'); ?>
                    <ul>
                      <li><?php echo anchor('welcome/entorno', 'Los niños y su entorno');?></li>
                      <li><?php echo anchor('welcome/comoAyudarnos', 'Como ayudamos'); ?></li>
                      <li><?php echo anchor('welcome/casaAcogida', 'Casa de acogida'); ?></li>
                    </ul>
                    </li>
                    <li><?php echo anchor('welcome/hagaseSocio', 'Como ayudar'); ?>
                      <ul>
                        <li><?php echo anchor('welcome/hagaseSocio', 'Hagase socio');?></li>
                        <li><?php echo anchor('welcome/voluntariado', 'Voluntariado'); ?></li>
                        <li><?php echo anchor('welcome/apadrinamiento', 'Apadrinamiento'); ?></li>
                        <li><?php echo anchor('welcome/donaciones', 'Donaciones'); ?></li>
                        <li><?php echo anchor('welcome/tarjetasSaludo', 'Tarjetas de saludo'); ?></li>
                        <li><?php echo anchor('welcome/coronasCaridad', 'Coronas de caridad'); ?></li>
                        <li><?php echo anchor('welcome/patrocinadores', 'Patrocinadores'); ?></li>
                      </ul>
                    </li>
                    <li class="current"><?php echo anchor('welcome/noticias', 'Prensa'); ?>
                    <ul>
                      <li><?php echo anchor('welcome/noticias', 'Noticias');?></li>
                      <li><?php echo anchor('welcome/galeria', 'Galeria');?></li>
                      <li><?php echo anchor('welcome/campania_2009_2010', 'Campañas');?>
                        <ul>
                        <li><?php echo anchor('welcome/campania_2009_2010', '2009-2010');?></li>
                        <li><?php echo anchor('welcome/campania_2011', '2011'); ?></li>
                        </ul>
                      </li>
                    </ul>
                    </li>
                    <li><?php echo anchor('welcome/contacto', 'Contacto'); ?></li>
                  </ul>
                  <div class="clearfix"></div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
<?php 
    if(isset($carpeta)){
      $nombre_carpeta = $carpeta.'/';

    }else{
      $nombre_carpeta = "";
    }
?>


    <div class="galleryContainer">
      <!-- spinner -->
      <div class="imgSpinner"></div>
      <!-- close button -->
      <a href="" class="close-icon"><i class="fa fa-times"></i></a>

      <!-- Navigation -->
      <!-- previous button -->
      <a href="#" class="prevButton">
        <i class="fa fa-angle-left"></i>
      </a>
      <!-- next button -->
      <a href="#" class="nextButton">
        <i class="fa fa-angle-right"></i>
      </a>

      <!-- main gallery and image holder -->
      <div class="galleryHolder">
        <div class="imageHolder">
          <img src="<?php echo base_url(); ?>server/php/files/Desert.jpg" alt>
        </div>
      </div>

      <div class="carousel-holder">
        <div class="carousel inner">
          <!-- holder for pagination -->
        </div>
        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
      </div>

    </div>

    <section id="content" class="common">
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="grid_12">
              <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>Galeria</h2>
              </div>
              <div class="relative-wrapper">
                <div class="content-load-spinner"></div>
                <div class="inner"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>

<script type="text/javascript">
  $(function () {
    
    pathThumb = '../../server/php/files/<?php echo $nombre_carpeta ?>/thumbnail/';
    pathFull = '../../server/php/files/<?php echo $nombre_carpeta ?>';
  })
</script>