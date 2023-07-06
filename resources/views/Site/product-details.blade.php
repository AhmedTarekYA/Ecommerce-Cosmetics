@extends('Site.Layout.app')
@section('content')
    <!-- Start Shop Area  -->
    <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
        <div class="single-product-thumb mb--40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb--40">
                        <div class="row">
                            <div class="col-lg-10 order-lg-2">
                                <div class="single-product-thumbnail-wrap zoom-gallery">
                                    <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                        @if($product->images)
                                            <div class="thumbnail">
                                                <a href="{{getFile($product->image)}}" class="popup-zoom">
                                                    <img src="{{getFile($product->image)}}" alt="Product Images">
                                                </a>
                                            </div>
                                            @foreach($product->images as $image)
                                                <div class="thumbnail">
                                                    <a href="{{getFile($image->image)}}" class="popup-zoom">
                                                        <img src="{{getFile($image->image)}}" alt="Product Images">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="thumbnail">
                                                <a href="{{getFile($product->image)}}" class="popup-zoom">
                                                    <img src="{{getFile($product->image)}}" alt="Product Images">
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="label-block">
                                        @if($product->price_after && $product->price_after != 0)
                                                <?php
                                                $discountPercent = (($product->price_before - $product->price_after) / $product->price_before) * 100;
                                                ?>
                                            <div class="product-badget">خصم {{round($discountPercent,0)}} %</div>
                                        @endif
                                    </div>
                                    <div class="product-quick-view position-view">
                                        <a href="{{getFile($product->image)}}" class="popup-zoom">
                                            <i class="far fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 order-lg-1">
                                <div class="product-small-thumb-3 small-thumb-wrapper">
                                    @if($product->images)
                                        <div class="small-thumb-img">
                                            <img src="{{getFile($product->image)}}" alt="thumb image">
                                        </div>
                                        @foreach($product->images as $image)
                                            <div class="small-thumb-img">
                                                <img src="{{getFile($image->image)}}" alt="thumb image">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="small-thumb-img">
                                            <img src="{{getFile($product->image)}}" alt="thumb image">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title" id="pro-title">{{$product->title}}</h2>
                                @if($product->price_after && $product->price_after != 0)

                                    <span class="price-amount">
                                        <span class="text-muted me-2"><del>{{$product->price_before}} ج م</del></span>
                                        {{$product->price_after}} ج م
                                    </span>
                                @else
                                    <span class="price-amount">{{$product->price_before}} ج م</span>
                                @endif
                                <div class="product-rating">
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= $product->stars; $i++)
                                            <i class='fas fa-star text-warning'></i>
                                        @endfor
                                        @for ($i = 5; $i > $product->stars; $i--)
                                            <i class='fal fa-star text-warning'></i>
                                        @endfor
                                    </div>
                                    <div class="review-link">
                                        <a href="#">({{$product->reviews_num}} من التقييمات )</a>
                                    </div>
                                </div>
                                {{--                                <ul class="product-meta">--}}
                                {{--                                    <li><i class="fal fa-check"></i>In stock</li>--}}
                                {{--                                    <li><i class="fal fa-check"></i>Free delivery available</li>--}}
                                {{--                                    <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>--}}
                                {{--                                </ul>--}}
                                <p class="description">
                                    {!! $product->desc !!}
                                </p>

                                <div class="product-variations-wrapper">

                                    {{--                                    <!-- Start Product Variation  -->--}}
                                    {{--                                    <div class="product-variation">--}}
                                    {{--                                        <h6 class="title">Colors:</h6>--}}
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
                                    {{--                                    <!-- End Product Variation  -->--}}

                                    {{--                                    <!-- Start Product Variation  -->--}}
                                    {{--                                    <div class="product-variation product-size-variation">--}}
                                    {{--                                        <h6 class="title">Size:</h6>--}}
                                    {{--                                        <ul class="range-variant">--}}
                                    {{--                                            <li>xs</li>--}}
                                    {{--                                            <li>s</li>--}}
                                    {{--                                            <li>m</li>--}}
                                    {{--                                            <li>l</li>--}}
                                    {{--                                            <li>xl</li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <!-- End Product Variation  -->--}}

                                </div>

                                <!-- Start Product Action Wrapper  -->
                                <div class="product-action-wrapper d-flex-center">
                                    @if($setting->order_type == 'whatsapp')
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty"><input type="text" id="pro-qty" value="1" min="1"></div>
                                        <!-- End Quentity Action  -->
                                    @endif


                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        @if($setting->order_type == 'site')
                                            <li class="wishlist add-to-cart" data-id="{{$product->id}}">
                                                <a href="javascript:void(0)" class="axil-btn" style="height: 50px;line-height: 50px;padding: 0 18px;color: var(--color-white);background-color: var(--color-secondary);">
                                                     <i class="far fa-shopping-cart text-white" title="اضف للسلة"></i>اضافة للسلة
                                                </a>
                                            </li>
                                        @else
                                            <li class="add-to-cart" id="orderBtn">
                                                <a id="orderA" href="#" class="axil-btn text-white"
                                                   style="background-color: #50B76A">
                                                    <i class="fab fa-whatsapp text-white"
                                                       style="font-size: 20px;margin-right: 5px;"></i>
                                                    اطلب الان

                                                </a>
                                                @endif
                                            </li>
                                    </ul>
                                    <!-- End Product Action  -->
                                </div>
                                <!-- End Product Action Wrapper  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->

    </div>
    <!-- End Shop Area  -->

    @if($product->reviews->count())
        <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
            <div class="container">
                <div class="reviews-wrapper">
                    <h4 class="mb--60">التقييمات</h4>
                    <div class="row">
                        <div class="col-lg-12 mb--40">
                            <div class="axil-comment-area pro-desc-commnet-area">
                                <ul class="comment-list">
                                    @foreach($product->reviews as $review)
                                        <!-- Start Single Comment  -->
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img style="width: 70px;height: 70px"
                                                             src="{{getUserImage($review->image)}}" alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span
                                                                        data-text="Cameron Williamson">{{$review->name}}</span>
                                                                </span>
                                                            </a>
                                                            <span class="commenter-rating text-muted">
                                                                {{$review->created_at->diffForHumans()}}
                                                            </span>
                                                        </h6>
                                                        <div class="comment-text">
                                                            <p>
                                                                “{{$review->desc}}”
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Single Comment  -->
                                    @endforeach

                                </ul>
                            </div>
                            <!-- End .axil-commnet-area -->
                        </div>
                    </div>
                </div>
                <!-- End .reviews-wrapper -->
            </div>
        </div>

    @endif

    <!-- Start Recently Viewed Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> منتجات متعلقة</span>
                <h2 class="title">قد تعجبك أيضا</h2>
            </div>
            <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                @foreach($latestProducts as $pro)
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two">
                            <div class="thumbnail">
                                <a href="{{route('productDetails',$pro->title)}}">
                                    <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500"
                                         src="{{getFile($pro->image)}}" alt="Product Images">
                                </a>
                                @if($pro->price_after && $pro->price_after != 0)
                                        <?php
                                        $discountPercent = (($pro->price_before - $pro->price_after) / $pro->price_before) * 100;
                                        ?>
                                    <div class="label-block label-right">
                                        <div class="product-badget">{{round($discountPercent,0)}} %</div>
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
                                    <h5 class="title"><a
                                            href="{{route('productDetails',$pro->title)}}">{{$pro->title}}</a></h5>
                                    <div class="product-price-variant">
                                        @if($pro->price_after && $pro->price_after != 0)
                                            <span class="price old-price">{{$pro->price_before}} ج م</span>
                                            <b>{{$pro->price_after}} ج م</b></h5>
                                        @else
                                            <b>{{$pro->price_before}} ج م</b></h5>
                                        @endif
                                    </div>
                                    <div class="product-hover-action">
                                        @if($setting->order_type == 'site')
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
                                        @else
                                            <ul class="cart-action">
                                                <li class="select-option">
                                                    <a href="{{route('productDetails',$pro->title)}}">
                                                        عرض التفاصيل
                                                    </a>
                                                </li>
                                            </ul>
                                        @endif
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
    <!-- End Recently Viewed Product Area  -->


    <!-- Start Axil Newsletter Area  -->
    @include('Site.Layout.Sections.subscribe')
    <!-- End Axil Newsletter Area  -->

    <!-- Start Why Choose Area  -->
    @include('Site.Layout.Sections.why-us')
    <!-- End Why Choose Area  -->

@endsection
@section('site-js')
    <script>
        $('#orderBtn').click(function () {
            var product_qty = $('#pro-qty').val();
            var product_title = $('#pro-title').text();
            var url = `https://wa.me/{{$setting->whatsapp}}?text= اريد طلب عدد ${product_qty}    من المنتج   ${product_title}`;
            $('#orderA').attr('href', url);
        });
    </script>
@endsection
