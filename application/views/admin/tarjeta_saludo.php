<script>
function resize(img,nuevoAncho,nuevoAlto) { 
  img.width = nuevoAncho; 
  img.height = nuevoAlto; 
  img.style.cursor = 'move';
}
</script>
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
                <a href="inicio"><span class="first"><img src="<?php echo base_url(); ?>images/logo.png" alt=""/></span></a>
              </h1>
              <br />
              <br />
              <div class="heading1">
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
                    <li><?php echo anchor('admin', 'Home'); ?></li>
                    <li><?php echo anchor('admin/historia', 'La fundación'); ?>
                      <ul>
                        <li><?php echo anchor('admin/historia', 'Historia'); ?></li>
                        <li><?php echo anchor('admin/equipo', 'Equipo'); ?></li>
                      </ul>
                    </li>
                    <li><?php echo anchor('admin/entorno', 'Qué hacemos'); ?>
                    <ul>
                      <li><?php echo anchor('admin/entorno', 'Los niños y su entorno');?></li>
                      <li><?php echo anchor('admin/comoAyudarnos', 'Cómo ayudarnos'); ?></li>
                      <li><?php echo anchor('admin/casaAcogida', 'Casa de acogida'); ?></li>
                    </ul>
                    </li>
                    <li class="current"><?php echo anchor('admin/hagaseSocio', 'Cómo ayudar'); ?>
                      <ul>
                        <li><?php echo anchor('admin/hagaseSocio', 'Hágase socio');?></li>
                        <li><?php echo anchor('admin/voluntariado', 'Voluntariado'); ?></li>
                        <li><?php echo anchor('admin/apadrinamiento', 'Apadrinamiento'); ?></li>
                        <li><?php echo anchor('admin/donaciones', 'Donaciones'); ?></li>
                        <li><?php echo anchor('admin/tarjetasSaludo', 'Tarjetas de saludo'); ?></li>
                        <li><?php echo anchor('admin/coronasCaridad', 'Coronas de caridad'); ?></li>
                        <li><?php echo anchor('admin/patrocinadores', 'Patrocinadores'); ?></li>
                      </ul>
                    </li>
                    <li><?php echo anchor('admin/noticias', 'Media'); ?>
                    <ul>
                      <li><?php echo anchor('admin/noticias', 'Noticias');?></li>
                      <li><?php echo anchor('admin/galeria', 'Galeria');?></li>
                      <li><?php echo anchor('admin/campania_2009_2010', 'Campañas');?>
                        <ul>
                        <li><?php echo anchor('admin/campania_2009_2010', '2009-2010');?></li>
                        <li><?php echo anchor('admin/campania_2011', '2011'); ?></li>
                        </ul>
                      </li>
                    </ul>
                    </li>
                    <li><?php echo anchor('admin/contacto', 'Contacto'); ?></li>
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
                    <div class="grid_3 preffix_4">

                      <div class="heading1">
                        <?php echo anchor('admin/nueva_tarjeta_saludo', 'Crear tarjeta de saludos', 'class="btn-default"'); ?>
                        <br />
                        <br />
                        <h2>Tarjetas de saludo</h2>
                      </div>
                        <div class="post1-wrapper1 maxheight1">
                        <?php foreach ($tarjetas as $tarjetas_item): ?>
                          <div class="post1">
                            <time datetime="2014-01-01"><?php echo $tarjetas_item->tasa_titulo ?></time>
                            <h4>
                              <img src="<?php echo base_url(); ?>images/<?php echo $tarjetas_item->tasa_imagen ?>" alt="" width="150" height="200"/>
                            </h4>
                          <?php 
                              $link = "admin/editar_tarjeta_saludo/".$tarjetas_item->tasa_id;
                              echo anchor($link, 'Editar', 'class="btn-default wow"'); 
                            ?>
                          </div>
                        <?php endforeach ?>
                      </div>                    
                    </div>
          </div><!--Grid_12-->          
          <hr class="hr1"/>       
        </div>
      </div>
    </section>
  </div>
</div>