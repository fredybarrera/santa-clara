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
          <div class="grid_12" >
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
            <div class="info" >
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
                    <li class="current"><?php echo anchor('', 'Home'); ?></li>
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
	<br>

        <!--========================================================
                              CONTENT
    =========================================================-->

  <section id="content">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="slider-wrapper">
              <div id="camera_wrap">
                <?php foreach ($inicio as $inicio_item): ?>
                <div data-link="<?php echo base_url(); ?>index.php/welcome/articulo/<?php echo $inicio_item->noti_slug ?>"   data-src="<?php echo base_url(); ?>images/noticias/<?php echo $inicio_item->noti_imagen ?>">
                      <div class="camera_caption fadeFromBottom"><?php echo $inicio_item->noti_titulo ?>
                    </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>   
              <div class="clearfix"></div>
              <hr class="hr1"/>
              
            <div class="row">
                <div class="grid_12">
                  <div class="row">


                    <div class="grid_3">
                      
                      <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2>Noticias </h2>
                      </div>


                        <div class="post1-wrapper1 maxheight1">             

                        <?php foreach ($noticias as $noticias_item): ?>
                          <div class="post1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                            <time datetime="2014-01-01"><?php echo $noticias_item->noti_fecha ?></time>
                            <h4>
                            <?php 
                              $link = "welcome/articulo/".$noticias_item->noti_slug;
                              echo anchor($link, $noticias_item->noti_titulo, '');
                            ?>
                            </h4>
                            <p><?php echo character_limiter($noticias_item->noti_contenido, 250, '...'); ?></p>
                            <?php 
                              $link = "welcome/articulo/".$noticias_item->noti_slug;
                              echo anchor($link, 'Ver', 'class="btn-default wow"');
                            ?>
                          </div>
                        <?php endforeach ?>
                      </div>                    
                    </div>





                      <div class="grid_3 preffix_1">
                        <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                          <h2>Redes Sociales</h2>
                        </div>
                        <div class="box5-wrapper1 maxheight1">
                        
                          <div class="blockquote1-wrapper2">
                          <a class="twitter-timeline" width=100% height="220" data-chrome=" noborders transparent noscrollbar" href="https://twitter.com/santaclarachile" data-widget-id="591051549088055296">
                          Tweets por el @santaclarachile.
                          </a>
                          <script>
                          !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
                          </script>
                          </div>
                          <br><br>
                          <div class="blockquote1-wrapper2">
                            <div class="fb-page" data-href="https://www.facebook.com/www.fundacionsantaclara.cl?fref=ts" data-width=100% data-height="280" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/www.fundacionsantaclara.cl?fref=ts"><a href="https://www.facebook.com/www.fundacionsantaclara.cl?fref=ts">Fundación Santa Clara</a></blockquote></div></div>
                          </div>                        
                        </div>
                      </div>



                      <div class="grid_4 preffix_1">
                      <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2>Videos</h2>
                      </div>

                        <div class= "box_inner">
                        <div class= "box 4">
                        <div class="box4-wrapper1 maxheight1">
                          <h6 class="wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.1s">
                            <?php echo $video_principal['vide_link'] ?>
                          </h6>
                          <br>
                          
                          <h5 class="wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.1s">
                          <?php 
                            $link = "welcome/video/".$video_principal['vide_slug'];
                            echo anchor($link, $video_principal['vide_titulo'], '');
                          ?>
                          </h5>
                          <br>
                        <div class="wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.2s">
                          
                          <?php echo character_limiter($video_principal['vide_contenido'], 250, '...'); ?>
                        </div>
                        <br>
                        <?php 
                            $link = "welcome/video/".$video_principal['vide_slug'];
                            echo anchor($link, 'Ver', 'class="btn-default wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.3s" href="#" style="visibility: visible; -webkit-animation-duration: 1s; -webkit-animation-delay: 0.3s;"');
                          ?>
                        <br>
                        </div>
                        </div>                      
                        </div>



                    </div>
                  </div>
          </div><!--Grid_12-->
          
              <hr class="hr1"/>

              </div>

              <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>Como ayudar</h2>
              </div>
        <div class="banner1">

              <div class="row">
                
                <div class="grid_4">
                  <div class="box1 first wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="label" style="vertical-align: 100%">
                      <img style="vertical-align: bottom" src="<?php echo base_url(); ?>images/apadrina1.png" alt=""/>
                    </div>
                    <span class="heading"><a href="<?php echo base_url(); ?>index.php/welcome/apadrinamiento"><h2>Apadrina</h2></a></span>
                  </div>
                </div>

                <div class="grid_4">
                  <div class="box1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="label">
                      <img src="<?php echo base_url(); ?>images/Voluntariado1.png" alt=""/>
                    </div>
                    <span class="heading"><a href="<?php echo base_url(); ?>index.php/welcome/voluntariado"><h2>Voluntariado</h2></a></span>
                  </div>
                </div>

                <div class="grid_4">
                  <div class="box1 last wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="label">
                      <img src="<?php echo base_url(); ?>images/socio1.png" alt=""/>
                    </div>
                    <span class="heading"><a href="<?php echo base_url(); ?>index.php/welcome/hagasesocio"><h2>Hazte Socio</h2></a></span>
                  </div>
                </div>
                </div>
        </div>
              <br>

        <div class="banner1">
              <div class="row">
                <div class="grid_4">
                  <div class="box1 first wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="label">
                      <img src="<?php echo base_url(); ?>images/dona1.png" alt=""/>
                    </div>
                    <span class="heading"><a href="<?php echo base_url(); ?>index.php/welcome/donaciones"><h2>Aporta</h2></a></span>
                    </div>
                </div>

                <div class="grid_4">
                  <div class="box1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="label">
                      <img src="<?php echo base_url(); ?>images/tsaludo1.png" alt=""/>
                    </div>
                    <span class="heading"><a href="<?php echo base_url(); ?>index.php/welcome/tarjetasSaludo"><h2>Tarjeta Saludo</h2></a></span>
                  </div>
                </div>

                <div class="grid_4">
                  <div class="box1 last wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="label">
                      <img src="<?php echo base_url(); ?>images/ccaridad1.png" alt=""/>
                    </div>
                    <span class="heading"><a href="<?php echo base_url(); ?>index.php/welcome/coronasCaridad"><h2>Corona Caridad</h2></a></span>
                  </div>
                </div>
              </div> 
        </div>
             <hr class="hr1"/>

      <section class="well-05">

            <div class="container">
              <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>Patrocinadores</h2>
              </div>
                
                <div class="carousel_wrap">
                    <div class="owl-carousel">
                        

                      <?php foreach ($patrocinadores as $patrocinadores_item): ?>

                        <div class="item">
                            <div class="item_block">
                                <div class="item_block_cnt">                       
                                  <a href="<?php echo $patrocinadores_item->patr_url ?>" target="_blank"/><img src="<?php echo base_url(); ?>images/<?php echo $patrocinadores_item->patr_imagen ?>" /></a>
                                </div>
                            </div>
                        </div>

                       <?php endforeach ?>




                    </div>
                </div>
            </div>
            
        </section>
        <hr class="hr1"/>
    </section>
  </div>
</div>