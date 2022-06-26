<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranApiController extends Controller
{
    public function index(){
        $pengeluaran = Pengeluaran::all();
        return response()->json(['message' => 'Succes','data' => $pengeluaran]);
    }
    public function show($id){
        $expense = Pengeluaran::find($id);
        return response()->json(['message' => 'Succes','data' => $expense]);
    }
    public function store(Request $request){
        $expense = Pengeluaran::create($request->all());
        return response()->json(['message' => 'Succes','data' => $expense]);
    }
    public function update(Request $request,$id){
        $expense = Pengeluaran::find($id);
        $expense->update($request->all());
        return response()->json(['message' => 'Succes','data' => $expense]);
    }
    public function destroy($id){
        $expense = Pengeluaran::find($id);
        $expense->delete();
        return response()->json(['message' => 'Succes','data' => null]);
    }
}
