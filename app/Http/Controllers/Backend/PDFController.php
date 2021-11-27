<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);
        $details = OrderDetails::where('order_id', $id)->get();
        $data = [
            'name' => $order->name,
            'email' => $order->email,
            'mobile' => $order->mobile,
            'payment_method' => $order->payment_method,
            'txn_id' => $order->txn_id,
            'date' => date('d/m/Y'),
            'details' => $details
        ];

        $pdf = PDF::loadView('orderDetails', $data);

        return $pdf->download($data['name'].'-order.pdf');
    }
}