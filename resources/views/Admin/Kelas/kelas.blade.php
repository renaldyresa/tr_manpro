@extends('admin/layout/main')
@section('title', 'Detail Matakuliah')
@section('content')

<div class="head-content">
    <h5> <a href="{{URL::to('/admin/detailmatkul')}}">Detail Matakuliah</a> / <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'])}}">{{$data_fakultas['nama_fakultas']}}</a> / <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'])}}">{{$data_progdi['nama_progdi']}}</a></h5>
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
            <td>Kode Matkul</td>
            <td>{{$data_matkul['kode_matkul']}}</td>
        </tr>
        <tr>
            <td>Nama Matkul</td>
            <td>{{$data_matkul['nama_matkul']}}</td>
        </tr>
        <tr>
            <td>Jumlah SKS</td>
            <td>{{$data_matkul['jumlah_sks']}}</td>
        </tr>
        <tr>
            <td>Jumlah SKS Bayar</td>
            <td>{{$data_matkul['jumlah_sks_bayar']}}</td>
        </tr>
    </table>
</div>

<div class="p-2">
    <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'].'/'.$detail_matkul.'/tambah')}}"><button class="btn btn-sm btn-success">Tambah</button></a>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Kode Kelas</th>
            <th scope="col">Kapasistas</th>
            <th scope="col">NIP</th>
            <th scope="col">Dosen</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td> <a href="{{URL::to('/admin/detailmatkul/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'].'/'.$detail_matkul.'/'.$dt['kode_kelas'])}}"> {{ $dt['kode_kelas'] }} </a></td>
            <td>{{ $dt['kapasitas'] }}</td>
            <td>{{ $dt['nip'] }}</td>
            <td>{{ $dt['nama'] }}</td>
            <td class="aksi">
                <button type="button" class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/admin/detailmatkul/deletekelas/'.$data_fakultas['kode_fakultas'].'/'.$data_progdi['kode_progdi'].'/'.$detail_matkul.'/'.$dt['kode_kelas'])}}">
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