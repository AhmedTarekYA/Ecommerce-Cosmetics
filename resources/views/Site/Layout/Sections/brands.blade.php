@if($brands->count())
    <!-- Start brands Area  -->
    <div class="axil-categorie-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper section-title-center">
                    <h2 class="title">الشركاء والرعايا</h2>
                </div>
                <div class="categrie-product-activation-3 slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    @foreach($brands as $brand)
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="#">
                                    <img class="img-fluid" src="{{getFile($brand->image)}}" style="height: 90px;width: 110px;" alt="product categorie">
                                    <h6 class="cat-title">{{$brand->title}}</h6>
                                </a>
                            </div>
                            <!-- End .categrie-product -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End brands Area  -->
@endif
