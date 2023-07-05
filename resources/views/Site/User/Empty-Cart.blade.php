<div class="cart-body">
    <ul class="cart-item-list" id="cart-list">
<div id="emptyCart"
     class="text-center {{(\App\Models\Cart::where('user_id',loggedUser('id'))->count()) ? 'd-none' : ''}}">
    <p>سلة الشراء فارغة الان</p>
    <img src="{{asset('uploads/cart.webp')}}" style="width: 80%;height: 60%" alt="السلة فارغة">
</div>
    </ul>
</div>

