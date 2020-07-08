@extends('admin/layout/main')
@section('title', 'Data Mahasiswa')
@section('content')

<div class="head-content">
    <h5>Data Mahasiswa</h5>
</div>

<div class="p-2">
    <button class="btn btn-sm btn-success">Tambah</button>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">No HP</th>
            <th scope="col">Progdi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td>{{ $dt->nim }}</td>
            <td>{{ $dt->nama }}</td>
            <td>{{ $dt->tanggal_lahir }}</td>
            <td>{{ $dt->no_hp }}</td>
            <td>{{ $dt->kode_progdi }}</td>
            <td class="aksi">
                <button class="btn btn-sm btn-info">Edit</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection