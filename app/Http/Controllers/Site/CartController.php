<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\PaymentPlatform;
use App\Models\Product;
use App\Models\Order;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $paymentPlatforms = PaymentPlatform::all();
        $currencies = Currency::all();
        return view('user.shoppingcart.index', ['currencies' => $currencies, 'paymentPlatforms' => $paymentPlatforms]);
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::find($id);
        if (!$product) {

        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->product_price,
                    "photo" => $product->product_img
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->product_img
        ];
        session()->put('cart', $cart);
        // start store order
        $order = new Order();
        $order->cart = serialize($cart);
        $order->payment_id = $cart[$id];

        Auth::user()->orders()->save($order);
        // end store order
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];
        $request->validate($rules);

        $paymentPlatform = resolve(PayPalService::class);

        return $paymentPlatform->handlePayment($request);

    }

    public function approval()
    {
        $paymentPlatform = resolve(PayPalService::class);

        return $paymentPlatform->handleApproval();

    }

    public function cancelled()
    {
//
    }


}
