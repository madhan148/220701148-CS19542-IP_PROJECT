<?php
$conn = new mysqli("localhost", "root", "", "travel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_name = $_POST['user-name'];
$user_email = $_POST['user-email'];
$user_phone = $_POST['user-phone'];
$vehicle_type = $_POST['vehicle-type'];
$pick_up_date = $_POST['pick-up-date'];
$drop_off_date = $_POST['drop-off-date'];

$sql = "INSERT INTO vehicle_bookings (user_name, user_email, user_phone, vehicle_type, pick_up_date, drop_off_date) 
        VALUES ('$user_name', '$user_email', '$user_phone', '$vehicle_type', '$pick_up_date', '$drop_off_date')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the success page
    header("Location: success.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
