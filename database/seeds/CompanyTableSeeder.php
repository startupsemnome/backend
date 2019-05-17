<?php
use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    
    {
        $razaoSocial = ["google", "Microsoft", "Dell","google", "Microsoft", "Dell"];
        $nomeFantasia = ["googlex", "Microsoftb", "Delfl","googlex","Microsoftb", "Delfl"];
        $cnpj = ["3902903209", "3902903209", "3902903209","3902903209", "3902903209", "3902903209"];
        $cep = ["08370615","12420516","09220311","08370615","12420516","09220311"];
        $rua = ["Avenida Brigadeiro", "Avenida Paulista", "Avenida Anhanguera KM 87","Avenida Brigadeiro", "Avenida Paulista", "Avenida Anhanguera KM 87"];
        $numero = ["989", "767", "123","989", "767", "123"];
        $bairro = ["Consolação", "Rebouças", "Vila Mendeiros","Consolação", "Rebouças", "Vila Mendeiros"];
        $cidade = ["São Paulo", "São Paulo", "Itajubá","São Paulo", "São Paulo", "Itajubá"]; 
        $uf = ["SP","AM","SE","SP","AM","SE"];
        $pais = ["Brasil", "Brasil", "Brasil","Brasil", "Brasil", "Brasil"];
        $nomeRepresentante = ["Sergio", "Marta", "Maria do Socorro","Sergio", "Marta", "Maria do Socorro"]; 
        $telefoneRepresentante = ["1148211220", "11232329900","1148211220","1148211220", "11232329900","1148211220"];
        $celularRepresentante = ["11948211220", "11988760909", "1198788877","11948211220", "11988760909", "1198788877"];
        $emailRepresentante =  ["google@startupsemnome.com.br", "contato@microsoft.com.br", "contato@dell.br","google@startupsemnome.com.br", "contato@microsoft.com.br", "contato@dell.br"];
        $departamento = ["Informatica", "Medicina", "Financeiro","Informatica", "Medicina", "Financeiro"]; 
        $segmentoEmpresa = ["Educacional", "Massagem", "Pescaria","Educacional", "Massagem", "Pescaria"]; 
  
        for ($i=0; $i < 6; $i++) { 
          $company = new Company;
          $company->razaoSocial = $razaoSocial[$i];
          $company->nomeFantasia = $nomeFantasia[$i];
          $company->cnpj = $cnpj[$i];
          $company->cep = $cep[$i];
          $company->rua = $rua[$i];
          $company->numero = $numero[$i];
          $company->bairro = $bairro[$i];
          $company->cidade = $cidade[$i];
          $company->uf = $uf[$i]; 
          $company->pais = $pais[$i];
          $company->nomeRepresentante =  $nomeRepresentante[$i];
          $company->telefoneRepresentante = $telefoneRepresentante[$i];
          $company->celularRepresentante = $celularRepresentante[$i];
          $company->emailRepresentante = $emailRepresentante[$i];
          $company->departamento = $departamento[$i];
          $company->segmentoEmpresa = $segmentoEmpresa[$i];
          $company->save();
        }  
    }   
}