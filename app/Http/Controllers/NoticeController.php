<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class NoticeController extends Controller
{
    public function index (Request $request){
        return view('notice');
    }

    

    public function uploadNotice (Request $request){

         $validatedData = $request->validate([
            'subject' => 'required',
            'details' => 'required',
            
            ]);

        $data=array();
        $data['subject']=$request->subject;
        $data['details']=$request->details;
       

        $notice = DB::table('notice')->insert($data);

        $notification=array(
            'messege'=>'Successfully Notice Uploaded',
            'alert-type'=>'success'
             );

        if($notice){
            return redirect()->route('notice')->with($notification);
        }

    }
}
