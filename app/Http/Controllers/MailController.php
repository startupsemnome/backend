<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Resource;
use App\ResourceProblem;

use Illuminate\Http\Request;

class MailController extends Controller
{
  public function communicateResources(Request $request){
    $id_recursos = $request->id_resource;
    
    for ($i=0; $i < sizeof($id_recursos); $i++) { 
      $resouce = Resource::find($id_recursos[$i]);
      
      $rp = new ResourceProblem;
      $rp->status = "CHAMADO"; 
      $rp->problem_id = $request->id_problem;
      $rp->resource_id = $id_recursos[$i]; 
      $rp->save();

      $mail = new PHPMailer;
      // $mail->SMTPDebug = 2;
      $mail->IsSMTP();
      $mail->SMTPAuth  = true;
      $mail->Charset   = 'utf8_decode()';
      $mail->Host  = getenv('MAIL_HOST');
      $mail->Port  = getenv('MAIL_PORT');
      $mail->Username  = getenv('MAIL_USERNAME');
      $mail->Password  = getenv('MAIL_PASSWORD');
      $mail->From  = $resouce->email;
      // isset($email['attachment']) ? $mail->addAttachment($email['attachment']) : null;
      $mail->FromName  = utf8_decode(getenv('MAIL_USERNAME'));
      $mail->IsHTML(true);
      $mail->Subject  = utf8_decode("Parabens, você foi selecionado!");
      $mail->Body  = utf8_decode("
    
    <body style='background-image:url('https://i.ibb.co/YTq1ppy/azul.jpg');
      background-position: center center; background-repeat: no-repeat;'>
      <div id='mailsub' class='notification' align='center'>
      <table width='100%' border='0' cellspacing='0' cellpadding='0' style='max-width: 700px;'>
        <tr>
          <td align='center' bgcolor='#eff3f8'>

            <table border='0' cellspacing='0' cellpadding='0' class='table_width_100' width='100%'
              style='max-width: 800px; min-width: 650px;'>
              <tr>
                <td>
                  <div style='height: 30px; line-height: 50px; font-size: 10px;'> </div>
                </td>
              </tr>
              <tr>
                <td align='center' bgcolor='#ffffff'>
                  <table width='90%' border='0' cellspacing='0' cellpadding='0'>
                  </table>

                  <div style='height: 25px; background-color: #4dd3f2; font-size: 10px;'> </div>
                </td>
              </tr>


              <tr>
                <td align='center'>

                  <table width='90%' border='0' cellspacing='0' cellpadding='0'>

                    <tr>
                      <td align='center'>
                        <br><br>
                        <div style='height: 60px; line-height: 60px; font-size: 10px;'> 
                          <img src='https://i.ibb.co/YTq1ppy/azul.jpg' alt='Smiley face' height='80' width='80'>

                        </div>
                        <br><br>

                        <div style='line-height: 44px;'>
                          <font face='Arial, Helvetica, sans-serif' size='5' color='#57697e' style='font-size: 50px;'>
                            <span style='font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;'>
                              Seja Bem-vindo
                            </span></font>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <div style='line-height: 24px;'>
                          <font face='Arial, Helvetica, sans-serif' size='4' color='#57697e' style='font-size: 15px;'>
                            <span style='font-family: Arial, Helvetica, sans-serif; font-size: 20px; color: #57697e;'>
                              Você foi selecionado para participar do projeto
                              <br /><b>clique abaixo</b> para saber mais...
                            </span></font>
                        </div>
                        <div style='height: 40px; line-height: 40px; font-size: 10px;'> </div>
                      </td>
                    </tr>
                    <tr>
                      <td align='center'>
                        <div style='line-height: 24px;'>
                          <a href='http://localhost:3000/' target='_blank' class='button button'
                            style='color: #fff; background-color: rgba(20, 20, 20, 0.8); text-align: center;
                          font-size: 20px; width: 28%; margin: 0px;  padding: 10px 30px; display:flex; justify-content:center;'>Visualizar projeto</a>
                        </div>
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
                  <div style='height: 20px; background-color: #4dd3f2; font-size: 10px;'> </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
      
      ");
    $mail->AddAddress(utf8_decode($resouce->email));
    $mail->Send();    
    }
    return response()->json("E-mail enviado com sucesso!");
  }

    public function send(Request $request)
    {    
      $mail = new PHPMailer;
      // $mail->SMTPDebug = 2;
      $mail->IsSMTP();
      $mail->SMTPAuth  = true;
      $mail->Charset   = 'utf8_decode()';
      $mail->Host  = getenv('MAIL_HOST');
      $mail->Port  = getenv('MAIL_PORT');
      $mail->Username  = getenv('MAIL_USERNAME');
      $mail->Password  = getenv('MAIL_PASSWORD');
      $mail->From  = 'tecjuliohenrique@gmail.com';
      // isset($email['attachment']) ? $mail->addAttachment($email['attachment']) : null;
      $mail->FromName  = utf8_decode(getenv('MAIL_USERNAME'));
      $mail->IsHTML(true);
      $mail->Subject  = utf8_decode('assunto');
      $mail->Body  = utf8_decode('corpo');
      $mail->AddAddress(utf8_decode('tecjuliohenrique@gmail.com'));
      $mail->Send();
      return response()->json("E-mail enviado com sucesso!");
    }
}
