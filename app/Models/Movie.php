<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    
    private $filable = [
        'description',
        'title',
        'rate',
        'duration'
    ];
}
