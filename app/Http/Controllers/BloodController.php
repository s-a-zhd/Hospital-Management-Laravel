<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list=DB::table('blood')->get();
    	return view('blood',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $list=DB::table('blood')->where('id',$id)->first();
        return view('edit_blood',compact('list'));
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
            'status'=>'required',
            'quantity'=>'required',
            
            

            
        ]);
        $data=array();
        $data['status']=$req->status;
        $data['quantity']=$req->quantity;
      
        $list=DB::table('blood')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Successfully Updated',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('blood')->with($notification);
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
    }
}
