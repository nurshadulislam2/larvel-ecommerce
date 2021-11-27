<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function cart()
    {
        return view('front.cart');
    }

    public function add($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function checkout()
    {
        return view('front.checkout');
    }

    public function order(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'address' => 'required',
                'payment_method' => 'required',
                'txn_id' => 'required'

            ]);

            $inputs = [
                'user_id' => \Auth::user()->id,
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'payment_method' => $request->input('payment_method'),
                'txn_id' => $request->input('txn_id'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'truck_no' => 'ecom' . time()
            ];

            $order = Order::create($inputs);

            $carts = session()->get('cart');

            foreach ($carts as $cart) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $cart['product_id'],
                    'name' => $cart['name'],
                    'quantity' => $cart['quantity'],
                    'price' => $cart['price']
                ]);
            }

            
            session()->forget('cart');
            Mail::to($inputs['email'])->send(new OrderMail($order));
            DB::commit();
            return redirect()->route('profile')->with('msg', 'Order Complete');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function customerOder()
    {
        $orders = Order::where('user_id', \Auth::user()->id)->orderByDesc('id')->get();

        return view('front.order', compact('orders'));
    }

    public function orderDetails($id)
    {
        $orders = OrderDetails::where('order_id', $id)->get();
        return view('front.orderDetails', compact('orders'));
    }
}
