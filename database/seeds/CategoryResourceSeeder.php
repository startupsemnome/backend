<?php
use Illuminate\Database\Seeder;
use App\CategoryResource;

class CategoryResourceSeeder extends Seeder
{
    public function run()
    
    {
      $category = [1,2,3,4,5,6];
      $resource = [1,2,3,4,5,1];
      
      for ($i=0; $i < 6; $i++) { 
        $category_resource = new CategoryResource;
        $category_resource->resource_id = $category[$i];
        $category_resource->category_id = $resource[$i];        
        $category_resource->save();
      }  
    }
    
}