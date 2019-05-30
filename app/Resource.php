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
<<<<<<< HEAD
        'accept_project', 'nome', 'sobrenome','email', 'endereco','telefone','celular','cidade','estado','habilidades','area_interesse','message1'
=======
        
        //DADOS PESSOAIS
        'accept_project', 'nome', 'sobrenome','email', 'senha',
        'fotoperfil', 'dt_nascimento', 'genero','estado_civil', 'nacionalidade', 'uf', 'cidade', 'categoria',
        'disponibilidade', 'resumo_profissional','message1',

        //EXPERIENCIA PROFISSIONAL
        'empresa', 'segmento', 'dt_empresa_inicio', 'dt_empresa_saida', 'cargo', 'atividades',

        //FORMACAO
        'curso', 'instituicao', 'formacao', 'dt_curso_inicio', 'dt_curso_conclusao', 'info_complementares'

>>>>>>> develop
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
