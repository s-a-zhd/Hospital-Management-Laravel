<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class LoginController extends Controller
{
    public function index (Request $req){
        return view('login');
    }

    public function verify (Request $req){

        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|max:25|min:4',
        ]);

        $email = $req ->email;
        $password = $req ->password;
       
        $user = DB::table('users')
                ->where('email',$email)
                ->where('password',$password)
                
                ->first();

        if ($user !=null){
           
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                $req->session()->put('email' , $email);
                return redirect('/dashboard');
            

        


           
            
        }
        else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }

    }
}
