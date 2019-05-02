<?php
use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    
    {

        $empresa = ["google", "Microsoft", "Dell", "LG", "Samsung", "Unip"];
        $cnpj = ["3902903209", "3902903209", "3902903209", "3902903209", "3902903209", "3902903209"];
        $telefone = ["11 4821-1220", "11 23232-9900", "11 4455-7788", "11 2626-6751", "11 2356-9900", "11 4435-9900"];
        $email = ["google@startupsemnome.com.br", "contato@microsoft.com.br", "contato@dell.br", "lg@lg.com.br", "s10@samsung.co.br", "unip@unip.com,br"];
        $estado = ["São Paulo", "São Paulo", "Minas Gerais", "São Paulo", "Rio de Janeiro", "São Paulo"];
        $cidade = ["São Paulo", "São Paulo", "Itajubá", "Campinas", "Rio de Janeiro", "Sorocaba"];
        $bairro = ["Consolação", "Rebouças", "Vila Mendeiros", "Centro", "Copacabana", "Fidelis"];
        $rua = ["Avenida Brigadeiro", "Avenida Paulista", "Avenida Anhanguera KM 87", "Rua Pirapora", "Avenida dos Finados", "Rua Del Mole"];
        $numero = ["989", "767", "123", "1122", "9898", "0980"];
        $messagem = ["message", "message", "message", "message", "message", "message"]; 
  
        for ($i=0; $i < 6; $i++) { 
          $company = new Company;
          $company->empresa = $empresa[$i];
          $company->email = $email[$i];
          $company->telefone = $telefone[$i];
          $company->cnpj = $cnpj[$i];
          $company->estado = $estado[$i];
          $company->cidade = $cidade[$i];
          $company->bairro = $bairro[$i];
          $company->rua = $rua[$i];
          $company->numero = $numero[$i];
          $company->messagem = $messagem[$i];
          $company->save();
        }  
    }
    
}