<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pemasukan extends Model
{
    use HasFactory;
    protected $table = "pemasukan";

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'gambar',
        'gambar', 'nama', 'deskripsi'
    ];

    public function pemasukan()
    {
        return $this->hasMany(pemasukan::class);
    }
}