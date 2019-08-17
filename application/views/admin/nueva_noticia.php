<script type="text/javascript">
$(document).ready(function() {
    $(".prices").hide();
    
    $("input[name$='noti_galeria']").click(function() {
        var test = $(this).val();
        $(".prices").hide();
        $(".prices[data-period='" + test + "']").show();
    });
});    
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
                    <li class="current"><?php echo anchor('admin/noticias', 'Media'); ?>
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
                      <h2>Subir nueva noticia</h2>
                        <br />
                        <br />
                        <div class= "box_inner">
                        <div class= "box4">
                        <?php echo  form_open_multipart('admin/upload_noticia'); ?>
                          <div class="box4-wrapper1 maxheight1">
                            <h3>
                              <p>Título de la noticia</p>
                              <?php echo form_input('noti_titulo', '', 'id="noti_titulo" title="Titulo de la noticia" class="" placeholder="Max 500 caracteres" required'); ?>
                            </h3>
                            <br />
                            <h3>
                              <p><?php echo form_label('Seleccionar foto de noticia', 'userfile') ?></p>
                            </h3>
                            <li class="error-mensaje">Tamaño máximo: 5MB</li>
                            <li class="error-mensaje">Formatos permitidos: gif - jpg - png</li>                    
                            <p><?php echo form_upload('userfile') ?></p>
                            <br />
                            <br />

                            <h3>
                              <p>Descripción de la noticia</p>
                              <div style="min-height: 400px;">
                              <?php echo $this->ckeditor->editor("noti_contenido", ''); ?>
                            </div>
                            </h3>
                            <br />
                            <h3>
                              <p>Estado de la noticia</p>
                            </h3>
                              <input type="radio" name="noti_estado" value="1" required/>Activa <br />
                              <input type="radio" name="noti_estado" value="-1" required/>Inactiva
                            <br />
                            <br />
                            <h3>
                              <p>Slide Home</p>
                            </h3>
                              <input type="radio" name="noti_slide" value="1" required/>Activa <br />
                              <input type="radio" name="noti_slide" value="-1" required/>Inactiva
                            <br />
                            <br />
                            <h3><p>Galería fotográfica</p></h3>
                                <ul>
                                    <li class="selected">
                                        <label>
                                            <input type="radio" name="noti_galeria" value="crear" required />
                                            <span class="period">Crear galeria de imágenes</span>                        
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="noti_galeria" value="relacionar" required/>
                                            <span class="period">Relacionar con galeria existente</span>
                                        </label>
                                    </li>
                                    <div class="prices" data-period="relacionar">
                                    <?php

                                      $galerias = welcome_model::get_galerias_imagenes_activas();                               

                                      $option = "<select name='id_galeria' id='id_galeria'>";
                                      if(!empty($galerias)){

                                      foreach ($galerias as $galerias_item) {
                                          $option.= "<option  name='id_galeria' id='id_galeria' value=".$galerias_item->gaim_id.">".$galerias_item->gaim_titulo."</option>";
                                      }
                                      $option .= "</select>";

                                      echo $option;
                                    }else{
                                      echo "No existen galerias creadas";
                                    }

                                    ?>                                  
                                    </div>
                                    <li>
                                        <label>
                                            <input type="radio" name="noti_galeria" value="nada" required/>
                                            <span class="period">No incluir galeria</span>
                                        </label>
                                    </li>
                                </ul>
                            <br />

                            <?php echo form_submit('submit', 'Guardar', 'class="btn-default-submit"'); ?><br /><br />
                            <?php echo anchor('admin/noticias', 'Volver', 'class="btn-default-volver"');  ?><br />
                        </div>   
                        <?php echo form_close(); ?>
                        </div>                      
                        </div>
                    </div>
                  </div>
          <div class="clearfix"></div>
          </div><!--Grid_12-->          
          <hr class="hr1"/>       
        </div>
      </div>
    </section>
  </div>
</div>