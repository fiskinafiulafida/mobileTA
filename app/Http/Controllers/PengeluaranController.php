<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::with('kategoriPengeluaran')->paginate(10);
        return view('pengeluaran.index', compact(['pengeluaran']));
    }
    public function create()
    {
        return view('pengeluaran.create');
    }
    public function store(Request $request)
    {
        $pengeluaran = Pengeluaran::create([
            $request->all()
        ]);

        if ($pengeluaran) {
            //redirect dengan pesan sukses
            return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengeluaran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.edit', compact(['pengeluaran']));
    }
    public function update(Request $request,$id)
    {
        //get data pengeluaran by ID
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->update($request->all());
        if ($pengeluaran) {
            //redirect dengan pesan sukses
            return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengeluaran.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        if ($pengeluaran) {
            //redirect dengan pesan sukses
            return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('blpengeluaranog.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
