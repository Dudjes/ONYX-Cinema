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
        'price',
        'isDeleted',
    ];

    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,
            '_movie__genre', // pivot table
            'movieId',       // foreign key on pivot 
            'genreId'        // foreign key on pivot 
        );
    }

    public function plays()
    {
        return $this->hasMany(Play::class, 'movieId', 'movieId');
    }
}
