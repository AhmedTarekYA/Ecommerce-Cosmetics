@extends('Site.Layout.app')
@section('content')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{route('/')}}">الرئيسية</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">من نحن</li>
                        </ul>
                        <h1 class="title">تعرف علي متجرنا</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{asset('assets')}}/uploads/about.webp" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start About Area  -->
    <div class="axil-about-area about-style-1 axil-section-gap ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="about-thumbnail">
                        <div class="thumbnail">
                            <img src="{{getFile($setting->about_image)}}" alt="About Us">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <div class="about-content content-right">
                        <span class="title-highlighter highlighter-primary2"> <i class="far fa-shopping-basket"></i>هن المتجر</span>
                        {!! ($setting->about) ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area  -->

    @include('Site.Layout.Sections.why-us')


    @include('Site.Layout.Sections.subscribe')


@endsection
@section('site-js')
@endsection
