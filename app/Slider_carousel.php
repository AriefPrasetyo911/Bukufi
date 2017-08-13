<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider_carousel extends Model
{
    protected $table = 'slider_carousels';

    protected $fillable = [
        'slider_image'
    ];
}
