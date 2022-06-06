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
                @foreach($pemasukan as $peng)
                <tr>
                    <td>{{ $peng->nama }}</td>
                    <td>{{ $peng->deskripsi }}</td>
                    <td><img src="{{asset('gambar/'.$peng->gambar)}}" style='width:80px; height:50px;'></td>
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