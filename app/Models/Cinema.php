<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $primaryKey = 'cinemaId';
    protected $fillable = [
        'cinemaName',
        'adress', 
        'screenSize'
    ];


    public function halls()
    {
        return $this->hasMany(Hall::class, 'cinemaId', 'cinemaId');
    }
}
