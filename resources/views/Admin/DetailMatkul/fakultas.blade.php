@extends('admin/layout/main')
@section('title', 'Data Detail Matakuliah')
@section('content')

<div class="head-content">
    <h5>Detail Matakuliah / Fakultas</h5>
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
            <th scope="col">Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td><a href="{{URL::to('/admin/detailmatkul/'.$dt->kode_fakultas)}}">{{ $dt->kode_fakultas }}</a></td>
            <td>{{ $dt->nama_fakultas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
