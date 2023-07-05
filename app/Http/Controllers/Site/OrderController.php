<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderReuqest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ResponseTrait;
    public function checkout()
    {
        $cart_elements = Cart::where('user_id', loggedUser('id'))
            ->with('product')->latest()->take('5')->get();
        return view('Site.Order.checkout',compact('cart_elements'));
    }

    public function makeOrder(OrderRequest $request){
        $validatedData = $request->validated();
        $validatedData['user_id'] = loggedUser('id');
        $validatedData['status']  = 'new';
        $cartData = Cart::where('user_id',loggedUser('id'))->get();
        $validatedData['total_price'] = $cartData->sum('price');
        $order = Order::create($validatedData);
        foreach ($cartData as $rowData){
            OrderDetails::create([
                'product_id' => $rowData->product_id,
                'qty'        => $rowData->qty,
                'price'      => $rowData->price,
                'order_id'   => $order->id,
            ]);
        }
        Cart::where('user_id',loggedUser('id'))->delete();
        return $this->addResponse();
    }

    public function deleteOrder(request $request){
        $row = Order::findOrFail($request->order_id);
        $row->delete();
        return response()->json([
            'status' => 200,
            'count'  => Order::where('user_id',loggedUser('id'))->count()
        ]);
}

    public function showProducts($id){
        $order = Order::where([['id',$id],['user_id',loggedUser('id')]])->firstOrFail();
        $details = OrderDetails::where('order_id',$order->id)->with('product')->get();
        return view('Site.Order.Order-Details',compact('order','details'));
    }
}
