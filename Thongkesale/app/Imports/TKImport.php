<?php

namespace App\Imports;

use App\Models\TKQC;
use Maatwebsite\Excel\Concerns\ToModel;

class TKImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TKQC([
            'ten'=>$row[1]
        ]);
    }
}
