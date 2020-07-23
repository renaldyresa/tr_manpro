@extends('mahasiswa/layout/main')
@section('title', 'Dashboard')
@section('content')

@extends('mahasiswa/layout/main')
@section('title', 'Dashboard')
@section('content')

<div class="head-content">
    <h5>Registrasi Matakuliah</h5>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Kode Matakuliah</th>
            <th scope="col">Nama Matakuliah</th>
            <th scope="col">Peserta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td><a href="{{URL::to('/mahasiswa/registrasi_matakuliah/'.Session::get('progdi').'/'.$dt['detail_matkul'])}}">{{ $dt['kode_matkul'] }}</a></td>
            <td>{{ $dt['nama_matkul'] }}</td>
            <td>Peserta</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@endsection