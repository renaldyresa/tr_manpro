<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    
    <link rel="stylesheet" href="/css/Animate.css">
    <title>Sistem Informasi Akademik Satya Wacana</title>
</head>

<body>
    <label id="toppest"></label>
    <nav class="nav-head">
        <a href="home.html"><img src="/img/logo.png" alt="" class="nav-logo"></a>
    </nav>
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
            document.write('<p id="nav-date">' + tanggallengkap + ' | 672017253 - FITRI OKTAVIA SARI (FAKULTAS TEKNOLOGI INFORMASI - TEKNIK INFORMATIKA) | SEMESTER 3 TA 2019 - 2020 | BEBAN SKS MAKSIMAL : 18 sks' + '</p>');
        </script>
    </marquee>
    <div class="topnav" id="myTopnav">
        <a href="home.html" class="active">Home</a>
        <a href="panduan.html">Panduan</a>
        <div class="dropdown">
            <button class="dropbtn">Sistem Informasi Mahasiswa 
                <img src="dropdown.png" width="15px" class="dropdown-icon">
            </button>
            <div class="dropdown-content animated slideInDown">
                <button id="registrasiulang">Registrasi Ulang</button>
                <button id="registrasimatakuliah">Registrasi Matakuliah</button>
                <button id="kartustudi">Kartu Studi</button>
                <button id="hasilstudi">Hasil Studi</button>
                <button id="jadwalkuliah">Jadwal Kuliah</button>
                <button id="transkripnilai">Transkrip Nilai</button>
                <button id="tagihan">Tagihan</button>
                <button id="gantipassword">Ganti Password</button>
            </div>
        </div>
        <a href="login.html">Logout</a>
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>

    <!-- Slide Show -->

    <div class="slide-bg">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="img1"></div>
            </div>

            <div class="mySlides fade">
                <div class="img2"></div>
            </div>

            <div class="mySlides fade">
                <div class="img3"></div>
            </div>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <!-- Modal -->
    <div id="registrasiulang-id" class="modal1">

        <div class="modal-content1 animated bounceIn">
            <span class="close1">&times;</span>
            <nav>Registrasi Ulang</nav>
            <div class="modal-info1">
                <!-- UNTUK YANG NGERJAIN REGISTRASI ULANG DI BARIS INI (COMMENTNYA HAPUS AJA) -->
            </div>
        </div>

    </div>

    <div id="registrasimatakuliah-id" class="modal2">

        <div class="modal-content2 animated bounceIn">
            <span class="close2">&times;</span>
            <nav>Registrasi Matakuliah</nav>
            <div class="modal-info2">
                <!-- UNTUK YANG NGERJAIN REGISTRASI MATAKULIAH DI BARIS INI (COMMENTNYA HAPUS AJA) -->
            </div>
        </div>

    </div>

    <div id="kartustudi-id" class="modal3">

        <div class="modal-content3 animated bounceIn">
            <span class="close3">&times;</span>
            <nav>Kartu Studi</nav>
            <div class="modal-info3">
                <!-- UNTUK YANG NGERJAIN KARTU STUDI DI BARIS INI (COMMENTNYA HAPUS AJA) -->
            </div>
        </div>

    </div>

    <div id="hasilstudi-id" class="modal4">

        <div class="modal-content5 animated bounceIn">
            <span class="close4">&times;</span>
            <nav>Hasil Studi</nav>
            <div class="modal-info4">
                <div class="tabel-hasil">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Matakuliah</th>
                            <th>B/U</th>
                            <th>Sks</th>
                            <th>Nilai</th>
                            <th>AK</th>
                        </tr>
                        <tr>
                            <th>1.</th>
                            <th>KM901C</th>
                            <th>IAD</th>
                            <th>B</th>
                            <th>2</th>
                            <th>A</th>
                            <th>8.0</th>
                        </tr>
                        <tr>
                            <th>2.</th>
                            <th>IN233D</th>
                            <th>REKAYASA PERANGKAT LUNAK</th>
                            <th>B</th>
                            <th>3</th>
                            <th>B</th>
                            <th>9.0</th>
                        </tr>
                        <tr>
                            <th>3.</th>
                            <th>SL503E</th>
                            <th>ILMU SOSIAL BUDAYA DASAR</th>
                            <th>B</th>
                            <th>3</th>
                            <th>AB</th>
                            <th>10.5</th>
                        </tr>
                        <tr>
                            <th>4.</th>
                            <th>IN231D</th>
                            <th>TEKNOLOGI JARINGAN</th>
                            <th>B</th>
                            <th>3</th>
                            <th>A</th>
                            <th>12.0</th>
                        </tr>
                        <tr>
                            <th>5.</th>
                            <th>IN232C</th>
                            <th>GRAFIKA KOMPUTER</th>
                            <th>B</th>
                            <th>3</th>
                            <th>A</th>
                            <th>12.0</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th>14</th>
                            <th></th>
                            <th>51.5</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>IPSem.</th>
                            <th></th>
                            <th></th>
                            <th>3.68</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>   
                </div>
            </div>
        </div>

    </div>

    <div id="jadwalkuliah-id" class="modal5">

        <div class="modal-content5 animated bounceIn">
            <span class="close5">&times;</span>
            <nav>Jadwal Kuliah</nav>
            <div class="modal-info5">
                <div class="tabel-jadwal">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Matakuliah</th>
                            <th>Kode Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                        </tr>
                        <tr>
                            <th>1.</th>
                            <th>IN311H</th>
                            <th>PEMODELAN DAN SIMULASI H</th>
                            <th>68984</th>
                            <th>ARNY DEBORA LATTU</th>
                            <th>Senin</th>
                            <th>15-18</th>
                            <th>FTI300</th>
                        </tr>
                        <tr>
                            <th>2.</th>
                            <th>IN312H</th>
                            <th>KEAMANAN DATA H</th>
                            <th>67523</th>
                            <th>INDRASTANTI RATNA WIDIASARI</th>
                            <th>Selasa</th>
                            <th>08-11</th>
                            <th>FTI333</th>
                        </tr>
                        <tr>
                            <th>3.</th>
                            <th>IN315D</th>
                            <th>PEMROGRAMAN BEORIENTASI PLATFORM D</th>
                            <th>67985</th>
                            <th>ANDREW JULIUS SUTRESNO</th>
                            <th>Rabu</th>
                            <th>13-15</th>
                            <th>FTI469</th>
                        </tr>
                        <tr>
                            <th>4.</th>
                            <th>IN316D</th>
                            <th>PEMROGRAMAN LANJUT D</th>
                            <th>67532</th>
                            <th>YOS RICHARD BEEH</th>
                            <th>Rabu</th>
                            <th>10-13</th>
                            <th>FTI457</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div id="transkripnilai-id" class="modal6">

        <div class="modal-content6 animated bounceIn">
            <span class="close6">&times;</span>
            <nav>Transkrip Nilai</nav>
            <div class="modal-info6">
                <div class="tabel-transkrip">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Matakuliah</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                            <th>AK</th>
                            <th>Tahun Ambil</th>
                        </tr>
                        <tr>
                            <th>1.</th>
                            <th>IN113G</th>
                            <th>BAHASA INGGRIS</th>
                            <th>4</th>
                            <th>A</th>
                            <th>16</th>
                            <th>2017-2018/1</th>
                        </tr>
                        <tr>
                            <th>2.</th>
                            <th>IN111E</th>
                            <th>MATEMATIKA</th>
                            <th>4</th>
                            <th>A</th>
                            <th>16</th>
                            <th>2017-2018/1</th>
                        </tr>
                        <tr>
                            <th>3.</th>
                            <th>IN112H</th>
                            <th>PENGANTAR TEKNIK INFORMATIKA</th>
                            <th>4</th>
                            <th>A</th>
                            <th>16</th>
                            <th>2017-2018/1</th>
                        </tr>
                        <tr>
                            <th>4.</th>
                            <th>IN122H</th>
                            <th>PENDIDIKAN PANCASILA</th>
                            <th>2</th>
                            <th>A</th>
                            <th>8</th>
                            <th>2017-2018/2</th>
                        </tr>
                        <tr>
                            <th>5.</th>
                            <th>IN123D</th>
                            <th>STATISTIK & PROBABILITAS</th>
                            <th>2</th>
                            <th>A</th>
                            <th>8</th>
                            <th>2017-2018/2</th>
                        </tr>
                        <tr>
                            <th>6.</th>
                            <th>IN121H</th>
                            <th>PENDIDIKAN AGAMA</th>
                            <th>2</th>
                            <th>A</th>
                            <th>8</th>
                            <th>2017-2018/2</th>
                        </tr>
                        <tr>
                            <th>7.</th>
                            <th>IN124H</th>
                            <th>PEMROGRAMAN</th>
                            <th>6</th>
                            <th>A</th>
                            <th>24</th>
                            <th>2017-2018/2</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div id="tagihan-id" class="modal7">

        <div class="modal-content7 animated bounceIn">
            <span class="close7">&times;</span>
            <nav>Tagihan</nav>
            <div class="modal-info7">
                <!-- UNTUK YANG NGERJAIN TAGIHAN DI BARIS INI (COMMENTNYA HAPUS AJA) -->
            </div>
        </div>

    </div>


    <div id="gantipassword-id" class="modal8">

        <div class="modal-content8 animated bounceIn">
            <span class="close8">&times;</span>
            <nav>Ganti Password</nav>
            <div class="modal-info8">
                <!-- UNTUK YANG NGERJAIN GANTI PASSWORD DI BARIS INI (COMMENTNYA HAPUS AJA) -->
            </div>
        </div>

    </div>

    <div class="home-pic"></div>
    <div class="home-content">
        <table>
            <tr>
                <th class="home-not-main"></th>
                <th class="home-main">
                    <div class="home-intro">Selamat datang di Sistem Informasi Akademik Satya Wacana</div>
                    <div class="home-intro2">Untuk keperluan administrasi anda, silahkan update isian di bawah ini</div>
                    <div class="home-form">
                        <form action="home.html" method="POST">
                            <div class="a-form">
                                <p>No.Kartu Keluarga</p>
                                <input type="text" placeholder="" class="input-text" required>
                                <p>NIK (Nomor Induk Kependudukan)</p>
                                <input type="text" placeholder="" class="input-text" required>
                                <p>No.Handphone</p>
                                <input type="text" placeholder="" class="input-text" required>
                                <p>Email</p>
                                <input type="email" placeholder="" class="input-text" required>
                            </div>
                            <div class="btn">
                                <input type="submit" value="Submit" class="submit-btn">
                            </div>
                        </form>
                    </div>
                    <div class="home-closer">
                        Demi kelancaran pengiriman email dari Bagian Administrasi Akademik UKSW, silahkan menggunakan email student.uksw.edu yang telah diberikan. Bagian Administrasi Akademik UKSW tidak bertanggung jawab, apabila data yang anda berikan salah.
                    </div>
                </th>
                <th class="home-not-main"></th>
            </tr>
        </table>
    </div>

    <a href="#toppest" class="scroll-top"></a>

    <footer class="myFooter">
        Powered by : Manajemen Proyek_672017252_672017253_672017265
    </footer>

    <script src="script.js"></script>
</body>

</html>