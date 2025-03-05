<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "campaign_feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];

// SQL Query
$sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $email, $feedback, $rating);

if ($stmt->execute()) {
    echo "<script>alert('Feedback submitted successfully!'); window.location.href='feedback_form.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
