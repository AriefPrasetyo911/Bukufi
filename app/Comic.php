<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'comic_title', 'comic_description', 'comic_author', 'comic_genre', 'comic_release',
    ];

    public function comic_chapter()
    {
    	return $this->hasMany(Comic_chapter::class);
    }
}
