<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
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
        return view('pengeluaran.create');
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
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'nama'     => 'required',
            'deskripsi'   => 'required'
        ]);

        //upload image
        if ($request->file('gambar')) {
            $image_name = $request->file('gambar')->store('pengeluaran', 'public');
        }

        $pengeluaran = Pengeluaran::create([
            'gambar'     => $image_name,
            'nama'     => $request->nama,
            'deskripsi'   => $request->deskripsi
        ]);

        if ($pengeluaran) {
            //redirect dengan pesan sukses
            return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengeluaran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
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
        $this->validate($request, [
            'nama'     => 'required',
            'deskripsi'   => 'required'
        ]);

        //get data pengeluaran by ID
        $pengeluaran = Pengeluaran::findOrFail($pengeluaran->id);

        if ($request->file('gambar') == "") {

            $pengeluaran->update([
                'nama'     => $request->nama,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            if ($pengeluaran->gambar && file_exists(storage_path('app/public/' . $pengeluaran->gambar))) {
                Storage::delete(['public/', $pengeluaran->gambar]);
            };

            $image_name = $request->file('gambar')->store('pengeluaran', 'public');

            $pengeluaran->update([
                'gambar'     => $image_name,
                'nama'     => $request->nama,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        if ($pengeluaran) {
            //redirect dengan pesan sukses
            return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengeluaran.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        Storage::delete(['public/', $pengeluaran->gambar]);
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
