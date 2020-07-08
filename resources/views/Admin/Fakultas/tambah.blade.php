@extends('admin/layout/main')
@section('title', 'Data Mahasiswa')
@section('content')

<div class="head-content pb-5">
    <h5>Data Fakultas / Tambah</h5>
</div>

<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/fakultas/insert')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Kode Fakultas</label>
            <div class="col-sm-10">
                <input type="text" name="kode" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Fakultas</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


@endsection