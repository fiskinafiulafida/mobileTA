<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $peng = Pengeluaran::all();
        return view('pengeluaran.index', compact(['peng']));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        return $request->file('image')->store('image');
        Pengeluaran::create($request->all());
        return redirect('/places');
    }
}
