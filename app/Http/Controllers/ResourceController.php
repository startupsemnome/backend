<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Resource;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ResourceController extends BaseController
{
  public function showAll()
    {
        return response()->json(Resource::all());
    }
  
  public function create(Request $request)
    {
      $resource= Resource::create($request->all());
      return response()->json($resource, 201);
    }
  
  public function delete($id)
    {
      $resource = Resource::findOrFail($id);
      $resource->delete();
      return response()->json("Deletado com Sucesso!");
  }

  //Comentario. 
  public function showOne($id)
    {
      return response()->json(Resource::find($id));
    }

  //    public function search(Request $request)
  // {    
  //   // variavel recebe objeto 
  //   $resource = Resource::where('fname', $request->fname)->where(function ($query) use ($request) {
  //     $query->where('fname', '=', $request->search)
  //           ->orWhere('hab', '=', $request->search);
  //     })->first();
  
  //função para filtro de busca de recurso. 
  public function search(Request $request){
    $resource = Resource::where('nome','LIKE','%'.$request->search.'%')
    ->orWhere('habilidades','LIKE','%'.$request->search.'%')->get();
    if(!$resource){
      return response()->json("Sem usuario ou habilidade cadastrados ");
   }
   return response()->json($resource);
  }
  
  public function update($id, Request $request)
    {
      $resource = Resource::findOrFail($id);
      $resource->update($request->all());
      return response()->json($resource, 200);
    }
}