<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class ResourceProblem extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'resource_id', 'problem_id', 'status'
    ];

    public $table = "resource_problem";

    /**
     * The attributes excluded from the model's JSON forms.
     *
     * @var array
     */

    public function problem()
    {
        return $this->belongsTo('App\Problem');
    }

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }
}
