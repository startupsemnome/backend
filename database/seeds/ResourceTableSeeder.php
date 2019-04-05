<?php
use Illuminate\Database\Seeder;
use App\Resource;

class ResourceTableSeeder extends Seeder
{
    public function run()
    
    {
        $fname = ["Julio Henrique", "Sidny", "Monique", "Wandell", "Leonardo", "Josevaldo"];
        $lname = ["dos Santos", "Molina", "Monteiro", "Rodrigues", "Santiago", "Lima"];
        $est = ["SP", "SP","SP","SP", "SP", "RJ"];
        $email = ["admin@startupsemnome.com.br", "sidny@startupsemnome.com.br", "monique@startupsemnome.com.br", "wandell@startupsemnome.com.br", "santiago@startupsemnome.com.br", "josevaldo@startupsemnome.com.br"];
        $tel = ["11 4821-1220", "11 3434-9988", "11 6454-0990", "11 3489-4444", "11 2322-1122", "22 2345-9890"];
        $end = ["Rua blabalbalabbal", "Rua dos Marinhas", "Rua dos Picles", "Rua de Mauá", "Rua dos Espanhois", "Av Tiradentes"];
        $cel = ["11 94821-1220", "11 98876-0909", "11 9878-8877", "11 92223-2938", "11 92345-9789", "22 98980-0012"];
        $cid = ["São Paulo", "São Paulo", "São Paulo", "São Paulo", "São Paulo", "Rio de Janeiro"];
        $accept_project = [true, false, false, true, true, true]; 
        $formacao = ["ENSINO SUPERIOR"];
        $hab = ["Full Stack", "Frontend e Backend", "Full Stack", "Frontend e Backend", "Gestão de Negócios", "Administrador de Dados"];
        $areai = ["Tecnologia", "Tecnologia e Gestão", "Tecnologia e Gestão", "Tecnologia", "Gestão, Negócios e Tecnologia", "Engenharias"];
        $message1 = ["goll", "goll", "goll", "goll", "goll", "goll"]; 
        $problem_id = [1]; 
  
        for ($i=0; $i < 6; $i++) { 
          $resource = new Resource;
          $resource->fname = $fname[$i];
          $resource->lname = $lname[$i];
          $resource->est = $est[$i];
          $resource->email = $email[$i];
          $resource->tel = $tel[$i];
          $resource->end = $end[$i];
          $resource->cel = $cel[$i];
          $formacao = $formacao[0];
          $resource->cid = $cid[$i];
          $resource->accept_project = $accept_project[$i];
          $resource->hab = $hab[$i];
          $resource->areai = $areai[$i];
          $resource->message1 = $message1[$i];
          $resource->problem_id = 1;
          $resource->save();
        }  
    }
    
}