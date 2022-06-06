<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PemasukanController extends Controller
{
    // public function index()
    // {
    //     $pengeluaran = Pengeluaran::all();
    //     return view('pengeluaran.index', compact(['pengeluaran']));
    // }

    // public function create()
    // {
    //     return view('pengeluaran.create');
    // }

    // public function store(Request $request)
    // {
    //     return $request->file('image')->store('images');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('pemasukan.index', compact(['pemasukan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasukan = Pemasukan::all();

        return view('pemasukan.create', compact('pemasukan'));
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

        $pemasukan = new Pemasukan;

        $pemasukan->nama = $request->nama;
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->gambar  = $file->getClientOriginalName();
        $tujuan_upload = 'gambar';

        $file->move($tujuan_upload, $file->getClientOriginalName());
        $pemasukan->save();

        return redirect()->route('pengeluaran.index')->with('msg', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Pemasukan::find($id);

        return view('admin.buku.detail', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $edit = Pemasukan::find($id);
        // return view('admin.buku.edit', compact('edit'));

        $pemasukan = Pemasukan::all();
        return view('pemasukan.edit', compact('pemasukan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'sometimes',
            'deskripsi' => 'sometimes',
            'gambar' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);

        $pemasukan = new Pemasukan;

        $pemasukan->nama = $request->nama;
        $pemasukan->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = 'image/' . $pemasukan->gambar;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $image_name = time() . '.' . $ext;
            $file->move('image/', $image_name);
            $pemasukan->gambar = $image_name;
        }

        $pemasukan->save();
        return redirect()->route('pemasukan.index')->with('msg', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemasukan::find($id)->delete();
        return redirect('pemasukan')->with('msg', 'Data Berhasil dihapus');
    }
}
