
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Infrastruktur Kota Malang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Link ke Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Link ke custom CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div id="popup" class="popup-container">
        <div class="popup-content">
            <span id="close-popup" class="close-btn">&times;</span>
            <h2>Buat laporan</h2>
            <p>Buat laporanmu agar segera kami tangani!</p>
            <form>
                <label for="infrastructure">Pilih infrastruktur yang ingin dilaporkan:</label>
                <input type="text" id="infrastructure" placeholder="Cari infrastruktur">
                <br>
                <label for="damage">Pilih jenis kerusakan infrastruktur:</label>
                <input type="text" id="keterangan" placeholder="Uraikan kerusakannya">
                <br>
                <label for="address">Masukkan detail alamat infrastruktur:</label>
                <textarea id="address" placeholder="Detail alamat"></textarea>
                <br>
                <label for="file-upload">Unggah bukti kerusakan:</label>
                <input type="file" id="file-upload">
                <br><br>
                <button type="submit">Unggah laporan</button>
            </form>
            <button id="pick-location-button">Pilih Lokasi</button> <!-- New button to trigger location picking -->
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <img class="logo"src="source/Logo.png" alt="logo pantausam">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Dashboard utama</a></li>
            <li><a href="#"><i class="fas fa-history"></i> Riwayat laporan</a></li>
            <li><a href="#"><i class="fas fa-bell"></i> Notifikasi</a></li>
        </ul>


        <span>{{ Auth::user()->name }}</span>

    </button>

    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
    <form method="POST" action="{{ route('logout') }}" class="block">
        @csrf
        <button type="submit" class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">Log Out</button>
        </form>
    </div>




    <!-- Peta -->
    <div id="map"></div>

    <!-- Tombol plus -->
    <div class="add-button">
        <button>+</button>
    </div>

    <!-- Link ke Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Link ke custom JavaScript -->
    <script src="js/dashboard.js"></script>

</body>
</html>
