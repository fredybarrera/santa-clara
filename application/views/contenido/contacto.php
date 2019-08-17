<link rel="stylesheet" href="<?php echo base_url(); ?>css/contact-form.css">
<!--<script src="<?php //echo base_url(); ?>js/TMForm.js"></script>-->
<script src="<?php echo base_url(); ?>js/modal.js"></script>
<script src="//maps.googleapis.com/maps/api/js?v=3.exp"></script>
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
                    <li class="current"><?php echo anchor('welcome/contacto', 'Contacto'); ?></li>
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
            <div class="grid_12">
              <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>Contacto</h2>
              </div>              
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.712080670839!2d-70.648828!3d-33.43075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5bc3258c2fb%3A0x3b7f4bb01a6d8c51!2sNva+Rengifo+251%2C+Recoleta%2C+Regi%C3%B3n+Metropolitana+de+Santiago!5e0!3m2!1ses!2scl!4v1429843234027" width="1132" height="600" frameborder="0" style="border:0"></iframe>
              <div class="row">
                <br /><br />
                <br /><br />
                <div class="grid_4">
                  
                  <div class="address-block">
                    <address class="location wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                      <span>Nueva Rengifo 251, Recoleta.</span>
                      <span>Santiago de Chile.</span>
                    </address>

                    <address class="phones wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                      <span>(2) 2732 0399</span>
                      <span>(2) 2777 0571</span>
                    </address>

                    <address class="mail wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                      <a href="mailto:mail@demolink.org">contacto@contacto.cl</a>
                    </address>
                  </div>
                </div>
                <div class="grid_8">
                  <?php echo form_open('welcome/formulario_contacto', 'method="post" id="contact-form"'); ?>

                    <div class="contact-form-loader"></div>
                    <fieldset>
                      <label class="name wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        <input type="text" name="name" placeholder="Nombre:"
                               data-constraints="@Required @JustLetters" required/>
                        <span class="empty-message">*Campo nombre es requerido.</span>
                      </label>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <input type="email" name="email" placeholder="E-mail:" value=""
                               data-constraints="@Required @Email" required/>
                        <span class="empty-message">*Campo mail es requerido.</span>
                        <span class="error-message">*Debe ingresar una dirección de correo válida.</span>
                      </label>
                      <label class="message wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <textarea name="message" placeholder="Mensaje:"
                                  data-constraints='@Required @Length(min=20,max=999999)'  required></textarea>
                        <span class="empty-message">*Campo mensaje es requerido.</span>
                        <span class="error-message">*El mensaje debe tener 20 caracteres como minimo.</span>
                      </label>
                      <!-- <label class="recaptcha"><span class="empty-message">*This field is required.</span></label> -->
                      <div class="contact-form-buttons wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        <?php echo form_submit('submit', 'Enviar', 'class="btn-default-login"'); ?>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>