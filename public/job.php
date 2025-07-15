<?php
include '../db.php';
$job_id = $_GET['id'];
$job = $conn->query("SELECT * FROM jobs WHERE id=$job_id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Job Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">


<h2><?php echo $job['title']; ?></h2>
<p><strong>Location:</strong> <?php echo $job['location']; ?></p>
<p><strong>Salary:</strong> ₹<?php echo $job['salary']; ?></p>
<p><strong>Skills:</strong> <?php echo $job['skills']; ?></p>
<p><strong>Description:</strong> <?php echo $job['description']; ?></p>

<hr>
<h3>Apply Now</h3>

<form method="post" action="apply.php" enctype="multipart/form-data">
  <input type="hidden" name="job_id" value="<?php echo $job_id; ?>" />
  Full Name: <input type="text" name="name" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Phone: <input type="text" name="phone" required><br><br>
  Resume (PDF only): <input type="file" name="resume" accept=".pdf" required><br><br>
  <button type="submit">Submit Application</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

