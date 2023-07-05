@extends('Site.Layout.app')
@section('content')
        @if($sliders->count())
    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-2 main-slider-style-8">
        <div class="container">
            <div class="slider">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">
                                @foreach($sliders as $slider)
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-badge-percent"></i>{{$slider->sub_title}}</span>
                                        <h1 class="title">{{$slider->title}}</h1>
                                        <div class="shop-btn">
                                            <a href="{{route('productPage')}}" class="axil-btn"><i class="fal fa-shopping-cart"></i>عرض المنتجات</a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="{{getFile($slider->image)}}" alt="Product">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
    <!-- End Slider Area -->
{{--    @if($sliders->count())--}}
{{--    <div class="axil-main-slider-area main-slider-style-1">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-5 col-sm-6">--}}
{{--                    <div class="main-slider-content">--}}
{{--                        <div class="slider-content-activation-one">--}}
{{--                            @foreach($sliders as $slider)--}}
{{--                                <div class="single-slide slick-slide" {{($loop->first) ? 'data-sal="slide-up" data-sal-delay="400" data-sal-duration="800"' : ''}}>--}}
{{--                                    <span class="subtitle"><i class="fas fa-fire"></i>{{$slider->sub_title}}</span>--}}
{{--                                    <h1 class="title">{{$slider->title}}</h1>--}}
{{--                                    <div class="slide-action">--}}
{{--                                        <div class="shop-btn">--}}
{{--                                            <a href="{{route('productPage')}}" class="axil-btn btn-bg-white"><i class="fal fa-shopping-cart"></i>عرض المنتجات</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-7 col-sm-6">--}}
{{--                    <div class="main-slider-large-thumb">--}}
{{--                        <div class="slider-thumb-activation-one axil-slick-dots mt--20">--}}
{{--                            @foreach($sliders as $slider)--}}
{{--                            <div class="single-slide slick-slide" {{($loop->first || $loop->iteration == 2) ? 'data-sal="slide-up" data-sal-delay="600" data-sal-duration="1500"' : ''}}>--}}
{{--                                <img src="{{getFile($slider->image)}}" alt="Product">--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="shape-group">--}}
{{--            <li class="shape-1"><img src="{{asset('assets/site')}}/images/others/shape-1.png" alt="Shape"></li>--}}
{{--            <li class="shape-2"><img src="{{asset('assets/site')}}/images/others/shape-2.png" alt="Shape"></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    @endif--}}

    <!-- Start Categorie Area  -->

    <!-- Poster Countdown Area  -->
{{--    <div class="axil-poster-countdown">--}}
{{--        <div class="container">--}}
{{--            <div class="poster-countdown-wrap bg-lighter">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-5 col-lg-6">--}}
{{--                        <div class="poster-countdown-content">--}}
{{--                            <div class="section-title-wrapper">--}}
{{--                                <span class="title-highlighter highlighter-secondary"> <i class="fal fa-headphones-alt"></i> Don’t Miss!!</span>--}}
{{--                                <h2 class="title">Enhance Your Music Experience</h2>--}}
{{--                            </div>--}}
{{--                            <div class="poster-countdown countdown mb--40"></div>--}}
{{--                            <a href="#" class="axil-btn btn-bg-primary">Check it Out!</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-7 col-lg-6">--}}
{{--                        <div class="poster-countdown-thumbnail">--}}
{{--                            <img src="{{asset('assets/site')}}/images/product/poster/poster-03.png" alt="Poster Product">--}}
{{--                            <div class="music-singnal">--}}
{{--                                <div class="item-circle circle-1"></div>--}}
{{--                                <div class="item-circle circle-2"></div>--}}
{{--                                <div class="item-circle circle-3"></div>--}}
{{--                                <div class="item-circle circle-4"></div>--}}
{{--                                <div class="item-circle circle-5"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End Poster Countdown Area  -->--}}

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper" style="margin-bottom: 10px">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> منتجاتنا</span>
                <h2 class="title" style="margin-bottom: 0px">استكشف منتجاتنا</h2>
            </div>
            @if($categories->count())
                    <div class="categrie-product-activation-3 slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        @foreach($categories as $category)
                            <div class="slick-single-layout slick-slide">
                                <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                    <a href="#">
                                        <img class="img-fluid" src="{{getFile($category->image)}}" style="width: 64px;height: 64px;" alt="product categorie">
                                        <h6 class="cat-title">{{$category->title}}</h6>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
            @endif
            <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        @foreach($products as $product)
                            <!-- Start Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="{{route('productDetails',$product->title)}}">
                                            <img  style="height: 300px;width: 100%" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{getFile($product->image)}}" alt="Product Images">
                                           @if(count($product->images))
                                                <img style="height: 300px;width: 100%" class="hover-img" src="{{getFile($product->images[0]->image)}}" alt="Product Images">
                                           @else
                                            <img style="height: 300px;width: 100%" class="hover-img" src="{{getFile($product->image)}}" alt="Product Images">
                                            @endif
                                        </a>
                                        @if($product->price_after && $product->price_after != 0)
                                                <?php
                                                $discountPercent = (($product->price_before - $product->price_after) / $product->price_before) * 100;
                                                ?>
                                            <div class="label-block label-right">
                                                <div class="product-badget">خصم {{round($discountPercent,0)}} %  </div>
                                            </div>

                                        @endif

                                        <div class="product-hover-action">
                                            <ul class="cart-action">
{{--                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
                                                <li class="wishlist add-to-cart" data-id="{{$product->id}}"><a href="javascript:void(0)"><i class="far fa-shopping-cart" title="اضف للسلة"></i></a></li>
                                                <li class="select-option">
                                                    <a href="{{route('productDetails',$product->title)}}">
                                                        عرض التفاصيل
                                                    </a>
                                                </li>
                                                <li class="wishlist add-to-wishlist" data-id="{{$product->id}}">
                                                    <a href="javascript:void(0)" title="اضف للمفضلة">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="product-rating">
                                                <span class="icon">
                                                       @for ($i = 1; $i <= $product->stars; $i++)
                                                        <i class='fas fa-star text-warning'></i>
                                                    @endfor
                                                    @for ($i = 5; $i > $product->stars; $i--)
                                                        <i class='fal fa-star text-warning'></i>
                                                    @endfor
                                        </span>
                                                <span class="rating-number">({{$product->reviews_num}})</span>
                                            </div>
                                            <h5 class="title"><a href="{{route('productDetails',$product->title)}}  ">{{\Illuminate\Support\Str::limit($product->title,35)}}</a></h5>
                                            <div class="product-price-variant">
                                                @if($product->price_after && $product->price_after != 0)
                                                    <span class="price old-price">{{$product->price_before}} ج م</span>
                                                <b>{{$product->price_after}} ج م</b></h5>
                                                @else
                                                    <b>{{$product->price_before}} ج م</b></h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                        @endforeach
                    </div>
                </div>
                <!-- End .slick-single-layout -->
{{--                <div class="slick-single-layout">--}}
{{--                    <div class="row row--15">--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-01.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="label-block label-right">--}}
{{--                                        <div class="product-badget">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">Yantiti Leather & Canvas Bags</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-02.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-03.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="label-block label-right">--}}
{{--                                        <div class="product-badget">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-04.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-05.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="label-block label-right">--}}
{{--                                        <div class="product-badget">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-06.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="label-block label-right">--}}
{{--                                        <div class="product-badget">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-07.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="label-block label-right">--}}
{{--                                        <div class="product-badget">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}
{{--                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">--}}
{{--                            <div class="axil-product product-style-one">--}}
{{--                                <div class="thumbnail">--}}
{{--                                    <a href="single-product.html">--}}
{{--                                        <img src="{{asset('assets/site')}}/images/product/electric/product-08.png" alt="Product Images">--}}
{{--                                    </a>--}}
{{--                                    <div class="label-block label-right">--}}
{{--                                        <div class="product-badget">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-hover-action">--}}
{{--                                        <ul class="cart-action">--}}
{{--                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>--}}
{{--                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>--}}
{{--                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="product-content">--}}
{{--                                    <div class="inner">--}}
{{--                                        <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>--}}
{{--                                        <div class="product-price-variant">--}}
{{--                                            <span class="price current-price">$29.99</span>--}}
{{--                                            <span class="price old-price">$49.99</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Product  -->--}}

{{--                    </div>--}}
{{--                </div>--}}
                <!-- End .slick-single-layout -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="{{route('productPage')}}" class="axil-btn btn-bg-lighter btn-load-more">كل المنتجات</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Expolre Product Area  -->

    @if($reviews->count())

    <!-- Start Testimonila Area  -->
    <div class="axil-testimoial-area axil-section-gap bg-vista-white">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="fal fa-quote-left"></i>مراجعات</span>
                <h2 class="title">اراء عملائنا</h2>
            </div>
            <!-- End .section-title -->
            <div class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                @foreach($reviews as $rev)
                    <!-- Start .slick-single-layout -->
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>“{{$rev->desc}}“</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{getUserImage($rev->image)}}" alt="testimonial image">
                            </div>
                            <div class="media-body">
{{--                                <span class="designation">Head Of Idea</span>--}}
                                <h6 class="title">{{$rev->name}}</h6>
                            </div>
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                    <!-- End .slick-single-layout -->
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Testimonila Area  -->
    @endif


    @if($latestProducts->count())
        <!-- Start New Arrivals Product Area  -->
    <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>اجدد منتجاتنا</span>
                    <h2 class="title">وصل حديثا</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                    @foreach($latestProducts as $pro)
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-two">
                                <div class="thumbnail">
                                    <a href="{{route('productDetails',$pro->title)}}">
                                        <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500" src="{{getFile($pro->image)}}" alt="Product Images">
                                    </a>
                                    @if($pro->price_after && $pro->price_after != 0)
                                            <?php
                                            $discountPercent = (($pro->price_before - $pro->price_after) / $pro->price_before) * 100;
                                            ?>
                                        <div class="label-block label-right">
                                            <div class="product-badget">{{round($discountPercent,0)}} % </div>
                                        </div>
                                    @endif

                                </div>
                                <div class="product-content">
                                    <div class="inner">
{{--                                        <div class="color-variant-wrapper">--}}
{{--                                            <ul class="color-variant">--}}
{{--                                                <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                                <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                        <h5 class="title"><a href="{{route('productDetails',$pro->title)}}">{{$pro->title}}</a></h5>
                                        <div class="product-price-variant">
                                            @if($pro->price_after && $pro->price_after != 0)
                                                <span class="price old-price">{{$pro->price_before}} ج م</span>
                                                <b>{{$pro->price_after}} ج م</b></h5>
                                            @else
                                                <b>{{$pro->price_before}} ج م</b></h5>
                                            @endif
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist add-to-cart" data-id="{{$pro->id}}"><a href="javascript:void(0)"><i class="far fa-shopping-cart" title="اضف للسلة"></i></a></li>
                                                <li class="select-option">
                                                    <a href="{{route('productDetails',$pro->title)}}">
                                                        عرض التفاصيل
                                                    </a>
                                                </li>
                                                <li class="wishlist add-to-wishlist" data-id="{{$pro->id}}">
                                                    <a href="javascript:void(0)" title="اضف للمفضلة">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End New Arrivals Product Area  -->
    @endif

    @if($highestProducts->count())
        <!-- Start Most Sold Product Area  -->
    <div class="axil-most-sold-product axil-section-gap">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i> الأعلي تقييما</span>
                    <h2 class="title">منتجات حازت علي اعجاب عملائنا</h2>
                </div>
                <div class="row row-cols-xl-2 row-cols-1 row--15">
                    @foreach($highestProducts as $pro)
                        <div class="col">
                            <div class="axil-product-list">
                                <div class="thumbnail">
                                    <a href="{{route('productDetails',$pro->title)}}">
                                        <img style="height: 120px;width: 120px" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500" src="{{getFile($pro->image)}}" alt="{{$pro->title}}">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <span class="rating-icon">
                                       @for ($i = 1; $i <= $pro->stars; $i++)
                                                <i class='fas fa-star text-warning'></i>
                                            @endfor
                                            @for ($i = 5; $i > $pro->stars; $i--)
                                                <i class='fal fa-star text-warning'></i>
                                            @endfor
                                </span>
                                        <span class="rating-number"><span>({{$pro->reviews_num}})+</span> تقييم </span>
                                    </div>
                                    <h6 class="product-title"><a href="{{route('productDetails',$pro->title)}}">{{$pro->title}}</a></h6>
                                    <div class="product-price-variant">
                                        @if($pro->price_after && $pro->price_after != 0)
                                            <span class="price old-price">{{$pro->price_before}} ج م</span>
                                            <b>{{$pro->price_after}} ج م</b>
                                        @else
                                            <b>{{$pro->price_before}} ج م</b>
                                        @endif
                                    </div>
                                    <div class="product-cart">
                                        <a href="{{route('productDetails',$pro->title)}}" class="cart-btn"><i class="fal fa-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Sold Product Area  -->
    @endif


    @include('Site.Layout.Sections.why-us')

    @include('Site.Layout.Sections.brands')




    <!-- Start Axil Product Poster Area  -->
    <div class="axil-poster">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb--30">
                    <div class="single-poster">
                        <a href="#">
                            <img src="{{asset('assets/site')}}/images/bg/bg-image-8.jpg" style="width: 630px;height: 246px" alt="eTrade promotion poster">
                            <div class="poster-content">
                                <div class="inner">
                                    <h3 class="title">اعتني بجمالك <br> وعناية بشرتك</h3>
                                    <span class="sub-title">تفاصيل <i class="fal fa-long-arrow-right"></i></span>
                                </div>
                            </div>
                            <!-- End .poster-content -->
                        </a>
                    </div>
                    <!-- End .single-poster -->
                </div>
                <div class="col-lg-6 mb--30">
                    <div class="single-poster">
                        <a href="#">
                            <img src="{{asset('assets/site')}}/images/bg/bg-image-11.jpg" style="width: 630px;height: 246px" alt="eTrade promotion poster">
                            <div class="poster-content">
                                <div class="inner">
                                    <span class="sub-title">خصومات ال 25%</span>
                                    <h3 class="title">استكشفي <br> كل جديد</h3>
                                </div>
                            </div>
                            <!-- End .poster-content -->
                        </a>
                    </div>
                    <!-- End .single-poster -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Axil Product Poster Area  -->

    @include('Site.Layout.Sections.subscribe')


@endsection
@section('site-js')

@endsection
