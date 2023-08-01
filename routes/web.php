<?php

use Auth\StudentLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\TeacherLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Auth\TeacherRegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Student routes
Route::get('student-login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
Route::post('student-login', 'Auth\StudentLoginController@login')->name('student.login.post');
Route::get('student-register', 'Auth\StudentRegisterController@showRegistrationForm')->name('student.register');
Route::post('student-register', 'Auth\StudentRegisterController@register')->name('student.registeration');

Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');

// Teacher routes
Route::get('teacher-login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('teacher-login', 'Auth\TeacherLoginController@login')->name('teacher.login.post');
Route::get('teacher-register', 'Auth\TeacherRegisterController@showRegistrationForm')->name('teacher.register');
Route::post('teacher-register', 'Auth\TeacherRegisterController@register')->name('teacher.register.post');


// Unauthenticated group 
Route::group(array('before' => 'guest'), function() {
 
	// CSRF protection 
	Route::group(array('before' => 'csrf'), function() {

		// Create an account (POST) 
		Route::post('/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		// Sign in (POST) 
		Route::post('/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		// Sign in (POST) 
		Route::post('/student-registration', array(
			'as' => 'student-registration-post',
			'uses' => 'StudentController@postRegistration'
		));	
		Route::get('/search', [AccountController::class, 'search'])->name('search');	

	});

	// Sign in (GET) 
	Route::get('/', array(
		'as' 	=> 'account-sign-in',
		'uses'	=> 'AccountController@getSignIn'
	));

	// all books (GET) 
	Route::get('/allbooks', array(
		'as' 	=> 'allbooks',
		'uses'	=> 'AccountController@allbooks'
	));

	// Create an account (GET) 
	Route::get('/create', array(
		'as' 	=> 'account-create',
		'uses' 	=> 'AccountController@getCreate'
	));

	// Student Registeration form 
	Route::get('/student-registration', array(
		'as' 	=> 'student-registration',
		'uses' 	=> 'StudentController@getRegistration'
	));
    
    // Render search books panel
    Route::get('/book', array(
        'as' => 'search-book',
        'uses' => 'BooksController@searchBook'
    ));    
	
});

// Main books Controlller left public so that it could be used without logging in too
Route::resource('/books', 'BooksController');

// Authenticated group 
// Route::group(array('before' => 'auth'), function() {
Route::group(['middleware' => ['auth']] , function() {

	// Home Page of Control Panel
	Route::get('/home',array(
		'as' 	=> 'home',
		'uses'	=> 'HomeController@home'
	));	

	// Render Add Books panel
    Route::get('/add-books', array(
        'as' => 'add-books',
        'uses' => 'BooksController@renderAddBooks'
	));

	Route::get('/add-book-category', array(
        'as' => 'add-book-category',
        'uses' => 'BooksController@renderAddBookCategory'
	));
	
	Route::post('/bookcategory', 'BooksController@BookCategoryStore')->name('bookcategory.store');
	

	// Render All Books panel
    Route::get('/all-books', array(
        'as' => 'all-books',
        'uses' => 'BooksController@renderAllBooks'
	));
	Route::put('/books/{id}', 'BooksController@update');
	Route::get('/books/{id}/edit', 'BooksController@edit')->name('books.edit');
	Route::delete('/books/{id}', 'BooksController@destroy')->name('books.destroy');
	
	Route::get('/bookBycategory/{cat_id}', array(
        'as' => 'bookBycategory',
        'uses' => 'BooksController@BookByCategory'
    ));

	// Students
    Route::get('/registered-students', array(
        'as' => 'registered-students',
        'uses' => 'StudentController@renderStudents'
    ));

    // Render students approval panel
    Route::get('/students-for-approval', array(
        'as' => 'students-for-approval',
        'uses' => 'StudentController@renderApprovalStudents'
	));
	
	  // Render students approval panel
	  Route::get('/settings', array(
        'as' => 'settings',
        'uses' => 'StudentController@Setting'
	));
	
	  // Render students approval panel
	  Route::post('/setting', array(
        'as' => 'settings.store',
        'uses' => 'StudentController@StoreSetting'
    ));

    // Main students Controlller resource
	Route::resource('/student', 'StudentController');
	
	Route::post('/studentByattribute', array(
        'as' => 'studentByattribute',
        'uses' => 'StudentController@StudentByAttribute'
    ));

    // Issue Logs
    Route::get('/issue-return', array(
        'as' => 'issue-return',
        'uses' => 'LogController@renderIssueReturn'
    ));

    // Render logs panel
    Route::get('/currently-issued', array(
        'as' => 'currently-issued',
        'uses' => 'LogController@renderLogs'
    ));

    // Main Logs Controlller resource
    Route::resource('/issue-log', 'LogController');

	// Sign out (GET) 
    Route::get('/sign-out', array(
    	'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
    ));

	// Admin Edit Profile Routes 
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
	Route::get('/profile-edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');

	// New routes for change password
    Route::get('/change-password', [ChangePasswordController::class, 'showForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

//QrCode
Route::get('qr_code',[QRController::class,'generate']);





/////////////////////////////////////////New Code

Route::group(['middleware' => ['auth:student']], function () {
    // Student-specific routes go here
	Route::get('/home',array(
		'as' 	=> 'home',
		'uses'	=> 'HomeController@home'
	));	
});

Route::group(['middleware' => ['auth:teacher']], function () {
    // Teacher-specific routes go here
	Route::get('/home',array(
		'as' 	=> 'home',
		'uses'	=> 'HomeController@home'
	));	
});

Route::group(['middleware' => ['auth:admin']], function () {
    // Admin-specific routes go here
});
