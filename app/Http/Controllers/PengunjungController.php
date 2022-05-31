<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = Pengunjung::all();
        return view('pengunjung.index', compact(['pengunjung']));
    }

    public function edit($id)
    {
        $pengunjung = Pengunjung::find($id);
        return view('pengunjung.edit', compact(['pengunjung']));
    }

    public function update(Request $request, $id)
    {
        $pengunjung = Pengunjung::find($id);
        $pengunjung->update($request->all());
        return redirect('/pengunjung');
    }

    public function destroy($id)
    {
        $pengunjung = Pengunjung::find($id);
        $pengunjung->delete();
        return redirect('/pengunjung');
    }
}
