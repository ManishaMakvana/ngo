<?php


namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            return redirect()->route('program', ['programid' => $user->programid]);
        }

        return back()->withErrors(['login' => 'Invalid username or password']);
    }

    public function programPage(Request $request)
    {
        $programid = $request->programid;

        return view('program', compact('programid'));
    }

  
    
}

