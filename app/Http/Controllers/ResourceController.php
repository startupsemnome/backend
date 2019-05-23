<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Resource;
use App\Company;
use App\CategoryResource;
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
      if($request->category){
        $cr = new CategoryResource;
        $cr->category_id = $request->category['category_id'];
        $cr->resource_id = $request->category['resource_id'];
        $cr->save();
      }
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
      $category = CategoryResource::with('category')->where('resource_id', $id)->first();
      $resource = Resource::find($id);
      $resource['category'] = $category;
      return response()->json($resource);
    }

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
      if($request->category){
        $cr = CategoryResource::find($request->category['id']);
        $cr->id = $request->category['id'];
        $cr->category_id = $request->category['category_id'];
        $cr->resource_id = $request->category['resource_id'];
        $cr->update();
      }
      return response()->json($resource, 200);
    }
}