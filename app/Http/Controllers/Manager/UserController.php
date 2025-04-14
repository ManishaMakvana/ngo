<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function create()
    {
        return view('manager.users.create');
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info('Manager: Request Data:', $request->all());

        // Validate the incoming data
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'programid' => 'required|string|max:255|unique:users,programid',
            'password' => 'required|string|min:6',
        ]);

        // Log the validated data
        Log::info('Manager: Validated Data:', $validated);

        // Create the new user
        $user = new User();
        $user->username = $validated['username'];
        $user->programid = $validated['programid'];
        $user->password = Hash::make($validated['password']);

        if ($user->save()) {
            Log::info('Manager: User saved successfully!', ['user_id' => $user->id]);
        } else {
            Log::error('Manager: Failed to save user');
        }

        return redirect()->route('manager.users')->with('success', 'User added successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('manager.users')->with('success', 'User deleted successfully!');
        }

        return redirect()->route('manager.users')->with('error', 'User not found.');
    }

    public function index(Request $request)
    {
        // Get the per_page value, default to 10 if not set
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');

        // Fetch the users with pagination
        $users = User::when($search, function ($query) use ($search) {
                return $query->where('username', 'like', '%' . $search . '%');
            })
            ->paginate($perPage);

        return view('manager.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manager.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Log the update request data
        Log::info('Manager: Update Request Data:', $request->all());
    
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'programid' => 'required|string|max:255|unique:users,programid,' . $user->id,
        ]);
    
        $user->username = $request->username;
        $user->programid = $request->programid;
    
        if (!empty($request->password)) { // Only update password if provided
            $user->password = Hash::make($request->password);
        }
    
        if ($user->save()) {
            Log::info('Manager: User updated successfully!', ['user_id' => $user->id]);
        } else {
            Log::error('Manager: Failed to update user');
        }
    
        return redirect()->route('manager.users')->with('success', 'User updated successfully.');
    }
    
}