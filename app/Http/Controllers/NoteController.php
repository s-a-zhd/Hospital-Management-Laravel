<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class NoteController extends Controller
{
     public function index(Request $request)
    {
        return view('note');
    }

    public function uploadNote(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:note|file',
            'title' => 'required',
            'details' => 'required',
           
            
            ]);

        $data=array();
    	
    	$data['title']=$request->title;
        $data['details']=$request->details;
        $file=$request->file('name');
        if ($file) {
            $file_name=hexdec(uniqid());
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='public/assets/note/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            $data['name']=$file_url;
            DB::table('note')->insert($data);
             $notification=array(
                'messege'=>'Successfully File Uploaded',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
        } else {
            # code...
        }
        

    }
}


