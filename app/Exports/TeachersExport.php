<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Teacher::select('id', 'email', 'teacher_name', 'teacher_id', 'password')->get();
    }

    public function headings(): array
    {
        return ["ID", "Email", "Teacher Name", "Teacher ID", "Password"];
    }
}
