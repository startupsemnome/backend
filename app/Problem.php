<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Problem extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

 /**
     * Inserir ou alterar baseando nos campos de preenchimento do Frontend;
     * Fillabe define as colunas;
     * Table define o nome da tabela;
     * Didden deixa vazio;
     * Passaword deixa vazio também.

     */


    protected $fillable = [
        'empresa', 'solicit', 'email', 'telef', 'nprob'
    ];

    public $table = "problem";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
