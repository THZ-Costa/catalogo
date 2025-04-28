<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use SoftDeletes;
    
    private $filable = [
        'description',
        'title',
        'rate',
        'duration'
    ];
}
