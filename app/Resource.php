<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Resource extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'accept_project', 'nome', 'sobrenome','email', 'endereco','telefone','celular','cidade','estado','habilidades','area_interesse','message1'
    ];

    public $table = "resource";

    /**
     * The attributes excluded from the model's JSON forms.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
