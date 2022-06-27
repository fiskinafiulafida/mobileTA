<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Storage;
class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::with('kategoripemasukan')->paginate(10);
        return view('pemasukan.index', compact(['pemasukan']));
    }
    public function create()
    {
        return view('pemasukan.create');
    }
    public function store(Request $request)
    {
        $pemasukan = Pemasukan::create([
            $request->all()
        ]);

        if ($pemasukan) {
            //redirect dengan pesan sukses
            return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pemasukan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('pemasukan.edit', compact(['pemasukan']));
    }
    public function update(Request $request,$id)
    {
        //get data pemasukan by ID
        $pemasukan = Pemasukan::find($id);
        $pemasukan->update($request->all());
        if ($pemasukan) {
            //redirect dengan pesan sukses
            return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pemasukan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
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