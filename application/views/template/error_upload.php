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
            <div class="info">
              <h1>
                <a href="inicio"><span class="first wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s"><img src="<?php echo base_url(); ?>images/logo.png" alt=""/></span></a>
              </h1>
              <br />
              <br />
              <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>ADMINISTRADOR DE CONTENIDOS</h2>
              </div>
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
                      <li><?php echo anchor('welcome/comoAyudarnos', 'Cómo ayudarnos'); ?></li>
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
                    <li><?php echo anchor('welcome/noticias', 'Media'); ?>
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

  <section id="content">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="slider-wrapper">
            
              <div class="clearfix"></div>
              <hr class="hr1"/>
              
            <div class="row">
                <div class="grid_12">
                  <div class="row">
                      <div class="grid_3 preffix_3">
                      <div class="grid_4 preffix_1">
                        <div class="error-box wow fadeInUp animated">
                          <?php echo $texto; ?>
                        <?php 
                          foreach ($errores as $key => $value) {
                            echo '<li>'.$value.'</li>';
                          }
                        ?>
                        </div>
                        <center><?php echo anchor($volver, 'Volver', 'class="btn-default wow fadeInUp animated"'); ?></center><br />
                        <center><?php echo anchor($cancelar, 'Cancelar', 'class="btn-default wow fadeInUp animated"'); ?></center>
                    </div>
                  </div>
          </div><!--Grid_12-->          
          <hr class="hr1"/>       
        </div>
      </div>
    </section>
  </div>
</div>

