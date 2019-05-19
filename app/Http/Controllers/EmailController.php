<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class EmailController extends BaseController
{

  public function sendMail(Request $request){
      
    $mail = new PHPMailer;
    // $mail->SMTPDebug = 2;
    print(utf8_decode($request->to));
    $mail->IsSMTP();
    $mail->SMTPAuth  = true;
    $mail->Charset   = 'utf8_decode()';
    $mail->Host  = getenv('MAIL_HOST');
    $mail->Port  = getenv('MAIL_PORT');
    $mail->Username  = getenv('MAIL_USERNAME');
    $mail->Password  = getenv('MAIL_PASSWORD');
    $mail->From  =  utf8_decode($request->to);
    // isset($email['attachment']) ? $mail->addAttachment($email['attachment']) : null;
    $mail->FromName  = utf8_decode('Resource Manager');
    $mail->IsHTML(true);
    $mail->Subject  = utf8_decode($request->assunto);
    $mail->Body  = utf8_decode($request->body);
    $mail->AddAddress(utf8_decode($request->to));
    $mail->Send();
  }
}