<?php
use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    
    {

        $empresa = ["Google", "Microsoft", "Dell", "LG", "Samsung", "Unip"];
        $cnpj = ["3902903209", "3902903209", "3902903209", "3902903209", "3902903209", "3902903209"];
        $tele = ["11 4821-1220", "11 23232-9900", "11 4455-7788", "11 2626-6751", "11 2356-9900", "11 4435-9900"];
        $email = ["google@startupsemnome.com.br", "contato@microsoft.com.br", "contato@dell.br", "lg@lg.com.br", "s10@samsung.co.br", "unip@unip.com,br"];
        $est = ["São Paulo", "São Paulo", "Minas Gerais", "São Paulo", "Rio de Janeiro", "São Paulo"];
        $cid = ["São Paulo", "São Paulo", "Itajubá", "Campinas", "Rio de Janeiro", "Sorocaba"];
        $bair = ["Consolação", "Rebouças", "Vila Mendeiros", "Centro", "Copacabana", "Fidelis"];
        $rua = ["Avenida Brigadeiro", "Avenida Paulista", "Avenida Anhanguera KM 87", "Rua Pirapora", "Avenida dos Finados", "Rua Del Mole"];
        $num = ["989", "767", "123", "1122", "9898", "0980"];
        $message = ["message", "message", "message", "message", "message", "message"]; 
  
        for ($i=0; $i < 6; $i++) { 
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