@extends('layout.nav')

@section('title')
Pengeluaran
@endsection

@section('container')
<h1 class="mt-4">Pengeluaran</h1>
<div>
    <a href="{{ route('pengeluaran.create') }}">
        <button type="button" class="btn btn-outline-primary">Tambah Data Pengeluaran</button>
    </a>
</div>
<br>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Pengeluaran
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Pengeluaran</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Pengeluaran</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse($pengeluaran as $peng)
                <tr>
                    <td>{{ $peng->pengeluaran }}</td>
                    <td>{{ $peng->kategoriPengeluaran->name }}</td>
                    <td>{{ $peng->tanggal }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengeluaran.destroy', $peng->id) }}" method="POST">
                            <a href="{{ route('pengeluaran.edit', $peng->id) }}" class="btn btn-warning btn-rounded">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-rounded">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Pengeluaran belum Tersedia.
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection