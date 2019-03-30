<?php

namespace App\Http\Controllers;

use App\Problem;
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
  public function delete($id)
  {
    $problem = Problem::findOrFail($id);
    $problem->delete();
    return response()->json("Deletado com Sucesso");
  }
  public function showOne($id)
  {
    return response()->json(Problem::find($id));
  }
  public function update($id, Request $request)
  {
    $problem = Problem::findOrFail($id);
    $problem->update($request->all());
    return response()->json($problem, 200);
  }
}

