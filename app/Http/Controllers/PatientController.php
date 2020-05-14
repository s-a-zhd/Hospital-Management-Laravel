<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $list=DB::table('patient')->get();
    	return view('patient',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_patient');
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
            'name'=>'required',
            'age'=>'required',
            'email'=>'required|email',
            'date'=>'required',
            'address'=>'required',
            'phone'=>'required',
            

            
        ]);

        $data=array();
        $data['name']=$req->name;
        $data['age']=$req->age;
        $data['email']=$req->email;
        $data['date']=$req->date;
       
        $data['address']=$req->address;
        $data['phone']=$req->phone;
        $list = DB::table('patient')->insert($data);
        $notification=array(
            'messege'=>'Successfully Inserted',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('patient')->with($notification);
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
        $list=DB::table('patient')->where('id',$id)->first();
        return view('edit_patient',compact('list'));
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
        $req->validate([
            'name'=>'required',
            'age'=>'required',
            'email'=>'required|email',
            'date'=>'required',
            'address'=>'required',
            'phone'=>'required',
            

            
        ]);
        $data=array();
        $data['name']=$req->name;
        $data['age']=$req->age;
        $data['email']=$req->email;
        $data['date']=$req->date;
       
        $data['address']=$req->address;
        $data['phone']=$req->phone;
        $list=DB::table('patient')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Successfully Updated',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('patient')->with($notification);
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

        $list=DB::table('patient')->where('id',$id)->delete();

        $notification=array(
            'messege'=>'Successfully Deleted',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('patient')->with($notification);
        }
       
        
}

}
