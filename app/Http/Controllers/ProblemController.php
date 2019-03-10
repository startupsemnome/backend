<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
     * Alterar todas as "user" para o nome do arquivo.php (problem.php).
     *
     */

class ProblemController extends BaseController
{
  public function showAll()
    {
        return response()->json(Problem::all());
    }
  
  public function create(Request $request)
    {
      $problem = Problem::create($request->all());
      return response()->json($problem, 201);
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

