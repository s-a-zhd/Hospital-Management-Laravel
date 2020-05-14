<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Salary extends Controller
{
    public function index (Request $request){
        
        $list=DB::table('salary')->get();
    	return view('Admin.salary',compact('list'));

}

public function add_salary (Request $request){
        
   
    return view('Admin.add_salary');

}

public function insert_salary (Request $req){
        
    $validatedData = $req->validate([
        'name' => 'required',
        'email' => 'required',
        'salary' => 'required',
        
        ]);

        $data=array();
        $data['name']=$req->name;
        $data['email']=$req->email;
        $data['salary']=$req->salary;
        $user=DB::table('salary')->insert($data);
           
           
        if($user){
            $notification=array(
                'messege'=>'Successfully Inserted ',
                'alert-type'=>'success'
                 );
    
            
                 return redirect()->route('salary')->with($notification);

        }

        else{
            echo "Operation failed";
        }

        

}

    public function edit_salary ($id){
        
    $user=DB::table('salary')->where('id',$id)->first();
        return view('Admin.edit_salary',compact('user'));

}

public function update_salary (Request $req,$id){

    $validatedData = $req->validate([
        'name' => 'required',
        'email' => 'required',
        'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$req->name;
        $data['email']=$req->email;
       
        $data['salary']=$req->salary;
       

        $user=DB::table('salary')->where('id',$id)->update($data);

        if($user){
            $notification=array(
                'messege'=>'Successfully Updated ',
                'alert-type'=>'success'
                 );
    
            return redirect()->route('salary')->with($notification);
        }

   
}

}
