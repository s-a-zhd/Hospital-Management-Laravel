<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SearchController extends Controller
{
    public function search (Request $request){
        if($request->ajax())
        {
            $output="abcd";
            $users=DB::table('doctor')->where('first_name','like','%'. $request->search.'%')
            ->orWhere('id', 'like', '%'.$request->search.'%')
            ->get();
            
            if($users)
            {
                foreach ($users as $key => $user) {
                $output.='<tr>'.
                '<td>'.$user->image.'</td>'.
                '<td>'.$user->id.'</td>'.
                '<td>'.$user->first_name.'</td>'.
                '<td>'.$user->last_name.'</td>'.
                '<td>'.$user->email.'</td>'.
                '<td>'.$user->dob.'</td>'.
                '<td>'.$user->gender.'</td>'.
                '<td>'.$user->address.'</td>'.
                '<td>'.$user->phone.'</td>'.
               
                
                
                
                '</tr>';
                }
            return Response($output);
            }
        }
    }

    public function searchmed (Request $request){
        if($request->ajax()){
            $output="abcd";
            $users=DB::table('store')->where('name','like','%'. $request->search.'%')
            ->orWhere('id', 'like', '%'.$request->search.'%')
            ->get();

            if($users){
                foreach ($users as $key => $user) {
                    $output.='<tr>'.
                   
                    '<td>'.$user->id.'</td>'.
                    '<td>'.$user->name.'</td>'.
                    '<td>'.$user->p_date.'</td>'.
                    '<td>'.$user->expire_end.'</td>'.
                    '<td>'.$user->price.'</td>'.
                    '<td>'.$user->quantity.'</td>'.
                    '</tr>';
            }
            return Response($output);

        }
    }




}

    public function verify(Request $req){
        //DB::enableQueryLog();
       
        $check=$req->token;
        $list=DB::table('verify')->where('token',$check)->first();
        //dd(DB::getQueryLog());
        
        $email=$list->email;
        // foreach ($list as $user){
        //      $email       = $user[0]['email'];
        //  }
        if($list){
            $update = "verified";
            $list = DB::table('users')->where('email',$email)->update(array('email_status' =>$update));
            echo "Email verified";
        }
        else{
            echo "Token Did Not Match";
        }  
    }
}
