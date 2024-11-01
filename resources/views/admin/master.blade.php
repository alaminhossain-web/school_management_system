<!doctype html>
<html lang="en" dir="ltr"> 
<head>
		<!-- META DATA -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Noa - Laravel Bootstrap 5 Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="laravel admin template, bootstrap admin template, admin dashboard template, admin dashboard, admin template, admin, bootstrap 5, laravel admin, laravel admin dashboard template, laravel ui template, laravel admin panel, admin panel, laravel admin dashboard, laravel template, admin ui dashboard">

        <!-- TITLE -->
		<title>{{ isset($setting->site_title) ? $setting->site_title : 'School Management System'}} - @yield('title') </title>

        @include('admin.includes.assets.css')

    </head>

    <body class="ltr app sidebar-mini">

        <!-- Switcher-->
        <!-- Switcher -->
        @include('admin.includes.switcher')
        <!-- End Switcher -->
        <!-- Switcher-->

        <!-- GLOBAL-LOADER -->
		{{-- <div id="global-loader">
			<img src="{{ asset('/') }}admin/assets/images/loader.svg" class="loader-img" alt="Loader">
		</div> --}}
		<!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
		<div class="page">
			<div class="page-main">

            <!-- app-Header -->
            @include('admin.includes.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('admin.includes.menu')
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">   
                            @yield('body') 
                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
             </div>

        
            <!-- FOOTER -->
           @include('admin.includes.footer')
            <!-- FOOTER CLOSED -->

        </div>
        <!-- page -->

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        @include('admin.includes.assets.js')
    </body>
</html>
