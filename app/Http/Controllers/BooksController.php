<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\Logs;
use App\Models\Books;
use App\Models\Issue;
use App\Models\Branch;
use App\Models\Student;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\BookCategories;
use App\Models\StudentCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Validator;
use Exception;

class BooksController extends Controller
{
    public function __construct(){

		$this->filter_params = array('category_id');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$searchTerm = $request->input('search');
		$book_list = Books::select('book_id','title','author','description','book_categories.category')
		->join('book_categories', 'book_categories.id', '=', 'books.category_id')
			->orderBy('book_id')->get();
		// dd($book_list);
		// $this->filterQuery($book_list);

		// $book_list = $book_list->get();

		for($i=0; $i<count($book_list); $i++){

	        $id = $book_list[$i]['book_id'];
	        $conditions = array(
	        	'book_id'			=> $id,
	        	'available_status'	=> 1
        	);

	        $book_list[$i]['total_books'] = Issue::select()
	        	->where('book_id','=',$id)
	        	->count();

	        $book_list[$i]['avaliable'] = Issue::select()
	        	->where($conditions)
	        	->count();
		}

        return $book_list;
		
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	 
	 public function store(Request $request)
	 {
		 $books = $request->all();
	 
		 // Handle image upload
		 $imagePath = null;
		 if ($request->hasFile('image') && $request->file('image')->isValid()) {
			 $imageFile = $request->file('image');
			 $imageName = time() . '.' . $imageFile->extension();
			 $imagePath = $imageFile->storeAs('book_covers', $imageName, 'public'); // Store the image in the "public/book_covers" directory
			 $imagePath = str_replace('public/', '', $imagePath); // Remove "public/" from the image path
		 }
	 
		 $db_flag = false;
		 $user_id = Auth::guard('admin')->user()->id;
		 $book_title = Books::create([
			 'title' => $books['title'],
			 'author' => $books['author'],
			 'description' => $books['description'],
			 'category_id' => $books['category_id'],
			 'book_url' => $books['book_url'],
			 'added_by' => $user_id,
			 'image' => $imageName,
		 ]);

			// dd($book_title);
			$newId = $book_title->book_id;
			// dd($newId);
			if(!$book_title){
				$db_flag = true;
			} else {
				$number_of_issues = $books['number'];

				for($i=0; $i<$number_of_issues; $i++){

					$issues = Issue::create([
						'book_id'	=> $newId,
						'added_by'	=> $user_id
					]);

					if(!$issues){
						$db_flag = true;
					}
				}
			}

			if($db_flag)
				return'Invalid update data provided';

		// });

		return "Books Added successfully to Database";

	}


	public function BookCategoryStore(Request $request)
	{
		$bookcategory = BookCategories::create($request->all());
		
		if (!$bookcategory) {

			return 'Book Category fail to save!';
		}else {

			return "Book Category Added successfully to Database";
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($string)
	{
		$book_list = Books::select('book_id','title','author','description','book_categories.category')
		->join('book_categories', 'book_categories.id', '=', 'books.category_id')
			->where('title', 'like', '%' . $string . '%')
			->orWhere('author', 'like', '%' . $string . '%')
			->orderBy('book_id');

		$book_list = $book_list->get();

		foreach($book_list as $book){
			$conditions = array(
				'book_id'			=> $book->book_id,
				'available_status'	=> 1
			);

			$count = Issue::where($conditions)
				->count();

			$book->avaliability = ($count > 0) ? true : false;
		}

        return $book_list;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $issue = Issue::find($id);
		// if($issue == NULL){
		// 	return 'Invalid Book ID';
		// }

		// $book = Books::find($issue->book_id);

		// $issue->book_name = $book->title;
		// $issue->author = $book->author;

		// $issue->category = Categories::find($book->category_id)
		// 	->category;

		// $issue->available_status = (bool)$issue->available_status;
		// if($issue->available_status == 1){
		// 	return $issue;
		// }

		// $conditions = array(
		// 	'return_time'	=> 0,
		// 	'book_issue_id'	=> $id,
		// );
		// $book_issue_log = Logs::where($conditions)
		// 	->take(1)
		// 	->get();

		// foreach($book_issue_log as $log){
		// 	$student_id = $log->student_id;
		// }

		// $student_data = Student::find($student_id);

		// unset($student_data->email_id);
		// unset($student_data->books_issued);
		// unset($student_data->approved);
		// unset($student_data->rejected);

		// $student_branch = Branch::find($student_data->branch)
		// 	->branch;
		// $roll_num = $student_data->roll_num . '/' . $student_branch . '/' . substr($student_data->year, 2, 4);

		// unset($student_data->roll_num);
		// unset($student_data->branch);
		// unset($student_data->year);

		// $student_data->roll_num = $roll_num;

		// $student_data->category = StudentCategories::find($student_data->category)
		// 	->category;
		// $issue->student = $student_data;


        // return $issue;

		$book = Books::find($id);
		$categories_list = Categories::all();
		return view('panel.editbook', compact('book', 'categories_list'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		//
		$book = Books::find($id);

		if (!$book) {
			return 'Invalid Book ID';
		}
	
		// Validate the input data
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'author' => 'required',
			'description' => 'required',
			'category_id' => 'required',
			// 'image' => 'required',
		]);
	
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
	
		// Update book details
		$book->title = $request->input('title');
		$book->author = $request->input('author');
		$book->description = $request->input('description');
		$book->category_id = $request->input('category_id');
	
		// Handle image update
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			// Delete old image if it exists
			if ($book->image && Storage::disk('public')->exists('book_covers/' . $book->image)) {
				Storage::disk('public')->delete('book_covers/' . $book->image);
			}
	
			$imageFile = $request->file('image');
			$imageName = time() . '.' . $imageFile->extension();
			$imagePath = $imageFile->storeAs('book_covers', $imageName, 'public');
			$imagePath = str_replace('public/', '', $imagePath);
	
			$book->image = $imageName;
		}
	
		$book->save();
	
		return redirect('/all-books')->with('success', 'Book updated successfully');
	}
	


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$book = Books::find($id);
	
		if (!$book) {
			return redirect('/all-books')->with('error', 'Book not found');
		}
	
		// Delete the book
		$book->delete();
	
		return redirect('/all-books')->with('success', 'Book deleted successfully');
	}

	// public function renderAddBookCategory(Type $var = null)
	public function renderAddBookCategory($var = null)
	{
        return view('panel.addbookcategory');
	}


    public function renderAddBooks() {
        $db_control = new HomeController();

        return view('panel.addbook')
            ->with('categories_list', $db_control->categories_list);
    }

    public function renderAllBooks() {
        $db_control = new HomeController();

		return view('panel.allbook')
            ->with('categories_list', $db_control->categories_list)
            ->with('book_list', $db_control->book_list);
	}
	
	public function BookByCategory($cat_id)
	{
		$book_list = Books::select('book_id','title','author','description','book_categories.category')
		->join('book_categories', 'book_categories.id', '=', 'books.category_id')
			->where('category_id', $cat_id)->orderBy('book_id');

			$book_list = $book_list->get();

			for($i=0; $i<count($book_list); $i++){

				$id = $book_list[$i]['book_id'];
				$conditions = array(
					'book_id'			=> $id,
					'available_status'	=> 1
				);
	
				$book_list[$i]['total_books'] = Issue::select()
					->where('book_id','=',$id)
					->count();
	
				$book_list[$i]['avaliable'] = Issue::select()
					->where($conditions)
					->count();
			}
	
			return $book_list;
	}

    public function searchBook(){
    	$db_control = new HomeController();

		return view('public.book-search')
			->with('categories_list', $db_control->categories_list);
    }
}
