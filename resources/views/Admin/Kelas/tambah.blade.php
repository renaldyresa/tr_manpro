@extends('admin/layout/main')
@section('title', 'Detail Matakuliah')
@section('css')
<link href="/css/select2.min.css" rel="stylesheet">

@endsection
@section('content')

<div class="head-content pb-5">
    <h5>Tambah Kelas</h5>
</div>

<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/detailmatkul/insertkelas')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Kode Kelas</label>
            <div class="col-sm-10">
                <input type="text" name="kode_kelas" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Kapasitas</label>
            <div class="col-sm-10">
                <input type="number" name="kapasitas" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Dosen</label>
            <div class="col-sm-10">
                <select class="form-control nip" id="nip" name="nip">
                    <option value='0'>Pilih Dosen</option>
                    @foreach ($data_dosen as $dt)
                        <option value="{{$dt->nip}}">{{$dt->nip.' - '.$dt->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="detail_matkul" class="form-control" id="colFormLabel" value="{{$detail_matkul}}">
        <input type="hidden" name="kode_fakultas" class="form-control" id="colFormLabel" value="{{$kode_fakultas}}">
        <input type="hidden" name="kode_progdi" class="form-control" id="colFormLabel" value="{{$kode_progdi}}">
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


@endsection
@section('javascript')
<script src="/js/select2.min.js"></script>
<script>
    $(document).ready(function() {

        // Initialize select2
        $("#nip").select2();

    });
</script>

@endsection