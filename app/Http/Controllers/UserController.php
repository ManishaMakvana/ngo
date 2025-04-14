<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;  // Import the Hash facade
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    // Log the incoming request data
    Log::info('Request Data:', $request->all());

    // Validate the incoming data
    $validated = $request->validate([
        'username' => 'required|string|max:255',
        'programid' => 'required|string|max:255',
        'password' => 'required|string',
    ]);

    // Log the validated data
    Log::info('Validated Data:', $validated);

    // Create the new user
    $user = new User();
    $user->username = $validated['username'];
    $user->programid = $validated['programid'];
    $user->password = Hash::make($validated['password']);
    
    if ($user->save()) {
        Log::info('User saved successfully!', ['user_id' => $user->id]);
    } else {
        Log::error('Failed to save user');
    }

    // Redirect back with a success message
    return redirect()->route('admin.users')->with('success', 'User added successfully!');
}

public function destroy($id)
{
    $user = User::find($id);

    if ($user) {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }

    return redirect()->route('admin.users')->with('error', 'User not found.');
}


public function index(Request $request)
{
    // Get the per_page value, default to 10 if not set
    $perPage = $request->get('per_page', 10);
    $search = $request->get('search');

    // Fetch the users with pagination
    $users = User::when($search, function($query) use ($search) {
            return $query->where('username', 'like', '%' . $search . '%');
        })
        ->paginate($perPage);

    return view('admin.users', compact('users'));
}


}