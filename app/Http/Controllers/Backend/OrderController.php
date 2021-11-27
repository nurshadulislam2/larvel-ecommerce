<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderController extends Controller
{
    public function orderShow()
    {
        $orders = Order::orderByDesc('id')->paginate(10);
        return view('admin.order.order', compact('orders'));
    }

    public function orderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update(['status' => $request->input('status')]);
        return redirect()->back()->with('msg', 'Status Updated');
    }

    public function orderDetails($id)
    {
        $order = Order::find($id);
        $details = OrderDetails::where('order_id', $id)->get();
        return view('admin.order.orderDetais', compact('order', 'details'));
    }
}
