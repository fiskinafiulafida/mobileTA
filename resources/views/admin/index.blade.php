@extends('layout.nav')

@section('title')
Admin
@endsection

@section('container')
<h1 class="mt-4">Admin</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Admin
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID Admin</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID Admin</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($adminUser as $peng)
                <tr>
                    <td>{{$peng->id}}</td>
                    <td>{{$peng->name}}</td>
                    <td>{{$peng->email}}</td>
                    <td>
                        <a href="/adminUser/{{$peng->id}}/edit">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form action="/adminUser/{{ $peng->id }}" method="POST">
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