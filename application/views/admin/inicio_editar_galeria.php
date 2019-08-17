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
                      <h2>Editar imágen de galería</h2>
                      <br />
                      <br />
                        <div class= "box_inner">
                        <div class= "box4">
                        <?php echo  form_open_multipart('admin/do_upload'); ?>
                          <div class="box4-wrapper1 maxheight1">                    
                            <h3>
                              <p>Imagen</p>
                              <img src="<?php echo base_url(); ?>images/<?php echo $galeria_item['gapi_imagen'] ?>" alt=""  width="520"/>
                            </h3>
                            <br />

                            <br />
                            <br />
                            <h3>
                              <p><?php echo form_label('Cambiar foto de galería', 'userfile') ?></p>
                            </h3>
                            <li class="error-mensaje">Dimensiones mínimas de la imágen: 1132x476 pixeles</li>
                            <li>Tamaño máximo: 5MB</li>
                            <li>Formatos permitidos: gif - jpg - png</li>                    
                            <p><?php echo form_upload('userfile') ?></p>
                            <br />
                            <br />
                            <br />


                            <h3>
                              <p>Descripción de la imágen</p>
                              <div style="min-height: 400px;">
                              <?php echo $this->ckeditor->editor("gapi_texto", $galeria_item['gapi_texto']); ?>
                              </div>
                            </h3>
                            <br />
                            <h3>
                              <p>Estado de la imágen</p>
                              <input type="radio" name="gapi_estado" value="1" <?php echo set_value('gapi_estado', $galeria_item['gapi_estado']) == ESTADO_ACTIVO ? "checked" : ""; ?> />Activa <br />
                              <input type="radio" name="gapi_estado" value="-1" <?php echo set_value('gapi_estado', $galeria_item['gapi_estado']) == ESTADO_INACTIVO ? "checked" : ""; ?> />Inactiva
                            </h3>
                            <br />
                            <?php echo form_hidden('gapi_id', $galeria_item['gapi_id'], ''); ?>
                            <?php echo form_submit('submit', 'Actualizar', 'class="btn-default-submit "'); ?><br /><br />
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

