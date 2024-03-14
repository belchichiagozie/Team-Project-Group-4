<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Retrieve form data
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Construct mail headers
        $mailheader = "From: $name <$email>\r\n";

        // Send the email
        $to = "xinto0698@gmail.com"; 
        $mail_sent = mail($to, $subject, $message, $mailheader);

        if ($mail_sent) {
            return view('mail.success');
        } else {
            return view('mail.error');
        }
    }
}

?>

