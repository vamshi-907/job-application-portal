<?php
include '../db.php';

$job_id = $_POST['job_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if ($_FILES['resume']['type'] != 'application/pdf') {
    die("Only PDF files are allowed.");
}

// Prevent duplicate application (same email for same job)
$check = $conn->query("SELECT * FROM applications WHERE job_id=$job_id AND email='$email'");
if ($check->num_rows > 0) {
    die("You have already applied for this job using this email.");
}

// Save uploaded file
$upload_dir = "../uploads/";
$resume_name = time() . "_" . basename($_FILES["resume"]["name"]);
$target_file = $upload_dir . $resume_name;

if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
    // Insert into database
    $stmt = $conn->prepare("INSERT INTO applications (job_id, full_name, email, phone, resume) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $job_id, $name, $email, $phone, $resume_name);
    $stmt->execute();

    echo "Application submitted successfully!";
    echo "<br><a href='index.php'>Back to Job List</a>";
} else {
    echo "Failed to upload resume.";
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

