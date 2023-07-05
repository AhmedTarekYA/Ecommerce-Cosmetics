<footer class="axil-footer-area footer-style-2">
    <!-- Start Footer Top Area  -->
    <div class="footer-top separator-top">
        <div class="container">
            <div class="row">
{{--                <!-- Start Single Widget  -->--}}
                <div class="col-lg-9 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">الدعم والتواصل</h5>
                        <!-- <div class="logo mb--30">
                            <a href="index.html">
                                <img class="light-logo" src="{{asset('assets/site')}}/images/logo/logo.png" alt="Logo Images">
                            </a>
                        </div> -->
                        <div class="inner">
                            <ul class="support-list-item">
                                <li><a href="mailto:{{$setting->gmail}}"><i class="fal fa-envelope-open"></i> {{$setting->gmail}}</a></li>
                                <li><a href="tel:{{$setting->phone}}"><i class="fal fa-phone-alt"></i>{{$setting->phone}}</a></li>
                                <li><a href="sms:{{$setting->phone}}?&body=مستخدم من الموقع'"><i class="fal fa-comment"></i>{{$setting->phone}}</a></li>
                                <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
{{--                <!-- End Single Widget  -->--}}
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">وصول سريع</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="{{route('/')}}">الرئيسية</a></li>
                                <li><a href="{{route('contactUs')}}">تواصل معنا</a></li>
                                <li><a href="{{route('/')}}">المنتجات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
{{--                <!-- Start Single Widget  -->--}}
{{--                <div class="col-lg-6 col-sm-6">--}}
{{--                    <div class="axil-footer-widget">--}}
{{--                        <h5 class="widget-title">Download App</h5>--}}
{{--                        <div class="inner">--}}
{{--                            <span>Save $3 With App & New User only</span>--}}
{{--                            <div class="download-btn-group">--}}
{{--                                <div class="qr-code">--}}
{{--                                    <img src="{{asset('assets/site')}}/images/others/qr.png" alt="Axilthemes">--}}
{{--                                </div>--}}
{{--                                <div class="app-link">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/others/app-store.png" alt="App Store">--}}
{{--                                    </a>--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/others/play-store.png" alt="Play Store">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End Single Widget  -->--}}
            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="social-share">
                        <a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="mailto:{{$setting->gmail}}"><i class="fab fa-google"></i></a>
                        <a href="tel:{{$setting->phone}}"><i class="fal fa-phone-alt"></i></a>
                        <a href="sms:{{$setting->phone}}?&body=مستخدم من الموقع'"><i class="fal fa-comment"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="copyright-left d-flex flex-wrap justify-content-center">
                        <ul class="quick-link">
                            <li>
                                حقوق النشر © 2023 جميع الحقوق محفوظة
                                <a href="https://rynprogramming.com/" target="_blank">RYN.Tech ❤️</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>

