<!--========================================================
                          FOOTER
=========================================================-->
<footer id="footer">
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <div class="privacy-block wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
           Fundación Santa Clara, Nueva Rengifo 251, Recoleta <a href="http://www.google.cl/maps?f=q&source=s_q&hl=es&geocode=&q=nueva+rengifo+251,+santiago&aq=&sll=-35.675147,-71.542969&sspn=87.571513,214.277344&ie=UTF8&hq=&hnear=Nueva+Rengifo+251,+Recoleta,+Santiago&z=16" target="_blank" title="Google Maps"> [Ver Mapa]</a><br />
           Santiago de Chile Teléfono (2) 2777 2220 | Fax (2) 2777 6828.<br />
           Casa de Acogida Santa Clara | Teléfonos (2) 2732 0399 |(2) 2777 0571.
          </div>
          <div class="links">
            <ul>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                <?php 
                   if (isset($_SESSION['username'])) {
                    echo anchor('admin/logout', 'Cerrar Sesión');
                   }else{
                    echo anchor('welcome/login', 'Login');
                   }
                ?>
              </li>
          <!--
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <a href="#">FAQs</a>
              </li>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a href="#">Sitemap</a>
              </li>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <a href="#">Help</a>
              </li>
          -->
            </ul>
          </div>
          <div class="cleafix"></div>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo base_url(); ?>js/script.js"></script>
</body>
</html>