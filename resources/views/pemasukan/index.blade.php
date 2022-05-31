@extends('layout.nav')

@section('title')
Pemasukan
@endsection

@section('container')
<h1 class="mt-4">Pemasukan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pemasukan</li>
</ol>
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
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection