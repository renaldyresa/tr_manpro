<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style-login.css">
    <link rel="stylesheet" href="/css/Animate.css">
    <title>Login Siasat</title>
</head>

<body>
    <nav class="nav-head">
        <a href="#login.html"><img src="/img/logo.png" alt="" class="nav-logo"></a>
    </nav>

    <h1 style="color: white; text-align: center; letter-spacing: 10px; font-size: 35px; font-stretch: condensed;">Login</h1>

    <div class="login-container">
        <table>

            <tr>
                <th class="th-not-main"></th>
                <th class="th-main">
                    @if ($message = Session::get('error'))
                    <center>
                        <div style="width: 70%; background-color: red; padding: 20px; border-radius: 10px;">
                            <strong style="color: wheat; ">{{ $message }}</strong>
                        </div>
                    </center>
                    @endif
                    <form action="{{URL::to('/valid')}}" method="POST">
                        <div class="login-form">
                            <p><img src="/img/nim.png" width="15px">Nim</p>
                            <input type="text" name="username" placeholder="Masukkan nomor induk mahasiswa" class="input-text animated bounce" value="">
                            <p><img src="/img/password.png" width="15px">Password</p>
                            <input type="password" name="password" placeholder="Masukkan password" class="input-password animated bounce" value="">
                        </div>
                        <div class="btn">
                            <input type="submit" value="Masuk" class="submit-btn">
                            <input type="button" value="Lupa Password" class="forget-btn">
                        </div>
                    </form>
                </th>
                <th class="th-not-main "></th>
            </tr>
        </table>
    </div>

    <button type="button" class="collapsible">PANDUAN SIASAT</button>
    <div class="content">
        <ul>
            <li>
                <h3>Akses SIA-SAT</h3>
                <p>Mahasiswa yang telah melakukan Registrasi Mahasiswa (RM) dapat mengakses SIA-SAT dengan alamat http://siasat.uksw.edu. Login yang digunakan adalah Nomor Induk Mahasiswa serta Password diberikan oleh Bagian Admisi Registrasi (BARA) dan
                    dapat diganti oleh mahasiswa bersangkutan. Mahasiswa diharapkan dapat mempertanggung jawabkan Login dan Password yang ada. BARA tidak bertanggung jawab atas kekeliruan, kehilangan atau akibat lain yang ditimbulkan apabila mahasiwa
                    tersebut memberikan Login dan Password kepada pihak lain.</p>
            </li>
            <li>
                <h3>Registrasi Ulang</h3>
                <p>Mahasiswa yang akan melanjutkan studi pada semester berikutnya diharapkan melakukan Registrasi Ulang (RM) sesuai dengan prosedur yang ada pada Buku Biru. Mahasiswa yang belum melakukan RM tidak diperbolehkan untuk melakukan Registrasi
                    Matakuliah (RMK) pada semester yang bersangkutan. Hal-hal lain yang berkaitan dengan RM diatur sesuai dengan Buku Biru.</p>
            </li>
            <li>
                <h3>Registrasi Matakuliah</h3>
                <p>Mahasiswa yang telah melakukan RM dapat mengakses RMK dengan meng-klik Registrasi pada menu yang tersedia di sebelah kiri. Mahasiswa kemudian meng-klik Matakuliah yang akan diambil pada semester tersebut. Matakuliah ini ditampilkan berdasarkan
                    kurikulum yang diberlakukan oleh Fakultas masing-masing. Daftar Kelas yang tampil pada layar monitor adalah daftar kelas yang dibuka oleh Fakultas pada semester bersangkutan. Jadwal pada daftar kelas tersebut merupakan wewenang Fakultas.
                    Klik pada Tambah untuk mendaftarkan diri sebagai peserta pada Kelas tersebut. Mahasiswa akan didaftarkan pada kelas yang di-klik. Ulangi prosedur ini untuk kelas-kelas yang lain. Mahasiswa yang tidak diperbolehkan untuk mendaftar pada
                    kelas-kelas tertentu disebabkan oleh Kapasitas Kelas Penuh, Beban Maksimum Terlampaui, Prasyarat Matakuliah Tidak Terpenuhi, Jadwal Kelas tersebut bertabrakan dengan Kelas yang telah diambil serta Kelas yang sama telah terdaftar pada
                    Kartu Studi Mahasiswa. Mahasiswa yang telah melakukan RMK dapat mengambil Kartu Studi pada Petugas.</p>
            </li>
            <li>
                <h3>Adjustment</h3>
                <p>Mahasiswa diberikan kesempatan untuk menyesuaikan kelas-kelas yang telah diambil pada masa adjustment. Mahasiswa dapat mendaftarkan kembali kelas-kelas yang akan diambil dan menyesuaikan jadwal perkuliahan. Jika tidak terdapat perubahan
                    kelas pada Kartu Studi Mahasiswa, maka Mahasiswa tidak perlu melakukan Adjustment.</p>
            </li>
            <li>
                <h3>Daftar Kelas</h3>
                <p>Daftar Kelas akan dikeluarkan setelah RMK selesai. Pastikan NAMA anda tertera pada DAFTAR KELAS, baik pada masa RMK maupun pada masa Adjustment sebelum menyelesaikan Registrasi Anda.</p>
            </li>
        </ul>
    </div>

    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>