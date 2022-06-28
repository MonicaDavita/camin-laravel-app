<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if(!$admin) {
            return redirect()->back()->withErrors(['message' => 'Admin does not exist!']);
        }

        if(!Hash::check($request->password, $admin['password'])) {
            return redirect()->back()->withErrors(['message' => 'Email or password invalid!'])->withInput();
        }

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }
}
