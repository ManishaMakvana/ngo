<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Teacher;

class TeacherCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function build()
    {
        return $this->subject('Your Account Credentials')
                    ->view('emails.teacher_credentials')
                    ->with([
                        'teacherName' => $this->teacher->teacher_name,
                        'email' => $this->teacher->email,
                        'password' => $this->teacher->password,
                        'teacherId' => $this->teacher->teacher_id,
                    ]);
    }
}
