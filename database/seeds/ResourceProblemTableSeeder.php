<?php
use Illuminate\Database\Seeder;
use App\ResourceProblem;

class ResourceProblemTableSeeder extends Seeder
{
    public function run()
    
    {
        $id = [1,2,3,4, 5];
        $id_resource = [1,2,3,4,5];
        $id_problem = [1,2,3,4,5];
        $status = ["CHAMADO"];
          
        for ($i=0; $i < 5; $i++) { 
          $resource_problem = new ResourceProblem;
          $resource_problem->id = $id[$i];
          $resource_problem->resource_id = $id_resource[$i];
          $resource_problem->problem_id = $id_problem[$i];
          $resource_problem->status = $status[0];
          $resource_problem->save();
        }  
    }
    
}