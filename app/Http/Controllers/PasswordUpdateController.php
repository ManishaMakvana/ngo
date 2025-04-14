<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordUpdateController extends Controller
{
    public function updatePassword()
    {
        $user = User::find(1); // Example user
        $user->password = Hash::make('your_plain_password');
        $user->save();

        return 'Password updated successfully!';
    }
}
