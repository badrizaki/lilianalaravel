<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>{{ GetData::setting()->siteName['value'] }} - @yield('title')</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="{{ GetData::setting()->metaKeywords['value'] }} }}" name="keywords">
   <meta content="{{ GetData::setting()->metaDesc['value'] }} }}" name="description">
   <meta name="format-detection" content="telephone=no">

   <!-- Favicons -->
   <link href="{{ url('assets/front/img/favicon.png') }}?v=1.5" rel="icon">

   <link rel="stylesheet" type="text/css" href="{{ url('assets/front/fonts/font.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/font-awesome.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/main.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/owl-carousel.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ url('assets/front/css/magnific-popup.css') }}">

   <meta name="csrf-token" content="{{ csrf_token() }}">
   @yield("css")
</head>

<body>
   <!-- ***** Preloader Start ***** -->
   <div id="preloader">
      <div class="jumper">
         <div></div>
         <div></div>
         <div></div>
      </div>
   </div>
   <!-- ***** Preloader End ***** -->

   <!-- ***** Header Area Start ***** -->
   <header class="header-area header-sticky">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav class="main-nav">
                  <a href="#" class="logo">
                     <img src="{{ url('assets/front/images/logo.png') }}"
                        alt="{{ GetData::setting()->siteName['value'] }}">
                  </a>
                  <!-- ***** Menu Start ***** -->
                  <ul class="nav">
                     <li class="scroll-to-section"><a href="{{ url('') }}" class="@yield('homeActive')">Beranda -</a></li>
                     <li class="scroll-to-section"><a href="{{ url('about') }}"
                           class="@yield('profileActive')">Profil</a></li>
                     <li class="scroll-to-section"><a href="{{ url('program') }}"
                           class="@yield('programActive')">Program</a></li>
                     <li class="scroll-to-section"><a href="{{ url('gallery') }}"
                           class="@yield('galleryActive')">Galeri</a></li>
                     <!-- <li class="scroll-to-section"><a href="#" class="@yield('testimoniActive')">Testimoni</a></li> -->
                     <!-- <li class="scroll-to-section"><a href="#" class="@yield('eventActive')">Event</a></li> -->
                     <li class="scroll-to-section"><a href="{{ url ('news') }}" class="@yield('newsActive')">Berita</a>
                     </li>
                     <!-- <li class="scroll-to-section"><a href="#">Dukungan</a></li> -->
                     <li class="scroll-to-section"><a href="{{ url('contact') }}"
                           class="@yield('contactActive')">Kontak</a></li>
                  </ul>
                  <a class='menu-trigger'>
                     <span>Menu</span>
                  </a>
                  <!-- ***** Menu End ***** -->
               </nav>
            </div>
         </div>
      </div>
   </header>
   <!-- ***** Header Area End ***** -->

   <div class="container-main-content">
      @yield('content')
   </div>

   @yield('modal')

   <!-- ***** Footer Start ***** -->
   <footer data-stellar-background-ratio="0.5">
      <div class="container">
         <div class="row">

            <div class="col-md-5 col-sm-12">
               <div class="footer-thumb footer-info">
                  <a href="{{ url('') }}" class="logo">
                     <img src="{{ url('assets/front/images/logo.png') }}"
                        alt="{{ GetData::setting()->siteName['value'] }}">
                  </a>
                  <p style="padding: 10px;">Ayo dukung dan doakan saya untuk Indonesia yang lebih maju dengan memilih
                     saya untuk mewakili suara Anda di lembaga legislatif</p>
               </div>
            </div>

            <div class="col-md-3 col-sm-4">
               <div class="footer-thumb">
                  <h2></h2>
                  <ul class="footer-link">
                     <li><a href="#">Beranda</a></li>
                     <li><a href="#">Profil</a></li>
                     <li><a href="#">Program</a></li>
                     <li><a href="#">Galeri</a></li>
                     <li><a href="#">Testimoni</a></li>
                     <li><a href="#">Event</a></li>
                     <li><a href="#">Berita</a></li>
                     <li><a href="#">Dukungan</a></li>
                     <li><a href="#">Kontak</a></li>
                  </ul>
               </div>
            </div>

            <div class="col-md-4 col-sm-4">
               <div class="footer-thumb">
                  <h2>Hubungi Kami</h2>
                  <div class="phone-contact">
                     <p><span>(+66) 010-020-0340</span></p>
                     <p><span>sekretariat@lilianaspdmsi.com</span></p>
                  </div>
                  <ul class="social-icon">
                     <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                     <li><a href="#" class="fa fa-twitter"></a></li>
                     <li><a href="#" class="fa fa-instagram"></a></li>
                     <li><a href="#" class="fa fa-youtube"></a></li>
                  </ul>
               </div>
            </div>

            <div class="col-md-12 col-sm-12">
               <div class="footer-bottom">
                  <div class="col-12">
                     <div class="copyright-text">
                        <p>Copyright &copy; 2023 Liliana SPd, MSi. All rights reserved.</p>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </footer>

   <!-- jQuery -->
   <script src="{{ url('assets/front/js/jquery-2.1.0.min.js') }}"></script>

   <!-- Bootstrap -->
   <script src="{{ url('assets/front/js/popper.js') }}"></script>
   <script src="{{ url('assets/front/js/bootstrap.min.js') }}"></script>

   <!-- Plugins -->
   <script src="{{ url('assets/front/js/owl-carousel.js') }}"></script>
   <script src="{{ url('assets/front/js/scrollreveal.min.js') }}"></script>
   <script src="{{ url('assets/front/js/waypoints.min.js') }}"></script>
   <script src="{{ url('assets/front/js/jquery.counterup.min.js') }}"></script>
   <script src="{{ url('assets/front/js/imgfix.min.js') }}"></script>
   <script src="{{ url('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
   <script src="{{ url('assets/front/js/magnific-popup-options.js') }}"></script>

   <!-- Global Init -->
   <script src="{{ url('assets/front/js/custom.js') }}"></script>

   <!-- <script src="https://kit.fontawesome.com/d45e7e578e.js" crossorigin="anonymous"></script> -->
   <!-- <script src="{{ url('assets/js/jquery.min.js') }}"></script> -->
   <!-- <script src="{{ url('assets/js/jquery-migrate.min.js') }}"></script> -->

   <!-- <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ url('assets/vendor/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js') }}"></script>
   
   <script src="{{ url('assets/front/js/loadingoverlay.min.js') }}"></script>
   <script src="{{ url('assets/front/js/fresco.js') }}"></script>
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <script src="{{ url('assets/front/js/main.js?v=1.0.0') }}"></script> -->

   <script type="text/javascript">
   </script>
   @yield("js")
</body>

</html>