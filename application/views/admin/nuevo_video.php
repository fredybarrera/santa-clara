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
                    <li class="current"><?php echo anchor('admin', 'Home'); ?></li>
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
                    <li><?php echo anchor('admin/hagaseSocio', 'Cómo ayudar'); ?>
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
                      <div class="grid_3 preffix_3">
                      <div class="grid_6">
                        <div class= "box_inner">
                        <h2>Cargar nuevo vídeo</h2>
                        <br />
                        <br />
                        <div class= "box4">
                        <?php echo form_open('admin/set_nuevo_video', 'method="post"'); ?>
                          <div class="box4-wrapper1 maxheight1">                    
                            <h3>
                              <p>Título del video</p>
                              <?php echo form_input('vide_titulo', '', 'id="vide_titulo" title="Titulo del video" class="" placeholder="Max 500 caracteres" required'); ?>
                            </h3>
                            <br />
                            <h3>
                              <p>Link del video - ajustar (widht="400" height="315")</p>                              
                                <?php 
                                  $data = array(
                                    'name'        => 'vide_link',
                                    'id'          => 'vide_link',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '72',
                                    'title'       => "Link del video",
                                    'required'    => true
                                    //'style'       => 'width:50%',
                                  );

                                  echo form_textarea($data);
                                ?>
                            </h3>
                            <br />
                            <h3>
                              <p>Descripción del video</p>
                              <div style="min-height: 400px;">
                              <?php echo $this->ckeditor->editor("vide_contenido", ''); ?>
                              </div>
                            </h3>
                            <br />
                            <h3>
                              <p>Estado del video</p>
                              <input type="radio" name="vide_estado" value="1" />Activo <br />
                              <input type="radio" name="vide_estado" value="-1" />Inactivo
                            </h3>
                            <br />
                            <h3>
                              <p>¿Definir como video principal?</p>
                              <input type="radio" name="vide_principal" value="1" />Activo <br />
                              <input type="radio" name="vide_principal" value="-1" />Inactivo
                            </h3>
                            <br />
                            <?php echo form_submit('submit', 'Guardar', 'class="btn-default-submit"'); ?><br /><br />
                            <?php echo anchor('admin', 'Volver', 'class="btn-default-volver"');  ?>
                        </div>   
                        <?php echo form_close(); ?>
                        </div>                      
                        </div>
                    </div>
                  </div>
          </div><!--Grid_12-->          
          <hr class="hr1"/>       
        </div>
      </div>
    </section>
  </div>
</div>

