<?php

namespace App\Http\Controllers;

use App\User;
use App\Resource;
use App\Company;
use App\Problem;
use App\CategoryProblem;
use App\CategoryResource;
use App\ResourceProblem;
use App\Disponibilidade;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
  public function showAll()
    {
        return response()->json(User::all());
    }

  public function search_feed(Request $request){
    $sr = ResourceProblem::where('sentiment','LIKE','%'.$request->search.'%')
    ->orWhere('comment','LIKE','%'.$request->search.'%')->with('problem')->with('resource')->get();
    if(!$sr){
      return response()->json("Sem cadastrados ");
   }
   return response()->json($sr);
  }
    public function sentimentProject(Request $request){
      $rs = ResourceProblem::where('problem_id', $request->problem_id)->get();

      $happy = 0;
      $middle = 0;
      $bad = 0;

      foreach($rs as $key) {
        if($key['sentiment'] == 'Feliz'){
          $happy = $happy + 1;
        } else if($key['sentiment'] == 'Moderado') {
          $middle = $middle + 1;
        } else if($key['sentiment'] == 'Triste'){
          $bad = $bad + 1;
        }        
      }

      if($happy == 0 && $middle == 0 && $bad == 0){
        return response()->json("Não existe analise para esse projeto");
      }
      else if($happy >= $middle && $happy >= $bad){
        return response()->json("Feliz");
      }
      else if($middle > $happy && $middle >= $bad){
        return response()->json("Moderado");
      }
      else if($bad >= $middle && $bad >= $happy){
        return response()->json("Triste");
      }
    }

    public function sentiment(Request $request)
    {

      $rs = ResourceProblem::where('problem_id', $request->problem_id)->where('resource_id', $request->resource_id)->first();

      if(!$rs || $rs == null){
        $rs = new ResourceProblem();
        $rs['problem_id'] = $request->problem_id;
        $rs['resource_id'] = $request->resource_id;
        $rs['STATUS'] = "NENHUM";
      }

      $text = $request->text;
      $aux_array = preg_split ("/\ /", $text);

      $feliz = [
      'IMPRESCINDÍVEL','HONRA',
      'TENTADOR','INSPIRADOR','CATIVANTE','IRRESISTÍVEL',
      'ADMIRÁVEL','AGRADÁVEL','DECENTE','APROPRIADO',
      'INTERESSANTE','FAVORÁVEL','OPORTUNO','CONVENIENTE',
      'PERFEITO','EXCELENTE','FACÍL','PERCEPTÍVEL',  
      'COMPREENSÍVEL','FIEL','CUMPLICIDADE','BRILHANTE', 
      'VIBRANTE','ESTIMULANTE','REVIGORANTE','DESTINADO',
      'AFINIDADE','ZELOSO','APLICADO','CONSAGRADO',
      'DEDICADO','ATRATIVO','RESPEITO','AFEIÇÃO', 
      'ESTIMADO','BEM','VITÓRIOSO','VITÓRIA',
      'FOCADA','FOCADO','LIBERTADOR','ENCANTADOR',
      'ENCANTADA','ENCANTADO','ESTIMÁDO','ADORÁVEL',
      'IMBATÍVEL','EMBASADO','FUNDAMENTADO','SURPEENDENTE', 
      'ESPANTOSO','EXTRAORDINÁRIO','FUNDAMENTAL','PRÁTICO',
      'CERTO','CLARO','ESTAVEL','SEGURO', 
      'INDESCRITÍVEL','INSTRUTIVO','DETERMINADO','CONSTRUTIVO',
      'FIRME','EFETIVO','PRAZEROSO','PROVEITOSO',
      'PROPÍCIO','BOM','BENÉFICO','ÚTIL',
      'FAVORÁVEL','ASSERTIVO','GOSTEI','DEMAIS',
      'ÓTIMO','ÓTIMA','EXELENTE','LEGAL', 
      'ANIMAL',"MELHOR","AGRADAVEL","MARAVILHOSO",
      "SATISFEITO", "FELIZ","SUCESSO", "COMPROMISSADO"
    ];                                                
      $triste = [
      'ENCABULADO','OPRIMIDO','INCOMODO','BOSTA','ZUADO',
      'ESTRALHO','CONSTRANGIDA','CONSTRANGIDO','MAGOADA',
      'OFENCIVO','DECEPCIONANTE','MAGOADO','DESISTIR',
      'TRAUMA','TRAUMÁTICO','FALHA','SÓRDIDO',
      'INCONVENIENTE','DEPRIMENTE','FULEIRO','VULGAR',
      'BANAL','MEDÍOCRE','PROBLEMÁTICO','DEPRESSIVO',
      'DESANIMADO','DESORDENADO','APÁTICO','CONFUSO','DESORGANIZADO',
      'INSANO','ABOMINANTE','AVERSÃO','OBSCURO',
      'ERRADO','BAGUNÇADO','DISCORDANTE','NOJENTO',
      'ASQUEROSO','SUJO','ENJOADO','IMUNDO',
      'ENJOATIVO','REVOLTADO','REVOLTANTE','INDECENTE',
      'INDIGNANDO','INDIGNANTE','INCOMPREENSÍVEL','DESAGRADÁVEL',
      'ODIOSO','PORCO','REPUGNANTE','DESPREZO',
      'DESPREZÍVEL','VAGO','ORDINÁRIO','PESSÍMO', 
      'DECEPCIONADO', 'CONFLITO', 'DESCOMPROMISSO', 'HORRÍVEL', 
      'CHATEADO', 'TRISTE', 'ATRASADO','INSATISFEITO'
    ];

      $resposta = "Moderado";
//php artisan migrate:refresh   php artisan db:seed  php artisan migrate:refresh --seed 
      foreach($aux_array as $key) {
        foreach($feliz as $keyFeliz) {
          if(strtoupper($key) === $keyFeliz)
            $resposta = "Feliz";
        }
        foreach($triste as $keyTriste) {
          if(strtoupper($key) === $keyTriste)
            $resposta = "Triste";
        }

      }

      $rs['sentiment'] = $resposta;
      $rs['comment'] = $request->text;

      $rs->save();

      return response()->json($resposta);
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

    if($user->type === "RESOURCE"){
      $user->id = Resource::where('id', $user->resource_id)->pluck('id')->first();
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

  public function match($id, Request $request){

    //filtrar categorias
    $cp_id = CategoryProblem::where('problem_id', $id)->pluck("id")->toArray();
    $rs_id = CategoryResource::whereIn('category_id', $cp_id)->pluck("resource_id")->toArray();

    //filtrar disponibilidade
    $disp_problem = Disponibilidade::where('problem_id', $id)->get();

    $count = 0;

    $novoArray = $rs_id;
    foreach ($rs_id as $r_id){
      $d_rec = Disponibilidade::where('resource_id', $r_id)->get();
      // echo var_dump($d_rec[0]);

      //segunda
      if($disp_problem[0]->segunda[0] == 1 && $d_rec[0]->segunda[0] == 0) {
        unset($novoArray[$count-1]);
        $count++;
        continue;
      };
      if($disp_problem[0]->segunda[1] == 1 && $d_rec[0]->segunda[1] == 0) {
        
          unset($novoArray[$count-1]);
          $count++;
          continue;
        
      }
      if($disp_problem[0]->segunda[2] == 1 && $d_rec[0]->segunda[2] == 0) {
        
          unset($novoArray[$count-1]);
          $count++;
          continue;
        
      }

      //terca
      if($disp_problem[0]->terca[0] == 1 && $d_rec[0]->terca[0] == 0) {
        
          unset($novoArray[$count-1]);
          $count++;
          continue;
        
      }
      if($disp_problem[0]->terca[1] == 1 && $d_rec[0]->terca[1] == 0) {
        
          unset($novoArray[$count-1]);
          $count++;
          continue;
        
      }
      if($disp_problem[0]->terca[2] == 1 && $d_rec[0]->terca[2] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      //quarta
      if($disp_problem[0]->quarta[0] == 1 && $d_rec[0]->quarta[0] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->quarta[1] == 1 && $d_rec[0]->quarta[1] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->quarta[2] == 1 && $d_rec[0]->quarta[2] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      //quinta
      if($disp_problem[0]->quinta[0] == 1 && $d_rec[0]->quinta[0] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->quinta[1] == 1 && $d_rec[0]->quinta[1] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->quinta[2] == 1 && $d_rec[0]->quinta[2] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      //sexta
      if($disp_problem[0]->sexta[0] == 1 && $d_rec[0]->sexta[0] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->sexta[1] == 1 && $d_rec[0]->sexta[1] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->sexta[2] == 1 && $d_rec[0]->sexta[2] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      //sabado
      if($disp_problem[0]->sabado[0] == 1 && $d_rec[0]->sabado[0] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->sabado[1] == 1 && $d_rec[0]->sabado[1] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->sabado[2] == 1 && $d_rec[0]->sabado[2] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      //domingo
      if($disp_problem[0]->domingo[0] == 1 && $d_rec[0]->domingo[0] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->domingo[1] == 1 && $d_rec[0]->domingo[1] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
      if($disp_problem[0]->domingo[2] == 1 && $d_rec[0]->domingo[2] == 0) {
      
          unset($novoArray[$count-1]);
          $count++;
          continue;
      
      }
    }

    $rs_id = $novoArray;


    //filtrar formacao
    // para v2

    // filtrar habilidades
    // para v2

    //carregar recurso com user
    $recurso = Resource::whereIn("id", $rs_id)->get();

    foreach ($recurso as $resource) {
      $disponibilidade = Disponibilidade::where('resource_id', $resource->id)->first();
      $resource['disponibilidade'] =  $disponibilidade;

    }
    return response()->json($recurso);
  }


}

