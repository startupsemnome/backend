<?php
use Illuminate\Database\Seeder;
use App\Problem;
use App\Resource;
use App\Disponibilidade;
      
class DisponibilidadeTableSeeder extends Seeder
{
    public function run()
    
    {
        $segunda = ["010", "010", "010", "010", "010", "010", "010", "010", "010"];
        $terca = ["010", "010", "010", "010", "010", "010", "010", "010", "010"];
        $quarta = ["010", "010", "010", "010", "010", "010", "010", "010", "010"];
        $quinta = ["010", "010", "010", "010", "010", "010", "010", "010", "010"];
        $sexta = ["010", "010", "010", "010", "010", "010", "010", "010", "010"];
        $sabado = ["111", "1111", "111","111", "111", "111"];
        $domingo = ["010", "010", "010", "010", "010", "010", "010", "010", "010"];
        $problem_id =  [null,null,null,null,1,2,3,4,5,6]; 
        $resource_id = [1,2,3,4,            null,null,null,null];
        
        for ($i=0; $i < 8; $i++) { 
          $disponibilidade = new Disponibilidade;
          $disponibilidade->segunda = $segunda[$i];
          $disponibilidade->terca = $terca[$i];
          $disponibilidade->quarta = $quarta[$i];
          $disponibilidade->quinta = $quinta[$i];
          $disponibilidade->sexta = $sexta[$i];
          $disponibilidade->sabado = $sabado[$i];
          $disponibilidade->domingo = $domingo[$i];
          $disponibilidade->problem_id = $problem_id[$i];
          $disponibilidade->resource_id = $resource_id[$i]; 
          $disponibilidade->save();
        }  
    }   
}