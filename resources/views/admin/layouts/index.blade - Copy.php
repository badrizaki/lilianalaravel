<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
   <title>{{ GetData::setting()->siteName['value'] }} :: @yield('title')</title>

   <meta name="description" content="{{ GetData::setting()->metaDesc['value'] }}" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/icon.png?v=1.1') }}">

   <!-- General CSS Files -->
   <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

   <!-- CSS Libraries -->

   <!-- Template CSS -->
   <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
   <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
   @yield('css')

   <!-- Start GA -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-94034622-3');
   </script>
   <!-- /END GA -->
</head>

<body>
   <br />
   <div class="container_16">
      @if (Session::has('message'))
      <div class="msgs success"><p>Content Saved</p></div>
      @endif
      @if ($errors->any())
      <div class="msgs error">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <div class="grid_16 header">
         <h1><img src="{{ url('assets/images/logo.png') }}" alt="{{ GetData::setting()->siteName['value'] }} - {{ Auth::user()->name }}" style="height:60px;"/></h1>
         <div class="userinfo">You are: <span style="color:#333">{{ Auth::user()->name }}</span></span></div>
         <div style="clear: both;"></div>
      </div>
      <div class="grid_16 menu">
         <ul class="menuf">
            @foreach (Config::get('menu.menu') as $keyMenu => $menu)
            @php
               $whiteList = \Config::get('menu.whiteList', []);
               $roleName = $keyMenu."-list";
            @endphp
            @if (in_array($roleName, $whiteList) || \Auth::user()->can($roleName))
            <li><a {{ ($menu['url'] != '') ? 'href='.url(''.$menu['url']) : '' }} title="{{ $menu['text'] }}" {{ ($mainPage == $keyMenu) ? 'class=act' : '' }}>{{ $menu['text'] }}</a></li>
            @endif
            @endforeach
            <li>
               <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Off</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
         </ul>
      </div>
      <br />
      <div class="grid_16 content"><br />
         <div class="grid_3">
            <div class="sections submenu2">
               <ul>
                  @foreach (Config::get('menu.menu.'.$mainPage.'.submenu') as $keySubMenu => $subMenu)

                     @php
                        $whiteList = \Config::get('menu.whiteList', []);
                        $roleName = isset($subMenu['route']) ? $subMenu['route'] : "";
                     @endphp
                     @if (in_array($roleName, $whiteList) || \Auth::user()->can($roleName) || $subMenu['type'] != "menu")
                        <!-- CHECK ROLE -->

                        @if ($subMenu['type'] == 'title')
                        <li><h2 class="subttl">{{ $subMenu['text'] }}</h2></li>
                        @endif
                        @if ($subMenu['type'] == 'divider')
                        <li><div class="hr"></div></li>
                        @endif
                        @if ($subMenu['type'] == 'menu')
                        <li><a {{ ($subMenu['url'] != '') ? 'href='.url(''.$subMenu['url']) : '' }} title="{{ $subMenu['text'] }}" class="@yield(''.$subMenu['page'])"><img src="{{ url('assets/icons/'.$subMenu['icon'].'.gif') }}" alt="Edit"  width="16" height="16" class="icon" />{{ $subMenu['text'] }}</a>&nbsp;</li>
                        @endif

                     @endif
                  @endforeach
               </ul>
               <span id="actmenu" class="m2"></span>
            </div>
            <br />
         </div>
         <!-- <div class="grid_12"> -->
            @yield('content')
         <!-- </div> -->
      </div>
      <div class="clear">&nbsp;</div>
      <br />
   </div><br />
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="{{ url('includes/js/jquery-1.11.0.min.js"><\/script>') }}"')</script>
   <script>
      var publicUrl = '{{ url('') }}';
   </script>

   <script src="{{ url('includes/js/jquery-3.2.1.min.js') }}"></script>
   <script src="{{ url('includes/js/jquery-migrate-3.0.1.js') }}"></script>

   <script type="text/javascript" src="{{ url('includes/js/cms.plugins.js') }}"></script>
   <script type="text/javascript" src="{{ url('includes/js/cms.main.js') }}"></script>
   <script type="text/javascript" src="{{ url('includes/tiny_mce/jquery.tinymce.js') }}"></script>
   <script type="text/javascript" src="{{ url('includes/tiny_mce/init.tinymce.full.js') }}"></script>
   <script type="text/javascript" src="{{ url('includes/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php') }}"></script>

   <script type="text/javascript" src="{{ url('includes/js/be.main.js') }}"></script>
   <script type="text/javascript" src="{{ url('includes/js/jquery.maskMoney.js') }}"></script>
   <script>
      function deleteImage(id)
      {
         $('#delete' + id).val("HAPUS");
         $('#image' + id).hide();
         $('#' + id).val("");
      }

      function addFile(id) {
         $('#delete' + id).val("");
      }

      $(".currency").maskMoney({ prefix:'Rp ', allowNegative: false, thousands:'.', decimal:',', affixesStay: true, precision:0 });
      $(".number").maskMoney({ allowNegative: false, thousands:'.', decimal:',', affixesStay: true, precision:0 });
   </script>
   @yield('js')
</body>
</html>