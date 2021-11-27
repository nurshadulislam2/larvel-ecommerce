<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(6);
        $sliders = Slider::orderByDesc('id')->take(3)->get();

        return view('front.index', compact('products', 'sliders'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        $products = Product::orderByDesc('id')->take(3)->get();
        return view('front.product', compact('product', 'products'));
    }

    public function category($id)
    {
        $products = Product::where('category_id', $id)->orderByDesc('id')->paginate(6);
        return view('front.category', compact('products'));
    }

    public function brand($id)
    {
        $products = Product::where('brand_id', $id)->orderByDesc('id')->paginate(6);
        return view('front.brand', compact('products'));
    }

    public function profile()
    {
        return view('front.profile');
    }

    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required'
        ]);

        $user = User::find($id);
        $inputs = [
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address')
        ];

        $user->update($inputs);

        return redirect()->back()->with('msg', 'Profile Updated');
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $products = Product::where('name', 'like', '%' . $request->input('search') . '%')->paginate(6);
            return view('front.search', compact('products'));
        }
        return redirect()->back();
    }
}