<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonctionnaire extends Model
{
    public $primarykey = 'id';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
