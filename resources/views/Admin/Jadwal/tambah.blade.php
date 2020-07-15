@extends('admin/layout/main')
@section('title', 'Detail Matakuliah')
@section('css')
<link href="/css/select2.min.css" rel="stylesheet">

@endsection
@section('content')

<div class="head-content pb-5">
    <h5>Tambah Jadwal Kelas {{$kode_kelas}}</h5>
</div>

<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/detailmatkul/insertjadwal')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Hari</label>
            <div class="col-sm-10">
                <select class="form-control" id="hari" name="hari">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Jam Masuk</label>
            <div class="col-sm-10">
                <input type="number" name="jam_masuk" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Jam Keluar</label>
            <div class="col-sm-10">
                <input type="number" name="jam_keluar" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Ruangan</label>
            <div class="col-sm-10">
                <select class="form-control kode_ruangan" id="kode_ruangan" name="kode_ruangan">
                    <option value='0'>Pilih Ruangan</option>
                    @foreach ($data_ruangan as $dt)
                        <option value="{{$dt->kode_ruangan}}">{{$dt->kode_ruangan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="kode_fakultas" class="form-control" id="colFormLabel" value="{{$kode_fakultas}}">
        <input type="hidden" name="kode_progdi" class="form-control" id="colFormLabel" value="{{$kode_progdi}}">
        <input type="hidden" name="detail_matkul" class="form-control" id="colFormLabel" value="{{$detail_matkul}}">
        <input type="hidden" name="kode_kelas" class="form-control" id="colFormLabel" value="{{$kode_kelas}}">
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
        $("#kode_ruangan").select2();

    });
</script>

@endsection