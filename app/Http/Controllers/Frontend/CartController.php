<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product,Request $request){
        //return $product;

        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);


        session()->put('cart',$cart);
        notify()->success('Product added to cart!');
        return redirect()->back();

    }

    public function showCart(){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('cart',compact('cart'));
    }
    public function updateCart(Request $request, Product $product){
        $request->validate([
            'qty'=>'required|numeric|min:1'
        ]);

        $cart  = new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty);
        session()->put('cart',$cart);
        notify()->success(' Cart updated!');
        return redirect()->back();

    }

    public function removeCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQty<=0){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);


        }
        notify()->success(' Cart updated!');
        return redirect()->back();
    }

    public function checkout($amount){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('checkout',compact('amount','cart'));
    }
//for loggedin user
    public function order(){
        $orders = auth()->user()->orders;
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('order',compact('carts'));

    }

    //for admin
    public function userOrder(){
        $orders = Order::latest()->get();
        return view('Backend.order.index',compact('orders'));
    }
    public function viewUserOrder($userid,$orderid){
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('Backend.order.show',compact('carts'));
    }

}
