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

        {
            "type": "Feature",
            "properties": {
                "name": "Jembatan B"
            },
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [112.6325, -7.9790],
                        [112.6340, -7.9785],
                        [112.6330, -7.9770],
                        [112.6325, -7.9790]
                    ]
                ]
            }
        }
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
const closeModalBtn = document.getElementById("closeModalBtn");
const addPinBtn = document.getElementById("addPinBtn");
const confirmLocationBtn = document.createElement("button"); // Tombol konfirmasi lokasi
const modal = document.getElementById("modal");
const mapDiv = document.getElementById("map");
let marker;

// Style tombol konfirmasi lokasi
confirmLocationBtn.id = "confirmLocationBtn";
confirmLocationBtn.textContent = "Konfirmasi Lokasi";
confirmLocationBtn.classList.add("hidden");
document.body.appendChild(confirmLocationBtn);

// Open modal
openModalBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Close modal
closeModalBtn.addEventListener("click", () => {
    modal.classList.add("hidden");
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
