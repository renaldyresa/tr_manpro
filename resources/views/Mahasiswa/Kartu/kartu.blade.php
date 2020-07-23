@extends('mahasiswa/layout/main')
@section('title', 'Dashboard')
@section('content')


<div class="head-content">
    <h5>Kartu Studi</h5>
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
            <th scope="col">Matakuliah</th>
            <th scope="col">Dosen</th>
            <th scope="col">B/U</th>
            <th scope="col">SKS</th>
            <th scope="col" class="aksi">Aksi</th>
        </tr>
    </thead>
    <tbody id="table-body">

        @foreach($data as $dt)
        <tr>
            <td>{{ $dt['kode_kelas'] }}</td>
            <td>{{ $dt['nama_matkul'] }}</td>
            <td>{{ $dt['dosen'] }}</td>
            <td>{{ $dt['status'] }}</td>
            <td>{{ $dt['sks'] }}</td>
            <td> 
                <button type="button" class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/mahasiswa/kartu_studi/delete/'.$dt['kode_kst'])}}">
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