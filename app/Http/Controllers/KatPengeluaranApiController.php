<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPengeluaran;

class KatPengeluaranApiController extends Controller
{
    public function index(){
        $kat_pengeluaran = KategoriPengeluaran::all();
        return response()->json(['message' => 'Succes','data' => $kat_pengeluaran]);
    }
    public function store(Request $request){
        $cat_expense = KategoriPengeluaran::create($request->all());
        return response()->json(['message' => 'Succes','data' => $cat_expense]);
    }
}
