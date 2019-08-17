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
                    <li class="current"><?php echo anchor('welcome/historia', 'La fundación'); ?>
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
                    <li><?php echo anchor('welcome/noticias', 'Prensa'); ?>
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
<section id="content" class="common">
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="grid_8">
              <div class="grid_4 preffix_1">
                <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                  <h2>Equipo</h2>
                </div>
                <div class="box4">
                  <ul class="list1">

                    <!-- ============================= EQUIPO -->

                    <?php foreach ($equipo as $equipo_item): ?>

                      <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <span class="strong"><?php echo $equipo_item->equi_nombre ?><br><?php echo $equipo_item->equi_cargo  ?></span></a>
                      </li>

                    <?php endforeach ?>

                    <!-- ============================= EQUIPO -->                    
                    
                  </ul>
                </div>
                <br /><br />
                <div class="fb-share-button" data-href="https://www.facebook.com/www.fundacionsantaclara.cl" data-layout="button"></div>
              </div>
            </div>
            <div class="grid_3 preffix_1">
              <div class="maxheight with-border1">
                <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                  <h2>Twitter</h2>
                </div>
                <div class="blockquote1-wrapper1">
                  <a class="twitter-timeline" width=100% height="420" data-chrome=" noborders transparent noscrollbar" href="https://twitter.com/santaclarachile" data-widget-id="591051549088055296">
                    Tweets por el @santaclarachile.
                  </a>
                  <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
                  </script>
                </div>
                <!--
                <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                  <h2>My vision</h2>
                </div>
                <div class="box4-wrapper2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="box4">
                    <h5>
                      <a href="#">Lorem ipsum dolor sit amet, consec teer adipiscing. Prsent vestibulum molestie lacuiirhs. Aeneon my . Phasellllus. porta. Fusce suscipit varius mium sociis. </a>
                    </h5>
                    <p>Lorem ipsum dolor sit amet, consec tetuer adipiscing. Praesent vestibu lum molestie lacuiirhs. Aenean non ummy hendreriauris. Phasellllus. porta. Fusce suscipit varius mium sociis totdnatibus
                      et magis dis parturient montes, nascetur ridiculus mus. Nulla dui.</p>
                    <a class="btn-default" href="#">More</a>
                  </div>
                </div>
              -->
              </div>

            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>
</div>