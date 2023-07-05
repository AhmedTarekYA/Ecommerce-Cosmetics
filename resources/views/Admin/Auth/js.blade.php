<script src="{{asset('assets/admin')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/main')}}/toastr/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"></script>
<script>
    function expand(lbl) {
        var elemId = lbl.getAttribute("for");
        document.getElementById(elemId).style.height = "45px";
        document.getElementById(elemId).classList.add("my-style");
        lbl.style.transform = "translateY(-45px)";
    }

    $("form#LoginForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#LoginForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loginButton').html('<span style="margin-left: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>').attr('disabled', true);
            },
            success: function (data) {
                if (data == 200) {
                    toastr.success('مرحبا بك 😊');
                    window.setTimeout(function () {
                        window.location.href = '/admin';
                    }, 1000);
                } else {
                    toastr.error('بيانات دخول خاطئة 😞');
                    $('#loginButton').html(`<span style="margin-left: 4px;">تسجيل الدخول</span><i class="bx bx-lock"></i>`).attr('disabled', false);
                }
            },
            error: function (data) {
                if (data.status === 500) {
                    $('#loginButton').html(`<span style="margin-left: 4px;">تسجيل الدخول</span><i class="bx bx-lock"></i>`).attr('disabled', false);
                    toastr.error('عذرا هناك خطأ فني 😞');
                } else if (data.status === 422) {
                    $('#loginButton').html(`<span style="margin-left: 4px;">تسجيل الدخول</span><i class="bx bx-lock"></i>`).attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        } else {
                        }
                    });
                } else {
                    $('#loginButton').html(`<span style="margin-left: 4px;">تسجيل الدخول</span><i class="bx bx-lock"></i>`).attr('disabled', false);
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>
