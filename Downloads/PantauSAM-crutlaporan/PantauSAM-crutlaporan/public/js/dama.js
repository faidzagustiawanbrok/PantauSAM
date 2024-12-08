// Inisialisasi peta dan set pusat peta di Kota Malang
var map = L.map('map').setView([-7.9774, 112.6309], 13); // Koordinat Kota Malang dan tingkat zoom

// Menambahkan Tile Layer dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Data GeoJSON - Infrastruktur (contoh data)
var geojsonData = {
    "type": "FeatureCollection",
    "features": [


    ]
};

// Menambahkan Layer GeoJSON ke peta
L.geoJSON(geojsonData, {
    onEachFeature: function (feature, layer) {
        if (feature.properties && feature.properties.name) {
            layer.bindPopup(feature.properties.name);
        }
    },
    style: function (feature) {
        return {
            color: 'blue',
            weight: 2,
            opacity: 1,
            fillOpacity: 0.3,
            fillColor: 'lightblue'
        };
    }
}).addTo(map);

// Get elements
const openModalBtn = document.getElementById("openModalBtn");
const addPinBtn = document.getElementById("addPinBtn");
const confirmLocationBtn = document.createElement("button"); // Tombol konfirmasi lokasi
const modal = document.getElementById("modal");
const mapDiv = document.getElementById("map");
let marker;

// Dapatkan elemen sidebar dan tombol
const sidebar = document.querySelector('.sidebar');
const add = document.querySelector('.add-button');

// Style tombol konfirmasi lokasi
confirmLocationBtn.id = "confirmLocationBtn";
confirmLocationBtn.textContent = "Konfirmasi Lokasi";
confirmLocationBtn.classList.add("hidden");
document.body.appendChild(confirmLocationBtn);



let isModalOpen = false; // Flag untuk memeriksa status modal

openModalBtn.addEventListener('click', () => {
    if (isModalOpen) {
        modal.classList.remove('show'); // Sembunyikan modal dengan animasi
        setTimeout(() => modal.classList.add('hidden'), 300); // Tunggu animasi selesai sebelum menyembunyikan
        sidebar.classList.remove('hiden'); // Tampilkan sidebar
        add.classList.remove('transition');
    } else {
        modal.classList.remove('hidden'); // Tampilkan modal
        setTimeout(() => modal.classList.add('show'), 10); // Tambahkan kelas 'show' setelah modal terlihat
        sidebar.classList.add('hiden'); // Sembunyikan sidebar
        add.classList.add('transition');
    }
    isModalOpen = !isModalOpen; // Toggle status modal
});



// Tambahkan pin merah di peta saat tombol "Tambah Pin" diklik
addPinBtn.addEventListener("click", (event) => {
    event.preventDefault(); // Mencegah reload browser

    modal.classList.add("hidden"); // Tutup modal

    // Tambahkan pin merah yang bisa digeser
    if (!marker) {
        marker = L.marker([-7.9774, 112.6309], { draggable: true }).addTo(map);
    }

    // Klik pada peta untuk memindahkan pin
    map.on("click", (e) => {
        marker.setLatLng(e.latlng);
    });

    // Tampilkan tombol konfirmasi lokasi setelah pin digeser
    marker.on("dragend", () => {
        confirmLocationBtn.classList.remove("hidden"); // Tampilkan tombol
        const { lat, lng } = marker.getLatLng();
        console.log("Koordinat yang dipilih:", lat, lng);
    });
});

// Tombol konfirmasi lokasi
confirmLocationBtn.addEventListener("click", () => {
    const { lat, lng } = marker.getLatLng();
    console.log("Lokasi terkonfirmasi:", lat, lng);

    // Simpan koordinat ke input hidden
    const latitudeInput = document.getElementById("latitudeInput");
    const longitudeInput = document.getElementById("longitudeInput");
    if (latitudeInput && longitudeInput) {
        latitudeInput.value = lat;
        longitudeInput.value = lng;
    }

    modal.classList.remove("hidden"); // Tampilkan kembali modal
    confirmLocationBtn.classList.add("hidden"); // Sembunyikan tombol
});

// Function to set active link and remove from others
// Function to set active link and remove from others
function setActiveLink(linkId) {
    // Remove the 'active' class from all links
    const links = document.querySelectorAll('.sidebar ul li a');
    links.forEach(link => {
        link.classList.remove('active');
    });

    // Add 'active' class to the clicked link
    const activeLink = document.getElementById(linkId);
    activeLink.classList.add('active');
}

// Automatically set active link based on the current URL
window.onload = function() {
    const currentUrl = window.location.pathname;

    // Check which link corresponds to the current page URL
    if (currentUrl === '/riwayat') {
        setActiveLink('riwayat');
    } else if (currentUrl === '/notifikasi') {
        setActiveLink('notifikasi');
    } else {
        setActiveLink('dashboard');  // Default to dashboard if no match
    }
}

let page = 1;
const reportsSection = document.querySelector('.reports-section');

reportsSection.addEventListener('scroll', () => {
    if (reportsSection.scrollTop + reportsSection.clientHeight >= reportsSection.scrollHeight) {
        loadMoreReports();
    }
});

function loadMoreReports() {
    fetch(`/api/reports?page=${++page}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(report => {
                const reportCard = document.createElement('div');
                reportCard.className = 'report-card';
                reportCard.innerHTML = `
                    <div class="report-content">
                        <img src="/images/${report.image}" width="150px" alt="Report Image">
                        <div class="text-content">
                            <p><strong>Lokasi:</strong> ${report.Nama_Lokasi}</p>
                            <p><strong>Tanggal dibuat:</strong> ${report.created_at}</p>
                            <p><strong>Detail Kerusakan:</strong> ${report.detail}</p>
                            <p><strong>Status laporan:</strong> <span class="status ${report.status.toLowerCase()}">${report.status}</span></p>
                        </div>
                    </div>`;
                reportsSection.appendChild(reportCard);
            });
        })
        .catch(error => console.error('Error:', error));
}
