

<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{($setting->title) ?? 'Dashboard'}} | @yield('title') </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('assets/admin')}}/images/favicon.ico">

<!-- DataTables -->
<link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="{{asset('assets/admin')}}/css/bootstrap-rtl.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('assets/admin')}}/css/icons.min.css" rel="stylesheet" type="text/css" />

<!-- Dropify Css -->
<link href="{{asset('assets/main')}}/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

<!-- Sweet Alert-->
<link href="{{asset('assets/admin')}}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- Toastr Css -->
<link href="{{asset('assets/main')}}/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

<!-- App Css-->
<link href="{{asset('assets/admin')}}/css/app-rtl.min.css" id="app-style" rel="stylesheet" type="text/css" />

@yield('dashboard-css')
