<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = "pemasukans";
    
    protected $guarded = ['id'];

    public function kategoriPemasukan()
    {
    	return $this->belongsTo('App\KategoriPemasukan');
    }
}
