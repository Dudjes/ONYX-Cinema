<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Genre extends Model
{
    protected $primaryKey = 'genreId';
    public $incrementing = true;
    protected $fillable = ['genreName'];

    public function movies()
    {
        return $this->belongsToMany(
            Movie::class,
            '_movie__genre', // pivot table
            'genreId',       // foreign key on pivot 
            'movieId'        // foreign key on pivot 
        );
    }
}
