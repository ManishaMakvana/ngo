<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TeachersImport;

use App\Exports\TeachersExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TeacherController extends Controller
{
    // Show upload form
    public function showForm()
    {
        return view('teachers.upload');
    }

    // Handle Excel upload
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new TeachersImport, $request->file('file'));

        return redirect()->route('teacher.list')->with('success', 'Teachers imported successfully!');
    }

    // Display imported teachers in the browser
    public function showTeachers()
    {
        $teachers = Teacher::all(); // Fetch all teachers
        return view('teachers.list', compact('teachers'));
    }

    // Show Change Password Form
    public function editPassword($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit-password', compact('teacher'));
    }

    // Update Teacher Password
   // Update Teacher Password (Plain Text)
public function updatePassword(Request $request, $id)
{
    $request->validate([
        'password' => 'required|min:6'
    ]);

    $teacher = Teacher::findOrFail($id);
    $teacher->password = $request->password; // Store password as plain text
    $teacher->save();

    return redirect()->route('teacher.list')->with('success', 'Password updated successfully!');
}




public function exportTeachers(): BinaryFileResponse
{
    return Excel::download(new TeachersExport, 'teachers.xlsx');
}


}
