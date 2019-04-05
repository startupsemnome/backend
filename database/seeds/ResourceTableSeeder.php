<?php
use Illuminate\Database\Seeder;
use App\Resource;

class ResourceTableSeeder extends Seeder
{
    public function run()
    
    {
        $fname = ["Julio Henrique"];
        $lname = ["dos Santos"];
        $est = ["São Paulo"];
        $email = ["admin@startupsemnome.com.br"];
        $tel = ["11 4821-1220"];
        $end = ["Rua blabalbalabbal"];
        $cel = ["11 4821-1220"];
        $cid = ["São Paulo"];
        $accept_project = [true];
        $hab = ["full stack"];
        $areai = ["Specialist Tecnologia"];
        $message1 = ["goll"];
        $problem_id = [1];
        $formacao = ["ENSINO SUPERIOR"];
  
        for ($i=0; $i < 1; $i++) { 
          $resource = new Resource;
          $resource->fname = "Julio Henrique";
          $resource->lname = "dos Santos";
          $resource->est = "SP";
          $resource->email = "admin@startupsemnome.com.br";
          $resource->tel = "11 4821-1220";
          $resource->end = "Rua blabalbalabbal";
          $resource->cel = "11 4821-1220";
          $resource->cid = "São Paulo";
          $resource->accept_project = true;
          $resource->hab = "full stack";
          $resource->formacao =$formacao[$i];
          $resource->areai = "Specialist Tecnologia";
          $resource->message1 = "goll";
          $resource->problem_id = 1;
          $resource->save();
        }  
    }
    
}