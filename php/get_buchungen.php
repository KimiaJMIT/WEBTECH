<?php
header('Content-Type: application/json');
include 'db_connect.php';

// SQL-Abfrage: Alle Stationen mit Latitude und Longitude abrufen
$sql = "SELECT 
Buchungs_ID, 
Fahrrad_ID, 
Nutzer_ID, 
Buchung_Start, 
Buchung_Ende, 
Start_Station, 
Start_Station_ID, 
Start_Lat, 
Start_Long, 
Ende_Station, 
Ende_Station_ID, 
Ende_Lat, 
Ende_Long, 
Buchungsportal, 
Wochentag 
        FROM Fahrradbuchungen";
$result = $conn->query($sql);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // JSON-Ausgabe mit schöner Formatierung
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>

