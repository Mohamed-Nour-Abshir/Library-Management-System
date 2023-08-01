<?php

namespace App\Http\Controllers\Auth;

use App\Models\Branch;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Member;
use App\Models\StudentCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentRegisterController extends Controller
{
    // protected $redirectTo = '/student/dashboard';
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function showRegistrationForm()
    {
        // You can pass any required data to the view here (e.g., branch_list, student_categories_list)
        $branch_list = Branch::all();
        $student_categories_list = StudentCategories::all();

        return view('auth.student.register',['branch_list'=>$branch_list,'student_categories_list'=>$student_categories_list]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'rollnumber' => ['required', 'numeric'],
            'branch' => ['required', 'numeric'],
            'year' => ['required', 'numeric'],
            'category' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required','min:8'],
            'password_again'=> 'required|same:password'
        ]);
    }

    protected function create(array $data)
    {
        return Member::create([
            'first_name' => $data['first'],
            'last_name' => $data['last'],
            'roll_num' => $data['rollnumber'],
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

        // Creating the student using the 'create' method
        $student = $this->create($request->all());

        // Logging in the registered student
        Auth::guard('student')->login($student);

        return redirect($this->redirectTo);
    }
}
