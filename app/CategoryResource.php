<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class CategoryResource extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'category_id', 'resource_id'
    ];

    public $table = "category_resource";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
