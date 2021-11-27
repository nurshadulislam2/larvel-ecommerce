<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderByDesc('id')->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required | image'
        ]);

        $image = "slider" . time() . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/sliders/', $image);

        Slider::create(['image' => $image]);

        return redirect()->route('admin.slider')->with('msg', 'Slider Create Successfully');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        unlink('uploads/sliders/' . $slider->image);
        $slider->delete();

        return redirect()->back()->with('msg', 'Slider Delete Successfully');
    }
}