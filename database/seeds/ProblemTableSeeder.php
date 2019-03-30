<?php
use Illuminate\Database\Seeder;
use App\Problem;
use App\Company;

class ProblemTableSeeder extends Seeder
{
    public function run()
    
    {
      $empresa = ["google"];
      $email = ["admin@startupsemnome.com.br"];
      $telef = ["11 4821-1220"];
      $nprob = ["nprob"];
      $company = Company::all();
      $empresa_id = $company[0]->id;

      for ($i=0; $i < 1; $i++) { 
        $problem = new Problem;
        $problem->empresa_id = $empresa_id;
        $problem->email = $email[$i];
        $problem->telef = $telef[$i];
        $problem->nprob = $nprob[$i];
        $problem->save();
      }  
    }
    
}