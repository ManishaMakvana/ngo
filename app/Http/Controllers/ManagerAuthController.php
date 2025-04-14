<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager; // ✅ Use Manager Model

class ManagerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('manager.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // ✅ Attempt authentication using Guard for 'manager'
        if (Auth::guard('manager')->attempt($credentials)) {
            return redirect()->route('manager.dashboard');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect('/');
    }
}
