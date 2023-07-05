@extends('Site.Layout.app')
@section('content')
    <!-- Start Wishlist Area  -->
    <div class="axil-wishlist-area axil-section-gap">
        <div class="container">
            <div class="product-table-heading">
                <h4 class="title">منتجات تم اضافتها للمفضلة </h4>
            </div>
            <div class="container text-center {{($userFavProducts->count()) ? 'd-none' : ''}}" id="no-wishlist">
                <p>لا يوجد اي منتج في المفضلة الان</p>
                <img src="{{asset('uploads/wishlist.webp')}}" style="height: 360px;width: 30%;">
            </div>
            <div class="table-responsive {{($userFavProducts->count()) ? '' : 'd-none'}}" id="wishlist-preview">
                <table class="table axil-product-table axil-wishlist-table">
                    <thead>
                    <tr>
                        <th scope="col" class="product-remove"></th>
                        <th scope="col" class="product-thumbnail">المنتج</th>
                        <th scope="col" class="product-title"></th>
                        <th scope="col" class="product-price">سعر المنتج</th>
                        <th scope="col" class="product-add-cart"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userFavProducts as $favourite)
                        <tr id="fav{{$favourite->id}}">
                            <td class="product-remove"><a href="#" class="remove-wishlist" data-id="{{$favourite->id}}"
                                                          title="ازالة"><i class="fal fa-times"></i></a></td>
                            <td class="product-thumbnail"><a
                                    href="{{route('productDetails',$favourite->product->title)}}"><img
                                        src="{{getFile($favourite->product->image)}}"
                                        alt="{{$favourite->product->title}}"></a></td>
                            <td class="product-title"><a
                                    href="{{route('productDetails',$favourite->product->title)}}">{{$favourite->product->title}}</a>
                            </td>
                            <td class="product-price" data-title="Price">
                                @if($favourite->product->price_after && $favourite->product->price_after != 0)
                                    <b>{{$favourite->product->price_after}} ج م</b>
                                    <strike>{{$favourite->product->price_before}} ج م</strike>
                                @else
                                    <b>{{$favourite->product->price_before}} ج م</b>
                                @endif
                            </td>
                            <td class="product-add-cart add-to-cart" data-id="{{$favourite->product->id}}">
                                <a href="javascript:void(0)" class="axil-btn btn-outline">
                                     اضف للسلة
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Wishlist Area  -->
@endsection
@section('site-js')

    <script>
        $('.remove-wishlist').click(function () {
            var favourite_id = $(this).data("id");
            var url = "{{route('removeFavourite')}}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    "favourite_id": favourite_id
                },
                beforeSend: function () {
                    $(".loader-container").show();
                },
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success(data.message);
                        $('#fav' + favourite_id).fadeOut('slow');
                        if (data.count != 0) {
                            $('#wishIcon').html(`<span class="wishlist-count">${data.count}</span><i class="flaticon-heart"></i>`)
                        } else {
                            $('#wishlist-preview').hide();
                            $('#no-wishlist').removeClass('d-none');
                            $('#wishIcon').html(`<i class="flaticon-heart"></i>`)
                        }
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

@endsection
