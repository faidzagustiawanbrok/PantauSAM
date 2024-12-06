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
    <link rel="stylesheet" href="css/riwayat.css">
</head>
<body>


<!-- Notification Popup -->
<div id="notification" class="notification hidden">
  <p id="notificationMessage"></p>
</div>

    <!-- Sidebar -->
    <div class="sidebar">
        <img class="logo"src="source/Logo.png" alt="logo pantausam">
        <ul>
            <li><a href="/dashboard" id="dashboard" ><i class="fas fa-home"></i> Dashboard utama</a></li>
            <li><a id="riwayat" class="active"><i class="fas fa-history"></i> Riwayat laporan</a></li> <!-- Active by default -->
            <li><a href="#" id="notifikasi" ><i class="fas fa-bell"></i> Notifikasi</a></li>
            <li><a href="/profile" id="dashboard" ><i class="fas fa-home"></i> profile</a></li>
        </ul>

            <div class="reports-section">
                @if($reports->isEmpty())
                    <p>Tidak ada laporan yang tersedia.</p>
                @else
                <ul class="kotak">
                    @foreach($reports as $report)

                        <li class="report-card">
                            <div class="report-content">
                                <img src="/images/{{ $report->image }}" width="150px" alt="Report Image">
                                <div class="text-content">
                                    <p><strong>Lokasi:</strong> {{ $report->Nama_Lokasi }}</p>
                                    <p><strong>Tanggal dibuat:</strong> {{ $report->created_at }}</p>
                                    <p><strong>Detail Kerusakan:</strong> {{ $report->detail }}</p>
                                    <p><strong>Status laporan:</strong> <span class="status {{ strtolower($report->status) }}">{{ $report->status }}</span></p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>


                @endif
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
