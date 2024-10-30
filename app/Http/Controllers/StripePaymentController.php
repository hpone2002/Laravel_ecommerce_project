<?php
      
namespace App\Http\Controllers;
       
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;


       
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($total_price): View
    {   
        return view('home.stripe', compact('total_price'));
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request, $total_price): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $total_price * 100, // also current price , neet to muliply with 100
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Stripe Test Payment" 
        ]);
        
        $name =  Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $user_id = Auth::user()->id;

        $carts = Cart::where('user_id', $user_id)->get();

        foreach($carts as $cart) {
            $order = new Order();

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;
            $order->payment_status = "paid";
            $order->save();
        }

        foreach($carts as $cart) {
            $cart->delete();
        }

        toastr()->closeButton()->timeout(3000)->addSuccess('Paid Successfully');

        return redirect('mycart');

        // return redirect('mycart')->with('success', 'Payment has been successful');
    }
}