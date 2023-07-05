@extends('Admin.Layout.app')
@section('title')
    الاعدادات
@endsection
@section('pageName')
    الاعدادات
@endsection
@section('content')
    @if($errors->any())
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">يرجي تصحيح الاخطاء التالية</h4>
                <div class="">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('settingUpdate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">الاعدادات الاساسية</h4>
                        <div class="mb-3 h-25">
                            <label class="form-label">اللوجو ( يفضل ان يكون بحجم عرض 150 × 50 طول px)</label>
                            <input type="file" class="dropify" name="logo"
                                   data-default-file="{{getFile(($setting->logo) ?? '')}}"
                                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                            <span class="form-text text-info">مسموح فقط بـ: png, gif, jpeg, jpg, webp</span>
                        </div>
                        <div class="mb-3">
{{--                            <h4 class="card-title mb-3">طريقة البيع (تحديد الطريقة التي يتبعها العميل لطلب المنتج)</h4>--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-check form-radio-primary mb-3 col-lg-6 fs-5">--}}
{{--                                    <input class="form-check-input" type="radio" name="order_type"--}}
{{--                                           {{($setting->order_type == 'site') ? 'checked' : ''}} value="site" id="formRadioColor1">--}}
{{--                                    <label class="form-check-label text-warning" for="formRadioColor1">--}}
{{--                                        من خلال الموقع (سلة شراء وتسجيل دخول للموقع) <i class="fas fa-globe-africa"></i>--}}
{{--                                    </label>--}}
{{--                                </div>--}}

{{--                                <div class="form-check form-radio-success mb-3 col-lg-6 fs-5">--}}
{{--                                    <input class="form-check-input" type="radio" name="order_type"--}}
{{--                                           {{($setting->order_type == 'whatsapp') ? 'checked' : ''}} value="site" id="formRadioColor2">--}}
{{--                                    <label class="form-check-label text-success" for="formRadioColor2">--}}
{{--                                        واتساب (يقوم المستحدم بالتواصل معك عبر الواتساب)  <i class="fab fa-whatsapp"></i>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="phone">هاتف تواصل</label>
                                    <input id="phone" name="phone" type="text" class="form-control" required
                                           value="{{($setting->phone) ?? ''}}">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="whatsapp">رقم واتساب</label>
                                    <input id="whatsapp" name="whatsapp" type="text" class="form-control" required
                                           value="{{($setting->whatsapp) ?? ''}}">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="gmail">ايميل جيميل</label>
                                    <input id="gmail" name="gmail" type="text" class="form-control" required
                                           value="{{($setting->gmail) ?? ''}}">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="facebook">رابط فيسبوك</label>
                                    <input id="facebook" name="facebook" type="text" class="form-control" required
                                           value="{{($setting->facebook) ?? ''}}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">عن المتجر</h4>
                        <div class="mb-3 h-25">
                            <label class="form-label">تظهر في صفحة من نحن ( يفضل ان يكون بحجم عرض 410 × 489 طول
                                px)</label>
                            <input type="file" class="dropify" name="about_image"
                                   data-default-file="{{getFile(($setting->about_image) ?? '')}}"
                                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                            <span class="form-text text-info">مسموح فقط بـ: png, gif, jpeg, jpg, webp</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">معلومات اساسية</h4>
                        <div class="row">

                            <div class="mb-3">
                                <label for="Title">اسم المتجر</label>
                                <input id="Title" name="title" type="text" class="form-control" required
                                       value="{{($setting->title) ?? ''}}">
                            </div>
                            <div class="mb-3">
                                <label for="desc">جملة افتتاحية (تظهر في الاعلي في كل الصفحات)</label>
                                <input id="desc" name="desc" type="text" class="form-control" required
                                       value="{{($setting->desc) ?? ''}}" placeholder="مثال : شحن مجاني للمنتجات فوق 250 ج">
                            </div>
                            <div class="mb-3">
                                <label for="blog">عن متجرنا او من نحن</label>
                                <textarea id="blog" name="about" required>{!! ($setting->about) ?? '' !!}</textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">تحديث</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>

    <!-- end row -->

@endsection
@section('dashboard-js')
    <script>
        $('.dropify').dropify("Upload Here");
        CKEDITOR.replace('blog');
    </script>
@endsection
