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

            // Add a click event to each feature that sets the name to the input field
            layer.on('click', function () {
                // When a location is clicked, set the input field value to the name of the location
                document.getElementById('infrastructure').value = feature.properties.name;
            });
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



const addButton = document.querySelector('.add-button button');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('close-popup');

    // Fungsi untuk menampilkan popup
    addButton.addEventListener('click', () => {
        popup.style.display = 'block'; // Menampilkan popup
    });

    // Fungsi untuk menyembunyikan popup saat tombol close diklik
    closePopup.addEventListener('click', () => {
        popup.style.display = 'none'; // Menyembunyikan popup
    });

    // Menyembunyikan popup jika klik di luar popup-content
    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });

// Variables for marker and enabling location picking
let locationMarker = null;
let isPickingLocation = false;

// Show popup and enable location picking
const pickLocationButton = document.getElementById('pick-location-button');
pickLocationButton.addEventListener('click', function() {
isPickingLocation = true;
pickLocationButton.textContent = 'Geser marker untuk memilih lokasi'; // Change button text

if (!locationMarker) {
// Add a draggable marker at the center of the map for the first time
locationMarker = L.marker(map.getCenter(), { draggable: true }).addTo(map);

// Close popup when dragging starts
locationMarker.on('dragstart', function () {
    popup.style.display = 'none';
});

// Event listener for drag end to get new location
locationMarker.on('dragend', function (event) {
    const latLng = event.target.getLatLng();  // Get new coordinates
    const featureName = isLocationNearFeature(latLng, geojsonData.features);

    if (featureName) {
        // If near a GeoJSON feature, display the feature's name
        document.getElementById('infrastructure').value = featureName;
    } else {
        // If not, display the coordinates
        document.getElementById('infrastructure').value = `${latLng.lng}, ${latLng.lat}`;
    }

    // Show popup again
    popup.style.display = 'flex';
    pickLocationButton.textContent = 'Pilih Lokasi'; // Reset button text
    isPickingLocation = false;
});
} else {
// If marker already exists, just show it on the map
locationMarker.addTo(map);
}
});

// Function to check if location is near a GeoJSON feature
function isLocationNearFeature(latLng, features) {
const RADIUS_THRESHOLD = 0.0001; // Threshold for proximity check

for (let i = 0; i < features.length; i++) {
const feature = features[i];
if (feature.geometry.type === "Point") {
    const [featureLng, featureLat] = feature.geometry.coordinates;
    const distance = Math.sqrt(
        Math.pow(latLng.lat - featureLat, 2) + Math.pow(latLng.lng - featureLng, 2)
    );

    if (distance <= RADIUS_THRESHOLD) {
        return feature.properties.name; // Return name if near
    }
}
}
return null; // Return null if not near any feature
}
