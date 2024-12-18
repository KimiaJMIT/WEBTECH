<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

// Verbindung testen
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
echo "Verbindung erfolgreich!";
?>
