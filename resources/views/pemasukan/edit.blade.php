@extends('layout.nav')

@section('title')
@section('nama')
Edit Pemasukan
@endsection

@section('container')
<h1 class="mt-4">Edit Pemasukan</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Pemasukan
    </div>
    <div class="card-body">
    <form method="POST" enctype="multipart/form-data" action="{{ route('pemasukan.update', $pemasukan->id) }}">
        <form action="pemasukan.update',$pemasukan->id" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $pemasukan->nama }}">
                <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama', $pemasukan->nama) }}">
                <!-- error message untuk nama -->
                @error('nama')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
            <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" value="{{ $pemasukan->gambar }}"><br>
                    <img src="{{ asset('gambar/'.$pemasukan->gambar) }}" height="150px" width="150px">
                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <!-- <img src="{{ asset('gambar/'.$pemasukan->gambar) }}" height="150px" width="150px"> -->

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection