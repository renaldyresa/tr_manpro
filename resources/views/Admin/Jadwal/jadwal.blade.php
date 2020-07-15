@extends('admin/layout/main')
@section('title', 'Detail Matakuliah')
@section('content')

<div class="head-content">
    <h5> 
        <a href="{{URL::to('/admin/detailmatkul')}}">Detail Matakuliah</a> / 
        <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'])}}">{{$data_fakultas['nama_fakultas']}}</a> / 
        <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'])}}">{{$data_progdi['nama_progdi']}}</a> / 
        <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi']).'/'.$detail_matkul}}">{{$data_matkul['nama_matkul']}}</a>
    </h5>
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

<div class="pt-2">
    <table class="table table-bordered" style="width: 70%;">
        <tr>
            <td>Kode Kelas</td>
            <td>{{$data_kelas['kode_kelas']}}</td>
        </tr>
        <tr>
            <td>Kapasitas</td>
            <td>{{$data_kelas['kapasitas']}}</td>
        </tr>
    </table>
</div>

<div class="p-2">
<a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'].'/'.$detail_matkul.'/'.$data_kelas['kode_kelas'].'/tambah')}}"><button class="btn btn-sm btn-success">Tambah</button></a>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Hari</th>
            <th scope="col">Jam</th>
            <th scope="col">Ruangan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td>{{ $dt['hari'] }}</td>
            <td>{{ $dt['jam_masuk'].' - '.$dt['jam_keluar'] }}</td>
            <td>{{ $dt['kode_ruangan'] }}</td>
            <td class="aksi">
                <button type="button" class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/admin/detailmatkul/deletejadwal/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'].'/'.$detail_matkul.'/'.$data_kelas['kode_kelas'].'/'.$dt['id_jadwal'])}}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!----modal delete confirm--->
<div id="confirm-delete" class="modal fade" role='dialog'>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body" id="modal-body">
                Are you sure delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-sm btn-danger btn-delete">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-delete').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

@endsection