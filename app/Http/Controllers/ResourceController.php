<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Resource;
use App\Company;
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

    public function getCountResource(){
      $resources = Resource::get()->count();
      return response()->json($resources, 200);
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

  //função para filtro de busca de recurso. 
  public function search(Request $request){
    $resource = Resource::where('nome','LIKE','%'.$request->search.'%')
    ->orWhere('categoria','LIKE','%'.$request->search.'%')->get();
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