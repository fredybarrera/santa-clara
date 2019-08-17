<link rel="stylesheet" href="<?php echo base_url(); ?>css/contact-formHS.css">
<!--<script src="<?php //echo base_url(); ?>js/TMForm.js"></script>-->
<script src="<?php echo base_url(); ?>js/modal.js"></script>
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
                    <li class="current"><?php echo anchor('welcome/hagaseSocio', 'Cómo ayudar'); ?>
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
              <div class="maxheight">
                <div class="heading1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                  <h2>Hágase Socio</h2>
                </div>
                <div class="grid_3">
                  <img src="<?php echo base_url(); ?>images/imagen_hagase_socio.png" alt="" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"/>               
                </div>
                <div class="grid_4">
                  <h4 class="wow strong fadeInUp"  data-wow-duration="1s" data-wow-delay="0.1s">REALICE SU APORTE MENSUAL</h4><br>
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    El ser socio te compromete a efectuar un aporte mensual para que Fundación Santa Clara pueda seguir trabajando por la dignidad de los niños y niñas que viven bajo la condicionante del VIH/SIDA.
                  </p>
                  <p class="wow strong fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">Formas de ayudar:</p><br>
                  <p class="wow strong fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">1.- Descuento en cuenta corriente (PAC)</p><br>
                  <p class="wow strong fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">2.- Descuento en tarjeta de crédito (PAT)</p><br>
                  <p class="wow strong fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">3.- Dar con Tarjeta: </p> <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Con sus tarjetas bancarias usted podrá donar a nuestra institución a través de la página  <a title="Ir al Sitio Web" href="http://www.darcontarjeta.cl" target="_blank"><strong>www.darcontarjeta.cl</strong></a> </p><br>
                  <p class="wow strong fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">4.- Transferencia electrónica mensual: </p><p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Serás tú quien deberá efectuar el aporte todos los meses, mediante una transferencia electrónica a Fundación Santa Clara. Cada mes, recibirás un recordatorio con los datos requeridos para efectuar la transferencia o el depósito. Puedes comenzar hoy mismo y efectuar tu primer aporte a nombre de Fundación Santa Clara, en la cuenta corriente 11399503 del Banco BCI (Rut: 73.329.300-4).<p/>
                </div>   
                <br />
                <br />
                <div class="grid_8">  
                <br />
                <br />                             
                  <p class="wow strong fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">5.- Retiro a domicilio – o lugar de trabajo: </p><p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Tu aporte será retirado en la dirección y fecha que indiques por una de nuestras recaudadora.Se puede aportar el monto que tú quieras. Como referencia, puedes revisar la tabla de equivalencias:<br />
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">• $1.700 - Almuerzo y comida diario por niño<br />
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">• $2.500 - Alimentación completa diaria por niño<br />
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">• $5.000 - Costo día niño en centro atención especializado<br />
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">• $10.000 - Costo diario por niño en hogar residencial<br />
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">• $35.000 - Costo mes educación niño en hogar residencial<br /><br />
                  <h4 class="wow strong fadeInUp"  data-wow-duration="1s" data-wow-delay="0.1s">FORMULARIO DE POSTULANTE A SOCIO DE NUESTRA FUNDACION</h4>
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Al hacerse socio, usted comienza una labor importante para recuperar la dignidad de nuestros niños a través de su aporte amoroso, su aporte contribuye a mejorar la calidad de quienes lo necesitan.</p>
                  <br /><br />
                <div class="fb-share-button" data-href="https://www.facebook.com/www.fundacionsantaclara.cl" data-layout="button"></div>
                </div>
                <br />
              </div>
            </div>
            <div class="grid_3 preffix_1 with-border1">
              <h2>Formulario de Postulante</h2><br>
              
              <?php echo form_open('welcome/contacto_postulante', 'method="post" id="contact-form"'); ?>
                    <fieldset>
                      <label class="name wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        <input type="text" name="Apaterno" placeholder="Apellido Paterno:"
                               data-constraints="@Required @JustLetters" required/>
                        <span class="empty-message">*Campo apellido paterno es requerido.</span>
                      </label>
                      <?php echo form_error('Apaterno', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <input type="text" name="Amaterno" placeholder="Apellido Materno:" value=""
                               data-constraints="@Required @JustLetters" required/>
                        <span class="empty-message">*Campo apellido paterno es requerido.</span>
                      </label>
                      <?php echo form_error('Amaterno', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <input type="text" name="nombres" placeholder="Nombres:" value=""
                               data-constraints="@Required @JustLetters" required/>
                        <span class="empty-message">*Campo Nombres es requerido.</span>
                      </label>
                      <?php echo form_error('nombres', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <input type="text" name="email" placeholder="E-mail:" value=""
                               data-constraints="@Required @Email" required/>
                        <span class="empty-message">*Campo mail es requerido.</span>
                        <span class="error-message">*Debe ingresar una dirección de correo válida.</span>
                      </label>
                      <?php echo form_error('email', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <input type="text" name="rut" placeholder="Rut:" value=""
                              data-constraints="@Required @JustLetters" required/>
                        <span class="empty-message">*Campo rut es requerido.</span>
                      </label>
                      <?php echo form_error('rut', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <input type="text" name="fnacimiento" placeholder="Fecha Nacimiento:" value=""/>
                      </label>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                        <input type="text" name="direccion" placeholder="Dirección:" value=""/>
                      </label>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                        <input type="text" name="comuna" placeholder="Comuna:" value="" required/>
                      </label>
                      <?php echo form_error('comuna', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                        <input type="text" name="ciudad" placeholder="Cuidad:" value="" required/>
                      </label>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.0s">
                        <input type="text" name="telefono" placeholder="Telefono: Cód. de ciudad + Número " value=""/>
                      </label>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
                        <input type="text" name="celular" placeholder="Celular:" value="" required/>
                      </label>
                      <?php echo form_error('celular', '<div class="error-mensaje">', '</div>'); ?>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.2s">
                        <input type="text" name="empresa" placeholder="Empresa donde usted labora:" value=""/>
                      </label>
                      <label class="email wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.3s">
                        <input type="text" name="monto" placeholder="Monto mesual aporte en $" value="" required/>
                      </label>
                      <?php echo form_error('monto', '<div class="error-mensaje">', '</div>'); ?>
                      <h3><span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">Tipo de aporte</span></h3>
                      <select class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" name="tipo_socio" required>
                        <option value="Recaudador a domicilio" selected="selected">Recaudador a Domicilio</option>
                        <option value="Depósito en cuenta corriente">Depósito en Cuenta Corriente</option>
                        <option value="Transferencia bancaria">Transferencia Bancaria</option>
                        <option value="Tarjeta de crédito">Tarjeta de Crédito</option>
                        <option value="Pago en la fundación">Iré a pagar a Fundación</option>
                      </select>
                      <h3>
                      <?php echo form_error('tipo_socio', '<div class="error-mensaje">', '</div>'); ?>
                        <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">Día de pago</span><br>
                        <select class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" name="dia_pago" required>
                        <option value="10" selected="selected">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="20">25</option>
                      </select>
                      </h3>
                      <?php echo form_error('dia_pago', '<div class="error-mensaje">', '</div>'); ?>
                      <!-- <label class="recaptcha"><span class="empty-message">*This field is required.</span></label> -->
                    </fieldset>
                        
                       <?php echo form_submit('submit', 'Enviar', 'class="btn-default-login"'); ?>
                      
                  <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>