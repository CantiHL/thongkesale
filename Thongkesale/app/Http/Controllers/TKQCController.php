<?php

namespace App\Http\Controllers;
use App\Models\TKQC;

use Illuminate\Http\Request;

class TKQCController extends Controller
{
    public function index(){
        $data=TKQC::orderByDesc('id')->get();
        return view('tkqc.index',compact('data'));
    }
    
    public function them(Request $request){
        $data=TKQC::create([
            'ten' => $request->input('ten'),
        ]);
        return back();
    }
    public function suaxoa(Request $request){
        if(array_key_exists('sua',$request->input())){
            TKQC::where('id',$request->id)->update([
                'ten'=>$request->ten,
            ]);
           
        }else{
            TKQC::where('id',$request->id)->delete();
        }
        return back();
    }
}
