<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Resource;
use App\User;
use App\Company;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function getCountUser(){
        $qtd_user = User::get()->count();
        return response()->json($qtd_user, 200);
    
    }

    public function getCountCompany(){
        $qtd_company = Company::get()->count();
        return response()->json($qtd_company, 200);
    
    }

    public function getCountResource(){
        $qtd_resource = Resource::get()->count();
        return response()->json($qtd_resource, 200);
    
    }

    public function getCountProblem(){
        $qtd_problem = Problem::get()->count();
        return response()->json($qtd_problem, 200);
    
    }

}