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
            <th scope="col">Kode Kelas</th>
            <th scope="col">Nama Dosen</th>
            <th scope="col">Jadwal</th>
            <th scope="col">Kapasitas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td><a href="{{URL::to('/mahasiswa/registrasi_matakuliah/kelas/'.Session::get('nim').'/'.$dt['kode_kelas'])}}">{{ $dt['kode_kelas'] }}</a></td>
            <td>{{ $dt['nama'] }}</td>
            <td>
                @foreach ($dt['jadwal'] as $jd)
                {{$jd['hari']}}, {{$jd['jam_masuk']}} - {{$jd['jam_keluar']}} <br>
                @endforeach
            </td>
            <td>{{ $dt['kapasitas'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection