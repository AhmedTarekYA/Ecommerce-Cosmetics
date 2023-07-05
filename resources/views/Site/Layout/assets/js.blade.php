<!-- Modernizer JS -->
<script src="{{asset('assets/site')}}/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="{{asset('assets/site')}}/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/site')}}/js/vendor/popper.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/bootstrap.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/slick.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/js.cookie.js"></script>
<!-- <script src="{{asset('assets/site')}}/js/vendor/jquery.style.switcher.js"></script> -->
<script src="{{asset('assets/site')}}/js/vendor/jquery-ui.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/jquery.countdown.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/sal.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/isotope.pkgd.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/counterup.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/waypoints.min.js"></script>

<!-- Main JS -->
<script src="{{asset('assets/site')}}/js/rtl-main.js"></script>

<!-- Dropify Js -->
<script src="{{asset('assets/main')}}/dropify/dropify.min.js"></script>

<!-- Toastr Js -->
<script src="{{asset('assets/main')}}/toastr/toastr.min.js"></script>

<script type="text/javascript">
    $('.dropify').dropify("Upload Here");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(window).on('load', function () {
        $(".loader-container").fadeOut("slow");
    });

    // subscribeForm
    $("form#subscribeForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#subscribeForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#sendBtn').html('<span style="margin-right: 4px;color: white"> انتظر.. </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
            },
            success: function (data) {
                if (data.status == 200) {
                    toastr.success('تم الاشتراك بنجاح, سنرسل لك احدث العروض والاخبار ❤️');
                    $('#subscribeForm')[0].reset();
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                } else if (data.status == 405) {
                    toastr.warning('لقد قمت بالتسجيل مسبقا, سنرسل لك احدث العروض والاخبار ❤️');
                    $('#subscribeForm')[0].reset();
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                } else {
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
            },
            error: function (data) {
                if (data.status == 500) {
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                    toastr.error('عذرا هناك خطأ فني 😞');
                } else if (data.status == 422) {
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

    // add to cart
    $(".add-to-cart").click(function () {
        var product_id = $(this).data("id");
        var url = "{{route('addToCart')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                "product_id": product_id
            },
            beforeSend: function () {
                $(".loader-container").show();
            },
            success: function (data) {
                if (data.status == 200) {
                    $('#emptyCart').attr("display", 'none');
                    toastr.success(data.message);
                    $('#cartIcon').html(`<span class="cart-count">${data.count}</span><i class="flaticon-shopping-cart"></i>`)
                } else if (data.status == 202) {
                    toastr.info(data.message);
                } else {
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
                $(".loader-container").fadeOut("slow");
            },
            error: function (data) {
                if (data.status == 401) {
                    toastr.info('يرجي تسجيل الدخول اولا');
                }
                if (data.status == 500) {
                    toastr.error('عذرا هناك خطأ فني 😞');
                } else if (data.status == 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                }
                $(".loader-container").fadeOut("slow");
            },//end error method
        });
    });

    // show cart
    var userAuthenticated = "{{auth('user')->check()}}";
    if (userAuthenticated) {
        $(".cart-dropdown-btn").click(function () {
            var url = "{{route('getMyCart')}}";
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function () {
                    $(".loader-container").show();
                },
                success: function (data) {
                    $('#append-here').html(data);
                    $(".loader-container").fadeOut("slow");
                }
            });
        });
    }


    // add to wishlist
    $(".add-to-wishlist").click(function () {
        var product_id = $(this).data("id");
        var url = "{{route('addToWishlist')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                "product_id": product_id
            },
            beforeSend: function () {
                $(".loader-container").show();
            },
            success: function (data) {
                if (data.status == 200) {
                    toastr.success(data.message);
                    if (data.count != 0)
                        $('#wishIcon').html(`<span class="wishlist-count">${data.count}</span><i class="flaticon-heart"></i>`)
                    else
                        $('#wishIcon').html(`<i class="flaticon-heart"></i>`)
                } else if (data.status == 202) {
                    toastr.info(data.message);
                } else {
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
                $(".loader-container").fadeOut("slow");
            },
            error: function (data) {
                if (data.status == 401) {
                    toastr.info('يرجي تسجيل الدخول اولا');
                }
                if (data.status == 500) {
                    toastr.error('عذرا هناك خطأ فني 😞');
                } else if (data.status == 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                }
                $(".loader-container").fadeOut("slow");
            },//end error method
        });
    });
</script>


@yield('site-js')
