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
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s"><a href="https://twitter.com/santaclarachile" target="_blank"><img src="<?php echo base_url(); ?>images/twitter.png" alt=""/></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"><a href="https://www.facebook.com/www.fundacionsantaclara.cl" target="_blank"><img src="<?php echo base_url(); ?>images/facebook.png" alt=""/></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"><a href="https://www.youtube.com/channel/UCzn__-U9A7e3cEafW8MEATA" target="_blank"><img src="<?php echo base_url(); ?>images/youtube.png" alt=""/></a></li>
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
                    <li><?php echo anchor('welcome/entorno', 'Qué hacemos'); ?>
                    <ul>
                      <li><?php echo anchor('welcome/entorno', 'Los niños y su entorno');?></li>
                      <li><?php echo anchor('welcome/comoAyudarnos', 'Cómo ayudamos'); ?></li>
                      <li><?php echo anchor('welcome/casaAcogida', 'Casa de acogida'); ?></li>
                    </ul>
                    </li>
                    <li><?php echo anchor('welcome/hagaseSocio', 'Cómo ayudar'); ?>
                      <ul>
                        <li><?php echo anchor('welcome/hagaseSocio', 'Hágase socio');?></li>
                        <li><?php echo anchor('welcome/voluntariado', 'Voluntariado'); ?></li>
                        <li><?php echo anchor('welcome/apadrinamiento', 'Apadrinamiento'); ?></li>
                        <li><?php echo anchor('welcome/donaciones', 'Donaciones'); ?></li>
                        <li><?php echo anchor('welcome/tarjetasSaludo', 'Tarjetas de saludo'); ?></li>
                        <li><?php echo anchor('welcome/coronasCaridad', 'Coronas de caridad'); ?></li>
                        
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
    <section id="content" class="common common__inset1">
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="grid_12">
              <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>Galerias</h2>
              </div>
              <div class="gallery">
                <div class="row">
                  

                  <?php foreach ($galerias as $galerias_item): ?>
                  <div class="grid_4">
                    <div class="box8 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                      <div class="gallery_image">
                        <a class="big-image" >
                          <img src="<?php echo base_url(); ?>server/php/files/<?php echo $galerias_item->gaim_carpeta ?>/<?php echo $galerias_item->gaim_imagen ?>" width="300" height="200" >
                          <div class="gallery_hover">
                            <i class="fa fa-photo"></i>
                          </div>
                        </a>
                      </div>
                      <h4>
                        <a href="galeria"><?php echo $galerias_item->gaim_titulo ?></a>
                      </h4>
                      <p><?php echo $galerias_item->gaim_descripcion ?></p>
                      <!--<a class="btn-default" href='galerias/<?php echo $galerias_item->gaim_id ?>'>Ver</a> -->

                      <FORM ACTION="galerias" METHOD="POST" ENCTYPE="multipart/form-data"> 
                      <INPUT TYPE="hidden" NAME="id" VALUE= "<?php echo $galerias_item->gaim_id ?>">
                      <INPUT TYPE="submit" class="btn-default" VALUE="Ver Fotos"> 
                      </FORM>  

                    </div>
                  </div>
                  <?php endforeach ?>

          

                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>
