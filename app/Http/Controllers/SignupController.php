<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Mail;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'username'=>'required',
            'password'=>'required|max:25|min:4',
            'email'=>'required|email|unique:users',
            ]);
            $data=array();
            $data['username']=$req->username;
            $data['password']=$req->password;
            $data['email']=$req->email;
            $list = DB::table('users')->insert($data);
            $to_name = $req->username;
            $to_email = $req->email ;
            $token = mt_rand();
            $data1=array('username'=>$to_name,"email"=>$to_email,"token"=>$token);
            
            $list1 = DB::table('verify')->insert($data1);
            $output = array('name'=>$to_name,'body'=>"your token is $token. Please verify your account using this token.The verification link is provided below");
            Mail::send('emails.mail', $output, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Laravel Test Mail');
            $message->from('zihad.24bd@gmail.com','Test Mail');
});


            if($list){
                echo "Check your email";
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
