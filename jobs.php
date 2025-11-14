<?php
require_once("test_db.php"); // connect to database

$sql = "SELECT * FROM jobs_des";
$result = $conn->query($sql);

$jobs = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jobs[] = $row;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexora Tech Careers</title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <?php include "header.inc"; ?>
  <!-- Hero Section -->
  <section id="slogan">
    <div class="slogan">
      <h1>Your future in technology starts here.</h1>
    </div>
  </section>
  <!-- Jobs Section -->
  <section class="jobs">
    <h2 style="text-align:center; margin-bottom:30px; color:#20205a;">
      Explore Our Career Roles<br><br>
      <img src="../images/man.jpg" alt="A Little bit of The Creator" class="jobs-image">
    </h2>

    <div class="tab-container">
      <!-- Buttons -->
      <div class="tab-buttons">
        <?php
        if (!empty($jobs)) {
          foreach ($jobs as $row) {
            echo '<a href="#' . htmlspecialchars($row['title']) . '"class="tab-btn">' . htmlspecialchars($row["title"]) . '</a>';
          }
        } else {
          echo "<p>No jobs available right now.</p>";
        }
        ?>
      </div>

      <!-- Web Developer -->
      <?php
      if (!empty($jobs)) {
        foreach ($jobs as $row) {
          echo '<div id="' . htmlspecialchars($row['title']) . '" class="tab-content">';
          echo '<div class="job-card">';
          echo '<h3 class="job-title">' . htmlspecialchars($row['jobs_id']) . ' ' . htmlspecialchars($row['title']) . '</h3>';
          echo '<p class="job-desc">' . htmlspecialchars($row['description']) . '</p>';

          /* Respronsibilities' Portion */
          echo '<h4>Responsibilities:</h4>';
          echo '<ol class="perks bold-numbers">';
          $responsibilities = explode("\n", trim($row['responsibilities']));
          foreach ($responsibilities as $responsibility) {
            echo '<li>' . htmlspecialchars(trim($responsibility)) . '</li>';
          }
          echo '</ol>';

          /* Benefits' Portion */
          echo '<h4>Benefits:</h4>';
          echo '<ul class="perks">';
          $benefits = explode("\n", trim($row['benefits']));
          foreach ($benefits as $benefit) {
            echo '<li>' . htmlspecialchars(trim($benefit)) . '</li>';
          }
          echo '</ul>';
          echo '<a href="apply.php" class="view-details">Apply Now</a>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "<p>No jobs available right now.</p>";
      }
      ?>
    </div>
  </section>
  <?php include "footer.inc"; ?>

  <?php
  $conn->close()
  ?>
</body>

</html>