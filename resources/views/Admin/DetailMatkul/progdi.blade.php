@extends('admin/layout/main')
@section('title', 'Detail Matakuliah')
@section('content')

<div class="head-content pb-2">
    <h5><a href="{{URL::to('/admin/detailmatkul')}}">Detail Matakuliah</a> / {{$data_fakultas['nama_fakultas']}}</h5>
    <a href="{{URL::to('/admin/detailmatkul/cetak_pdf/'.$data_fakultas['kode_fakultas'])}}"><button class="btn btn-sm  btn-outline-info mr-4">Export to PDF</button></a>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Kode Progdi</th>
            <th scope="col">Nama Progdi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_progdi as $dt)
        <tr>
            <td><a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$dt->kode_progdi)}}"> {{ $dt->kode_progdi }} </a> </td>
            <td>{{ $dt->nama_progdi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection