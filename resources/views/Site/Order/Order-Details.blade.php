<div class="table-responsive">
    <table class="table axil-product-table axil-wishlist-table">
        <thead>
        <tr>
            <th scope="col" class="product-thumbnail">المنتج</th>
            <th scope="col" class="product-title"></th>
            <th scope="col" class="product-price">الكمية</th>
            <th scope="col" class="product-stock-status">الاجمالي</th>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $row)
            <tr>
                <td class="product-thumbnail"><a href="{{route('productDetails',$row->product->title)}}"><img src="{{getFile($row->product->image)}}" alt="Digital Product"></a></td>
                <td class="product-title"><a href="{{route('productDetails',$row->product->title)}}">{{$row->product->title}}</a></td>
                <td class="product-title"><a>x{{$row->qty}}</a></td>
                <td class="product-price" data-title="Price">{{$row->price}}<span class="currency-symbol">ج.م</span></td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td>الاجمالي</td>
            <td>{{$order->total_price}} ج.م </td>
        </tr>
        </tbody>
    </table>
</div>
