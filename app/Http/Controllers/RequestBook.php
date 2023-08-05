<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use App\Models\Books;
use Illuminate\Http\Request;

class RequestBook extends Controller
{
    //
    public function showRequestBook(){
        $books = Books::all();
        return view('panel.request-book',['books'=>$books]);
    }

    public function requestBookPost(Request $request){
        $request->validate([
            'book_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'id_num' => 'required',
        ]);
        $bookRequest = new BookRequest();
        $bookRequest->id_num = $request->id_num;
        $bookRequest->name = $request->name;
        $bookRequest->email = $request->email;
        $bookRequest->book_name = $request->book_name;
        if(auth()->guard('teacher')){
            $bookRequest->user_type = 'teacher';
        }
        else if(auth()->guard('student')){
            $bookRequest->user_type = 'student';
        }
        $bookRequest->save();
        return redirect()->route('teacher.request-book')
                         ->with('success', 'Book Requested Successfully');

    }

    public function renderAllBookRequests(){
        $bookRequests = BookRequest::all();
        return view('panel.admin-show-allrequests',['bookRequests'=>$bookRequests]);
    }
}
