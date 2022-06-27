<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = "pengeluarans";
    
    protected $guarded = ['id'];

    public function kategoriPengeluaran()
    {
    	return $this->hasOne(kategoriPengeluaran::class, 'id', 'id_kategoriPengeluaran')
        ->withDefault(['name' => '']);
    }
}
