<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Teacher;
use Illuminate\Http\Request;

class UsersInformation extends Controller
{
    public function studentInformation(){
        $students = Member::all();
        return view('panel.student-information',['students'=>$students]);
    }

    public function teacherInformation(){
        $teachers = Teacher::all();
        return view('panel.teacher-information',['teachers'=>$teachers]);
    }
}
