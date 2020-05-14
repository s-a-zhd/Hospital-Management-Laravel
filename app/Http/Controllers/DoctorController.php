<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=DB::table('doctor')->get();
    	return view('doctor',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_doctor');
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
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'dob'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'image'=>'required',

            
        ]);

        $data=array();
        $data['first_name']=$req->f_name;
        $data['last_name']=$req->l_name;
        $data['email']=$req->email;
        $data['dob']=$req->dob;
        $data['gender']=$req->gender;
        $data['address']=$req->address;
        $data['phone']=$req->phone;
        $data['image']=$req->image;
        $file=$req->file('image');
        if ($file) {
            $file_name=hexdec(uniqid());
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='assets/images/upload_images/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            $data['image']=$file_full_name;


        
        
        $list = DB::table('doctor')->insert($data);

        $notification=array(
            'messege'=>'Successfully Inserted',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('doctor')->with($notification);
        }
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
        $list=DB::table('doctor')->where('id',$id)->first();
        return view('editdoctor',compact('list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $validatedData = $req->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'dob'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'image'=>'required',
            
            ]);

        $data=array();
        $data['first_name']=$req->f_name;
        $data['last_name']=$req->l_name;
        $data['email']=$req->email;
        $data['dob']=$req->dob;
        $data['gender']=$req->gender;
        $data['address']=$req->address;
        $data['phone']=$req->phone;
        $data['image']=$req->image;
        $file=$req->file('image');
        if ($file) {
            $file_name=hexdec(uniqid());
            $ext=strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $upload_path='assets/images/upload_images/';
            $file_url=$upload_path.$file_full_name;
            $success=$file->move($upload_path,$file_full_name);
            $data['image']=$file_full_name;
            

            $list=DB::table('doctor')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Updated',
                'alert-type'=>'success'
                 );
    
            if($list){
                return redirect('doctor')->with($notification);
            }
        }
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
        $list=DB::table('doctor')->where('id',$id)->delete();

        $notification=array(
            'messege'=>'Successfully Deleted',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('doctor')->with($notification);
        }
       
       
    }
}
