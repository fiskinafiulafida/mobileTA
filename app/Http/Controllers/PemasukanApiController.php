<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;

class PemasukanApiController extends Controller
{
    public function index(){
        $pemasukan = Pemasukan::all();
        return response()->json(['message' => 'Succes','data' => $pemasukan]);
    }
    public function show($id){
        $income = Pemasukan::find($id);
        return response()->json(['message' => 'Succes','data' => $income]);
    }
    public function store(Request $request){
        $income = Pemasukan::create($request->all());
        return response()->json(['message' => 'Succes','data' => $income]);
    }
    public function update(Request $request,$id){
        $income = Pemasukan::find($id);
        $income->update($request->all());
        return response()->json(['message' => 'Succes','data' => $income]);
    }
    public function destroy($id){
        $income = Pemasukan::find($id);
        $income->delete();
        return response()->json(['message' => 'Succes','data' => null]);
    }
}
