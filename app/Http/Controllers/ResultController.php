<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ResultController extends Controller
{
    public function result (Request $request){
        

        $list1= DB::table('registration')
       
        ->join('result', 'registration.role', '=', 'result.role')
       
        ->select('result.*', 'registration.*', )
        ->get();

         $list2=DB::table('registration')
         ->where('role','Student')
         ->get();

    	return view('result',compact('list1','list2'));
    }
    public function result_upload (Request $request ,$id){
        $user= DB::table('registration')
        ->where('id',$id)
        ->first();
       
        return view('upload_result',compact('user'));
       

    }

    public function upload (Request $request ,$id){
        $validatedData = $request->validate([
            'score' => 'required',
            'grade' => 'required',
            
            ]);

            $data=array();
            $data['score']=$request->score;
            $data['grade']=$request->grade;
            $data['student_id']=$request->id;

            $user=DB::table('result')->insert($data);

            $notification=array(
                'messege'=>'Successfully result Uploaded',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);    
    }

   
//
}
