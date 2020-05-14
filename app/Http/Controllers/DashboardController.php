<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
   public function index (Request $request){
    $list = DB::table('doctor')->get();
    $list2 = DB::table('patient')->get();
    $doc = $list->count();
    $patient = $list->count();
    return view('Admin.Dashboard', ['doc'=>$doc],['patient'=>$patient]);
   }
}
