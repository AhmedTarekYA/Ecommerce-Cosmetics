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
                            <li class="axil-breadcrumb-item active" aria-current="page">تواصل</li>
                        </ul>
                        <h1 class="title">تواصل معنا</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{asset('assets')}}/uploads/contact.gif" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Contact Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <div class="row row--30">
                    <div class="col-lg-3">
                        <!-- Start Sidebar Area  -->
                        <aside class="axil-sidebar-area">
                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget mt--40">
                                <h6 class="widget-title">رائج الان</h6>
                                <ul class="product_list_widget recent-viewed-product">
                                    @foreach($latestProducts as $pro)
                                        <!-- Start Single product_list  -->
                                        <li>
                                            <div class="thumbnail">
                                                <a href="{{route('productDetails',$pro->title)}}">
                                                    <img style="width: 100px;height: 100px;border-radius: 50%" src="{{getFile($pro->image)}}" alt="{{$pro->title}}">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="{{route('productDetails',$pro->title)}}">{{\Illuminate\Support\Str::limit($pro->title,20)}}</a></h6>
                                                <div class="product-meta-content">
{{--                                                    <span class="woocommerce-Price-amount amount">--}}
{{--                            <del>$30</del>--}}
{{--                            $20--}}
{{--                        </span>--}}
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single product_list  -->
                                    @endforeach

                                </ul>

                            </div>
                            <!-- End Single Widget  -->

{{--                            <!-- Start Single Widget  -->--}}
{{--                            <div class="axil-single-widget mt--40 widget_archive">--}}
{{--                                <h6 class="widget-title">Archives List</h6>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">January 2020</a></li>--}}
{{--                                    <li><a href="#">February 2020</a></li>--}}
{{--                                    <li><a href="#">March 2020</a></li>--}}
{{--                                    <li><a href="#">April 2020</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <!-- End Single Widget  -->--}}
                        </aside>
                        <!-- End Sidebar Area -->
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <h3 class="title mb--10">نقدر نساعدك ازاي ؟</h3>
                            <p>سيبلنا رسالتك او استفسارك وهنرد عليك في اسرع وقت. </p>
                            <form class="axil-contact-form" action="{{route('postContactUs')}}" method="POST" id="contactForm">
                                @csrf
                                <div class="row row--10">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">الاسم بالكامل <span>*</span></label>
                                            <input type="text" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone">الهاتف <span>*</span></label>
                                            <input type="text" name="phone" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">البريد الالكتروني <span>*</span></label>
                                            <input type="email" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="subject">الموضوع <span>*</span></label>
                                            <input type="text" name="subject" id="subject">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">رسالتك</label>
                                            <textarea name="message" id="message" cols="1" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb--0">
                                            <button  type="submit" id="sendBtn" class="axil-btn btn-bg-primary">ارسال <i class='fa fa-paper-plane'></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="d-flex flex-wrap align-content-start h-100">
                            <div class="position-sticky sticky-top">
                                <div class="post-details__social-share">
                                    <span class="share-on-text">تواصل</span>
                                    <div class="social-share">
                                        <a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                        <a href="mailto:{{$setting->gmail}}"><i class="fab fa-google"></i></a>
                                        <a href="tel:{{$setting->phone}}"><i class="fal fa-phone-alt"></i></a>
                                        <a href="sms:{{$setting->phone}}?&body=مستخدم من الموقع'"><i class="fal fa-comment"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <!-- Start Google Map Area  -->--}}
{{--            <div class="axil-google-map-wrap axil-section-gap pb--0">--}}
{{--                <div class="mapouter">--}}
{{--                    <div class="gmap_canvas">--}}
{{--                        <iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=melbourne&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Google Map Area  -->--}}
        </div>
    </div>
    <!-- End Contact Area  -->
@endsection
@section('site-js')
    <script>
        $("form#contactForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#contactForm').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#sendBtn').html('<span style="margin-right: 4px;color: white"> انتظر.. </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
                },
                complete: function(){


                },
                success: function (data) {
                    if (data.status == 200){
                        toastr.success('شكرا لتواصلك معنا , سنقوم بالرد عليك في اسرع وقت');
                        $('#contactForm')[0].reset();
                        $('#sendBtn').html("ارسال <i class='fa fa-paper-plane'></i> ").attr('disabled', false);
                    }else {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                },
                error: function (data) {
                    if (data.status == 500) {
                        $('#sendBtn').html("ارسال <i class='fa fa-paper-plane'></i>").attr('disabled', false);
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                    else if (data.status == 422) {
                        $('#sendBtn').html("ارسال <i class='fa fa-paper-plane'></i>").attr('disabled', false);
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
@endsection
