<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telework extends Model
{
    protected $fillable = [
        'user_name', 'user_id', 'Start','End','Description',
    ];
}
