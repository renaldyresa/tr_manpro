@extends('admin/layout/main')
@section('title', 'Data Fakultas')
@section('content')

<div class="head-content">
    <h5>Data Fakultas</h5>
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

<div class="p-2">
    <a href="{{URL::to('/admin/fakultas/tambah')}}"><button class="btn btn-sm btn-success">Tambah</button></a>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        <tr>
            <td><a href="{{URL::to('/admin/fakultas/'.$dt->kode_fakultas)}}">{{ $dt->kode_fakultas }}</a></td>
            <td>{{ $dt->nama_fakultas }}</td>
            <td class="aksi">
                <a href="{{URL::to('/admin/fakultas/edit/'.$dt->kode_fakultas)}}"><button class="btn btn-sm btn-info">Edit</button></a>
                <button type="button" class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to('/admin/fakultas/delete/'.$dt->kode_fakultas)}}">
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