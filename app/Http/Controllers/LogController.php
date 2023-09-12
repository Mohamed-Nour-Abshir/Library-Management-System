<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Books;
use App\Models\Issue;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class LogController extends Controller
{
    public function index()
	{

		$logs = Logs::select('id','book_issue_id','student_id','issued_at')
			->where('return_time', '=', 0)
			->orderBy('issued_at', 'DESC');

			// dd($logs);
		
		$logs = $logs->get();

		for($i=0; $i<count($logs); $i++){
	        
	        $issue_id = $logs[$i]['book_issue_id'];
	        $student_id = $logs[$i]['student_id'];
	        
	        // to get the name of the book from book issue id
	        $issue = Issue::find($issue_id);
	        $book_id = $issue->book_id;
	        $book = Books::find($issue_id);
			$logs[$i]['book_name'] = $book->title;

			// to get the name of the student from student id
			$student = Student::find($student_id);
			$logs[$i]['student_name'] = $student->first_name . ' ' . $student->last_name;

			// change issue date and return date in human readable format
			$logs[$i]['issued_at'] = date('d-M', strtotime($logs[$i]['issued_at']));
			if ($issue->return_time == 0) {
				$logs[$i]['return_time'] =  '<p class="color:red">Pending</p>';
			}else {
				$logs[$i]['return_time'] = date('d-M', strtotime($logs[$i]['return_time']));
			}

		}

        return $logs;
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		try {
			// Extract data from the request
			$data = $request->all()['data'];
			$bookID = $data['bookID'];
			$studentID = $data['studentID'];
	
			// Check if the student has any books already issued
			$alreadyIssuedBooks = Student::where('student_id', $studentID)
				->where('books_issued', true)
				->count();
	
			if ($alreadyIssuedBooks > 0) {
				throw new \Exception('Student already has an issued book.');
			}
	
			// Validate the student and book availability
			$student = Student::find($studentID);
	
			if ($student == null) {
				throw new \Exception('Invalid Student ID');
			}
	
			if ($student->approved == 0) {
				throw new \Exception('Student still not approved by Admin Librarian');
			}
	
			// Check if the student has reached the maximum allowed books
			$books_issued = $student->books_issued;
			$category = $student->category;
			$max_allowed = StudentCategories::where('cat_id', '=', $category)->firstOrFail()->max_allowed;
	
			if ($books_issued >= $max_allowed) {
				throw new \Exception('Student cannot issue any more books');
			}
	
			// Check book availability and issue the book
			$book = Issue::where('book_id', $bookID)->where('available_status', '!=', 0)->first();
	
			if ($book == null) {
				throw new \Exception('Invalid Book Issue ID');
			}
	
			if ($book->available_status != 1) {
				throw new \Exception('Book not available for issue');
			}
	
			// Begin a transaction
			DB::transaction(function () use ($bookID, $studentID, $book) {
				// Create a new log entry
				$log = new Logs;
				$log->book_issue_id = $bookID;
				$log->student_id = $studentID;
				$log->issue_by = Auth::id();
				$log->issued_at = date('Y-m-d H:i');
				$log->return_time = 0;
				$log->save();
	
				// Update book availability
				$book_issue_update = Issue::where('book_id', $bookID)->where('issue_id', $book->issue_id)->first();
				$book_issue_update->available_status = 0;
				$book_issue_update->save();
	
				// Increase the number of books issued by the student
				$student = Student::find($studentID);
				$student->books_issued = $student->books_issued + 1;
				$student->save();
	
				// Update the student_books table to mark the book as issued
				$studentBook = Student::find($studentID);
				$studentBook->student_id = $studentID;
				// $studentBook->book_id = $bookID;
				$studentBook->books_issued = true;
				$studentBook->save();
			});
	
			return 'Book Issued Successfully!';
		} catch (\Exception $e) {
			return 'An error occurred: ' . $e->getMessage();
		}
	}

	// public function store(Request $request)
	// {
	// 	$data = $request->all()['data'];
	// 	$bookID = $data['bookID'];
	// 	$studentID = $data['studentID'];
		
	// 	$student = Student::find($studentID);
		
	// 	if($student == NULL){
	// 		return "Invalid Student ID";
	// 	} else {
	// 		$approved = $student->approved;
			
	// 		if($approved == 0){

	// 			return "Student still not approved by Admin Librarian";
	// 			// throw new Exception('');
	// 		} else {
	// 			$books_issued = $student->books_issued;
	// 			$category = $student->category;
				
	// 			$max_allowed = StudentCategories::where('cat_id', '=', $category)->firstOrFail()->max_allowed;
				
	// 			if($books_issued >= $max_allowed){

	// 				return 'Student cannot issue any more books';
	// 			} else {

	// 				$book = Issue::where('book_id', $bookID)->where('available_status', '!=', 0)->first();

	// 				if($book == NULL){

	// 					return 'Invalid Book Issue ID';

	// 				} else {

	// 					$book_availability = $book->available_status;
	// 					// dd($book);
	// 					if($book_availability != 1){
	// 						return 'Book not available for issue';
	// 					} else {

	// 						// book is to be issued
	// 						DB::transaction( function() use($bookID, $studentID) {
	// 							$log = new Logs;

	// 							$log->book_issue_id = $bookID;
	// 							$log->student_id	= $studentID;
	// 							$log->issue_by		= Auth::id();
	// 							$log->issued_at		= date('Y-m-d H:i');
	// 							$log->return_time	= 0;

	// 							$log->save();

	// 							$book = Issue::where('book_id', $bookID)->where('available_status', '!=', 0)->first();
	// 							// changing the availability status
	// 							$book_issue_update = Issue::where('book_id', $bookID)->where('issue_id', $book->issue_id)->first();
	// 							$book_issue_update->available_status = 0;
	// 							$book_issue_update->save();

	// 							// increasing number of books issed by student
	// 							$student = Student::find($studentID);
	// 							$student->books_issued = $student->books_issued + 1;
	// 							$student->save();
	// 						});

	// 						return 'Book Issued Successfully!';
	// 					}
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$issueID = $id;

		$conditions = array(
			'book_issue_id'	=> $issueID,
			'return_time'	=> 0
		);

		$log = Logs::where($conditions);

		if(!$log->count()){
			return 'Invalid Book ID entered or book already returned';
		} else {
		
			$log = Logs::where($conditions)
				->firstOrFail();


			$log_id = $log['id'];
			$student_id = $log['student_id'];
			$issue_id = $log['book_issue_id'];


			DB::transaction( function() use($log_id, $student_id, $issue_id) {
				// change log status by changing return time
				$log_change = Logs::find($log_id);
				$log_change->return_time = date('Y-m-d H:i');
				$log_change->save();

				// decrease student book issue counter
				$student = Student::find($student_id);
				$student->books_issued = $student->books_issued - 1;
				$student->save();
				// Check book availability and issue the book
				$bookID = $log_change->book_issue_id;
				$book = Issue::where('book_id', $bookID)->where('available_status', '=', 0)->first();
				$book_issue_update = Issue::where('book_id', $bookID)->where('issue_id', $book->issue_id)->first();
				$book_issue_update->available_status = 1;
				$book_issue_update->save();

				// change issue availability status
				// $issue = Issue::find($issue_id);
				// $issue->available_status = 1;
				// $issue->save();
				
			});

			return 'Successfully returned';
			
		}
	}

// 	public function edit($id)
// {
//         $issueID = $id;

//         $conditions = array(
//             'book_issue_id' => $issueID,
//             'return_time'   => 0
//         );

//         $log = Logs::where($conditions);

//         if (!$log->count()) {
//             return 'Invalid Book ID entered or book already returned';
//         } else {

//             $log = Logs::where($conditions)
//                 ->firstOrFail();

//             $log_id = $log['id'];
//             $student_id = $log['student_id'];
//             $issue_id = $log['book_issue_id'];

//             DB::transaction(function () use ($log_id, $student_id, $issue_id) {
//                 // Change log status by changing return time
//                 $log_change = Logs::find($log_id);
//                 $log_change->return_time = date('Y-m-d H:i');
//                 $log_change->save();

//                 // Decrease student book issue counter
//                 $student = Student::find($student_id);
//                 $student->books_issued = $student->books_issued - 1;
//                 $student->save();

//                 // Retrieve the book associated with the book_issue_id
//                 $book = Issue::find($issue_id);

//                 // Check if the book exists and increment its available_status
//                 if ($book) {
//                     $book->available_status = 1;
//                     $book->save();
//                 }
//             });

//             return 'Successfully returned';

//         }
// }


	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

    public function renderLogs() {
        return view('panel.logs');
    }

    public function renderIssueReturn() {
		$students = Student::where('approved', 1)
							->where('books_issued',0)
							->select('students.*', 'books.book_id')
							->join('books', 'students.book_name', '=', 'books.title')
							->get();
		// $students = Student::where('approved', 1)
		// 					->select('students.*', 'books.book_id')
		// 					->join('books', 'students.book_name', '=', 'books.title')
		// 					->get();

		$books = Logs::where('return_time', '=', 0)
						->join('students', 'book_issue_logs.student_id', '=', 'students.student_id')
						->select('book_issue_logs.book_issue_id', 'students.book_name')
						->get();
		return view('panel.issue-return', compact('students','books'));
    }

	public function renderUsersLogs()
	{

		if(Auth::guard('teacher')->check()){
			$teacherEmail = Auth::guard('teacher')->user()->email;
			$logs = Logs::select('logs.id', 'logs.book_issue_id', 'logs.student_id', 'logs.issued_at', 'logs.return_time', 'logs.book_url','logs.title')
			->where('book_issue_logs.return_time', '=', 0)
			->orderBy('book_issue_logs.issued_at', 'DESC')
			->join('students', 'students.student_id', '=', 'book_issue_logs.student_id')
			->join('book_issues', 'book_issues.issue_id', '=', 'book_issue_logs.book_issue_id')
			->join('books', 'books.book_id', '=', 'book_issue_logs.book_issue_id')
			->select('book_issue_logs.*', 'students.email_id as student_email')
			->select('book_issue_logs.*', 'books.book_url', 'books.title')
			->where('students.email_id', $teacherEmail)
			->get();
		}

		if(Auth::guard('student')->check()){
			$studentEmail = Auth::guard('student')->user()->email;
			$logs = Logs::select('logs.id', 'logs.book_issue_id', 'logs.student_id', 'logs.issued_at', 'logs.return_time', 'logs.book_url','logs.title')
			->where('book_issue_logs.return_time', '=', 0)
			->orderBy('book_issue_logs.issued_at', 'DESC')
			->join('students', 'students.student_id', '=', 'book_issue_logs.student_id')
			->join('book_issues', 'book_issues.issue_id', '=', 'book_issue_logs.book_issue_id')
			->join('books', 'books.book_id', '=', 'book_issue_logs.book_issue_id')
			->select('book_issue_logs.*', 'students.email_id as student_email')
			->select('book_issue_logs.*', 'books.book_url', 'books.title')
			->where('students.email_id', $studentEmail)
			->get();
		}
		
	// 	foreach($logs as $log){
	// 	dd($log['book_url']);
	// }
		// $logs = Logs::select('logs.id', 'logs.book_issue_id', 'logs.student_id', 'logs.issued_at', 'logs.return_time')
        // ->where('book_issue_logs.return_time', '=', 0)
        // ->orderBy('book_issue_logs.issued_at', 'DESC')
        // ->join('students', 'students.student_id', '=', 'book_issue_logs.student_id')
        // ->select('book_issue_logs.*', 'students.email_id as student_email')
		// ->where('students.email_id', $studentEmail)
        // ->get();

			// dd($logs);
		
		// $logs = $logs->get();

		for($i=0; $i<count($logs); $i++){
	        
	        $issue_id = $logs[$i]['book_issue_id'];
	        $student_id = $logs[$i]['student_id'];
	        
	        // to get the name of the book from book issue id
	        $issue = Issue::find($issue_id);
	        $book_id = $issue->book_id;
	        $book = Books::find($book_id);
			$logs[$i]['book_name'] = $book->title;

			// to get the name of the student from student id
			$student = Student::find($student_id);
			$logs[$i]['student_name'] = $student->first_name . ' ' . $student->last_name;

			// change issue date and return date in human readable format
			$logs[$i]['issued_at'] = date('d-M', strtotime($logs[$i]['issued_at']));
			if ($issue->return_time == 0) {
				$logs[$i]['return_time'] =  '<p class="color:red">Pending</p>';
			}else {
				$logs[$i]['return_time'] = date('d-M', strtotime($logs[$i]['return_time']));
			}

		}

        // return $logs;
		return view('panel.users-logs',compact('logs'));
		
	}
	
}
