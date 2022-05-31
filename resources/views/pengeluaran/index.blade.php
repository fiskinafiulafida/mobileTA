@extends('layout.nav')

@section('title')
Pengeluaran
@endsection

@section('container')
<h1 class="mt-4">Pengeluaran</h1>
<div>
    <a href="/pengeluaran/create">
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
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($pengeluaran as $peng)
                <tr>
                    <td>{{ $peng->nama }}</td>
                    <td>{{ $peng->deskripsi }}</td>
                    <td>{{ $peng->gambar }}</td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection