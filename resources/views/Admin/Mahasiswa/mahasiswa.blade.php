@extends('admin/layout/main')
@section('title', 'Data Mahasiswa')
@section('content')

<div class="head-content">
    <h5>Data Mahasiswa</h5>
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
    <a href="{{URL::to('/admin/mahasiswa/tambah')}}"><button class="btn btn-sm btn-success">Tambah</button></a>
    <span class="btn-toolbar mb-2 mb-md-0 float-right">
    <a href="{{URL::to('/admin/mahasiswa/cetak_pdf')}}"><button class="btn btn-sm  btn-outline-info mr-4">Export to PDF</button></a>
        <div class="mr-2">
            
            <form class="form-inline my-2 my-lg-0" action="javascript:load_search_data()">
                <div class="form-group mr-sm-2">
                    <select id="opsi_search" class="form-control form-control-sm">
                        <option value="nim">NIM</option>
                        <option value="nama">Nama</option>
                    </select>
                </div>
                <input class="form-control form-control-sm mr-sm-2" type="text" id="txt_search" name="txt_search" placeholder="search">
                <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </span>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">No HP</th>
            <th scope="col">Progdi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody id="table-body">

    </tbody>
</table>
<div id="loading" class="loading" style="text-align: center;">
    <img src="{{ asset('img/Spinner.gif') }}" alt="">
</div>
<div id="message" class="message" style="text-align: center;">
    Tidak ada data
</div>
<nav aria-label="Page navigation example" class="pt-md-2" id="layout_pagination">
    <ul id="pagination" class="pagination justify-content-center">

    </ul>
</nav>

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

    let pageNow = 1;

    function load_data(page) {
        document.getElementById('loading').style.display = "block";
        document.getElementById('table-body').innerHTML = '';
        pageNow = page;
        $.ajax({
            url: "{{URL::to('/admin/mahasiswa/pagination')}}/" + page,
            method: "GET",
            dataType: "json",
            success: function(data) {
                document.getElementById('loading').style.display = "none";
                document.getElementById('pagination').innerHTML = loadPagination(data.count_link);
                document.getElementById('table-body').innerHTML = loadTable(data.data_table);
            }
        });
    }

    function loadPagination(count_link) {
        document.getElementById('layout_pagination').style.display = "block";
        let previous = '<li style="cursor: pointer;" class="page-item link-disabled">\
                                <a class="page-link" onclick="load_data(' + (pageNow - 1) + ')" aria-label="Previous">\
                                    <span aria-hidden="true">&laquo;</span>\
                                    <span class="sr-only">Previous</span>\
                                </a>\
                            </li>';
        previous = (pageNow != 1) ? previous.replace("disabled", "link-disabled") : previous.replace("link-disabled", "disabled");
        let next = '<li style="cursor: pointer;" class="page-item link-disabled">\
                            <a class="page-link" onclick="load_data(' + (pageNow + 1) + ')" aria-label="Next">\
                                <span aria-hidden="true">&raquo;</span>\
                                <span class="sr-only">Next</span>\
                            </a>\
                        </li>';
        next = (pageNow != count_link) ? next.replace("disabled", "link-disabled") : next.replace("link-disabled", "disabled");
        let number = '';
        for (let i = 0; i < count_link; i++) {
            let li_number = (pageNow == (i + 1)) ? '<li style="cursor: pointer;" class="page-item active">' : '<li style="cursor: pointer;" class="page-item">'
            number += li_number + '<a class="page-link" onclick="load_data(' + (i + 1) + ')">' + (i + 1) + '</a></li>'
        }
        return previous + number + next
    }

    function loadTable(data) {
        if (data.length == 0) {
            document.getElementById('message').style.display = "block";
            return '';
        }
        document.getElementById('message').style.display = "none";
        let no = 1;
        let result = '';
        for (let item of data) {
            result += '<tr>\
                            <td>' + (no + 10 * (pageNow - 1)) + '</td>\
                            <td>' + item.nim + '</td>\
                            <td>' + item.nama + '</td>\
                            <td>' + item.tanggal_lahir + '</td>\
                            <td>' + item.no_hp + '</td>\
                            <td>' + item.kode_progdi + '</td>\
                            <td class="aksi">\
                                <a href="{{URL::to("/admin/mahasiswa/edit")}}/'+item.nim+'"><button class="btn btn-sm btn-info">Edit</button></a>\
                                <button type="button" class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to("/admin/mahasiswa/delete")}}/'+item.nim+'">\
                                    Delete\
                                </button>\
                            </td>\
                        </tr>';
            no++;
        }
        return result;
    }

    load_data(1);

    function load_search_data() {
            let e_opsi = document.getElementById("opsi_search") ;
            let opsi = e_opsi.options[e_opsi.selectedIndex].value;
            let text = $('#txt_search').val();
            if (text == "" || text == null) {
                load_data(1);
                return;
            }
            document.getElementById('loading').style.display = "block";
            $.ajax({
                url: "{{URL::to('/admin/mahasiswa/search')}}",
                method: "POST",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    text: text,
                    opsi: opsi
                },
                success: function(data) {
                    document.getElementById('loading').style.display = "none";
                    document.getElementById('layout_pagination').style.display = "none";
                    document.getElementById('table-body').innerHTML = loadTable(data.data_table);
                },
                error: function() {

                }
            });
        }
</script>

@endsection