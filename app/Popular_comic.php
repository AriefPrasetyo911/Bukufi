<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popular_comic extends Model
{
    protected $fillable = [
        'comic_id', 'counter', 'ip_address'
    ];
}
