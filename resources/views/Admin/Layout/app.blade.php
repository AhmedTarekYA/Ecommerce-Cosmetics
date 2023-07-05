<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('Admin.Layout.assets.css')
    @include('Admin.Layout.loader.loaderCss')
</head>

<body data-sidebar="dark" data-layout-mode="light">

{{--<body data-layout="horizontal" data-topbar="dark">--}}

<div id="loader-overlay">
    <div class="loader"></div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- ========== Header Start ========== -->
    @include('Admin.Layout.inc.header')
    <!-- ========== Header End ========== -->


    <!-- ========== Main Sidebar Start ========== -->
    @include('Admin.Layout.inc.sidebar')
    <!-- ========== Main Sidebar End ========== -->


    <!-- Start right Content here -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="modal fade bs-example-modal-lg mainModal" id="mainModal" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" role="dialog" aria-labelledby="mainModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><span id="operationText"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modalBody">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{($setting->title) ?? 'لوحة التحكم'}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">لوحة التحكم</a></li>
                                    <li class="breadcrumb-item active">@yield('pageName')</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- start page content -->
                @yield('content')
                <!-- end page content -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('Admin.Layout.inc.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('Admin.Layout.inc.settingbar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
@include('Admin.Layout.assets.js')
</body>
</html>
