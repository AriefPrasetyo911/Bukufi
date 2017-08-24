<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error_reporting extends Model
{
	protected $table = 'error_reportings';
    protected $fillable = [
        'user_id' ,'error_url', 'error_message', 'error_description',
    ];
}
