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
        
        //DADOS PESSOAIS
        'accept_project', 'nome', 'sobrenome','email', 'senha',
        'fotoperfil', 'dt_nascimento', 'genero','estado_civil', 'nacionalidade', 'uf', 'cidade', 
        'disponibilidade', 'resumo_profissional','message1',

        //EXPERIENCIA PROFISSIONAL
        'empresa', 'segmento', 'dt_inicio_saida', 'cargo', 'atividades',

        //FORMACAO
        'curso', 'instituicao', 'nivel_curso', 'dt_inicio_fim', 'indo_complementares'

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
