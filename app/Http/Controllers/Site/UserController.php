<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Cart;
use App\Models\FavoriteProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Traits\ResponseTrait;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ResponseTrait,UploadFiles;

    public function profile(){
        $orders = Order::where('user_id',loggedUser('id'))->latest()->get();
        return view('Site/User/profile',compact('orders'));
    }

    public function updateProfile(UserRegisterRequest $request){
        $validatedData = $request->validated();

        // handle image
        if($request->has('image')){
            $validatedData['image'] = $this->saveFile($request->image,'assets/uploads/users','yes',70);
            if (file_exists(loggedUser('image'))) {
                unlink(loggedUser('image'));
            }
        }
        else
            unset($validatedData['image']);

        // handle password
        if($request->has('password') && $request->password != null)
            $validatedData['password'] = Hash::make($request->password);
        else
            unset($validatedData['password']);

        // update user
        $user = User::find(loggedUser('id'));
        $user->update($validatedData);
        Auth::guard('user')->login($user);
        return response()->json([
            'status' => 200,
            'message' => "تم تحديث بيانات الحساب بنجاح",
            'name'    => loggedUser('name'),
            'image'   => getUserImage(loggedUser('image'))
        ]);
    }

    // cart handle
    public function addToCart(request $request){
        $data = $request->validate([
            'product_id'   =>'required|exists:products,id',
        ]);

        // check if exists in the cart
        $check = Cart::where([['product_id',$data['product_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            return response()->json([
                'status' => 202,
                'message' => "المنتج موجود بالفعل في السلة",
            ]);
        }

        // add to cart
        $data['user_id'] = loggedUser('id');

        // get the price
        $product = Product::find($data['product_id']);
        if($product->price_after != 0)
            $data['price'] = $product->price_after;
        else
            $data['price'] = $product->price_before;

        Cart::create($data);
        $count = Cart::where('user_id', $data['user_id'])->count();
        return response()->json([
            'status' => 200,
            'message' => "تم اضافة المنتج للسلة",
            'count'   => $count
        ]);
    }


    public function getMyCart(){
        $cart_elements = Cart::where('user_id', loggedUser('id'))
            ->with('product')->latest()->take('5')->get();
        if($cart_elements->count() == 0)
            return view('Site/User/Empty-Cart');
        else
            return view('Site/User/Cart',compact('cart_elements'));
    }

    public function deleteFromMyCart(request $request){
        $data = $request->validate([
            'cart_id'   =>'required|exists:carts,id',
        ]);
        // check if exists in the cart
        $check = Cart::where([['id',$data['cart_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            // remove from cart
            $data['user_id'] = loggedUser('id');
            $check->delete();
            $count = Cart::where('user_id', $data['user_id'])->count();
            return response()->json([
                'status' => 200,
                'message' => "تم حذف المنتج من السلة",
                'count'   => $count
            ]);
        }
    }
    ///////////////

    // wishlist handle
    public function addToWishlist(request $request){
            $data = $request->validate([
            'product_id'   =>'required|exists:products,id',
        ]);



        // check if exists in the wishlist
        $check = FavoriteProduct::where([['product_id',$data['product_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            $check->delete();
            $count = FavoriteProduct::where('user_id',loggedUser('id'))->count();
            return response()->json([
                'status' => 200,
                'message' => "تم ازالة المنتج من المفضلة",
                'count'   => $count
            ]);
        }
        else{
            // add to cart
            $data['user_id'] = loggedUser('id');
            FavoriteProduct::create($data);
            $new_count = FavoriteProduct::where('user_id',loggedUser('id'))->count();
            return response()->json([
                'status' => 200,
                'message' => "تم اضافة المنتج الي المفضلة",
                'count'   => $new_count
            ]);
        }
    }

    public function wishlistPage(){
        $userFavProducts = FavoriteProduct::where('user_id',loggedUser('id'))
            ->with(['product'=> function ($query) {
        $query->select('id', 'title','image','price_before','price_after');
    }])->select('id','product_id')->get();
        return view('Site/User/wishlist',compact('userFavProducts'));
    }

    public function removeFavourite(request $request){
        $data = $request->validate([
            'favourite_id'   =>'required|exists:favorite_products,id',
        ]);
        // check if exists in the wishlist
        $check = FavoriteProduct::where([['id',$data['favourite_id']],['user_id',loggedUser('id')]])->first();
        if($check){
            $check->delete();
            $count = FavoriteProduct::where('user_id',loggedUser('id'))->count();
            return response()->json([
                'status' => 200,
                'message' => "تم ازالة المنتج من المفضلة",
                'count'   => $count,
            ]);
        }
    }
    /////////////////////


}
