<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Job Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">


<h2>Welcome, Admin!</h2>
<a href="logout.php">Logout</a>

<h3>Add New Job</h3>
<form method="post" action="jobs.php">
  Title: <input type="text" name="title" required><br><br>
  Description: <textarea name="description" required></textarea><br><br>
  Location: <input type="text" name="location" required><br><br>
  Skills (comma-separated): <input type="text" name="skills" required><br><br>
  Salary: <input type="number" name="salary" required><br><br>
  Deadline: <input type="date" name="deadline" required><br><br>
  <button type="submit">Add Job</button>
</form>

<h3>Existing Jobs</h3>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$result = $conn->query("SELECT * FROM jobs ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0'>";
    echo "<strong>" . $row['title'] . "</strong> | " . $row['location'];
    echo " | ₹" . $row['salary'] . " | Deadline: " . $row['deadline'];
    echo "<br><a href='delete_job.php?id=" . $row['id'] . "'>Delete</a>";
    echo "</div>";
}
?>
