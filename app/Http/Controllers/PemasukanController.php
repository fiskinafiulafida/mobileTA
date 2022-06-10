<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Storage;
class PemasukanController extends Controller
{
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
        return view('pemasukan.create');
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
            $image_name = $request->file('gambar')->store('pemasukan', 'public');
        }


        $pemasukan = Pemasukan::create([
            'gambar'     => $image_name,
            'nama'     => $request->nama,
            'deskripsi'   => $request->deskripsi
        ]);
        if ($pemasukan) {
            //redirect dengan pesan sukses
            return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pemasukan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    //     $show = Pemasukan::find($id);
    //     return view('pemasukan.detail', compact('show'));
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit', compact('pemasukan'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'deskripsi'   => 'required'
        ]);
        //get data pemasukan by ID
        $pemasukan = Pemasukan::findOrFail($pemasukan->id);
        if ($request->file('gambar') == "") {
            $pemasukan->update([
                'nama'     => $request->nama,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            //hapus old gambar
            Storage::disk('local')->delete('public/pemasukan/' . $pemasukan->gambar);
            if ($pemasukan->gambar && file_exists(storage_path('app/public/' . $pemasukan->gambar))) {
                Storage::delete(['public/', $pemasukan->gambar]);
            };

            //upload new gambar
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/pemasukan', $gambar->hashName());
            $image_name = $request->file('gambar')->store('pemasukan', 'public');

            $pemasukan->update([
                'gambar'     => $gambar->hashName(),
                'gambar'     => $image_name,
                'nama'     => $request->nama,
                'deskripsi'   => $request->deskripsi
            ]);
        }
        if ($pemasukan) {
            //redirect dengan pesan sukses
            return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pemasukan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pemasukan)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        Storage::delete(['public/', $pemasukan->gambar]);
        $pemasukan->delete();

        if ($pemasukan) {
            //redirect dengan pesan sukses
            return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('blpemasukanog.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}