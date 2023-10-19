<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Don;
use App\Models\Hang;
use App\Models\NhanSu;

class Import implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) 
        {
            Don::create([
                'nhansu_id' => $row[0],
                'tkqc_id' => $row[1],
                'hang_id' => $row[2],
                'tongchitieu' => $row[3],
                'mes' => $row[4],
                'cmt' => $row[5],
                'tt' => $row[6],
                'don' => $row[7],
            ]);
        }
    }
}
