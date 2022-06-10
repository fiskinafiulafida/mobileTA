@extends('layout.nav')

@section('title')
@section('nama')
Create Pemasukan
@endsection

@section('container')
<h1 class="mt-4">Create Pemasukan</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Create Pemasukan
    </div>
    <div class="card-body">
    <form action="/pemasukan" method="POST" enctype="multipart/form-data">
        <form action="/pemasukan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Makanan">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                <!-- error message untuk nama -->
                @error('nama')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi ">{{ old('deskripsi') }}</textarea>
                <!-- error message untuk deskripsi -->
                @error('deskripsi')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gambar">Cover Buku</label>
                <input type="file" id="gambar" name="gambar">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                <!-- error message untuk nama -->
                @error('gambar')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection