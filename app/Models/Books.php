<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = array('book_id', 'title', 'image', 'author', 'category_id', 'description', 'added_by','book_url');

    public $timestamps = false;

	protected $table = 'books';
	protected $primaryKey = 'book_id';

	protected $hidden = array();


    public function issues()
    {
        return $this::count();
    }
}
