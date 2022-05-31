@extends('layout.nav')

@section('title')
Pengunjung
@endsection

@section('container')
<h1 class="mt-4">Pengunjung</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pengunjung</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Pengunjung
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($pengunjung as $peng)
                <tr>
                    <td>{{$peng->id}}</td>
                    <td>{{$peng->name}}</td>
                    <td>{{$peng->email}}</td>
                    <td class="col-md-1">
                        <a href="/pengunjung/{{$peng->id}}/edit">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a><br><br>
                        <form action="/pengunjung/{{ $peng->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type=" button" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection