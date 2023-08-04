<?php

namespace App\Http\Controllers\Auth;

use App\Models\Branch;
use App\Models\Member;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\StudentCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class TeacherRegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::TEACHER_HOME;

    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function showRegistrationForm()
    {
        // You can pass any required data to the view here (e.g., branch_list, student_categories_list)
        $branch_list = Branch::all();
        $student_categories_list = StudentCategories::all();

        return view('auth.teacher.register',['branch_list'=>$branch_list,'student_categories_list'=>$student_categories_list]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'id_num' => ['required', 'numeric'],
            'branch' => ['required', 'numeric'],
            'year' => ['required', 'numeric'],
            'category' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'password' => ['required','min:8'],
            'password_again'=> 'required|same:password'
        ]);
    }

    protected function create(array $data)
    {
        return Teacher::create([
            'first_name' => $data['first'],
            'last_name' => $data['last'],
            'id_num' => $data['id_num'],
            'branch' => $data['branch'],
            'year' => $data['year'],
            'category' => $data['category'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Creating the teacher using the 'create' method
        $teacher = $this->create($request->all());

        // Logging in the registered teacher
        Auth::guard('teacher')->login($teacher);

        return redirect($this->redirectTo);
    }
}
