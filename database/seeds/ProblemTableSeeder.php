<?php
use Illuminate\Database\Seeder;
use App\Problem;
use App\Company;

class ProblemTableSeeder extends Seeder
{
    public function run()
    
    {
      $empresa = ["Google", "São Judas", "Unip", "São Camilo", "Estacio", "Hcor"];
      $solicit = ["Nikolas", "Monique", "Priscila", "Alyne", "Heitor", "Helid Ferrer"];
      $email = ["contato@google.com.br", "contato@usjt.br", "contato@unip.br", "contato@smspbr.com.br", "aluno@estacio.br", "hosp@hcor.com.br"];
      $telef = ["11 4821-1220", "11 3564-0099", "11 2333-0900", "11 2322-9998", "11 5544-4489", "11 44430-1122"];
      $nprob = ["Recursos hídricos", "Valor errado no boleto", "Queda de energia", "Tecnologia fraca", "Notas e faltas indevidas", "Falta de equipamentos"];
      $company = Company::all();
      $empresa_id = $company[0]->id;

      for ($i=0; $i < 6; $i++) { 
        $problem = new Problem;
        $problem->empresa_id = $i+1;
        $problem->solicit = $solicit[$i];
        $problem->email = $email[$i];
        $problem->telef = $telef[$i];
        $problem->nprob = $nprob[$i];
        $problem->save();
      }  
    }
    
}