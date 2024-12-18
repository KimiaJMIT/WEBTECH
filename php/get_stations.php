<?php
// Fehleranzeige aktivieren für Debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// JSON-Header setzen
header('Content-Type: application/json');

// Datenbankverbindung einfügen
include 'db_connect.php'; // Stelle sicher, dass db_connect.php die $conn-Variable enthält

// SQL-Abfrage: Daten aus der Tabelle 'Fahrradstationen' abrufen
$sql = "SELECT 
                StationID,  
                StationName,
                Latitude,
                Longitude, 
                Startvorgaenge,
                Endvorgaenge 
        FROM Fahrradstationen";
$result = $conn->query($sql);

// Daten speichern
$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // JSON-Ausgabe mit Formatierung
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    // Fehlermeldung ausgeben
    echo json_encode(["error" => $conn->error]);
}

// Verbindung schließen
$conn->close();
?>
