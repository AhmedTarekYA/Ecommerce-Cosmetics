@extends('Site.Layout.app')
@section('content')
<!-- Start Checkout Area  -->
<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        @if($cart_elements->count() == 0)
            <div class="container text-center">
                <p>لا يوجد اي منتج في السلة</p>
                <img src="{{asset('uploads/empty-cart.png')}}" style="height: 360px;width: 30%;">
                <br>
                <a href="{{route('productPage')}}" class="axil-btn btn-bg-primary submit-btn">تسوق الان</a>
            </div>
        @else
        <form action="{{route('makeOrder')}}" id="orderForm">
            @csrf
            <div class="row">
                <div class="col-lg-6">
{{--                    <div class="axil-checkout-notice">--}}
{{--                        <div class="axil-toggle-box">--}}
{{--                            <div class="toggle-bar"><i class="fas fa-pencil"></i> لديك كوبون شراء ؟ <a href="javascript:void(0)" class="toggle-btn">اضغط هنا وادخله الان<i class="fas fa-angle-down"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="axil-checkout-coupon toggle-open">--}}
{{--                                <p>يرجي كتابة الكود واضفط علي تطبيق</p>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input placeholder="اكتب كود الكوبون هنا..." type="text">--}}
{{--                                    <div class="apply-btn">--}}
{{--                                        <button type="submit" class="axil-btn btn-bg-primary">تطبيق</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">معلومات التواصل</h4>
                        <div class="form-group">
                            <label for="address1">العنوان <span>*</span></label>
                            <input type="text" id="address1" name="address" class="mb--15" value="{{loggedUser('address')}}" placeholder="يرجي كتابة العنوان بالتفصيل">
                        </div>
                        <div class="form-group">
                            <label for="phone">الهاتف <span>*</span></label>
                            <input name="phone" type="tel" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="notes">ملاحظات (اختياري)</label>
                            <textarea id="notes" name="notes" rows="2" placeholder="هل تود اخبارنا بشئ بخصوص الطلب ؟"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">بيانات الطلب</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                <tr>
                                    <th>المنتج</th>
                                    <th>السعر</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart_elements as $cart)
                                <tr class="order-product">
                                    <td>{{$cart->product->title}}<span class="quantity"> {{$cart->qty}}x</span></td>
                                    <td>{{$cart->price}} ج.م</td>
                                </tr>
                                @endforeach
                                <tr class="order-total">
                                    <td>الاجمالي</td>
                                    <td>{{$cart_elements->sum('price')}} ج.م</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn" id="checkout-btn">اتمام الطلب</button>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
<!-- End Checkout Area  -->
@if($cart_elements->count() != 0)
@include('Site.Layout.Sections.why-us')
@endif

@endsection
@section('site-js')
    <script>
        $("form#orderForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#orderForm').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#checkout-btn').html('<span style="margin-right: 4px;color: white"> انتظر.. </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
                },
                success: function (data) {
                    if (data.status === 200){
                        toastr.success('تم اتمام طلبك بنجاح 😍');
                        window.setTimeout(function() {
                            window.location.href='/profile';
                        }, 500);
                        $('#checkout-btn').html("اتمام الطلب").attr('disabled', false);
                    }else
                        toastr.error('عذرا هناك خطأ فني 😞');
                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#checkout-btn').html("اتمام الطلب").attr('disabled', false);
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                    else if (data.status === 422) {
                        $('#checkout-btn').html("اتمام الطلب").attr('disabled', false);
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
    </script>
@endsection
