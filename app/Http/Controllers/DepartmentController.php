<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=DB::table('departments')->get();
    	return view('departments',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'desc' => 'required',
            
            
            ]);

            $data=array();
            $data['department_name']=$req->name;
            $data['department_desc']=$req->desc;
            
            
            $course=DB::table('departments')->insert($data);
            $notification=array(
                'messege'=>'Successfully Department Inserted',
                'alert-type'=>'success'
                 );
           
            if($course){
                return redirect('/department')->with($notification);
            }

            else{
                echo "Operation failed";
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
        $course=DB::table('departments')->where('id',$id)->first();
        return view('editdepartment',compact('course'));
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
        $validatedData = $req->validate([
            'name' => 'required',
            'desc' => 'required',
            
            
            ]);

            $data=array();
            $data['department_name']=$req->name;
            $data['department_desc']=$req->desc;
            

            $course=DB::table('departments')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Course Updated',
                'alert-type'=>'success'
                 );

            if($course){
                return redirect('/department')->with($notification);
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
        $course=DB::table('departments')->where('id',$id)->delete();
       
        return redirect('/department');
}
}