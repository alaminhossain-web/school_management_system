<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{ isset($setting->favicon_image) ? asset($setting->favicon_image) : asset('admin/assets/images/brand/favicon.ico') }}" />
<!-- BOOTSTRAP CSS -->
<link id="style" href="{{ asset('/') }}admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- STYLE CSS -->
<link href="{{ asset('/') }}admin/assets/css/style.css" rel="stylesheet" />
<link href="{{ asset('/') }}admin/assets/css/skin-modes.css" rel="stylesheet" />
<!--- FONT-ICONS CSS -->
<link href="{{ asset('/') }}admin/assets/plugins/icons/icons.css" rel="stylesheet" />
<!-- INTERNAL Switcher css -->
<link href="{{ asset('/') }}admin/assets/switcher/css/switcher.css" rel="stylesheet">
<link href="{{ asset('/') }}admin/assets/switcher/demo.css" rel="stylesheet">
<!-- Toster css -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


@stack('css')