<?php

namespace App\Http\Controllers;
use App\Models\Hang;

use Illuminate\Http\Request;

class HangController extends Controller
{
    public function index(){
        $data=Hang::orderByDesc('id')->get();
        return view('hang.index',compact('data'));
    }
    
    public function them(Request $request){
        $data=Hang::create([
            'ten' => $request->input('ten'),
        ]);
        return back();
    }
    public function suaxoa(Request $request){
        if(array_key_exists('sua',$request->input())){
            Hang::where('id',$request->id)->update([
                'ten'=>$request->ten,
            ]);
           
        }else{
            Hang::where('id',$request->id)->delete();
        }
        return back();
    }
}
