<?php

namespace App\Imports;

use App\Models\Hang;
use Maatwebsite\Excel\Concerns\ToModel;

class HangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hang([
            'ten'=>$row[0]
        ]);
    }
}
