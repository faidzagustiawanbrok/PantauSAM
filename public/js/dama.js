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
                "name": "Gedung A"
            },
            "geometry": {
                "type": "Point",
                "coordinates": [112.6309, -7.9774] // Koordinat Gedung A di Kota Malang
            }
        },
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
    // Mengikat popup pada setiap fitur
    onEachFeature: function (feature, layer) {
        if (feature.properties && feature.properties.name) {
            layer.bindPopup(feature.properties.name);
        }
    },
    // Styling fitur GeoJSON (misalnya, memberi warna pada poligon)
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

// Fungsi untuk mencari lokasi berdasarkan input dari search bar
document.getElementById("searchButton").addEventListener("click", function() {
    var query = document.getElementById("searchInput").value;

    // Cek apakah ada input pencarian
    if (query.trim() !== "") {
        // Melakukan pencarian berdasarkan query (dalam contoh ini, hanya mencari koordinat yang sudah ada)
        if (query.toLowerCase() === "gedung a") {
            map.setView([-7.9774, 112.6309], 16); // Pindah ke lokasi Gedung A
            L.popup()
                .setLatLng([-7.9774, 112.6309])
                .setContent("Lokasi: Gedung A")
                .openOn(map);
        } else if (query.toLowerCase() === "jembatan b") {
            map.setView([-7.9785, 112.6335], 16); // Pindah ke lokasi Jembatan B
            L.popup()
                .setLatLng([-7.9785, 112.6335])
                .setContent("Lokasi: Jembatan B")
                .openOn(map);
        } else {
            alert("Lokasi tidak ditemukan");
        }
    } else {
        alert("Masukkan nama lokasi");
    }
});
