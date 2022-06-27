@extends('layout.nav')

@section('title')
Pemasukan
@endsection

@section('container')
<h1 class="mt-4">Pemasukan</h1>
<div>
    <a href="/pemasukan/create">
        <button type="button" class="btn btn-outline-primary">Tambah Data Pemasukan</button>
    </a>
</div>
<br>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Pemasukan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Pemasukan</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Pemasukan</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($pemasukan as $peng)
                <tr>
                    <td>{{ $peng->pemasukan }}</td>
                    <td>{{ $peng->kategoriPemasukan->name }}</td>
                    <td>{{ $peng->tanggal }}</td>
                    <td>
                        <form action="{{ route('pemasukan.destroy', $peng->id) }}" method="POST">
                            <a href="{{ route('pemasukan.edit',$peng->id) }}" class="btn btn-warning btn-rounded">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection