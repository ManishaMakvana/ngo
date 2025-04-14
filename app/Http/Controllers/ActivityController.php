<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\Program;

class ActivityController extends Controller
{
    /**
     * Show the list of activities.
     */
    public function index()
    {
        // Fetch activities with program data, ensuring programid is used
        $activities = Activity::with(['program', 'user'])->paginate(10);

        return view('manager.activities.index', compact('activities'));
    }

    /**
     * Show the activity assignment form.
     */
    public function create()
    {
        $trainers = User::all(); // Fetch all users (removed role condition)
        $programs = Program::all(); // Fetch all programs
        return view('manager.activities.create', compact('trainers', 'programs'));
    }

    /**
     * Store the assigned activity.
     */
    public function store(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'programid' => 'required|exists:programs,programid', // Validate with programid
            'username' => 'required|exists:users,username',
            'activity_name' => 'required|string|max:255',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed,in_progress',
        ]);

        // Create the activity
        Activity::create([
            'programid' => $validatedData['programid'],
            'username' => $validatedData['username'],
            'activity_name' => $validatedData['activity_name'],
            'due_date' => $validatedData['due_date'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('manager.activities.index')->with('success', 'Activity assigned successfully!');
    } 


    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('manager.activities.edit', compact('activity'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'activity_name' => 'required|string|max:255',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
        ]);
    
        $activity = Activity::findOrFail($id);
        $activity->update($request->all());
    
        return redirect()->route('manager.activities.index')->with('success', 'Activity updated successfully.');
    }
    
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
    
        return redirect()->route('manager.activities.index')->with('success', 'Activity deleted successfully.');
    }
    

}
