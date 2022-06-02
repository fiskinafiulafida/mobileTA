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
        <form action="pengeluaran.update',$pengeluaran->id" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $pengeluaran->nama }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" value="{{ $pengeluaran->deskripsi }}" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar">Cover Buku</label>
                <input type="file" name="gambar" value="{{ $pengeluaran->gambar }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection