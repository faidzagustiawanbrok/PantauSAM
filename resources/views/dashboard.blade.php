
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

    <!-- Sidebar -->
    <div class="sidebar">
        <img class="logo"src="source/Logo.png" alt="logo pantausam">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Dashboard utama</a></li>
            <li><a href="#"><i class="fas fa-history"></i> Riwayat laporan</a></li>
            <li><a href="#"><i class="fas fa-bell"></i> Notifikasi</a></li>
        </ul>
    </div>

    <!-- Pencarian dan Filter -->
    <nav class="navbar">
        <input type="text" id="searchInput" placeholder="Pencarian">
        <button id="searchButton">
            <img src="search-icon.png" alt="Search" />
        </button>
        <button id="filterButton">
            <img src="filter-icon.png" alt="Filter" />
        </button>
    </nav>
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

    <!-- Tombol plus -->
    <div class="add-button">
        <button>+</button>
    </div>

    <!-- Link ke Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Link ke custom JavaScript -->
    <script src="js/dama.js"></script>

</body>
</html>
