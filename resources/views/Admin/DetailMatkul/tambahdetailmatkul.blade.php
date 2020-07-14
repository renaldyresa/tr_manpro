@extends('admin/layout/main')
@section('title', 'Detail Matakuliah')
@section('css')
<link href="/css/select2.min.css" rel="stylesheet">

@endsection
@section('content')

<div class="head-content pb-5">
    <h5>Data Fakultas / Tambah</h5>
</div>

<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/detailmatkul/insert')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Matakuliah</label>
            <div class="col-sm-10">
                <select class="form-control matkul" id="matkul" name="kode_matkul">
                    <option value='0'>Pilih Matakuliah</option>
                    @foreach ($data as $dt)
                    <option value="{{$dt->kode_matkul}}">{{$dt->nama_matkul}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="kode_fakultas" class="form-control" id="colFormLabel" value="{{$kode_fakultas}}">
            <input type="hidden" name="kode_progdi" class="form-control" id="colFormLabel" value="{{$kode_progdi}}">
        </div>
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
        $("#matkul").select2();

    });
</script>

@endsection