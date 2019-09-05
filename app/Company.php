<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Company extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'razaoSocial','nomeFantasia','cnpj','cep','rua','numero','bairro','cidade','uf','pais','nomeRepresentante','telefoneRepresentante','celularRepresentante','emailRepresentante','departamento','segmentoEmpresa' 
    ];

    public $table = "Company";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function problem(){
        return $this->hasMany(Problem::class, 'empresa_id');
    }
    
}
