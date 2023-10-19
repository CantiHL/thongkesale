<?php

namespace App\Http\Controllers;
use Excel;
use App\Models\Don;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\Import;
use App\Imports\HangImport;
use App\Imports\TKImport;

class DashboardController extends Controller
{
    public function index(Request $request){
        // Excel::import(new HangImport, 'D:\Workspace\laravel\2.xlsx');
        // Excel::import(new TKImport, 'D:\Workspace\laravel\2.xlsx');
        // Excel::import(new Import, 'D:\Workspace\laravel\Book1.xlsx');
        $dataSearch=[
            'Ngay'=>'Ngay',
            'Thang'=>'Tháng',
            'NS'=>'Nhân Sự',
            'MH'=>'Mã Hàng',
            'TKQC'=>'Tài Khoản Quảng Cáo',
            'NSMH'=>'Nhân Sự, Mã Hàng',
            'NSTKQC'=>'Nhân Sự, Tài Khoản Quảng Cáo',
            'MHTKQC'=>'Mã Hàng, Tài Khoản Quảng Cáo',
            'NSMHTKQC'=>'Nhân Sự, Mã Hàng, Tài Khoản Quảng Cáo',
        ];
        $theader=['Ngày','Tổng chi tiêu', 'Đơn'];

        $tong=Don::select(DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->get();
        $thongke=Don::select(DB::raw("DISTINCT DATE_FORMAT(created_at,'%d-%m-%Y') as gr"),DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->groupBy('gr')->get();
        $data=null;
        if ($request->input('option')=='NSMHTKQC'){
            $data=Don::with(['hang','nhansu','tkqc'])->select('hang_id','nhansu_id', 'tkqc_id', DB::raw('SUM(tongchitieu) as tongchitieu'), DB::raw('SUM(don) as tongdon'))->groupBy('hang_id','nhansu_id','tkqc_id')->get();
            $theader=['Nhân Sự', 'Hàng', 'TKQC', 'Tổng chi tiêu', 'Đơn'];
        }
        if ($request->input('option')=='NSMH'){
            $data=Don::with(['hang','nhansu'])->select('hang_id','nhansu_id', DB::raw('SUM(tongchitieu) as tongchitieu'), DB::raw('SUM(don) as tongdon'))->groupBy('hang_id','nhansu_id')->get();
            $theader=['Nhân Sự', 'Hàng', 'Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='NSTKQC'){
            $data=Don::with(['nhansu','tkqc'])->select('nhansu_id', 'tkqc_id', DB::raw('SUM(tongchitieu) as tongchitieu'), DB::raw('SUM(don) as tongdon'))->groupBy('nhansu_id','tkqc_id')->get();
            $theader=['Nhân Sự', 'TKQC', 'Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='MHTKQC'){
            $data=Don::with(['hang','tkqc'])->select('hang_id', 'tkqc_id', DB::raw('SUM(tongchitieu) as tongchitieu'), DB::raw('SUM(don) as tongdon'))->groupBy('hang_id','tkqc_id')->get();
            $theader=['Hàng', 'TKQC', 'Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='Ngay'){
            $thongke=Don::select(DB::raw("DISTINCT DATE_FORMAT(created_at,'%d-%m-%Y') as gr"),DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->groupBy('gr')->get();
            $theader=['Ngày','Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='Thang'){
            $thongke=Don::select(DB::raw("DISTINCT DATE_FORMAT(created_at,'%m-%Y') as gr"),DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->groupBy('gr')->get();
            $theader=['Tháng','Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='MH'){

            $thongke=Don::with('hang')->select('hang_id',DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->groupBy('hang_id')->get();
            $theader=['Mã Hàng','Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='NS'){
            $thongke=Don::with('nhansu')->select('nhansu_id',DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->groupBy('nhansu_id')->get();
            $theader=['Nhân Sụ','Tổng chi tiêu', 'Đơn'];

        }
        if ($request->input('option')=='TKQC'){
            $thongke=Don::with('tkqc')->select('tkqc_id',DB::raw('SUM(tongchitieu) as tongchitieu'),DB::raw('SUM(don) as tongdon'))->groupBy('tkqc_id')->get();
            $theader=['TKQC','Tổng chi tiêu', 'Đơn'];

        }
        return view('don',compact(['tong', 'thongke','data','dataSearch','theader']));
    }
}
