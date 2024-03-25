<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class MailController extends Controller
{
    public function index()
    {
        return view('mail');
    }

    public function sendMail(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                    
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'ab3225e78af6c0';               
            $mail->Password   = '2b28daf3cd6fd4';               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 2525;                                  


            $mail->setFrom('210150458@aston.ac.uk', 'Mailer');
            $mail->addAddress('210150458@aston.ac.uk', 'Joe User');     
            $mail->isHTML(true);                                 
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = strip_tags($message);

            $mail->send();
            echo 'Message has been sent';
        } catch (PHPMailerException $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        if (isset($e)) {
            return view('mail.error');
        } else {
            return view('mail.success');
        }
    }
}
