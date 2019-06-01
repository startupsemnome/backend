<?php
use Illuminate\Database\Seeder;
use App\Problem;
use App\Company;

class ProblemTableSeeder extends Seeder
{
    public function run()
    
    {
      $empresa = ["Google", "São Judas", "Unip", "São Camilo", "Estacio", "Hcor"];
      $titulo = ["Recursos hídricos", "Valor errado no boleto", "Sem energia", "Tecnologia fraca", "Ampliação de salas", "Falta de equipamentos"];
      $categoria = ["Tecnologia", "Administração", "Administração", "Enfermagem", "Administração", "Tecnologia"];
      $descricao =  ["A desigualdade da distribuição interna de água exige um adequado gerenciamento",
                "Foi feita cobrança de 7 disciplinas, sendo que, são somente 6 disciplinas.",
                "Um carro bateu no poste de luz, precisamos que seja a energia seja restabelecidade em menos 24 horas.",
                "A São Camilo está utilizando uma tecnologia muito antiga nos atendimentos, estamos precisamos de uma moderna.",
                "A sala 104A, está precisando de mais espaço por conta da quantidade de ingressantes.",
                "O Hospital HCOR está com falta de equipamentos na área médica, precisamos de pessoa de gerenciamento de compras."];
      $disponibilidade = ["Semanal", "Terças-feiras", "Terças-feiras", "Sábado", "Sábado", "Domingo"];
      $company = Company::all();
      $empresa_id = $company[0]->id;

      for ($i=0; $i < 6; $i++) { 
        $problem = new Problem;
        $problem->empresa_id = $i+1;
        $problem->empresa = $empresa[$i];
        $problem->titulo = $titulo[$i];
        $problem->categoria = $categoria[$i];
        $problem->descricao = $descricao[$i];
        $problem->disponibilidade = $disponibilidade[$i];
        $problem->save();
      }  
    }
    
}