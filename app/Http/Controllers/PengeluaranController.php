<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact(['pengeluaran']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengeluaran = Pengeluaran::all();

        return view('pengeluaran.create', compact('pengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi'  => 'required',

        ]);

        $file = $request->file('gambar');

        $pengeluaran = new Pengeluaran;

        $pengeluaran->nama = $request->nama;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->gambar  = $file->getClientOriginalName();
        $tujuan_upload = 'gambar';

        $file->move($tujuan_upload, $file->getClientOriginalName());
        $pengeluaran->save();

        return redirect()->route('pengeluaran.index')->with('msg', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $show = Pengeluaran::find($id);

    //     return view('pengeluaran.detail', compact('show'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)->first();
        return view('pengeluaran.edit', [
            'pengeluaran' => $pengeluaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $rules = [
            'id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ];

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar');
        }

        $validatedData = $request->validate($rules);

        Pengeluaran::where('id', $pengeluaran->id)
            ->update($validatedData);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pengeluaran)
    {
        if (File::exists('gambar/' . $pengeluaran->gambar)) {
            File::delete('gambar/' . $pengeluaran->gambar);
        }

        Pengeluaran::find($pengeluaran->id)->delete();
        return redirect()->route('pengeluran.index')
            ->with('success', 'Pengeluaran berhasil dihapus');
    }
}
