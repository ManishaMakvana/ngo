<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Teacher;

class TeacherPasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;
    public $newPassword;

    public function __construct(Teacher $teacher, $newPassword)
    {
        $this->teacher = $teacher;
        $this->newPassword = $newPassword;
    }

    public function build()
    {
        return $this->subject('Your Password Has Been Changed')
                    ->view('emails.teacher_password_changed')
                    ->with([
                        'teacherName' => $this->teacher->teacher_name,
                        'email' => $this->teacher->email,
                        'newPassword' => $this->newPassword,
                    ]);
    }
}
