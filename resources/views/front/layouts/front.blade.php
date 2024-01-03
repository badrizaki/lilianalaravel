<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>{{ GetData::setting()->siteName['value'] }} - @yield('title')</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="{{ GetData::setting()->metaKeywords['value'] }}" name="keywords">
   <meta content="{{ GetData::setting()->metaDesc['value'] }}" name="description">
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
                     <li class="scroll-to-section"><a href="{{ url('') }}" class="@yield('homeActive')">Beranda</a></li>
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

   @yield('content')

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
                  <p style="padding: 10px;">{!! GetData::textBank()->topContent['contentInd'] !!}</p>
               </div>
            </div>

            <div class="col-md-3 col-sm-4">
               <div class="footer-thumb">
                  <h2></h2>
                  <ul class="footer-link">
                     <li><a href="{{ url('') }}" class="@yield('homeActive')">Beranda</a></li>
                     <li><a href="{{ url('about') }}" class="@yield('profileActive')">Profil</a></li>
                     <li><a href="{{ url('program') }}" class="@yield('programActive')">Program</a></li>
                     <li><a href="{{ url('gallery') }}" class="@yield('galleryActive')">Galeri</a></li>
                     <!-- <li><a href="#" class="@yield('testimoniActive')">Testimoni</a></li> -->
                     <!-- <li><a href="#" class="@yield('eventActive')">Event</a></li> -->
                     <li><a href="{{ url ('news') }}" class="@yield('newsActive')">Berita</a></li>
                     <!-- <li><a href="#">Dukungan</a></li> -->
                     <li><a href="{{ url('contact') }}" class="@yield('contactActive')">Kontak</a></li>
                  </ul>
               </div>
            </div>

            <div class="col-md-4 col-sm-4">
               <div class="footer-thumb">
                  <h2>Hubungi Kami</h2>
                  <div class="phone-contact">
                     <p><span>{{ GetData::setting()->phoneNumber1['value'] }}</span></p>
                     <p><span>{{ GetData::setting()->contactEmail['value'] }}</span></p>
                  </div>
                  <ul class="social-icon">
                     @if(GetData::setting()->facebook['value'] != null && GetData::setting()->facebook['value'] != "")
                     <li><a href="{{ GetData::setting()->facebook['value'] }}" class="fa fa-facebook-square"
                           attr="facebook icon" target="_blank"></a></li>
                     @endif

                     @if(GetData::setting()->linkedin['value'] != null && GetData::setting()->linkedin['value'] != "")
                     <li><a href="{{ GetData::setting()->linkedin['value'] }}" class="fa fa-linkedin"
                           target="_blank"></a></li>
                     @endif

                     @if(GetData::setting()->instagram['value'] != null && GetData::setting()->instagram['value'] != "")
                     <li><a href="{{ GetData::setting()->instagram['value'] }}" class="fa fa-instagram"
                           target="_blank"></a></li>
                     @endif

                     @if(GetData::setting()->youtube['value'] != null && GetData::setting()->youtube['value'] != "")
                     <li><a href="{{ GetData::setting()->youtube['value'] }}" class="fa fa-youtube" target="_blank"></a>
                     </li>
                     @endif

                     @if(GetData::setting()->tiktok['value'] != null && GetData::setting()->tiktok['value'] != "")
                     <li><a href="{{ GetData::setting()->tiktok['value'] }}" class="fa fa-tiktok" target="_blank">
                           <!-- <img src="assets/front/images/tiktok.svg"/> -->
                           <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                              viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                              <path opacity="1" fill="#FFFFFF"
                                 d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                           </svg>
                        </a></li>
                     @endif
                  </ul>
               </div>
            </div>

            <div class="col-md-12 col-sm-12">
               <div class="footer-bottom">
                  <div class="col-12">
                     <div class="copyright-text">
                        <p>Copyright &copy; 2023 {{ GetData::setting()->siteName['value'] }}. All rights reserved.</p>
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
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q4EX0H2GYF"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());

      gtag('config', 'G-Q4EX0H2GYF');
   </script>

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