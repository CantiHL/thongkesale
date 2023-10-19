<?php

namespace App\Http\Controllers;
use App\Models\NhanSu;
use Illuminate\Http\Request;

class NhanSuController extends Controller
{
    public function index(){
        $data=NhanSu::orderByDesc('id')->get();
        return view('nhansu.index',compact('data'));
    }
    public function themform(){
        return view('nhansu.them');
    }
    public function them(Request $request){
        $data=NhanSu::create([
            'ten' => $request->input('ten'),
        ]);
        return back();
    }
    public function suaxoa(Request $request){
        if(array_key_exists('sua',$request->input())){
            NhanSu::where('id',$request->id)->update([
                'ten'=>$request->ten,
            ]);
           
        }else{
            NhanSu::where('id',$request->id)->delete();
        }
        return back();
    }
}
