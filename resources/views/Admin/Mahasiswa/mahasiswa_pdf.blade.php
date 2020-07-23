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
        <h5>LAPORAN MAHASISWA</h5>
    

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Progdi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($data as $dt)
            <tr>
                <td style="width: 25px;">{{ $i++ }}</td>
                <td style="width: 150px;">{{$dt->nim}}</td>
                <td style="width: 200px;">{{$dt->nama}}</td>
                <td style="width: 200px;">{{$dt->kode_progdi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>

</html>