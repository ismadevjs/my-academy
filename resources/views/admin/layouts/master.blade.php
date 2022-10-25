<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>admin</title>
    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">
    <link rel="stylesheet" id="css-theme" href="{{asset('assets/css/themes/xpro.min.css')}}">
  </head>
  <body>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow sidebar-dark page-header-dark dark-mode">
      @include('admin.includes.sidebar')
      <header id="page-header">
        <div class="content-header">
           {{-- hna tji kach afssa f header  --}}
          <div>
          </div>
          <div>
            <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-fw fa-search"></i>
            </button>
          </div>
        </div>
        <div id="page-header-search" class="overlay-header bg-primary">
          <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
              <div class="input-group">
                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
            </div>
          </div>
        </div>
      </header>
      <main id="main-container">
            @include('admin.includes.breadcumps')
        <div class="content">
            @yield('content')
        </div>
      </main>
      @include('admin.includes.footer')
    </div>
    <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/be_pages_dashboard_v1.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script>
      @if(count($errors) > 0)
          @foreach($errors->all() as $error)
             Dashmix.helpers('jq-notify', {from: 'bottom', align: 'left', message: '{{$error}}'});
          @endforeach
      @endif
  </script>
    <script>Dashmix.helpersOnLoad(['jq-sparkline']);</script>
    @stack('scripts')
  </body>
</html>
