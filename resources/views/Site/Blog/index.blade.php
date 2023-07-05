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
                            <li class="axil-breadcrumb-item active" aria-current="page">المقالات</li>
                        </ul>
                        <h1 class="title">المقالات</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{asset('assets')}}/uploads/blog.gif" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="row g-5">--}}
{{--                        @foreach($blogs as $blog)--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="content-blog blog-grid">--}}
{{--                                <div class="inner">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <a href="blog-details.html">--}}
{{--                                            <img src="assets/images/blog/blog-10.png" alt="Blog Images">--}}
{{--                                        </a>--}}
{{--                                        <div class="blog-category">--}}
{{--                                            <a href="#">Digital Art's</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <h5 class="title"><a href="{{route('blogDetails',$blog->id)}}">--}}
{{--                                                {!! \Illuminate\Support\Str::limit($blog->desc,10) !!}--}}
{{--                                            </a></h5>--}}
{{--                                        <div class="read-more-btn">--}}
{{--                                            <a class="axil-btn right-icon" href="blog-details.html">Read More <i class="fal fa-long-arrow-right"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="content-blog blog-grid">--}}
{{--                                    <div class="inner">--}}
{{--                                        <div class="thumbnail">--}}
{{--                                            <a href="{{route('blogDetails',$blog->id)}}">--}}
{{--                                                <img src="{{getFile($blog->image)}}" style="width: 368px;height: 368px" alt="{{$blog->title}}">--}}
{{--                                            </a>--}}
{{--                                            <div class="blog-category">--}}
{{--                                                <a href="{{route('blogDetails',$blog->id)}}">{{$blog->title}}</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="content">--}}
{{--                                            <h5 class="title"><a href="{{route('blogDetails',$blog->id)}}">--}}
{{--                                                    {!! \Illuminate\Support\Str::limit($blog->desc,50) !!}--}}
{{--                                                </a></h5>--}}

{{--                                            <div class="read-more-btn">--}}
{{--                                                <a class="axil-btn right-icon" href="{{route('blogDetails',$blog->id)}}">اقرأ المزيد <i class="fal fa-long-arrow-right"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <!-- Start Sidebar Area  -->--}}
{{--                    <aside class="axil-sidebar-area">--}}



{{--                        <!-- Start Single Widget  -->--}}
{{--                        <div class="axil-single-widget mt--40">--}}
{{--                            <h6 class="widget-title">رائج الان</h6>--}}
{{--                            <ul class="product_list_widget recent-viewed-product">--}}
{{--                                @foreach($latestProducts as $pro)--}}
{{--                                    <!-- Start Single product_list  -->--}}
{{--                                    <li>--}}
{{--                                        <div class="thumbnail">--}}
{{--                                            <a href="{{route('productDetails',$pro->title)}}">--}}
{{--                                                <img style="width: 100px;height: 100px;border-radius: 50%" src="{{getFile($pro->image)}}" alt="{{$pro->title}}">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                        <div class="content">--}}
{{--                                            <h6 class="title"><a href="{{route('productDetails',$pro->title)}}">{{\Illuminate\Support\Str::limit($pro->title,20)}}</a></h6>--}}
{{--                                            <div class="product-meta-content">--}}
{{--                                                                                                    <span class="woocommerce-Price-amount amount">--}}
{{--                                                                            <del>$30</del>--}}
{{--                                                                            $20--}}
{{--                                                                        </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <!-- End Single product_list  -->--}}
{{--                                @endforeach--}}

{{--                            </ul>--}}

{{--                        </div>--}}
{{--                        <!-- End Single Widget  -->--}}

{{--                    </aside>--}}
{{--                    <!-- End Sidebar Area -->--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-8">
                    <div class="row g-5">
                        @foreach($blogs as $blog)
                            <div class="col-md-6">
                                <div class="content-blog blog-grid">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="{{route('blogDetails',$blog->id)}}">
                                                <img src="{{getFile($blog->image)}}" style="width: 368px;height: 368px" alt="{{$blog->title}}">
                                            </a>
                                            <div class="blog-category">
                                                <a href="{{route('blogDetails',$blog->id)}}">{{$blog->title}}</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="{{route('blogDetails',$blog->id)}}">
                                                    {!! \Illuminate\Support\Str::limit($blog->desc,20) !!}
                                                </a></h5>

                                            <div class="read-more-btn">
                                                <a class="axil-btn right-icon" href="{{route('blogDetails',$blog->id)}}">اقرأ المزيد <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt--10">
                        {{ $blogs->links('pagination::bootstrap-4', ['class' => 'my-pagination-class']) }}
                    </div>
{{--                    <div class="post-pagination">--}}
{{--                        <nav class="navigation pagination" aria-label="Products">--}}
{{--                            <ul class="page-numbers">--}}
{{--                                <li><span aria-current="page" class="page-numbers current">1</span></li>--}}
{{--                                <li><a class="page-numbers" href="#">2</a></li>--}}
{{--                                <li><a class="page-numbers" href="#">3</a></li>--}}
{{--                                <li><a class="page-numbers" href="#">4</a></li>--}}
{{--                                <li><a class="page-numbers" href="#">5</a></li>--}}
{{--                                <li><a class="next page-numbers" href="#"><i class="fal fa-arrow-right"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
                </div>
                <div class="col-lg-4">
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
                                        </div>
                                    </li>
                                    <!-- End Single product_list  -->
                                @endforeach

                            </ul>

                        </div>
                        <!-- End Single Widget  -->

                    </aside>
                    <!-- End Sidebar Area -->
                </div>
            </div>
            <!-- End post-pagination -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End Blog Area  -->

    @include('Site.Layout.Sections.subscribe')

@endsection
