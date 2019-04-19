<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;

class MailController extends Controller
{
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
