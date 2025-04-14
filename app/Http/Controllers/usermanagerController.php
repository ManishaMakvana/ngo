<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;


class usermanagerController extends Controller
{
    public function index()
{
    $totalActivities = Activity::count();
    return view('manager.dashboard', compact('totalActivities'));
}



   /* Store a newly created user in storage.
    */
   public function store(Request $request)
   {
       $request->validate([
           'username' => 'required|unique:users',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6',
           'programid' => 'nullable|string',
       ]);

       User::create([
           'username' => $request->username,
           'email' => $request->email,
           'password' => bcrypt($request->password),
           'programid' => $request->programid,
       ]);

       return redirect()->route('manager.usermanager')->with('success', 'User created successfully.');
   }

   /**
    * Show the form for editing the specified user.
    */
   public function edit($id)
   {
       $user = User::findOrFail($id);
       return view('manager.editUser', compact('user'));
   }

   /**
    * Update the specified user in storage.
    */
   public function update(Request $request, $id)
   {
       $user = User::findOrFail($id);

       $request->validate([
           'username' => 'required|unique:users,username,' . $id,
           'email' => 'required|email|unique:users,email,' . $id,
           'programid' => 'nullable|string',
       ]);

       $user->update([
           'username' => $request->username,
           'email' => $request->email,
           'programid' => $request->programid,
       ]);

       return redirect()->route('manager.usermanager')->with('success', 'User updated successfully.');
   }

   /**
    * Remove the specified user from storage.
    */
   public function destroy($id)
   {
       $user = User::findOrFail($id);
       $user->delete();

       return redirect()->route('manager.usermanager')->with('success', 'User deleted successfully.');
   }
}
