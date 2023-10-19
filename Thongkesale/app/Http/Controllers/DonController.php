<?php

namespace App\Http\Controllers;
use Excel;
use App\Models\Don;
use App\Models\Hang;
use App\Models\TKQC;
use App\Models\NhanSu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\Import;
use App\Imports\HangImport;
use App\Imports\TKImport;
class DonController extends Controller
{
    public function index(Request $request){
        $data=Don::with(['hang','nhansu','tkqc'])->orderByDesc('id')->paginate(10);
        return view('don.index',compact('data'));
    }
    public function themform(Request $request){
        $nhansu=NhanSu::all();
        $hang=Hang::all();
        $tkqc=TKQC::all();
        return view('don.them',compact(['nhansu','tkqc','hang']));
    }
    public function them(Request $request){
        $result=Don::create([
            'nhansu_id'=>$request->nhansu_id,
            'tkqc_id'=>$request->tkqc_id,
            'hang_id'=>$request->hang_id,
            'tongchitieu'=>$request->tongchitieu,
            'mes'=>$request->mes,
            'cmt'=>$request->cmt,
            'tt'=>$request->tt,
            'don'=>$request->don,
        ]);
        return back();
    }
    public function suaform(Request $request,$id){
        $don=Don::where('id',$id)->first();
        $nhansu=NhanSu::all();
        $hang=Hang::all();
        $tkqc=TKQC::all();
        return view('don.sua',compact(['nhansu','tkqc','hang','don']));
    }
    public function sua(Request $request,$id){
        Don::where('id',$id)->update([
            'nhansu_id'=>$request->nhansu_id,
            'tkqc_id'=>$request->tkqc_id,
            'hang_id'=>$request->hang_id,
            'tongchitieu'=>$request->tongchitieu,
            'mes'=>$request->mes,
            'cmt'=>$request->cmt,
            'tt'=>$request->tt,
            'don'=>$request->don,
        ]);
        return back();
    }
    public function xoa($id){
        Don::destroy($id);
        return back();
    }
    
}
