@extends('admin/layout/main')
@section('title', 'Data Dosen')
@section('content')

<div class="head-content pb-5">
    <h5>Data Dosen / Edit / {{$data['nama']}}</h5>
</div>

<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/dosen/update')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
                <input type="text" name="nip" class="form-control" id="colFormLabel" value="{{$data['nip']}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="colFormLabel" value="{{$data['nama']}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="colFormLabel" value="{{$data['alamat']}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="colFormLabel" value="{{$data['email']}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">No HP</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp" class="form-control" id="colFormLabel" value="{{$data['no_hp']}}">
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


@endsection