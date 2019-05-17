<?php
use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    
    {
      
      $name = ["Administração","Comércio Exterior","Tecnologia","Arquitetura", "Medicina", "Contábeis","Economia","Cinema e Audiovisual","Radio e TV","Design","Direito","Educação Física","Enfermagem","Engenharia Civil", "Engenharia de Automação e Controle","Engenharia de Produção","Engenharia Elétrica","Engenharia Eletrônica","Engenharia Mecânica","Engenharia Química","Psicologia","Farmácia","Fisioterapia","Comercial","Qualidade","Logística","Marketing","Medicina Veterinária","Nutrição","Odontologia","Psicologia","Relações Públicas","Publicidade e Propaganda", "Turismo"];        
        for ($i=0; $i < 30; $i++) { 
          $category = new Category;
          $category->name = $name[$i];          
          $category->save();
        }  
    }
    
}