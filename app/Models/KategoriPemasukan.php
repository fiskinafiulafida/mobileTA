<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPemasukan extends Model
{
    use HasFactory;
    protected $table = "kategori_pemasukans";
    protected $guarded = ['id'];
    protected $fillable = [
        'name'
       ];

    public function pemasukan()
    {
    	return $this->hasMany('App\Pemasukan');
    }
}
