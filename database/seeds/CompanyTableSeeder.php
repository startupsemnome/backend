<?php
use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    
    {

        $empresa = ["google"];
        $email = ["google@startupsemnome.com.br"];
        $tele = ["11 4821-1220"];
        $est = ["est"];
        $cid = ["cid"];
        $bair = ["bair"];
        $rua = ["rua"];
        $cnpj = ["3902903209"];
        $num = ["num"];
        $message = ["message"];
  
        for ($i=0; $i < 1; $i++) { 
          $company = new Company;
          $company->empresa = $empresa[$i];
          $company->email = $email[$i];
          $company->tele = $tele[$i];
          $company->cnpj = $cnpj[$i];
          $company->est = $est[$i];
          $company->cid = $cid[$i];
          $company->bair = $bair[$i];
          $company->rua = $rua[$i];
          $company->num = $num[$i];
          $company->message = $message[$i];
          $company->save();
        }  
    }
    
}