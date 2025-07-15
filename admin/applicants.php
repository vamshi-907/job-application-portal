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


<h2>View Applicants</h2>
<a href="dashboard.php">← Back to Dashboard</a><br><br>

<!-- Select job -->
<form method="GET">
  <label>Select Job:</label>
  <select name="job_id" required>
    <option value="">-- Choose a Job --</option>
    <?php
    $jobs = $conn->query("SELECT id, title FROM jobs");
    while ($job = $jobs->fetch_assoc()) {
        $selected = (isset($_GET['job_id']) && $_GET['job_id'] == $job['id']) ? "selected" : "";
        echo "<option value='{$job['id']}' $selected>{$job['title']}</option>";
    }
    ?>
  </select>
  <button type="submit">View</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    $job = $conn->query("SELECT title FROM jobs WHERE id=$job_id")->fetch_assoc();
    echo "<h3>Applicants for: " . $job['title'] . "</h3>";

    $result = $conn->query("SELECT * FROM applications WHERE job_id=$job_id ORDER BY applied_at DESC");

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Applied At</th><th>Resume</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['applied_at'] . "</td>";
            echo "<td><a href='../uploads/" . $row['resume'] . "' download>Download</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No applicants found for this job.";
    }
}
?>
