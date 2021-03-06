@extends('layout.nav')

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
    <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $pemasukan->nama }}">

                <!-- error message untuk nama -->
                @error('nama')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Pemasukan</label>
                    <textarea class="form-control" name="deskripsi" required>{{ $pemasukan->deskripsi }}</textarea>
                </div>
            </div>
            <div class=" mb-3">
                <div class="form-group">
                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection