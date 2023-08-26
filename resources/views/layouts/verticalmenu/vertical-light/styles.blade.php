		<!-- Favicon -->
		<link rel="icon" 
		href="{{ !empty(web_setting()->logo_favicon) && CheckFileInServer(web_setting()->logo_favicon) ? web_setting()->logo_favicon : URL::asset('assets\images\icon\favicon.ico') }}"
      type="image/x-icon" />
	  <link rel="shortcut icon" type="image/x-icon"
      href="{{ !empty(web_setting()->logo_favicon) && CheckFileInServer(web_setting()->logo_favicon) ? web_setting()->logo_favicon : URL::asset('assets\images\icon\favicon.ico') }}" />

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

		<!-- Dashboard css -->
		<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/css/dark-style.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/css/skin-mode.css')}}" rel="stylesheet" />

		<!-- Perfect scroll bar css-->
		<link href="{{URL::asset('assets/plugins/pscrollbar/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!-- Sidemenu css -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu-icon.css')}}">

		<!--Daterangepicker css-->
		<link href="{{URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

		<!-- Sidebar Accordions css -->
		<link href="{{URL::asset('assets/css/easy-responsive-tabs.css')}}" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!--News ticker css -->
		<link href="{{URL::asset('assets/plugins/newsticker/breaking-news-ticker.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{URL::asset('assets/plugins/icons/icons.css')}}" rel="stylesheet" />

		@yield('styles')

		<!--Fonts-->
		<link id="font" rel="stylesheet" type="text/css" media="all" href="{{URL::asset('assets/css/fonts/font1.css')}}"/>

		<!-- Color-skins css -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{URL::asset('assets/css/colors/color.css')}}" />

		<!-- MWZ overwrite css -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{URL::asset('assets/css/mwz.css')}}" />