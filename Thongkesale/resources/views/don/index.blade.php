@extends('layout')
@section('content')
<div class="container mx-auto">
        <a href="{{route('themdon')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Them</a>
      @if(!empty($data))
      <div class="mt-3 relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Ngày
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nhân sự
                  </th>
                  <th scope="col" class="px-6 py-3">
                      ID TKQC
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Mã hàng
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Tổng chi tiêu
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Mes
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Cmt
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Tương tác
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Đơn
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Action
                 </th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $da)
                  <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{\Carbon\Carbon::parse($da->created_at)->format('Y-m-d')}}
                      </th>
                      <td class="px-6 py-4">
                          {{$da->nhansu->ten}}
                      </td>
                      <td class="px-6 py-4">
                          {{$da->tkqc->ten}}
                      </td>
                      <td class="px-6 py-4">
                          {{$da->hang->ten}}
                      </td>
                      <td class="px-6 py-4">
                        {{number_format($da->tongchitieu,0)}}
                      </td>
                      <td class="px-6 py-4">
                          {{$da->mes}}
                      </td>
                      <td class="px-6 py-4">
                          {{$da->cmt}}
                      </td>
                      <td class="px-6 py-4">
                          {{$da->tt}}
                      </td>
                      <td class="px-6 py-4">
                          {{$da->don}}
                      </td>
                       <td class="px-6 py-4">
                        <a href="{{route('suadon',['id'=>$da->id])}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sua</a>
                        <a href="{{route('xoadon',['id'=>$da->id])}}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Xoa</a>
                        </td>
                  </tr>
              @endforeach
              {{ $data->links('pagination::tailwind') }}
              </tbody>
          </table>
      </div>
      @endif
</div>
@endsection
