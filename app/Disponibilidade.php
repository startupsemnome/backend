<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Disponibilidade extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [                
        'id', 'segunda', 'terca','quarta', 'quinta',
        'sexta', 'sabado', 'domingo','problem_id', 'resource_id',
    ];

    public $table = "disponibilidade";

    /**
     * The attributes excluded from the model's JSON forms.
     *
     * @var array
     */


    public function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_id');
    }

    public function problem()
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }
}
