<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Movie extends Model
{
    protected $primaryKey = 'movieId';
    public $incrementing = true;

    protected $fillable = [
        'movieName',
        'ageRequirement',
        'duration',
        'description',
        'image',
        'isDeleted',
        'genreId',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genreId', 'genreId');
    }
}
