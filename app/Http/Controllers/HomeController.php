<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe;

class HomeController extends Controller
{
    

    public function index() {
        $products = Product::orderBy('created_at', 'desc')->get();

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }
        
        return view('home.index', [
            'products' => $products,
            'cart_count' => $cart_count,
        ]);
    }

    public function login_home() {
        $products = Product::orderBy('created_at', 'desc')->get();

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }
        

        return view('home.index', [
            'products' => $products,
            'cart_count' => $cart_count
        ]);
    }

    public function shop() {
        $products = Product::orderBy('created_at', 'desc')->get();

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }
        

        return view('home.shop', [
            'products' => $products,
            'cart_count' => $cart_count
        ]);
    }

    public function why_us() {

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }
        

        return view('home.why_us', [
            'cart_count' => $cart_count
        ]);
    }

    public function testimonial() {

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }
        

        return view('home.testimonial', [
            'cart_count' => $cart_count
        ]);
    }

    public function contact_us() {

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }
        

        return view('home.contact_us', [
            'cart_count' => $cart_count
        ]);
    }

    public function product_detail($id) {
        $product = Product::find($id);

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
        } else {
            $cart_count = "";
        }

        return view('home.product_detail' , [
            'product' => $product,
            'cart_count' => $cart_count,
        ]);
    }

    public function add_cart($id) {
        $product_id = $id;

        $user_id = Auth::user()->id;

        $data = new Cart();

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->closeButton()->timeout(3000)->addSuccess('Added to Cart.');

        return redirect()->back();
    }

    public function mycart() {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();

            $carts = Cart::where('user_id', $user_id)->get();

        return view('home.mycart' , [
            'cart_count' => $cart_count,
            'carts' => $carts,
        ]);
    }

    public function remove_cart($id) {
        $cart = Cart::find($id);

        $cart->delete();

        toastr()->closeButton()->addSuccess('Removed Successfully');

        return redirect()->back();
    }

    public function confirm_order(Request $request) {

        $name =  $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $user_id = Auth::user()->id;

        $carts = Cart::where('user_id', $user_id)->get();

        foreach($carts as $cart) {
            $order = new Order();

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;

            $order->save();
        }

        foreach($carts as $cart) {
            $cart->delete();
        }

        toastr()->closeButton()->timeout(3000)->addSuccess('Ordered Successfully');

        return redirect()->back();
    }

    public function myorder() {
        $products = Product::orderBy('created_at', 'desc')->get();

        if(Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_count = Cart::where('user_id', $user_id)->count();
            $orders = Order::where('user_id', $user_id)->get();
        } else {
            $count = "";
        }
        
        return view('home.myorder', [
            'products' => $products,
            'cart_count' => $cart_count,
            'orders' => $orders
        ]);
    }

    public function stripe() {
        return view('home.stripe');
    }
}
