<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class CategoryProblem extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'category_id', 'problem_id'
    ];

    public $table = "category_problem";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function problem()
    {
        return $this->belongsTo('App\Problem');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
}
