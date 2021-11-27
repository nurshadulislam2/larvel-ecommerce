<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required | image',
            'description' => 'required',
            'price' => 'required | numeric'
        ]);

        $image = 'product' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/products/', $image);

        $inputs = [
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'image' => $image,
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ];

        Product::create($inputs);

        return redirect()->route('admin.product')->with('msg', 'Product Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required | numeric'
        ]);

        $inputs = [
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ];

        $product = Product::find($id);
        $product->update($inputs);

        if ($request->file('image')) {
            unlink('uploads/products/' . $product->image);
            $image = 'product' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/products/', $image);
            $product->update(['image' => $image]);
        }

        return redirect()->route('admin.product')->with('msg', 'Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink('uploads/products/' . $product->image);
        $product->delete();

        return redirect()->back()->with('msg', 'Product Delete Successfully');
    }
}