<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Retrait extends Model
{


    protected $fillable = [
        'user_id','Doti','DateRetraits',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
