@extends('admin/layout/main')
@section('title', 'Data Mahasiswa')
@section('content')

<div class="head-content pb-5">
    <h5>Data Mahasiswa / Edit / {{$data['nim']}}</h5>
</div>
<div class="pl-4" style="width: 90%;">
    <form action="{{URL::to('/admin/mahasiswa/update')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
                <input type="text" name="nim" class="form-control" id="colFormLabel" value="{{$data['nim']}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="colFormLabel" value="{{$data['nama']}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" name="tgl_lahir" class="form-control" id="colFormLabel" value="{{$data['tanggal_lahir']}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">No HP</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp" class="form-control" id="colFormLabel" value="{{$data['no_hp']}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Fakultas</label>
            <div class="col-sm-10">
                <select class="form-control" id="fakultas" onchange="getProgdi(this)">
                    <option value="none">---------</option>
                    @foreach ($data_fakultas as $dt)
                    <option value="{{$dt->kode_fakultas}}" <?php if ($dt->kode_fakultas == $data['kode_fakultas']){ print(' selected');} ?>>{{$dt->nama_fakultas}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Progdi</label>
            <div class="col-sm-10">
                <select class="form-control" name="progdi" id="progdi" onchange="getProgdi(this)">
                    <option value="none">---------</option>
                </select>
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


@endsection

@section('javascript')

<script>
    var fakultas = document.getElementById("fakultas");
    let kode_progdi = "{{$data['kode_progdi']}}";
    function getProgdi(kode) {
        if (kode.value == "none") {
            return;
        }
        let select = document.getElementById('progdi');
        select.innerHTML = '';
        $.ajax({
            url: "{{URL::to('/admin/mahasiswa/getProgdi')}}/" + kode.value,
            method: "GET",
            dataType: "json",
            success: function(data) {

                for (let item of data) {
                    var opt = document.createElement('option');
                    opt.value = item.kode;
                    opt.innerHTML = item.nama;
                    select.appendChild(opt);
                }

                for (var i, j = 0; i = select.options[j]; j++) {
                    if (i.value == kode_progdi) {
                        select.selectedIndex = j;
                        break;
                    }
                }
            }
        });
    }

    getProgdi(fakultas);
</script>

@endsection