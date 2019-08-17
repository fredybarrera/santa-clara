<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Results</title>
  <meta charset="utf-8">
  <meta name = "format-detection" content = "telephone=no" />
  <link rel="icon" href=" http://localhost/santa_clara_v3/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href=" http://localhost/santa_clara_v3/css/grid.css">
  <link rel="stylesheet" href=" http://localhost/santa_clara_v3/css/search.css">
  <link rel="stylesheet" href=" http://localhost/santa_clara_v3/css/style.css">
  <script src=" http://localhost/santa_clara_v3/js/jquery.js"></script>
  <script src=" http://localhost/santa_clara_v3/js/jquery-migrate-1.2.1.js"></script>
  <script src=" http://localhost/santa_clara_v3/search/search.js"></script>
  <!--[if (gt IE 9)|!(IE)]><!-->
  <script src=" http://localhost/santa_clara_v3/js/wow/wow.js"></script>
  <script>
    $(document).ready(function () {
      if ($('html').hasClass('desktop')) {
        new WOW().init();
      }
    });
  </script>
  <!--<![endif]-->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <div id="ie6-alert" style="width: 100%; text-align:center;">
    <img src="http://beatie6.frontcube.com/images/ie6.jpg" alt="Upgrade IE 6" width="640" height="344" border="0" usemap="#Map" longdesc="http://die6.frontcube.com" />
    <map name="Map" id="Map"><area shape="rect" coords="496,201,604,329" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target="_blank" alt="Download Interent Explorer" /><area shape="rect" coords="380,201,488,329" href="http://www.apple.com/safari/download/" target="_blank" alt="Download Apple Safari" /><area shape="rect" coords="268,202,376,330" href="http://www.opera.com/download/" target="_blank" alt="Download Opera" /><area shape="rect" coords="155,202,263,330" href="http://www.mozilla.com/" target="_blank" alt="Download Firefox" />
      <area shape="rect" coords="35,201,143,329" href="http://www.google.com/chrome" target="_blank" alt="Download Google Chrome" />
    </map>
  </div>
  <![endif]-->
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
                <li class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#"><img src=" http://localhost/santa_clara_v3/images/twitter.png" alt=""/></a></li>
                <li class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"><a href="#"><img src=" http://localhost/santa_clara_v3/images/facebook.png" alt=""/></a></li>
                <li class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s"><a href="#"><img src=" http://localhost/santa_clara_v3/images/google-plus.png" alt=""/></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="info">
              <h1><a href="index.html"><span class="first wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">Tom</span><span class="second wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">woo</span><span class="third wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">Explore My Sculptural <br>Artwork</span></a></h1>
              <form id="search" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" action=" http://localhost/santa_clara_v3/search/search.php" method="GET" accept-charset="utf-8">
                <input type="text" name="s"/>
                <a onclick="document.getElementById('search').submit()">
                  <img src=" http://localhost/santa_clara_v3/images/search.png" alt=""/>
                </a>
              </form>
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
                    <li><a href="index.html">Main page</a>
                      <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">News</a>
                          <ul>
                            <li><a href="#">Pellentesque</a></li>
                            <li><a href="#">Aliquam</a></li>
                            <li><a href="#">Mauris</a></li>
                          </ul>
                        </li>
                        <li><a href="#">Services</a></li>
                      </ul>
                    </li>
                    <li><a href="index-1.html">About me</a></li>
                    <li><a href="index-2.html">exhibitions</a></li>
                    <li><a href="index-3.html">my clients</a></li>
                    <li><a href="index-4.html">latest news &amp; events</a></li>
                    <li><a href="index-5.html">My Contacts</a></li>
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
              <div class="heading1">
                <h2>Search Results:</h2>
              </div>
              <div id="search-results"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>


<!--========================================================
                          FOOTER
=========================================================-->
<footer id="footer">
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <div class="privacy-block wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            &copy; <span id="copyright-year"></span> <a
                  href="index-6.html">Privacy Policy</a>
          </div>
          <div class="links">
            <ul>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                <a href="#">Support</a>
              </li>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <a href="#">FAQs</a>
              </li>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a href="#">Sitemap</a>
              </li>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <a href="#">Help</a>
              </li>
            </ul>
          </div>
          <div class="cleafix"></div>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src=" http://localhost/santa_clara_v3/js/script.js"></script>
</body>
</html>