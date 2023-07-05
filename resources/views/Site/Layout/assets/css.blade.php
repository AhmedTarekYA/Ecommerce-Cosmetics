
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>ِ{{($setting->title) ?? "Aya's Cosmetics"}}</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site')}}/images/favicon.png">

<!-- CSS
============================================ -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/bootstrap.rtl.min.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/font-awesome.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/flaticon/flaticon.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/slick.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/slick-theme.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/jquery-ui.min.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/sal.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/magnific-popup.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/vendor/base.css">
<link rel="stylesheet" href="{{asset('assets/site')}}/css/style.min.css">
<!-- Toastr Css -->
<link href="{{asset('assets/main')}}/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

<!-- Dropify Css -->
<link href="{{asset('assets/main')}}/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

<style>
    .toast-message{
        font-size: 15px;
    }
</style>
@yield('site-css')
