<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include '../../config/database.php';

// Data RW dan RT dengan jumlah jiwa
$rw_data = [
    1 => [
        ['rt' => 1, 'jumlah_jiwa' => 100, 'koordinat' => '-6.66873675045032, 110.66484487619506'],
        ['rt' => 2, 'jumlah_jiwa' => 95, 'koordinat' => '-6.670633558619127, 110.67040241322427'],
        ['rt' => 3, 'jumlah_jiwa' => 105, 'koordinat' => '-6.67115571238783, 110.67136800846102'],
        ['rt' => 4, 'jumlah_jiwa' => 110, 'koordinat' => '-6.6717124228683256, 110.67220532774589'],
    ],
    2 => [
        ['rt' => 5, 'jumlah_jiwa' => 120, 'koordinat' => '-6.668532074360264, 110.66498133336593'],
        ['rt' => 6, 'jumlah_jiwa' => 115, 'koordinat' => '-6.667835228151626, 110.66527366348626'],
        ['rt' => 7, 'jumlah_jiwa' => 125, 'koordinat' => '-6.669692936295652, 110.66831235752731'],
        ['rt' => 8, 'jumlah_jiwa' => 130, 'koordinat' => '-6.670451253803703, 110.67051550320905'],
    ],
    3 => [
        ['rt' => 9, 'jumlah_jiwa' => 140, 'koordinat' => '-6.6694477533198535, 110.67520680537153'],
        ['rt' => 10, 'jumlah_jiwa' => 135, 'koordinat' => '-6.66846552320116, 110.67613407459753'],
        ['rt' => 11, 'jumlah_jiwa' => 145, 'koordinat' => '-6.668251226332264, 110.67621318530648'],
        ['rt' => 12, 'jumlah_jiwa' => 150, 'koordinat' => '-6.668058773876418, 110.67593925964032'],
    ],
    4 => [
        ['rt' => 13, 'jumlah_jiwa' => 160, 'koordinat' => '-6.665584834555245, 110.66588323868646'],
        ['rt' => 14, 'jumlah_jiwa' => 155, 'koordinat' => '-6.6653574723132145, 110.66593410746293'],
        ['rt' => 15, 'jumlah_jiwa' => 165, 'koordinat' => '-6.663010465581564, 110.67575521930657'],
        ['rt' => 16, 'jumlah_jiwa' => 170, 'koordinat' => '-6.664310541091241, 110.6776005790923'],
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wilayah</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        .popup-content {
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Wilayah</h2>
        <a href="create_wilayah.php" class="btn btn-success mb-3">Tambah Data Wilayah</a>
        <a href="../../admin/dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Form untuk memilih RW, RT, dan memasukkan koordinat -->
        <form id="coordinateForm" class="mb-3">
            <div class="form-group">
                <label>Pilih RW</label>
                <select id="rwSelect" class="form-control" required>
                    <option value="">Pilih RW</option>
                    <option value="1">RW 1</option>
                    <option value="2">RW 2</option>
                    <option value="3">RW 3</option>
                    <option value="4">RW 4</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih RT</label>
                <select id="rtSelect" class="form-control" required disabled>
                    <option value="">Pilih RT</option>
                    <!-- Opsi RT akan diisi melalui JavaScript berdasarkan RW yang dipilih -->
                </select>
            </div>
            <div class="form-group">
                <label>Koordinat (Latitude, Longitude)</label>
                <input type="text" id="coordinates" class="form-control" placeholder="Contoh: -6.2, 110.8" required disabled>
            </div>
            <button type="button" id="showMap" class="btn btn-primary" disabled>Tampilkan Peta</button>
        </form>

        <!-- Elemen untuk menampilkan peta -->
        <div id="map" style="height: 400px;"></div>
        <div id="info" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map("map").setView([-6.668, 110.667], 15); // Koordinat awal lebih dekat

        // Tambahkan layer peta dari OpenStreetMap
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: "© OpenStreetMap",
        }).addTo(map);

        // Menampilkan RT berdasarkan RW yang dipilih
        document.getElementById("rwSelect").onchange = function() {
            var rw = this.value;
            var rtSelect = document.getElementById("rtSelect");
            rtSelect.innerHTML = ""; // Kosongkan opsi RT
            rtSelect.disabled = false; // Aktifkan dropdown RT

            if (rw) {
                var rtOptions = <?php echo json_encode($rw_data); ?>; // Mengambil data RT dari PHP
                rtOptions[rw].forEach(function(rt) {
                    rtSelect.innerHTML += `<option value="${rt.jumlah_jiwa},${rt.koordinat}">RT ${rt.rt}</option>`;
                });
            }
        };

        // Mengaktifkan input koordinat dan tombol setelah RT dipilih
        document.getElementById("rtSelect").onchange = function() {
            var coordinatesInput = document.getElementById("coordinates");
            coordinatesInput.disabled = false; // Aktifkan input koordinat
            document.getElementById("showMap").disabled = false; // Aktifkan tombol
        };

        // Menampilkan peta berdasarkan koordinat yang dimasukkan
        document.getElementById("showMap").onclick = function() {
            var coords = document.getElementById("coordinates").value.split(",");
            var lat = parseFloat(coords[0]);
            var lng = parseFloat(coords[1]);

            // Validasi koordinat
            if (lat < -6.673 || lat > -6.660 || lng < 110.645 || lng > 110.670) {
                alert("Maaf, koordinat yang Anda masukkan di luar batas desa Bugel, mungkin ada di luar angkasa.");
                return; // Hentikan eksekusi jika koordinat tidak valid
            }

            // Pindahkan peta ke koordinat baru
            map.setView([lat, lng], 15);

            // Tambahkan marker
            var marker = L.marker([lat, lng]).addTo(map);

            // Menampilkan keterangan RT/RW dan kepadatan
            var rtRw = "RT " + document.getElementById("rtSelect").value.split(",")[0] + ", RW " + document.getElementById("rwSelect").value;

            // Ambil jumlah jiwa berdasarkan RT/RW yang dipilih
            var rw = document.getElementById("rwSelect").value;
            var rt = document.getElementById("rtSelect").value.split(",")[0];
            var jumlahJiwa = rw_data[rw][rt - 1].jumlah_jiwa; // Mengambil jumlah jiwa dari data

            // Logika untuk menentukan kepadatan berdasarkan jumlah jiwa
            var kepadatan = "";
            if (jumlahJiwa < 106) {
                kepadatan = "Sepi";
            } else if (jumlahJiwa >= 106 && jumlahJiwa <= 130) {
                kepadatan = "Ramai";
            } else if (jumlahJiwa > 130){
                kepadatan = "Padat";
            }

            // Tampilkan keterangan di marker
            marker.bindPopup(`<div class="popup-content">${rtRw}<br>Status Kepadatan: ${kepadatan}</div>`).openPopup();
        };
    </script>
</body>
</html>