@extends('layout.nav')

@section('title')
Edit Admin
@endsection

@section('container')
<h1 class="mt-4">Edit Admin</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Admin
    </div>
    <div class="card-body">
        <form action="/pengunjung/{{ $pengunjung->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" value="{{ $pengunjung->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $pengunjung->email }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection