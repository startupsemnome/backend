<?php
use Illuminate\Database\Seeder;
use App\CategoryProblem;

class CategoryProblemSeeder extends Seeder
{
    public function run()
    
    {
      $category = [1,2,3,4,5,6];
      $problem = [1,2,3,4,5,1];
      
      for ($i=0; $i < 6; $i++) { 
        $category_resource = new CategoryProblem;
        $category_resource->problem_id = $problem[$i];
        $category_resource->category_id = $category[$i];        
        $category_resource->save();
      }  
    }
    
}