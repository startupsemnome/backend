<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Company;;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProblemController extends BaseController
{  
  public function showAll()
  {
    $problem = Problem::with("company")->get();
    return response()->json($problem);
  }
  public function create(Request $request)
  {
    $problem = Problem::create($request->all());
    return response()->json($problem, 201);
  }

  public function getCountProblem(){
    $problems = Problem::get()->count();
    return response()->json($problems, 200);
  }

  public function delete($id)
  {
    $problem = Problem::findOrFail($id);
    $problem->delete();
    return response()->json("Deletado com Sucesso");
  }
  // Busca de problema por filtro (Empresa, Solicitante)
  public function search(Request $request){
    $problem = Problem::where('empresa','LIKE','%'.$request->search.'%')
    ->orWhere('solicitante','LIKE','%'.$request->search.'%')->get();
    if(!$problem){
      return response()->json("Sem empresa ou solicitante cadastrados ");
   }
   return response()->json($problem);
  }

  public function showOne($id)
  {
    return response()->json(Problem::with("company")->find($id));
  }
  
  public function update($id, Request $request)
  {
    $problem = Problem::findOrFail($id);
    $problem->update($request->all());
    return response()->json($problem, 200);
  }
}

