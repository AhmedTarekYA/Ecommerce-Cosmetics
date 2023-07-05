<div class="cart-body">
    <ul class="cart-item-list" id="cart-list">
        @foreach($cart_elements as $cart)
            <li class="cart-item" id="liOfCart{{$cart->id}}">
                <div class="item-img">
                    <a href="{{route('productDetails',$cart->product->title)}}"><img
                            src="{{getFile($cart->product->image)}}"
                            alt="{{$cart->product->title}}"></a>
                    <button class="close-btn deleteFromCart" data-id="{{$cart->id}}"><i class="fas fa-times"></i></button>
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
                            <strike>{{$cart->product->price_before}} ج م</strike>
                            <span class="price"> {{$cart->product->price_after}} </span>ج م
                        @else
                            <span class="price"> {{$cart->product->price_before}} </span>ج م
                        @endif
                    </div>
                    <div class="pro-qty item-quantity">
                        <span class="control-qty minus">-</span>
                        <input type="number" disabled class="quantity-input" min="1" value="{{$cart->qty}}">
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
        <span class="subtotal-amount" id="subtotal-amount">{{$cart_elements->sum('price')}} ج.م</span>
    </h3>
    <div class="group-btn">
        <a href="{{route('checkout')}}" class="axil-btn btn-bg-secondary checkout-btn">اكمال الطلب</a>
        <a href="cart.html" class="axil-btn btn-bg-primary viewcart-btn">تحديث السلة</a>
    </div>
</div>
<script>

    // remove from cart
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


    // handle product qty
    $('.control-qty').click(function (){
        var old_value = $(this).parent().find('input').val();
        var old_price_span = $(this).parent().parent().find(".price");
        if($(this).hasClass('plus')){
            old_value++;
            old_price_span.text(parseFloat(old_price_span.text()) + parseFloat(old_price_span.text()));
        }
        else{
            if(old_value != 1){
                old_value--;
                old_price_span.text(parseFloat(old_price_span.text()) - parseFloat(old_price_span.text()));
            }
        }
        $(this).parent().find('input').val(old_value);
    });

</script>
