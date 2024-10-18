<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "travel_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Capture form data
$user_name = $_POST['user-name'];
$user_email = $_POST['user-email'];
$user_phone = $_POST['user-phone'];
$location = $_POST['location'];
$check_in_date = $_POST['check-in-date'];
$check_out_date = $_POST['check-out-date'];

// Insert data into the room_bookings table
$sql = "INSERT INTO room_bookings (user_name, user_email, user_phone, location, check_in, check_out) 
        VALUES ('$user_name', '$user_email', '$user_phone', '$location', '$check_in_date', '$check_out_date')";

// Execute the query and check for success
if ($conn->query($sql) === TRUE) {
    // Redirect to success page
    header("Location: room_success.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
