<!doctype html>
<html lang="zxx">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="{{$aplikasi->singkatan}}" />
	<meta name="description" content="{{$aplikasi->singkatan.' '.$aplikasi->daerah}} - @yield('title')" />
	<link rel="canonical" href="{{url()->full()}}" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="@yield('title')" />
	<meta property="og:description" content="{{$aplikasi->singkatan.' '.$aplikasi->daerah}} - @yield('title')" />
	<meta property="og:url" content="{{url()->full()}}" />
	<meta property="og:site_name" content="{{$aplikasi->singkatan.' '.$aplikasi->daerah}} - @yield('title')" />
	<meta property="article:modified_time" content="{{date('Y-m-d H:i:s')}}" />
	<meta property="og:image" content="@yield('img')" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:label1" content="Est. reading time" />
	<meta name="twitter:data1" content="3 minutes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/boxicon.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/fonts/flaticon/flaticon.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/meanmenu.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/dark.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/nice-select.css') }}">

@if($aplikasi->file_favicon)
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($aplikasi->file_favicon->url_stream)??'' }}">
	<title>@yield('title') | {{$aplikasi->singkatan.' '.$aplikasi->daerah}}</title>
@endif
@stack('css')
</head>
<body>
		@include('layouts.frontend.header')
		@yield('content')
		@include('layouts.frontend.footer')

	<div class="copyright-text text-center">
        <p>© {{$aplikasi->singkatan.' '.$aplikasi->daerah}} Owned by <a href="https://diskominfotik.bengkaliskab.go.id/" target="_blank">Diskominfotik</a></p>
    </div>

    <div class="top-btn">
        <i class='bx bx-chevrons-up bx-fade-up'></i>
    </div>

    <script src="{{ URL::asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/form-validator.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/contact-form-script.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/meanmenu.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/custom.js') }}"></script>
	@stack('js')
	

</body>
</html>