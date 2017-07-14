<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic_genre extends Model
{
    protected $fillable = [
        'comic_id', 'comic_genre',
    ];

    public function comic()
    {
    	return $this->belongsTo(Comic::class);
    }
}
