<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popular_book extends Model
{
    protected $fillable = [
        'id', 'book_title', 'book_image', 'counter',
    ];
}
