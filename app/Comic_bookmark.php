<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic_bookmark extends Model
{
    protected $fillable = [
        'user_id', 'user_name', 'comic_title', 'comic_chapter', 'chapter_title',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
