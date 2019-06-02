<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Resource;
use App\Company;
use App\User;
use App\CategoryResource;
use App\Disponibilidade;
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
      $resource = new Resource;
      $resource->nome = $request->nome;
      $resource->sobrenome = $request->sobrenome;
      $resource->email = $request->email;
      $resource->senha = $request->senha;
      $resource->save();

      $user = new User;
      $user->type = "RESOURCE";
      $user->email = $request->email;
      $user->password = $request->senha;
      $user->resource_id = $resource->id;
      $user->name = $request->nome;
      $user->save();

      $disponibilidade = new Disponibilidade;
      $disponibilidade->segunda = "000";
      $disponibilidade->terca = "000";
      $disponibilidade->quarta = "000";
      $disponibilidade->quinta = "000";
      $disponibilidade->sexta = "000";
      $disponibilidade->sabado = "000";
      $disponibilidade->domingo = "000"; 
      $disponibilidade->resource_id = $resource->id; 
      $disponibilidade->save();

      $mail = new PHPMailer;
      // $mail->SMTPDebug = 2;
      $mail->IsSMTP();
      $mail->SMTPAuth  = true;
      $mail->Charset   = 'utf8_decode()';
      $mail->Host  = getenv('MAIL_HOST');
      $mail->Port  = getenv('MAIL_PORT');
      $mail->Username  = getenv('MAIL_USERNAME');
      $mail->Password  = getenv('MAIL_PASSWORD');
      $mail->From  = $request->email;
      // isset($email['attachment']) ? $mail->addAttachment($email['attachment']) : null;
      $mail->FromName  = utf8_decode(getenv('MAIL_USERNAME'));
      $mail->IsHTML(true);
      $mail->Subject  = utf8_decode("Seja bem vindo! - Resource Manager!");
      $mail->Body  = utf8_decode("
    
      <body>
      <div id='mailsub' class='notification' align='center'>
        <table width='100%' border='0' cellspacing='0' cellpadding='0' style='min-width: 320px;'>
          <tr>
            <td align='center' bgcolor='#eff3f8'>
    
              <table border='0' cellspacing='0' cellpadding='0' class='table_width_100' width='100%'
                style='max-width: 680px; min-width: 300px;'>
                <tr>
                  <td>
                    
                    <div style='height: 40px; line-height: 50px; font-size: 10px;'> </div>
                  </td>
                </tr>
              
                <tr>
                  <td align='center' bgcolor='#ffffff'>
                    <table width='90%' border='0' cellspacing='0' cellpadding='0'>
                    </table>
    
              
                    <div style='height: 20px; background-color: #29aac7; font-size: 10px;'> </div>
                  </td>
                </tr>
              
                <tr>
                  <td align='center' bgcolor='#fbfcfd'>
    
                    <table width='90%' border='0' cellspacing='0' cellpadding='0'>
    
                      <tr>
                        <td align='center'>
                          <br><br>
                          <div style='height: 60px; line-height: 60px; font-size: 10px;'> 
                            <img src='.\src\components\html\azul.jpeg' alt='Smiley face' height='80' width='80'>
    
                          </div>
                          <br><br>
    
                          <div style='line-height: 44px;'>
                            <font face='Arial, Helvetica, sans-serif' size='5' color='#57697e' style='font-size: 34px;'>
                              <span style='font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;'>
                                Bem-vindo à Resource Manager
                              </span></font>
                          </div>
                        
                        </td>
                      </tr>
                      <tr>
                        <td align='center'>
                          <div style='line-height: 24px;'>
                            <font face='Arial, Helvetica, sans-serif' size='4' color='#57697e' style='font-size: 15px;'>
                              <span style='font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;'>
                                Temos as soluções perfeitas para o seu negócio. <br>
                                Agora, precisamos que confirme seu e-mail de cadastro clicando no botão abaixo!
                              </span></font>
                          </div>
                        
                          <div style='height: 40px; line-height: 40px; font-size: 10px;'> </div>
                        </td>
                      </tr>
                      <tr>
                        <td align='center'>
                          <div style='line-height: 24px;'>
                            <button onclick='confirmed()' class='button button1'>Confirmar</button>
                            <script>
                              function confirmed() {
                                alert('Seu e-mail foi confirmado com sucesso!');
                              }
                            </script>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              
                <tr>
                  <td align='center' bgcolor='#ffffff'
                    style='border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #FFFFFF;'>
                    <table width='94%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td align='center'>
    
                          <div class='mob_100' style='float: left; display: inline-block; width: 33%;'>
                            <table class='mob_100' width='100%' border='0' cellspacing='0' cellpadding='0' align='left'
                              style='border-collapse: collapse;'>
                              <tr>
                                <td align='center' style='line-height: 14px; padding: 0 27px;'>
                                  
                                  <div style='height: 40px; line-height: 40px; font-size: 10px;'> </div>
                                  <div style='line-height: 14px;'>
                                    <font face='Arial, Helvetica, sans-serif' size='3' color='#4db3a4'
                                      style='font-size: 14px;'>
                                      <strong
                                        style='font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;'>
                                        <div style='color: #29aac7; text-decoration: none;'>A PLATAFORMA</div>
                                      </strong></font>
                                  </div>
                                  
                                  <div style='height: 18px; line-height: 18px; font-size: 10px;'> </div>
                                  <div style='line-height: 21px;'>
                                    <font face='Arial, Helvetica, sans-serif' size='3' color='#98a7b9'
                                      style='font-size: 14px;'>
                                      <span
                                        style='font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;'>
                                        Uma plataforma de consultoria para o mundo acadêmico, interligando o mercado
                                        corporativo com a universidade.
                                      </span></font>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <div class='mob_100' style='float: left; display: inline-block; width: 33%;'>
                            <table class='mob_100' width='100%' border='0' cellspacing='0' cellpadding='0' align='left'
                              style='border-collapse: collapse;'>
                              <tr>
                                <td align='center' style='line-height: 14px; padding: 0 27px;'>
                                
                                  <div style='height: 40px; line-height: 40px; font-size: 10px;'> </div>
                                  <div style='line-height: 14px;'>
                                    <font face='Arial, Helvetica, sans-serif' size='3' color='#4db3a4'
                                      style='font-size: 14px;'>
                                      <strong
                                        style='font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;'>
                                        <div style='color: #29aac7; text-decoration: none;'>BENEFÍCIOS</div>
                                      </strong></font>
                                  </div>
                                  
                                  <div style='height: 18px; line-height: 18px; font-size: 10px;'> </div>
                                  <div style='line-height: 21px;'>
                                    <font face='Arial, Helvetica, sans-serif' size='3' color='#98a7b9'
                                      style='font-size: 14px;'>
                                      <span
                                        style='font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;'>
                                        Oportunidades de negócios para os alunos, professores que queiram ajudar e ganhar
                                        alguma renda extra, e o baixo custo de consultoria.
                                      </span></font>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <div class='mob_100' style='float: left; display: inline-block; width: 33%;'>
                            <table class='mob_100' width='100%' border='0' cellspacing='0' cellpadding='0' align='left'
                              style='border-collapse: collapse;'>
                              <tr>
                                <td align='center' style='line-height: 14px; padding: 0 27px;'>
                                
                                  <div style='height: 40px; line-height: 40px; font-size: 10px;'> </div>
                                  <div style='line-height: 14px;'>
                                    <font face='Arial, Helvetica, sans-serif' size='3' color='#4db3a4'
                                      style='font-size: 14px;'>
                                      <strong
                                        style='font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;'>
                                        <div style='color: #29aac7; text-decoration: none;'>SUPORTE</div>
                                      </strong></font>
                                  </div>
                                
                                  <div style='height: 18px; line-height: 18px; font-size: 10px;'> </div>
                                  <div style='line-height: 21px;'>
                                    <font face='Arial, Helvetica, sans-serif' size='3' color='#98a7b9'
                                      style='font-size: 14px;'>
                                      <span
                                        style='font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;'>
                                        Temos uma equipe de prontidão para lhe auxíliar e tirar suas dúvidas. Você não está
                                        sozinho nessa, estamos juntos com você!
                                      </span></font>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          
                          <div style='height: 50px; line-height: 50px; font-size: 10px;'> </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td class='iage_footer' align='center' bgcolor='#ffffff'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td align='center'>
                          <font face='Arial, Helvetica, sans-serif' size='3' color='#96a5b5' style='font-size: 13px;'>
                            <br>
                            <span style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;'>
                              2019 © Resource Manager. Todos os Direitos Reservados.
                            </span></font>
                        </td>
                      </tr>
                    </table>
    
                    <div style='height: 20px; line-height: 20px; font-size: 10px;'> </div>
                  </td>
                </tr>
    
              
                <tr>
                  <td>
                    
                    <div style='height: 20px; background-color: #29aac7; font-size: 10px;'> </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
    
      </div>
    
      <br>
      <br>
    
      <style>
        body {
          padding: 0;
          margin: 0;
        }
    
        .button1 {
          background-color: #343a40;
          
          border: none;
          color: white;
          padding: 10px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
          -webkit-transition-duration: 0.4s;
          
          transition-duration: 0.4s;
        }
    
        .button1:hover {
          box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
      </style>
    
    </body> 
      ");
    $mail->AddAddress(utf8_decode($request->email));
    $mail->Send();   
  
      if($request->exists('category')){
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
      $disponibilidade = Disponibilidade::where('resource_id', $id)->first();
      $resource['disponibilidade'] =  $disponibilidade;
      $resource['category'] = $category;
      return response()->json($resource);
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
      $resource->nome = $request->nome;
      $resource->sobrenome = $request->sobrenome;
      $resource->email = $request->email;
      $resource->senha = $request->senha;

      //DADOS PESSOAIS
      $resource->fotoperfil = $request->fotoperfil;
      $resource->dt_nascimento = $request->dt_nascimento;
      $resource->genero = $request->genero;
      $resource->estado_civil = $request->estado_civil;
      $resource->nacionalidade = $request->nacionalidade;
      $resource->uf = $request->uf;
      $resource->cidade = $request->cidade;
      // $resource->disponibilidade = $request-> ;
      $resource->resumo_profissional = $request->resumo_profissional;
      // $resource->categoria = $request->;

      //EXPERIENCIA PROFISSIONAL
      $resource->empresa = $request->empresa;
      $resource->segmento = $request->segmento;
      $resource->dt_empresa_inicio = $request->dt_empresa_inicio;
      $resource->dt_empresa_saida = $request->dt_empresa_saida;
      $resource->cargo = $request->cargo;
      $resource->atividades = $request->atividades;

      //FORMAÇÃO
      $resource->curso = $request->curso;
      $resource->instituicao = $request->instituicao;
      $resource->dt_curso_inicio = $request->dt_curso_inicio;
      $resource->dt_curso_conclusao = $request->dt_curso_conclusao;
      $resource->info_complementares = $request->info_complementares;      
      $resource->formacao = $request->formacao;

      // $curso = $request-> ;
      // $telefone = $request-> ;
      // $endereco = $request-> ;
      // $celular = $request-> ;
      // $cidade = $request-> ;
      // $habilidades = $request-> ;
      // $area_interesse = $request-> ;

      $resource->message1 = $request->message1;
    
      $resource->update();
      
      
      if($request->category_id){
        
        $cr = CategoryResource::where('resource_id', $id)->first();  
        $vazio = !$cr;              
        if($vazio){
          $cr = new CategoryResource;          
        }
        $cr->category_id = $request->category_id;
        $cr->resource_id = $id;
        
        if($vazio){         
          $cr->save();
        } else{
          $cr->update();
        }
        $resource['categoria'] = $cr;
      }

      if($request->disponibilidade){
        
        $d = Disponibilidade::where('resource_id', $id)->first();  
        $vazio = !$d;              
        if($vazio){
          $d = new Disponibilidade;          
        }
        
        $d->segunda = $request->disponibilidade['segunda'];
        $d->terca = $request->disponibilidade['terca'];
        $d->quarta = $request->disponibilidade['quarta'];
        $d->quinta = $request->disponibilidade['quinta'];
        $d->sexta = $request->disponibilidade['sexta'];
        $d->sabado = $request->disponibilidade['sabado'];
        $d->domingo = $request->disponibilidade['domingo'];
        
        if($vazio){         
          $d->save();
        } else{
          $d->update();
        }
        $resource['disponibilidade'] = $d;
      }

      return response()->json($resource, 200);
    }
}