// Leaflet-Karte initialisieren
var map = L.map('map', {
  center: [50.1109, 8.6821], // Koordinaten für Frankfurt
  zoom: 12
});

// OpenStreetMap Layer hinzufügen
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Funktion zum Laden der Stationsdaten über AJAX
fetch('../php/get_stations.php')
  .then(response => response.json())
  .then(data => {
      // Marker für jede Station hinzufügen
      data.forEach(station => {
          L.marker([station.Latitude, station.Longitude])
              .bindPopup(`<b>${station.StationName}</b><br>Station ID: ${station.StationID}`)
              .addTo(map);
      });
  })
  .catch(error => console.error("Fehler beim Laden der Daten:", error));
