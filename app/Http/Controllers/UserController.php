<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
  public function showAll()
    {
        return response()->json(User::all());
    }
  
  public function create(Request $request)
    {
      $user = User::create($request->all());
      return response()->json($user, 201);
    }
  
  public function delete($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json("Deletado com Sucesso");
    }

  public function showOne($id)
    {
      return response()->json(User::find($id));
    }
  public function update($id, Request $request)
    {
      $user = User::findOrFail($id);
      $user->update($request->all());
      return response()->json($user, 200);
    }
}
