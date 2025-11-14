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
<main>
  <section id="slogan">
    <div class="slogan">
      <h1>Your future in technology starts here.</h1>
    </div>
  </section>

  <section class="jobs-layout">

    <h2 class="jobs-header">Explore Our Career Roles</h2>

    <div class="jobs-wrapper">

      <!-- LEFT: Job List -->
      <aside class="job-list-left">
        <ul>
          <?php foreach ($jobs as $row): ?>
            <li>
              <a href="#job-<?php echo $row['jobs_id']; ?>">
                <?php echo htmlspecialchars($row["title"]); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </aside>

      <!-- RIGHT: Job Details -->
      <div class="job-details-right">
        <?php foreach ($jobs as $row): ?>
          <div id="job-<?php echo $row['jobs_id']; ?>" class="job-detail-card">

            <!-- Title's Portion -->
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <p class="job-desc"><?php echo (htmlspecialchars($row['description'])); ?></p>

            <!-- Responsibilities' Portion-->
            <h4>Responsibilities</h4>
            <ol>
              <?php foreach (explode("\n", trim($row['responsibilities'])) as $resp): ?>
                <li><?php echo htmlspecialchars($resp); ?></li>
              <?php endforeach; ?>
            </ol>

            <!-- Benefits' Portion -->
            <h4>Benefits</h4>
            <ul>
              <?php foreach (explode("\n", trim($row['benefits'])) as $benefit): ?>
                <li><?php echo htmlspecialchars($benefit); ?></li>
              <?php endforeach; ?>
            </ul>

            <a href="apply.php" class="apply-btn-job">Apply Now</a>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </section>
</main>
  <?php include "footer.inc"; ?>
</body>

</html>