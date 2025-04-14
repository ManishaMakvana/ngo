<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachersImport implements ToModel
{
    public function model(array $row)
    {
        // Ensure email column is not empty
        if (!isset($row[0]) || empty(trim($row[0]))) {
            return null; // Skip rows with missing emails
        }

        // Trim spaces and extract email
        $email = strtolower(trim($row[0]));

        // Check if the email already exists in the database
        if (Teacher::where('email', $email)->exists()) {
            return null; // Skip duplicate email
        }

        // Generate teacher name from email (before '@' symbol)
        $teacherName = ucfirst(explode('@', $email)[0]); 

        // Plain text password (no hashing)
        $password = substr(md5(uniqid()), 0, 8); // This is the plain text password

        // Return Teacher model with data
        return new Teacher([
            'email' => $email,
            'teacher_name' => $teacherName,
            'teacher_id' => rand(1000, 9999),
            'password' => $password, // Store password as plain text
        ]);
    }
}
