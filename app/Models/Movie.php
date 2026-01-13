<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $primaryKey = 'movieId';

    protected $fillable = [
        'movieName',
        'ageRequirement',
        'duration',
        'isDeleted',
        'genreId',
    ];
}
