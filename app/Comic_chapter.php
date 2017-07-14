<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic_chapter extends Model
{
    protected $fillable = [
        'comic_id', 'comic_chapter', 'comic_image', 'comic_image_size', 'chapter_title',
    ];

    public function comic()
    {
    	return $this->belongsTo(Comic::class);
    }
}
