<form method="POST" action="{{route('updateCart')}}" id="cartForm">
    @csrf
<div class="cart-body">
    <ul class="cart-item-list" id="cart-list">
        @foreach($cart_elements as $cart)
            <input type="hidden" name="product_id[]" value="{{$cart->product->id}}">
            <li class="cart-item" id="liOfCart{{$cart->id}}">
                <div class="item-img">
                    <a href="{{route('productDetails',$cart->product->title)}}"><img
                            src="{{getFile($cart->product->image)}}"
                            alt="{{$cart->product->title}}"></a>
                    <button type="button" class="close-btn deleteFromCart" data-id="{{$cart->id}}"><i class="fas fa-times"></i></button>
                </div>
                <div class="item-content">
                    <div class="product-rating">
                                <span class="icon">
                                    @for ($i = 1; $i <= $cart->product->stars; $i++)
                                        <i class='fas fa-star text-warning'></i>
                                    @endfor
                                    @for ($i = 5; $i > $cart->product->stars; $i--)
                                        <i class='fal fa-star text-warning'></i>
                                    @endfor
							</span>
                        <span class="rating-number">({{$cart->product->reviews_num}})</span>
                    </div>
                    <h3 class="item-title"><a href="{{route('productDetails',$cart->product->title)}}">{{$cart->product->title}}</a></h3>
                    <div class="item-price">
                        @if($cart->product->price_after && $cart->product->price_after != 0)
                            <span class="price"> {{$cart->price}} </span>ج م
                        @else
                            <span class="price"> {{$cart->price}} </span>ج م
                        @endif
                    </div>
                    <div class="pro-qty item-quantity">
                        @if($cart->product->price_after && $cart->product->price_after != 0)
                            <input type="number" class="oldPrice" disabled hidden value="{{$cart->product->price_after}}">
                        @else
                            <input type="number" class="oldPrice" disabled hidden value="{{$cart->product->price_before}}">
                        @endif
                        <span class="control-qty minus">-</span>
                        <input type="number" class="quantity-input" name="qty[]" min="1" value="{{$cart->qty}}">
                        <span class="control-qty plus">+</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="cart-footer">
    <h3 class="cart-subtotal">
        <span class="subtotal-title">المجموع</span>
        <span class="subtotal-amount"><span id="subtotal-amount">{{$cart_elements->sum('price')}}</span>  ج.م</span>
    </h3>
    <div class="group-btn">
        <a href="{{route('checkout')}}" class="axil-btn btn-bg-secondary checkout-btn">اكمال الطلب</a>
        <a href="javascript:void(0)" id="updateCart" class="axil-btn btn-bg-primary viewcart-btn" style="display: none"> تحديث السلة</a>
    </div>
</div>
</form>
<script>

    // Remove from cart
    $(".deleteFromCart").click(function () {
        var cart_id = $(this).data("id");
        var url = "{{route('deleteFromMyCart')}}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                "cart_id": cart_id
            },
            beforeSend: function () {
                $(".loader-container").show();
            },
            success: function (data) {
                if (data.status == 200) {
                    toastr.success(data.message);
                    if (data.count != 0){
                        $('#cartIcon').html(`<span class="cart-count">${data.count}</span><i class="flaticon-shopping-cart"></i>`)
                    }
                    else{
                        $('#append-here').load("{{route("getMyCart")}}");
                        $('#cartIcon').html(`<i class="flaticon-shopping-cart"></i>`)
                    }
                } else {
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
                $('#liOfCart'+cart_id).fadeOut('slow');
                $('#append-here').load("{{route("getMyCart")}}");
                $(".loader-container").fadeOut("slow");
            },
        });
    });


    // Handle product qty
    $('.control-qty').click(function (){
        $('#updateCart').fadeIn("slow");
        var defaultPrice = parseFloat($(this).parent().find('.oldPrice').val()),
             old_value   = parseFloat($(this).parent().find('input.quantity-input').val()),
             old_price_span = $(this).parent().parent().find(".price"),
             total_of_cart  = $('#subtotal-amount');
        if($(this).hasClass('plus')){
            old_value++;
            old_price_span.text(parseFloat(old_price_span.text()) + defaultPrice);
            total_of_cart.text(parseFloat(total_of_cart.text()) + defaultPrice);
        }
        else{
            if(old_value != 1){
                old_value--;
                old_price_span.text(parseFloat(old_price_span.text()) - defaultPrice);
                total_of_cart.text(parseFloat(total_of_cart.text()) - defaultPrice);
            }
        }
        $(this).parent().find('input.quantity-input').val(old_value);
    });

    $(document).ready(function() {
        $("#updateCart").on('click', function (e) {
            var formData = $('#cartForm').serialize();
            var url = $('#cartForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#updateCart').html('<span style="margin-right: 4px;color: white"> جاري التحديث.. </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
                },
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success('تم تحديث سلة الشراء بنجاح');
                        $('#updateCart').fadeOut("slow");
                        $('#updateCart').html("تحديث السلة").attr('disabled', false);
                    } else {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                },
                error: function (data) {
                    if (data.status == 500) {
                        $('#updateCart').html("تحديث السلة").attr('disabled', false);
                        toastr.error('عذرا هناك خطأ فني 😞');
                    } else if (data.status == 422) {
                        $('#updateCart').html("تحديث السلة").attr('disabled', false);
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
            });

        });
    });

</script>
