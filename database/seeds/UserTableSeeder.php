<?php
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    
    {
      $name = ["Julio Henrique", "Lucas Spavier", "Leonardo Santiago", "Monique Monteiro", "Sidny Molina", "Wandell"];
      $email = ["julio@startupsemnome.com.br", "lucas@startupsemnome.com.br", "leonardo@startupsemnome.com.br", "monique@startupsemnome.com.br","sidny@startupsemnome.com.br" ,"wandel@startupsemnome.com.br"];
      $senha = ["1234"];

      for ($i=0; $i < 6; $i++) { 
        $user = new User;
        $user->name = $name[$i];
        $user->email = $email[$i];
        $user->password = $senha[0];
        $user->save();
      }  
    }
    
}