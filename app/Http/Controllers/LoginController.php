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
        //DB::enableQueryLog();
        $user = DB::table('users')
                ->where('email',$email)
                ->where('password',$password)
                
                ->first();
               // dd(DB::getQueryLog());
        $status = $user->email_status;
        

        if ($user !=null){

            if ($status=="not_verified"){
                echo "Please Verify Your Email first";
            }

           else {
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                $req->session()->put('email' , $email);
                return redirect('/dashboard');
                    }

        


           
            
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
