@extends('layout')
@section('content')
    
<div class="container mx-auto">
        <form>
            <form class="m-4" action="/" method="post">
                @csrf
                <div class="grid md:grid-cols-4 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <select name="option" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500" >
                            @foreach ($dataSearch as $key => $item)
                            @if ($key==request('option'))
                            <option selected value="{{$key}}">{{$item}}</option>
                            @else
                            <option value="{{$key}}">{{$item}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Loc</button>
                    </div>
                </div>
            </form>

        </form>
    
    <hr>
    <h1 class="text-2xl font-bold mt-4 text-center">Thống Kê</h1>
    <hr>
    @if (request('option')=='NSMHTKQC'||request('option')=='NSMH'||request('option')=='NSTKQC'||request('option')=='MHTKQC')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
            <tr>
                @foreach ($theader as $item)
                <th scope="col" class="px-6 py-3">
                    {{$item}}
                </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @if(!empty($data))
            @foreach($data as $da)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    @if (!empty($da->nhansu->ten))
                        <td class="px-6 py-4">
                            {{$da->nhansu->ten}}
                        </td>
                    @endif
                    @if (!empty($da->hang->ten))
                        <td class="px-6 py-4">
                            {{$da->hang->ten}}
                        </td>
                    @endif
                    @if (!empty($da->tkqc->ten))
                        <td class="px-6 py-4">
                            {{$da->tkqc->ten}}
                        </td>
                    @endif
                    <td class="px-6 py-4">
                        {{number_format($da->tongchitieu,0)}}
                    </td>
                    <td class="px-6 py-4">
                        {{$da->tongdon}}
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
    @else
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
            <tr>
                @foreach ($theader as $item)
                <th scope="col" class="px-6 py-3">
                    {{$item}}
                </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @if(!empty($thongke))
                @foreach($thongke as $da)
                    <tr>
                        <td class="px-6 py-4">
                            {{$da->gr}}
                            @if(request('option')=='NS') {{$da->nhansu->ten}} @endif
                            @if(request('option')=='MH') {{$da->hang->ten}} @endif
                            @if(request('option')=='TKQC') {{$da->tkqc->ten}} @endif
                        </td>
                        <td class="px-6 py-4">
                            {{number_format($da->tongchitieu,0)}}
                        </td>
                        <td class="px-6 py-4">
                            {{$da->tongdon}}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    @endif
    <hr>
    <h1 class="text-2xl font-bold mt-4 text-center">Overview</h1>
    <hr>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    tong chi tieu
                </th>
                <th scope="col" class="px-6 py-3">
                    tong don
                </th>
                <th scope="col" class="px-6 py-3">
                    phat sinh
                </th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($tong))
            @foreach($tong as $da)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{number_format($da->tongchitieu,0)}}
                    </td>
                    <td class="px-6 py-4">
                        {{$da->tongdon}}
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($da->tongchitieu*1/100,0)}}
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
    
</div>
@endsection
