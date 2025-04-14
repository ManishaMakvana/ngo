<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('admin.modules', compact('programs'));
    }


    public function showProgramDashboard()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
    }

    $programs = Program::where('programid', $user->programid)->get();

    return view('program', [
        'programs' => $programs,
        'program_id' => $user->programid,
        'username' => $user->username, // Pass username to the view
    ]);
}

    



//add module
    public function create()
    {
        return view('admin.addModule');
    }

    public function store(Request $request)
    {
        $request->validate([
            'programid' => 'required|string|max:255',
            'module_id' => 'required|string|max:255',
            'std' => 'required|string|max:255',
            'document_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'publish_link' => 'nullable|url',
            'presentation_link' => 'nullable|url',
            'youtube_voiceover' => 'nullable|url',
            'google_slide' => 'nullable|url',
            'worksheet' => 'nullable|url',
        ]);

        Program::create($request->all());
        return redirect()->route('admin.modules')->with('success', 'Module added successfully!');
    }

    


      // Show all programs
        public function modulesindex(Request $request)
        {
            $search = $request->input('search');
            $perPage = $request->input('per_page', 10);
    
            // Search functionality
            $query = Program::query();
            if ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('programid', 'like', "%{$search}%");
            }
    
            $programs = $query->paginate($perPage);
    
            return view('admin.modules', compact('programs'));
        }
    
        // Show edit form
        public function edit($id)
        {
            $program = Program::find($id); // Use find instead of findOrFail
        
            if (!$program) {
                return redirect()->route('admin.modules')->with('error', 'Module not found.');
            }
        
            return view('admin.editModule', compact('program'));
        }
        
    
        // Update program
        public function update(Request $request, $id)
        {
            $request->validate([
                'programid' => 'required|string|max:255',
                'module_id' => 'required|string|max:255',
                'std' => 'required|string|max:255',
                'document_type' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'publish_link' => 'nullable|url',
                'presentation_link' => 'nullable|url',
                'youtube_voiceover' => 'nullable|url',
                'google_slide' => 'nullable|url',
                'worksheet' => 'nullable|url',
            ]);
        
            $program = Program::findOrFail($id);
            $program->update($request->all());
            
            return redirect()->route('admin.modules')->with('success', 'Module updated successfully!');
        }

        
    
        // Delete program
        public function destroy($id)
        {
            \Log::info("Deleting module with ID: " . $id);
        
            $program = Program::findOrFail($id);
            $program->delete();
        
            return redirect()->route('admin.modules')->with('success', 'Module deleted successfully!');
        }
        
    }  