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
                    <p>ليس لديك حساب ؟</p>
                    <a href="{{route('register')}}" class="axil-btn btn-bg-secondary sign-up-btn">انشاء حساب</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--9">
                <h3 class="title">سجل الدخول لحسابك</h3>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <p class="b2 mb--55">ادخل البيانات التحقق</p>
                    <form id="LoginForm" class="singin-form" method="post" enctype="multipart/form-data" action="{{route('postLogin')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mt--80">
                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 mt--20">
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="form-group mt-4 text-center">
                                <button type="submit" id="loginButton" class="axil-btn btn-bg-primary submit-btn">دخول <i class="fa fa-lock" style="margin-right: 3px"></i> </button>
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
    $("form#LoginForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#LoginForm').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#loginButton').html('<span style="margin-right: 4px;">انتظر </span><span class="spinner-border spinner-border-md mr-2"></span> ').attr('disabled', true);
            },
            complete: function(){


            },
            success: function (data) {
                if (data.status == 200){
                    toastr.success("اهلا "+ data.name);
                    window.setTimeout(function() {
                        window.location.href='/profile';
                    }, 1000);
                }else {
                    toastr.error("تحقق من كلمة المرور");
                    $('#loginButton').html(`دخول <i class="fa fa-lock" style="margin-right: 3px"></i> `).attr('disabled', false);
                }
            },
            error: function (data) {
                if (data.status === 500) {
                    $('#loginButton').html(`دخول <i class="fa fa-lock" style="margin-right: 3px"></i> `).attr('disabled', false);
                    toastr.error('هناك خطأ ما');
                }
                else if (data.status === 422) {
                    $('#loginButton').html(`دخول <i class="fa fa-lock" style="margin-right: 3px"></i> `).attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });

                        } else {
                        }
                    });
                }else {
                    $('#loginButton').html(`دخول <i class="fa fa-lock" style="margin-right: 3px"></i> `).attr('disabled', false);
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
