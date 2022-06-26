<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPemasukan;

class KatPemasukanApiController extends Controller
{
    public function index(){
        $kat_pemasukan = KategoriPemasukan::all();
        return response()->json(['message' => 'Succes','data' => $kat_pemasukan]);
    }
    public function store(Request $request){
        $cat_income = KategoriPemasukan::create($request->all());
        return response()->json(['message' => 'Succes','data' => $cat_income]);
    }
}
