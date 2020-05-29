<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('src/css/pages/login/login-1.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/pages/login/login-4.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/plugins/global/plugins.bundle.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/style.bundle.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/skins/header/base/light.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/skins/header/menu/light.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/skins/brand/dark.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/skins/aside/dark.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/media/logos/favicon.ico')}}">
    @yield('styles')
  </head>
  <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    @include('includes.header')
      @yield('content')
    @include('includes.footer')

    <script type="text/javascript">
      var baseUrl = "{{URL::to('/')}}";
    </script>
    <script src="{{URL::to('src/plugins/global/plugins.bundle.js')}}" charset="utf-8"></script>
    <script src="{{URL::to('src/js/scripts.bundle.js')}}" charset="utf-8"></script>
    <script src="{{URL::to('src/js/pages/custom/login/login-general.js')}}" charset="utf-8"></script>
    @yield('scripts')
  </body>
</html>
