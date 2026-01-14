<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $primaryKey = 'cinemaId';

    public function halls()
    {
        return $this->hasMany(Hall::class, 'cinemaId', 'cinemaId');
    }
}
