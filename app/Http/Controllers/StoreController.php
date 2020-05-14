<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //'
        $list=DB::table('store')->orderby('id','desc')->get();
    	return view('store',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_medicine');
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
            'p_date'=>'required',
            'e_date'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            
            

            
        ]);

        $data=array();
        $data['name']=$req->name;
        $data['p_date']=$req->p_date;
        $data['expire_end']=$req->e_date;
        $data['price']=$req->price;
       
        $data['quantity']=$req->quantity;
      
        $list = DB::table('store')->insert($data);
        $notification=array(
            'messege'=>'Successfully Inserted',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('store')->with($notification);
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
        $list=DB::table('store')->where('id',$id)->first();
        return view('edit_medicine',compact('list'));
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
            'p_date'=>'required',
            'e_date'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            
            

            
        ]);

        $data=array();
        $data['name']=$req->name;
        $data['p_date']=$req->p_date;
        $data['expire_end']=$req->e_date;
        $data['price']=$req->price;
       
        $data['quantity']=$req->quantity;
      
        $list = DB::table('store')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Successfully Updated',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('store')->with($notification);
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
        $list=DB::table('store')->where('id',$id)->delete();

        $notification=array(
            'messege'=>'Successfully Deleted',
            'alert-type'=>'success'
             );

        if($list){
            return redirect('store')->with($notification);
        }
    }
}
