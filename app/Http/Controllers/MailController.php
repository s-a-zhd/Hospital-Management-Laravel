<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{

public function index (Request $request){


$to_name = 'abc123';
$to_email = 'abc123@yopmail.com';
$data = array('name'=>"Zihad",'body'=>"Test Mail");
Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
$message->to($to_email, $to_name)
->subject('Laravel Test Mail');
$message->from('zihad.24bd@gmail.com','Test Mail');
});
echo "Email Sent";
}
}
