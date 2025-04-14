<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Program;
use Illuminate\Support\Facades\Auth; 

class ReportController extends Controller
{
    public function showReports()
    {
        $reports = Report::all(); // Fetch all reports
        return view('manager.activities.reoprtsshow', compact('reports'));
    }

    public function create(Request $request)
    {
        $program_id = $request->input('program_id', '');
        $username = $request->input('username', '');

        // Fetch related programs
        $programs = Program::select('programid', 'title')->get();

        return view('reports.create', compact('program_id', 'username', 'programs'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'title' => 'required|string|max:255',
            'programid' => 'required|exists:programs,programid',
            'username' => 'required|string|max:255',
            'school' => 'required',
            'activity_name' => 'required',
            'girls' => 'required|integer|min:0',
            'boys' => 'required|integer|min:0',
            'teacher' => 'required|string',
            'due_date' => 'required|date',
            'basic_description' => 'required|string',
            'google_photos' => 'required|url',
            'hero_pic' => 'required|image|max:2048',
        ]);
    
        $report = new Report();
        $report->username = Auth::user()->username;
        $report->program_id = Auth::user()->programid;
        $report->school = $request->school;
        $report->activity_name = $request->activity_name;
        $report->girls = $request->girls;
        $report->boys = $request->boys;
        $report->teacher = $request->teacher;
        $report->due_date = $request->due_date;
        $report->basic_description = $request->basic_description;
        $report->google_photos = $request->google_photos;
    
        if ($request->hasFile('hero_pic')) {
            $path = $request->file('hero_pic')->store('reports', 'public');
            $report->hero_pic = $path;
        }
    
        $report->save();
    
        return redirect()->route('program')->with('success', 'Report submitted successfully!');
    }
    

    public function updateStatus(Request $request, $id)
{
    $report = Report::findOrFail($id);
    $report->status = $request->status; // 'approved' or 'rejected'
    $report->save();

    return redirect()->back()->with('success', 'Report status updated successfully.');
}


}
