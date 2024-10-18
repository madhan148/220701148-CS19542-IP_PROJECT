<?php
$conn = new mysqli("localhost", "root", "", "travel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_name = $_POST['user-name'];
$user_email = $_POST['user-email'];
$user_phone = $_POST['user-phone'];
$from_location = $_POST['from-location'];
$to_location = $_POST['to-location'];
$departure_date = $_POST['departure-date'];
$return_date = $_POST['return-date'];

$sql = "INSERT INTO flight_bookings (user_name, user_email, user_phone, from_location, to_location, departure_date, return_date) 
        VALUES ('$user_name', '$user_email', '$user_phone', '$from_location', '$to_location', '$departure_date', '$return_date')";

if ($conn->query($sql) === TRUE) {
    echo "New flight booking created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
