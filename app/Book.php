<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_image', 'book_title', 'book_description', 'book_author', 'book_publisher', 'book_release'
    ];


    function popularbook()
    {
    	return $this->hasOne('App\Popular_book', 'book_title');
    }
}
