<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory;
    protected $fillable = [
        'nhansu_id',
        'tkqc_id',
        'hang_id',
        'tongchitieu',
        'mes',
        'cmt',
        'tt',
        'don',
        'ngay',
    ];
    public function nhansu(){
        return $this->belongsTo(NhanSu::class);
    }
    public function hang(){
        return $this->belongsTo(Hang::class);
    }
    public function tkqc(){
        return $this->belongsTo(TKQC::class);
    }
}
