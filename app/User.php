<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use App\Retrait;

class User extends Authenticatable implements MustVerifyEmail,CanResetPassword
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin','N_POSTE','CIN','EMAIL_ACADEMIC','NOM','PRENOM','NOM_PRENOM','NOM_PRENOM_AR','DATE_DE_NAISSANCE','YEAR_NAISSANCE',
        'DATE_DE_RECRUTEMENT','GRADE','GRADE_AR','DATE_EFFET_ECHELLE','ECHELLE','ECHELLON','DATE_EFFECT_ECHELLON','AFFECTATION','ADRESSE','TELEPHONE','TELE_FAX','SEXE','ACTIVE',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function retrait()
    {
        return $this->hasOne(Retrait::class, 'foreign_key');
    }
}
