<?php

namespace App\Http\Controllers;

use App\Company;
use App\Problem;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
  public function showAll()
    {
        return response()->json(Company::with("problem")->get());
    }
  
  public function create(Request $request)
    {
      $company = Company::create($request->all());
      return response()->json($company, 201);
    }

    public function getCountCompany(){
      $companys = Company::get()->count();
      return response()->json($companys, 200);
    }

    public function search(Request $request){
      $company = Company::where('empresa','LIKE','%'.$request->search.'%')
      ->orWhere('email','LIKE','%'.$request->search.'%')->get();
      if(!$company){
        return response()->json("Sem empresa ou email cadastrados ");
     }
     return response()->json($company);
    }
  
  public function delete($id)
    {
      $company = Company::findOrFail($id);
      $company->delete();
      return response()->json("Deletado com Sucesso!");
    }

  public function showOne($id)
    {
      return response()->json(Company::with("problem")->find($id));
    }
  public function update($id, Request $request)
    {
      $company = Company::findOrFail($id);
      $company->update($request->all());
      return response()->json($company, 200);
    }
}

