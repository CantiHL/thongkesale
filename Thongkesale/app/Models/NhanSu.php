<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanSu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ten',
    ];

    public function dons(){
        return $this->hasMany(Don::class);
    }
}
