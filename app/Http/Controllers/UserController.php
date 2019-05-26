<?php

namespace App\Http\Controllers;

use App\User;
use App\Resource;
use App\Company;
use App\Problem;

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
  public function getCountUser(){
    $users = User::get()->count();
    return response()->json($users, 200);
  }
  public function delete($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json("Deletado com Sucesso");
    }

  //Posso criar um metodo login
  public function login(Request $request)
  {    
  
    $user = User::where('password', $request->password)->where(function ($query) use ($request) {
      $query->where('name', '=', $request->login)
            ->orWhere('email', '=', $request->login);
      })->first();
    if(!$user){
      return abort(401, "Usuario ou Senha inválida");
    } 
    return response()->json($user);
  }

  //Posso criar um metodo login
  public function retrospect(Request $request)
  {   
    $array = array();
    $currentDate = \Carbon\Carbon::now();
    $segunda = $currentDate->subDays($currentDate->dayOfWeek - 1)->subWeek();
    $segunda = substr($segunda, 0, 10);
    $currentDate = \Carbon\Carbon::now();
    $terca = $currentDate->subDays($currentDate->dayOfWeek - 2)->subWeek();
    $terca = substr($terca, 0, 10);
    $currentDate = \Carbon\Carbon::now();
    $quarta = $currentDate->subDays($currentDate->dayOfWeek - 3)->subWeek();
    $quarta = substr($quarta, 0, 10);
    $currentDate = \Carbon\Carbon::now();
    $quinta = $currentDate->subDays($currentDate->dayOfWeek - 4)->subWeek();
    $quinta = substr($quinta, 0, 10);
    $currentDate = \Carbon\Carbon::now();
    $sexta = $currentDate->subDays($currentDate->dayOfWeek - 5)->subWeek();
    $sexta = substr($sexta, 0, 10);
    $currentDate = \Carbon\Carbon::now();
    $sabado = $currentDate->subDays($currentDate->dayOfWeek - 6)->subWeek();
    $sabado = substr($sabado, 0, 10);
    $currentDate = \Carbon\Carbon::now();
    $domingo = $currentDate->subDays($currentDate->dayOfWeek);

    if($request->show === "USER"){
      $one = User::whereRaw("Date(created_at) <= '".$domingo."'")->count();
      $two = User::whereRaw("Date(created_at) <= '".$segunda."'")->count();
      $thre = User::whereRaw("Date(created_at) <= '".$terca."'")->count();
      $four = User::whereRaw("Date(created_at) <= '".$quarta."'")->count();
      $five = User::whereRaw("Date(created_at) <= '".$quinta."'")->count();
      $six = User::whereRaw("Date(created_at) <= '".$sexta."'")->count();
      $sevem = User::whereRaw("Date(created_at) <= '".$sabado."'")->count();
          
    } else if ($request->show ==="COMPANY"){
      $one = Company::whereRaw("Date(created_at) <= '".$domingo."'")->count();
      $two = Company::whereRaw("Date(created_at) <= '".$segunda."'")->count();
      $thre = Company::whereRaw("Date(created_at) <= '".$terca."'")->count();
      $four = Company::whereRaw("Date(created_at) <= '".$quarta."'")->count();
      $five = Company::whereRaw("Date(created_at) <= '".$quinta."'")->count();
      $six = Company::whereRaw("Date(created_at) <= '".$sexta."'")->count();
      $sevem = Company::whereRaw("Date(created_at) <= '".$sabado."'")->count();
    
    } else if ($request->show ==="RESOURCE"){
      $one = Resource::whereRaw("Date(created_at) <= '".$domingo."'")->count();
      $two = Resource::whereRaw("Date(created_at) <= '".$segunda."'")->count();
      $thre = Resource::whereRaw("Date(created_at) <= '".$terca."'")->count();
      $four = Resource::whereRaw("Date(created_at) <= '".$quarta."'")->count();
      $five = Resource::whereRaw("Date(created_at) <= '".$quinta."'")->count();
      $six = Resource::whereRaw("Date(created_at) <= '".$sexta."'")->count();
      $sevem = Resource::whereRaw("Date(created_at) <= '".$sabado."'")->count();

    } else if ($request->show ==="PROBLEM"){
      $one = Problem::whereRaw("Date(created_at) <= '".$domingo."'")->count();
      $two = Problem::whereRaw("Date(created_at) <= '".$segunda."'")->count();
      $thre = Problem::whereRaw("Date(created_at) <= '".$terca."'")->count();
      $four = Problem::whereRaw("Date(created_at) <= '".$quarta."'")->count();
      $five = Problem::whereRaw("Date(created_at) <= '".$quinta."'")->count();
      $six = Problem::whereRaw("Date(created_at) <= '".$sexta."'")->count();
      $sevem = Problem::whereRaw("Date(created_at) <= '".$sabado."'")->count();

    }

    array_push($array, $one, $two, $thre, $four, $five, $six, $sevem);
    return response()->json($array);
  }


  public function showOne($id)
    {
      return response()->json(User::find($id));
    }
    
  //função para filtro de busca de Usuarios. 
  public function search(Request $request){
    $user = User::where('name','LIKE','%'.$request->search.'%')
    ->orWhere('email','LIKE','%'.$request->search.'%')->get();
    if(!$user){
      return response()->json("Sem usuario ou habilidade cadastrados ");
   }
   return response()->json($user);
  }
  
  public function update($id, Request $request)
    {
      $user = User::findOrFail($id);
      $user->update($request->all());
      return response()->json($user, 200);
    }
}

