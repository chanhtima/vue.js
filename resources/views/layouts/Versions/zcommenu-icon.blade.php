<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<?php
		$title = isset(web_setting()->meta_title_th) ? web_setting()->meta_title_th : null;
		$keywords = isset(web_setting()->meta_keywords_th) ? web_setting()->meta_keywords_th : null;
		$description = isset(web_setting()->meta_description_th) ? web_setting()->meta_description_th : null;
		?>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="MWZ - Netdesign Host" name="description">
		<meta content="MWZ - Netdesign Host" name="author">
		<meta property="og:image"
        content="{{ !empty(web_setting()->seo_image) && CheckFileInServer(web_setting()->seo_image) ? web_setting()->seo_image : URL::asset('modules/frontend/img/logo.png') }}" />
		<meta name="keywords" content="{{ $keywords }}"/>

		<!-- Title -->
		<title>{{ $title }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
        @include('layouts.verticalmenu.vertical-light.styles')

	</head>

	<body class="app sidebar-mini">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="{{URL::asset('assets/images/brand/icon.png')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				<!--app-header-->
				<div class="app-header header d-flex">
					<div class="container-fluid">

						@include('layouts.components.zcomapp-header')

					</div>
				</div>
				<!--/app-header-->

				<!--News Ticker-->
				<!-- <div class="container-fluid bg-white news-ticker">

					@include('layouts.components.news-ticket')

				</div> -->
				<!--/News Ticker-->

                @include('layouts.components.zcomsidebar-menu')

                <!-- app-content-->
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">

                        @yield('content')

					</div>


					@yield('modals')

				</div>
				<!-- End app-content-->
			</div>

            @include('layouts.components.zcomfooter')

		</div>
		<!-- End Page -->
		
		<!-- vertical-light.scripts -->
        @include('layouts.verticalmenu.vertical-light.scripts')

	</body>
</html>
