<?php $baseUrl = "{{URL::to('/')}}";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Area</title>
    <link rel="stylesheet" href="{{URL::to('src/css/pages/login/login-1.css')}}">
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
    <!-- header mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    	<div class="kt-header-mobile__logo">
    		<a href="index.html">
    			<img alt="Logo" src="{{URL::to('/')}}/src/media/logos/logo-light.png">
    		</a>
    	</div>
    	<div class="kt-header-mobile__toolbar">
    					<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>

    					<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>

    		<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    	</div>
    </div>
    <!-- main wrapper -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
		 <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      @include('includes.sidenav')
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        @include('includes.admin-header')
        @yield('content')
      </div>
     </div>
    </div>
    <script src="{{URL::to('src/plugins/global/plugins.bundle.js')}}" charset="utf-8"></script>
    <script src="{{URL::to('src/js/scripts.bundle.js')}}" charset="utf-8"></script>
    <script type="text/javascript">
      var baseUrl = "{{URL::to('/')}}";
    </script>
    @yield('scripts')
  </body>
</html>
