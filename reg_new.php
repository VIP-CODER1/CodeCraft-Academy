<?php

$servername = "localhost"; // Change this to your MySQL server address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "registration"; // Change this to your MySQL database name


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Fix: Changed "POST" to "REQUEST_METHOD"
    // Retrieve form data
    $applicant_name = $_POST['applicant_name'];
    $aadhaar_number = $_POST['aadhaar_number'];
    $mobile_number = $_POST['mobile_number'];
    $password = $_POST['password'];
    $language = $_POST['language'];
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO registration_data (applicant_name, aadhaar_number, mobile_number, password, language) VALUES ('$applicant_name', '$aadhaar_number', '$mobile_number', '$password', '$language')"; // Fix: Used actual column names
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
