<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Resource;
use App\ResourceProblem;
use App\Problem;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ResourceProblemController extends BaseController {
  
  public function showOneResouce($id)
  {      
    return response()->json(ResourceProblem::with('problem')->where('resource_id', $id)->get());
  }
  
  public function showOneProblem($id)
  {
    $resource= Resource::create($request->all());
    return response()->json($resource, 201);
  }
  
  public function create($id)
  {
    return response()->json(Resource::all());
  }
      
  public function update($id, Request $request)
  {
    $resource = Resource::findOrFail($id);
    $resource->update($request->all());
    return response()->json($resource, 200);
  }
}
