<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Report extends Controller
{
    //
    public function index ($id){

        $list=DB::table('employee')->where('id',$id)->first();
        return view('report',compact('list'));
    }
}
