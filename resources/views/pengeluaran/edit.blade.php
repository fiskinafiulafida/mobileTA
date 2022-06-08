@extends('layout.nav')

@section('title')
Edit Pengeluaran
@endsection

@section('container')
<h1 class="mt-4">Edit Pengeluaran</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Pengeluaran
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('pengeluaran.update', $pengeluaran->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $pengeluaran->nama }}">
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Barang</label>
                    <textarea class="form-control" name="deskripsi" required>{{ $pengeluaran->deskripsi }}</textarea>
                </div>
            </div>
            <div class=" mb-3">
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" value="{{ $pengeluaran->gambar }}"><br>
                    <img src="{{ asset('gambar/'.$pengeluaran->gambar) }}" height="150px" width="150px">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection