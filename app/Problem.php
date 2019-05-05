<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Problem extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

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
     * Password deixa vazio também.

     */


    protected $fillable = [
        'id', 'empresa', 'solicitante', 'email', 'telefone', 'titulo', 'descricao', 'empresa_id'
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

    public function company()
    {
        return $this->belongsTo(Company::class, 'empresa_id');
    }
}
