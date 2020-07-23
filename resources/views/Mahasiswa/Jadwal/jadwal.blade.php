@extends('mahasiswa/layout/main')
@section('title', 'Dashboard')
@section('content')

<div class="head-content">
    <h5>Jadwal Kuliah</h5>
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
            <th scope="col">Kode</th>
            <th scope="col">Matakuliah</th>
            <th scope="col">Dosen</th>
            <th scope="col">Jadwal</th>
            <th scope="col">Ruangan</th>
        </tr>
    </thead>
    <tbody id="table-body">
        @foreach($data as $dt)
        <tr>
            <td>{{$dt['kode_kelas']}}</td>
            <td>{{$dt['nama_matkul']}}</td>
            <td>{{$dt['dosen']}}</td>
            <td>
                @foreach($dt['jadwal'] as $jadwal)
                {{$jadwal}} <br>
                @endforeach
            </td>
            <td>
                @foreach($dt['ruangan'] as $ruang)
                {{$ruang}} <br>
                @endforeach
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection