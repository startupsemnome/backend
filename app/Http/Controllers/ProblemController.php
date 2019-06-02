<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Company;
use App\ResourceProblem;
use App\CategoryProblem;
use App\Disponibilidade;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProblemController extends BaseController
{  
  public function showAll()
  {
  $problem = Problem::with(["company","categoryProblem"])->get();
    return response()->json($problem);
  }
  public function create(Request $request)
  {
    $problem = Problem::create($request->all());
    if($request->category){
      $cp = new CategoryProblem;
      $cp->category_id = $request->category['category_id'];
      $cp->problem_id = $request->category['problem_id'];
      $cp->save();
    }
    return response()->json($problem, 201);
  }

  public function loadCategories()
  {
    return response()->json(CategoryProblem::with('category')->get());
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
  // Busca de problema por filtro (Empresa, Titulo)
  public function search(Request $request){
    $problem = Problem::with(["company","categoryProblem"])->where('empresa','LIKE','%'.$request->search.'%')
    ->orWhere('titulo','LIKE','%'.$request->search.'%')->get();
    if(!$problem){
      return response()->json("Sem empresa ou titulo cadastrados ");
   }
   return response()->json($problem);
  }

  public function showOne($id)
  {
    $category = CategoryProblem::with('category')->where('problem_id', $id)->first();
    $problem = Problem::with(["company"])->find($id);
    $disponibilidade = Disponibilidade::where('resource_id', $id)->first();
    $problem['disponibilidade'] =  $disponibilidade;
    $problem['category'] = $category;
    return response()->json($problem);
  }
  
  public function update($id, Request $request)
  {
    $problem = Problem::findOrFail($id);
    $problem->update($request->all());
    if($request->category){
      $cp = CategoryProblem::find($request->category['id']);
      $cp->category_id = $request->category['category_id'];
      $cp->problem_id = $request->category['problem_id'];
      $cp->update();
    }
    return response()->json($problem, 200);
  }

  public function resourceAccept($id){

    $problems = ResourceProblem::where('problem_id', $id)->where('status', 'AGUARDANDO-CONTATO')->with('resource')->get();
    return response()->json($problems, 200);
  }
}

