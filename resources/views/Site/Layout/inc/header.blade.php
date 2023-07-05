<header class="header axil-header header-style-1">
    <div class="header-top-campaign">
        <div class="container position-relative">
            <div class="campaign-content">
                <p>{{$setting->desc}}</p>
            </div>
        </div>
        <button class="remove-campaign"><i class="fal fa-times"></i></button>
    </div>

    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="{{route('/')}}" class="logo logo-dark">
                        <img src="{{asset($setting->logo)}}" alt="Site Logo" style="width: 150px;height: 50px">
                    </a>
                    <a href="{{route('/')}}" class="logo logo-light">
                        <img src="{{asset($setting->logo)}}" alt="Site Logo" style="width: 150px;height: 50px">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{route('/')}}" class="logo">
                                <img src="{{asset($setting->logo)}}" alt="Site Logo" style="width: 150px;height: 50px">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li><a href="{{route('/')}}">الرئيسية</a></li>
                            <li><a href="{{route('productPage')}}">المنتجات</a></li>
                            <li><a href="{{route('blogs')}}">المقالات</a></li>
                            <li><a href="{{route('about')}}">من نحن</a></li>
                            <li><a href="{{route('contactUs')}}">تواصل معنا</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        {{--                        <li class="axil-search">--}}
                        {{--                            <a href="javascript:void(0)" class="header-search-icon" title="Search">--}}
                        {{--                                <i class="flaticon-magnifying-glass"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="wishlist">--}}
                        {{--                            <a href="wishlist.html">--}}
                        {{--                                <i class="flaticon-heart"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="shopping-cart">--}}
                        {{--                            <a href="#" class="cart-dropdown-btn">--}}
                        {{--                                <span class="cart-count">3</span>--}}
                        {{--                                <i class="flaticon-shopping-cart"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        <li class="wishlist shopping-cart">
                            <a href="{{route('wishlist')}}" class="wishlist-btn makeLogin" id="wishIcon">
                                @if (auth('user')->check())
                                        <?php $count = \App\Models\FavoriteProduct::where('user_id', loggedUser('id'))->count() ?>
                                    @if($count)
                                        <span class="wishlist-count">{{$count}}</span>
                                    @endif
                                @endif
                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn makeLogin" id="cartIcon">
                                @if (auth('user')->check())
                                        <?php $count = \App\Models\Cart::where('user_id', loggedUser('id'))->count() ?>
                                    @if($count)
                                        <span class="cart-count">{{$count}}</span>
                                    @endif
                                @endif
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            @if (auth('user')->check())
                                <a href="javascript:void(0)">
                                    <img class="image-profile-nav" src="{{getUserImage(auth('user')->user()->image)}}"
                                         alt="{{auth('user')->user()->name}}">
                                    {{--                                    <span class="name-profile-nav"--}}
                                    {{--                                          style="color: black !important;">{{auth('user')->user()->name}}</span>--}}
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title name-of-user">{{auth('user')->user()->name}}</span>
                                    <ul>
                                        <li>
                                            <a href="{{route('profile')}}">
                                                بيانات حسابي
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('logout')}}" class="text-danger">
                                                تسجيل الخروج <i class="fa fa-sign-out-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="javascript:void(0)" class="makeLogin">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('register')}}">انشاء حساب</a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}" style="border-bottom: 0px">تسجيل الدخول</a>
                                        </li>
                                    </ul>
                                </div>

                            @endif
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
