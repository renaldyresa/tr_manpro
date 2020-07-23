<!DOCTYPE html>
<html>

<head>
    <title>STTI - Laporan Mahasiswa</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <style>
        table {
            border-left: 0.01em solid #ccc;
            border-right: 0;
            border-top: 0.01em solid #ccc;
            border-bottom: 0;
            border-collapse: collapse;
        }

        table td,
        table th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }
    </style>
</head>

<body>

    <center>
        <h4>LIST JADWAL</h4>
    </center>
    @foreach($data as $dt)

    <h5>{{$dt['kode_progdi']}} - {{$dt['nama_progdi']}}</h5> 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 100px;">Kode Kelas</th>
                <th style="width: 160px;">Nama Matakuliah</th>
                <th style="width: 160px;">Dosen</th>
                <th style="width: 160px;">Jadwal</th>
                <th style="width: 100px;">Ruangan</th>
            </tr>
        </thead>
        @foreach($dt['data_kelas'] as $dtk)
            <tr>
                <td>{{$dtk['kode_kelas']}}</td>
                <td>{{$dtk['nama_matkul']}}</td>
                <td>{{$dtk['dosen']}}</td>
                <td>
                    @foreach($dtk['jadwal'] as $jadwal)
                        {{$jadwal}} <br>
                    @endforeach
                </td>
                <td>
                    @foreach($dtk['ruangan'] as $ruang)
                        {{$ruang}} <br>
                    @endforeach
                </td>
            </tr>
        @endforeach
        <tbody>

        </tbody>
    </table>

    @endforeach
    

    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>

</html>