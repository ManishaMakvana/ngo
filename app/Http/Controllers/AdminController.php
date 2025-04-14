<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        $totalUsers = User::count();
        $totalModules = Program::count();

        return view('admin.dashboard', compact('totalUsers', 'totalModules'));
    }

    public function dashboard()
    {
        $totalUsers = User::count(); // Count total users
        $totalModules = Program::count(); // Count total modules

        // Return the admin dashboard view with the data
        return view('admin.dashboard', compact('totalUsers', 'totalModules'));
    }

    // Manage Users
    public function users(Request $request)
    {
        $search = $request->get('search'); // Get the search term from the request
        $users = User::when($search, function ($query, $search) {
            $query->where('username', 'LIKE', "%{$search}%")
                  ->orWhere('programid', 'LIKE', "%{$search}%");
        })->get();

        return view('admin.users', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'programid' => 'required|string|max:255',
        ]);

        $user->update($request->only(['username', 'programid']));
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Admin Login/Logout
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
         return redirect('/');
    }

    // Search and display modules
    public function modules(Request $request)
    {
        $search = $request->get('search'); // Get the search term from the request
        $programs = Program::when($search, function ($query, $search) {
            $query->where('programid', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%")
                  ->orWhere('module_id', 'LIKE', "%{$search}%");
        })->get();

        return view('admin.modules', compact('programs'));
    }

    public function editProgram($id)
{
    $program = Program::findOrFail($id); // Find the program by ID
    return view('admin.editProgram', compact('program')); // Pass the program to the view
}

public function updateProgram(Request $request, $id)
{
    // Find the program by its ID
    $program = Program::findOrFail($id);

    // Validate the request data
    $request->validate([
        'programid' => 'required|string|max:255',
        'module_id' => 'required|string|max:255',
        'std' => 'required|string|max:255',
        'document_type' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'publish_link' => 'nullable|url', // You can adjust this validation based on your needs
    ]);

    // Update the program with the new data
    $program->update([
        'programid' => $request->programid,
        'module_id' => $request->module_id,
        'std' => $request->std,
        'document_type' => $request->document_type,
        'title' => $request->title,
        'publish_link' => $request->publish_link, // Ensure that all the necessary fields are updated
    ]);

    // Redirect to the modules page with a success message
    return redirect()->route('admin.modules')->with('success', 'Module updated successfully.');
}


public function deleteProgram($id)
{
    // Find the program by ID
    $program = Program::findOrFail($id);

    // Delete the program from the database
    $program->delete();

    // Redirect to the modules page with a success message
    return redirect()->route('admin.modules')->with('success', 'Program deleted successfully.');
}

}
