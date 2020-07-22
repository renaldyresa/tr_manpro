@extends('admin/layout/main')
@section('title', 'Dashboard')
@section('content')

<marquee behavior="" direction="">
    <script>
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
        document.write('<p id="nav-date">' + tanggallengkap + ' | {{Session::get("nip")}} - {{Session::get("nama")}} - Universitas Kristen Satya Wacana' + '</p>');
    </script>
</marquee>

<center class="pb-4">
    <h5 width="80%">Selamat Datang </h5>
</center>


<div class="row">
    <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">MAHASISWA</h5>
                <h1 class="card-text" style="text-align: center;">{{$mahasiswa}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">DOSEN</h5>
                <h1 class="card-text" style="text-align: center;">{{$dosen}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">FAKULTAS</h5>
                <h1 class="card-text" style="text-align: center;">{{$fakultas}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">PROGRAM STUDI</h5>
                <h1 class="card-text" style="text-align: center;">{{$progdi}}</h1>
            </div>
        </div>
    </div>
</div>



@endsection