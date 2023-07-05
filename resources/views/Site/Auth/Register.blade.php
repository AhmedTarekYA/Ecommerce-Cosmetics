<!doctype html>
<html lang="ar">

<head>
    @include('Site.Layout.assets.css')
</head>

<body class="sticky-header newsletter-popup-modal">
<div class="loader-container">
    <div class="loader"></div>
</div>

<div class="axil-signin-area">

    <!-- Start Header -->
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <a href="{{route('/')}}" class="site-logo"><img src="{{getFile($setting->logo)}}" style="width: 160px;height: 40px" alt="logo"></a>
            </div>
            <div class="col-sm-8">
                <div class="singin-header-btn">
                    <p>لديك حساب بالفعل ؟</p>
                    <a href="{{route('login')}}" class="axil-btn btn-bg-secondary sign-up-btn">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-md-4">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">نتطلع الي انضمامك معنا</h3>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <p class="b2 mb--55">ادخل البيانات التالية</p>
                    <form id="registerForm" class="singin-form" method="post" enctype="multipart/form-data" action="{{route('userRegister')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-5">
                                <label class="form-label">صورة الملف الشخصي</label>
                                <input type="file" class="dropify" name="image" data-default-file="{{getUserImage()}}"
                                       accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                                <span class="form-text text-info">مسموح فقط بالصيغ الاتية : png, gif, jpeg, jpg, webp</span>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الاسم بالكامل</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" class="form-control" name="address" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" value="">
                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="form-group mt-4 text-center">
                                <button type="submit" id="submitButton" class="axil-btn btn-bg-primary submit-btn">حفظ البيانات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@include('Site.Layout.assets.js')
<script>
    $("form#registerForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#registerForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#submitButton').html('<span style="margin-right: 4px;">انتظر </span><span class="spinner-border spinner-border-md mr-2"></span> ').attr('disabled', true);
            },
            complete: function () {


            },
            success: function (data) {
                if (data.status == 200) {
                    toastr.success('مرحبا بك ' + ' ' + data.name);
                    window.setTimeout(function () {
                        window.location.href = '/profile';
                    }, 1000);
                }
            },
            error: function (data) {
                if (data.status === 500) {
                    $('#submitButton').html(`حفظ البيانات`).attr('disabled', false);
                    toastr.error('هناك خطأ ما');
                } else if (data.status === 422) {
                    $('#submitButton').html(`حفظ البيانات`).attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                } else {
                    $('#submitButton').html(`حفظ البيانات`).attr('disabled', false);
                    toastr.error('يوجد خطأ ما ..');
                }
            },//end error method
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
</body>
</html>
