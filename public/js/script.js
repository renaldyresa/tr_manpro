//fungsi responsive

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

//fungsi tanggal

function showDate() {
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
    document.getElementById("nav-date").innerHTML = tanggallengkap.toString;
}

// fungsi slideshow

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active-slide", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active-slide";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

//fungsi modal

var modal = [
    document.getElementById("registrasiulang-id"),
    document.getElementById("registrasimatakuliah-id"),
    document.getElementById("matakuliahshare-id"),
    document.getElementById("kartustudi-id"),
    document.getElementById("hasilstudi-id"),
    document.getElementById("jadwalkuliah-id"),
    document.getElementById("transkripnilai-id"),
    document.getElementById("tagihan-id"),
    document.getElementById("keaktifanmahasiswa-id"),
    document.getElementById("requestmatakuliah-id"),
    document.getElementById("pendaftaranskripsithesis-id"),
    document.getElementById("peminjamanbuku-id"),
    document.getElementById("gantipassword-id")
];
var btn = [
    document.getElementById("registrasiulang"),
    document.getElementById("registrasimatakuliah"),
    document.getElementById("matakuliahshare"),
    document.getElementById("kartustudi"),
    document.getElementById("hasilstudi"),
    document.getElementById("jadwalkuliah"),
    document.getElementById("transkripnilai"),
    document.getElementById("tagihan"),
    document.getElementById("keaktifanmahasiswa"),
    document.getElementById("requestmatakuliah"),
    document.getElementById("pendaftaranskripsithesis"),
    document.getElementById("peminjamanbuku"),
    document.getElementById("gantipassword")
];
var span = [
    document.getElementsByClassName("close1")[0],
    document.getElementsByClassName("close2")[0],
    document.getElementsByClassName("close3")[0],
    document.getElementsByClassName("close4")[0],
    document.getElementsByClassName("close5")[0],
    document.getElementsByClassName("close6")[0],
    document.getElementsByClassName("close7")[0],
    document.getElementsByClassName("close8")[0],
    document.getElementsByClassName("close9")[0],
    document.getElementsByClassName("close10")[0],
    document.getElementsByClassName("close11")[0],
    document.getElementsByClassName("close12")[0],
    document.getElementsByClassName("close13")[0]
];

btn[0].onclick = function() {
    modal[0].style.display = "block";
}
span[0].onclick = function() {
    modal[0].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[0]) {
        modal[0].style.display = "none";
    }
}

btn[1].onclick = function() {
    modal[1].style.display = "block";
}
span[1].onclick = function() {
    modal[1].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[1]) {
        modal[1].style.display = "none";
    }
}

btn[2].onclick = function() {
    modal[2].style.display = "block";
}
span[2].onclick = function() {
    modal[2].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[2]) {
        modal[2].style.display = "none";
    }
}

btn[3].onclick = function() {
    modal[3].style.display = "block";
}
span[3].onclick = function() {
    modal[3].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[3]) {
        modal[3].style.display = "none";
    }
}

btn[4].onclick = function() {
    modal[4].style.display = "block";
}
span[4].onclick = function() {
    modal[4].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[4]) {
        modal[4].style.display = "none";
    }
}

btn[5].onclick = function() {
    modal[5].style.display = "block";
}
span[5].onclick = function() {
    modal[5].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[5]) {
        modal[5].style.display = "none";
    }
}

btn[6].onclick = function() {
    modal[6].style.display = "block";
}
span[6].onclick = function() {
    modal[6].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[6]) {
        modal[6].style.display = "none";
    }
}

btn[7].onclick = function() {
    modal[7].style.display = "block";
}
span[7].onclick = function() {
    modal[7].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[7]) {
        modal[7].style.display = "none";
    }
}

btn[8].onclick = function() {
    modal[8].style.display = "block";
}
span[8].onclick = function() {
    modal[8].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[8]) {
        modal[8].style.display = "none";
    }
}

btn[9].onclick = function() {
    modal[9].style.display = "block";
}
span[9].onclick = function() {
    modal[9].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[9]) {
        modal[9].style.display = "none";
    }
}

btn[10].onclick = function() {
    modal[10].style.display = "block";
}
span[10].onclick = function() {
    modal[10].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[10]) {
        modal[10].style.display = "none";
    }
}

btn[11].onclick = function() {
    modal[11].style.display = "block";
}
span[11].onclick = function() {
    modal[11].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[11]) {
        modal[11].style.display = "none";
    }
}


btn[12].onclick = function() {
    modal[12].style.display = "block";
}
span[12].onclick = function() {
    modal[12].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal[12]) {
        modal[12].style.display = "none";
    }
}