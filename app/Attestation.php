<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    //



    public $primarykey = 'id_attestation';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
