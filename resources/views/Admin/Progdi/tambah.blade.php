@extends('admin/layout/main')
@section('title', 'Data Mahasiswa')
@section('content')

<div class="head-content pb-5">
    <h5>Data Fakultas / {{$kode_fakultas}} / Tambah</h5>
</div>

<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/progdi/insert')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Kode Progdi</label>
            <div class="col-sm-10">
                <input type="text" name="kode" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Progdi</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="colFormLabel">
            </div>
        </div>
        <input type="hidden" name="kode_fakultas" class="form-control" id="colFormLabel" value="{{$kode_fakultas}}">
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


@endsection