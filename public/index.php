<?php include '../db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Job Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">


<h2>Available Jobs</h2>

<!-- Search Form -->
<form method="GET">
  Keyword: <input type="text" name="keyword" />
  Location: <input type="text" name="location" />
  Salary >= <input type="number" name="salary" />
  <button type="submit">Filter</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$salary = isset($_GET['salary']) ? (int)$_GET['salary'] : 0;

$query = "SELECT * FROM jobs WHERE 
          (title LIKE '%$keyword%' OR description LIKE '%$keyword%') AND 
          location LIKE '%$location%' AND 
          salary >= $salary 
          ORDER BY id DESC";

$result = $conn->query($query);

if ($result->num_rows > 0) {
  while ($job = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0'>";
    echo "<h3>" . $job['title'] . "</h3>";
    echo "<p><strong>Location:</strong> " . $job['location'] . "</p>";
    echo "<p><strong>Salary:</strong> ₹" . $job['salary'] . "</p>";
    echo "<p><strong>Skills:</strong> " . $job['skills'] . "</p>";
    echo "<a href='job.php?id=" . $job['id'] . "'>View & Apply</a>";
    echo "</div>";
  }
} else {
  echo "No jobs found.";
}
?>
