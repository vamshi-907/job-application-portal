<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../db.php';

$title = $_POST['title'];
$desc = $_POST['description'];
$location = $_POST['location'];
$skills = $_POST['skills'];
$salary = $_POST['salary'];
$deadline = $_POST['deadline'];

$sql = "INSERT INTO jobs (title, description, location, skills, salary, deadline)
        VALUES ('$title', '$desc', '$location', '$skills', $salary, '$deadline')";

if ($conn->query($sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Job Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

