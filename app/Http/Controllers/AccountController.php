<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    	### Sign In
	/* After submitting the sign-in form */
	protected $redirectTo = '/home';
	public function postSignIn(Request $request) {
		$credentials = $request->only('username', 'password');
		// $validator = $request->validate([
		// 		'username' 	=> 'required',
		// 		'password'	=> 'required'

		// ]);
		// if(!$validator) {
		// 	// Redirect to the sign in page
		// 	return Redirect::route('account-sign-in')
		// 		->withErrors($validator)
		// 		->withInput();   // redirect the input

		// } else {

		// 	$remember = ($request->has('remember')) ? true : false;
		// 	$auth = Auth::attempt(array(
		// 		'username' => $request->get('username'),
		// 		'password' => $request->get('password')
		// 	), $remember);
		// } 

		// if($auth) {
			
		// 	return Redirect::intended('home');

		// } else {
			
		// 	return Redirect::route('account-sign-in')
		// 		->with('global', 'Wrong Email or Wrong Password.');
		if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed, redirect to the intended page.
            return redirect()->intended($this->redirectTo);
        }

        // Authentication failed, redirect back to the login page with an error message.
        return redirect()->route('account-sign-in')->with('error', 'Invalid login credentials.');
		// }

		return Redirect::route('account-sign-in')
			->with('global', 'There is a problem. Have you activated your account?');
	}

	/* Submitting the Create User form (POST) */
	public function postCreate(Request $request) {
		// dd($request->all());
		$validator = $request->validate([
				'username'		=> 'required|max:20|min:3|unique:users',
				'password'		=> 'required',
				'password_again'=> 'required|same:password'
		]);

		if(!$validator) {
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			// create an account
			$username	= $request->get('username');
			$password 	= $request->get('password');

			$userdata = User::create([
				'username' 	=> $username,
				'password' 	=> Hash::make($password)	// Changed the default column for Password
			]);

			if($userdata) {			


				return Redirect::route('account-sign-in')
					->with('global', 'Your account has been created. We have sent you an email to activate your account');				
			}
		}
	}

	public function getSignIn() {
		$book_lists = Books::select('book_id','title','image','author','description','book_categories.category')
		->join('book_categories', 'book_categories.id', '=', 'books.category_id')
		->orderBy('book_id')->get();
		return view('account.signin',compact('book_lists'));
	}

	//Return Admin To Login Page
	public function login(){
		return view('auth.admin.login');
	}

	public function allbooks(Request $request) {
		$searchTerm = $request->input('search');
		$book_lists = Books::select('book_id','title','image','author','description','book_categories.category')
		->join('book_categories', 'book_categories.id', '=', 'books.category_id')->where('title', 'LIKE', "%$searchTerm%")
		->orderBy('book_id')->get();
		return view('account.allbooks',compact('book_lists'));
	}
	public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $users = Books::where('title', 'LIKE', "%$searchTerm%")->get(); // Replace 'name' with the column you want to search

        return view('account.allbooks', compact('users'));
    }

	/* Viewing the form (GET) */
	public function getCreate() {
		return view('account.create');
	}

	### Sign Out
	public function getSignOut() {
		Auth::logout();
		return Redirect::route('account-sign-in');
	}

}
