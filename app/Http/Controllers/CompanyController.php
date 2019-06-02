<?php

namespace App\Http\Controllers;

use App\Company;
use App\Problem;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
// Mostrar todas companys relacionadas com seus problems
  public function showAll()
    {
        return response()->json(Company::with("problem")->get());
    }
//Criar company no bd
  public function create(Request $request)
    {
      $company = Company::create($request->all());
      return response()->json($company, 201);
    }
//Contar os companys que está no bd 
    public function getCountCompany(){
      $companys = Company::get()->count();
      return response()->json($companys, 200);
    }
//Pesquisar os nomes das companys 
    public function getNamesCompany(Request $request){
      $names = Company::where('razaoSocial','LIKE','%'.$request->search.'%')->get();
      return response()->json($company);
    }
//Pesquisar companys relacionadas com que foi digitado no input
    public function search(Request $request){
      $company = Company::with("problem")->where('razaoSocial','LIKE','%'.$request->search.'%')
      ->orWhere('emailRepresentante','LIKE','%'.$request->search.'%')->get();
      if(!$company){
        return response()->json("Sem empresa ou email cadastrados ");
     }
     return response()->json($company);
    }
//Excluir company
  public function delete($id)
    {
      $company = Company::findOrFail($id);
      $company->delete($id);
      return response()->json("Deletado com Sucesso!");
    }
//Mostrar company com seus problema relacionada
  public function showOne($id)
    {
      return response()->json(Company::with("problem")->find($id));
    }
//Mostrar company 
  public function show($id)
    {
      $company = Company::findOrFail($id);
      return response()->json($company);
    }
//Atualizar o company
  public function update($id, Request $request)
    {
      $company = Company::findOrFail($id);
      $company->update($request->all());
      return response()->json($company, 200);
    }
}

