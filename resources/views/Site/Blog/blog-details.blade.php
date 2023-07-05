@extends('Site.Layout.app')
@section('content')
    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">
        <div class="post-single-wrapper position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="d-flex flex-wrap align-content-start h-100">
                            <div class="position-sticky sticky-top">
                                <div class="post-details__social-share">
                                    <span class="share-on-text">مشاركة</span>
                                    <div class="social-share">
                                        <a onclick="shareOnFacebook()"><i class="fab fa-facebook-f"></i></a>
                                        <script>
                                            function shareOnFacebook() {
                                                var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href);
                                                window.open(shareUrl, '_blank');
                                            }
                                        </script>
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($blog->title); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 axil-post-wrapper">
                        <div class="post-heading">
                            <h2 class="title">{{$blog->title}}</h2>
                            <div class="axil-post-meta">
                                <div class="post-author-avatar">
                                    <img src="{{getUserImage(($blog->admin->image) ?? '')}}" alt="Author Images">
                                </div>
                                <div class="post-meta-content">
                                    <h6 class="author-title">
                                        <a href="#">{{($blog->admin->name) ?? 'إدارة الموقع'}}</a>
                                    </h6>
                                    <ul class="post-meta-list">
                                        <li>{{ $blog->publish_date }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <img class="blog-main-image" src="{{getFile($blog->image)}}">

                        {!! $blog->desc !!}

                    </div>
                    <div class="col-lg-4">
                        <!-- Start Sidebar Area  -->
                        <aside class="axil-sidebar-area">
                            @if($latestBlogs->count())
                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget mt--40">
                                <h6 class="widget-title">أحدث المقالات</h6>

                                @foreach($latestBlogs as $blo)
                                    <!-- Start Single Post List  -->
                                    <div class="content-blog post-list-view mb--20">
                                        <div class="thumbnail">
                                            <a href="{{route('blogDetails',$blo->id)}}">
                                                <img src="{{getFile($blo->image)}}" alt="{{$blo->title}}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="{{route('blogDetails',$blo->id)}}">{{$blo->title}}</a></h6>
                                            <div class="axil-post-meta">
                                                <div class="post-meta-content">
                                                    <ul class="post-meta-list">
                                                        <li>{{($blog->admin->name) ?? 'إدارة الموقع'}}</li>
                                                        <li>{{\Carbon\Carbon::parse($blo->created_at)->format('M j, Y')}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post List  -->
                                @endforeach


                            </div>
                            <!-- End Single Widget  -->
                            @endif
                            @if($latestProducts->count())
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
                            @endif

                        </aside>
                        <!-- End Sidebar Area -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->

    <!-- Start Related Blog Area  -->
    <div class="related-blog-area bg-color-white pb--60 pb_sm--40">
        <div class="container">
            <div class="section-title-wrapper mb--70 mb_sm--40 pr--110">
                <span class="title-highlighter highlighter-primary mb--10"> <i class="fal fa-bell"></i>تابع أيضا</span>
                <h3 class="mb--25">مقالات مقترحة لك</h3>
            </div>
            <div class="related-blog-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @if($suggestedBlogs->count())
                    @foreach($suggestedBlogs as $sa)

                <div class="slick-single-layout">
                    <div class="content-blog">
                        <div class="inner">
                            <div class="axil-gallery-activation axil-slick-arrow arrow-between-side">
                                <!-- Start Single Thumb  -->
                                <div class="thumbnail">
                                    <a href="{{route('blogDetails',$sa->id)}}">
                                        <img src="{{getFile($sa->image)}}" style="width: 410px;height: 300px" alt="Blog Images">
                                    </a>
                                </div>
                                <!-- End Single Thumb  -->
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="{{route('blogDetails',$sa->id)}}">
                                       {{$sa->title}}</a></h5>
                                <div class="axil-post-meta">
                                    <div class="post-author-avatar">
                                        <img src="{{getUserImage(($sa->admin->image) ?? '')}}" alt="Author Images">
                                    </div>
                                    <div class="post-meta-content">
                                        <h6 class="author-title">
                                            <a href="#">{{($sa->admin->name) ?? 'إدارة الموقع'}}</a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{\Carbon\Carbon::parse($sa->created_at)->format('M j, Y')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
                <!-- End .slick-single-layout -->
            </div>
        </div>
    </div>
    <!-- End Related Blog Area  -->

    @include('Site.Layout.Sections.subscribe')

@endsection

