// Inisialisasi peta
var map = L.map("map").setView([-6.2, 106.816666], 10); // Koordinat Jakarta

// Tambahkan layer peta dari OpenStreetMap
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "© OpenStreetMap",
}).addTo(map);

// Tambahkan marker
var marker = L.marker([-6.2, 106.816666])
  .addTo(map)
  .bindPopup("Ini adalah Jakarta!")
  .openPopup();
