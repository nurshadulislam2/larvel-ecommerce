<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->orderByDesc('id')->paginate(10);
        return view('admin.user.customer', compact('customers'));
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->status = "active";
        $user->update();

        return redirect()->back()->with('msg', 'Customer is active');
    }

    public function inactive($id)
    {
        $user = User::find($id);
        $user->status = "inactive";
        $user->update();

        return redirect()->back()->with('msg', 'Customer is inactive');
    }
}