<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">قائمة الصفحات</li>


                <li>
                    <a href="{{route('adminHome')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-home">الرئيسية</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-dashboards">المشرفين</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admins.index')}}" key="t-admins"> قائمة المشرفين</a></li>
                        <li><a href="{{route('admins.create')}}" class="create-model" key="t-default"> اضافة مشرف</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-images"></i>
                        <span key="t-dashboards">البانر المتحرك</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('sliders.index')}}" key="t-sliders"> عرض الكل</a></li>
                        <li><a href="{{route('sliders.create')}}" class="create-model" key="t-product"> اضافة جديد</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-menu"></i>
                        <span key="t-categories">الاقسام</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('categories.index')}}" key="t-categories"> اقسام المنتجات</a></li>
                        <li><a href="{{route('categories.create')}}" class="create-model" key="t-categories"> اضافة قسم</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-shopping-bag"></i>
                        <span key="t-dashboards">المنتجات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('products.index')}}" key="t-products"> قائمة المنتجات</a></li>
                        <li><a href="{{route('products.create')}}" class="create-model" key="t-product"> اضافة منتج</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('users.index')}}" class="waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-users">العملاء</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('orders.index')}}" class="waves-effect">
                        <i class="mdi mdi-shopping"></i>
                        <span key="t-orders">الطلبات</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-news"></i>
                        <span key="t-dashboards">المدونة والمقالات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('blogs.index')}}" key="t-blogs"> عرض الكل</a></li>
                        <li><a href="{{route('blogs.create')}}" class="create-model" key="t-blogs"> اضافة جديد</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-apple"></i>
                        <span key="t-dashboards">البراندات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('brands.index')}}" key="t-brands"> براندات الموقع</a></li>
                        <li><a href="{{route('brands.create')}}" class="create-model" key="t-brands"> اضافة براند</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('contacts.index')}}" class="waves-effect">
                        <i class="bx bx-message"></i>
                        <span key="t-Contacts">طلبات التواصل</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('setting.index')}}" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-Setting">الاعدادات</span>
                    </a>
                </li>





                <li>
                    <a href="{{route('admin.logout')}}" class="waves-effect">
                        <i class="bx bx-power-off"></i>
                        <span key="t-logout">تسجيل الخروج</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
