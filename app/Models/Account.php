<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'accountId';    

    //has many
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'accountId', 'accountId');
    }
}
