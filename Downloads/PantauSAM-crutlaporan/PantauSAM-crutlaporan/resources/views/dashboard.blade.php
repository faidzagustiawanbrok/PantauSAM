
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
    <link rel="stylesheet" href="css/dama.css">
</head>
<body>


        <!-- Tombol plus -->
<div class="add-button" id="openModalBtn">
    <button>+</button>
</div>
<button id="confirmLocationBtn" type="button" class="btn btn-success hidden">Konfirmasi Lokasi</button>

<!-- Modal Popup -->
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <button id="closeModalBtn" class="close-btn">X</button>
        <h2>Buat Laporan</h2>
        <p>Buat laporanmu agar segera kami tangani!</p>


        <!-- Form Laporan -->
        <form  action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="Nama_Lokasi">Masukkan Nama Lokasi</label>
                <input
                class="form-control @error('Nama_Lokasi') is-invalid @enderror"
                style="height:150px"
                name="Nama_Lokasi"
                id="Nama_Lokasi"
                placeholder="Nama Lokasi"></input>
            @error('Nama_Lokasi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            </div>

            <input type="hidden" name="Latitude" id="latitudeInput">
            <input type="hidden" name="Longitude" id="longitudeInput">

            <div>
                <label for="DetailKerusakan">Pilih jenis kerusakan infrastruktur</label>
                <textarea
                class="form-control @error('detail') is-invalid @enderror"
                style="height:150px"
                name="detail"
                id="inputDetail"
                placeholder="Detail"></textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            </div>
            <button id="addPinBtn" type="button" class="btn btn-primary">Pilih Lokasi</button>



            <div>
                <label for="buktiKerusakan">Unggah bukti kerusakan</label>
                <input
                type="file"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror

            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>

        </form>
    </div>
</div>


<!-- Notification Popup -->
<div id="notification" class="notification hidden">
  <p id="notificationMessage"></p>
</div>

    <!-- Sidebar -->
    <div class="sidebar">
        <img class="logo"src="source/Logo.png" alt="logo pantausam">
        <ul>
            <li><a id="dashboard" class="active"><i class="fas fa-home"></i> Dashboard utama</a></li>
            <li><a href="/riwayat" id="riwayat" ><i class="fas fa-history"></i> Riwayat laporan</a></li>
            <li><a href="#" id="notifikasi"><i class="fas fa-bell"></i> Notifikasi</a></li>
            <li><a href="/profile" id="dashboard" ><i class="fas fa-home"></i> profile</a></li>
        </ul>

        <div class="profil">
            <a href=""></a>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>

    <!-- Peta -->
    <div id="map"></div>



    <!-- Link ke Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Link ke custom JavaScript -->
    <script src="js/dama.js"></script>

</body>
</html>
