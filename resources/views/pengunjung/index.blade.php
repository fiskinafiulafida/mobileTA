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
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection