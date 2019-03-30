<?php

namespace App\Http\Controllers;

use App\Company;
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

