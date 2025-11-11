<?php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<h2>Database connection failed.</h2>");
}

// If status change form submitted
if (isset($_POST['update_status'])) {
    $eoi_id = intval($_POST['EOInumber']);
    $new_status = $_POST['status'];

    if (in_array($new_status, ['New','Current','Final'])) {
        $query = "UPDATE eoi SET status=? WHERE EOInumber=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $new_status, $eoi_id);
        mysqli_stmt_execute($stmt);
    }
}

// If delete by job_ref form submitted
if (isset($_POST['delete_job_ref'])) {
    $job_ref_delete = strtoupper(trim($_POST['job_ref_delete']));
    $query = "DELETE FROM eoi WHERE job_ref=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $job_ref_delete);
    mysqli_stmt_execute($stmt);
}

// Filtering
$job_ref = isset($_GET['job_ref']) ? strtoupper(trim($_GET['job_ref'])) : "";
$first_name = isset($_GET['first_name']) ? trim($_GET['first_name']) : "";
$last_name = isset($_GET['last_name']) ? trim($_GET['last_name']) : "";

$sql = "SELECT * FROM eoi WHERE 1";

if ($job_ref !== "") {
    $sql .= " AND job_ref LIKE '%$job_ref%'";
}
if ($first_name !== "") {
    $sql .= " AND first_name LIKE '%$first_name%'";
}
if ($last_name !== "") {
    $sql .= " AND last_name LIKE '%$last_name%'";
}

$sql .= " ORDER BY EOInumber DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage EOIs</title>
<style>
table { border-collapse: collapse; width: 100%; }
th, td { border: 1px solid #000; padding: 6px; text-align: left; }
form { margin-bottom: 12px; }
</style>
</head>
<body>

<h2>HR Manager — Manage EOIs</h2>

<!-- Filter Form -->
<form method="get">
  <label>Job Ref:</label> <input type="text" name="job_ref" value="<?= $job_ref ?>">
  <label>First Name:</label> <input type="text" name="first_name" value="<?= $first_name ?>">
  <label>Last Name:</label> <input type="text" name="last_name" value="<?= $last_name ?>">
  <button type="submit">Search</button>
  <a href="manage.php">Reset</a>
</form>

<!-- Delete Form -->
<form method="post" onsubmit="return confirm('Delete ALL EOIs for this Job Reference?');" style="margin-bottom:1rem;">
  <input type="hidden" name="action" value="delete_jobref_fixed">
  <label>Delete all EOIs for Job Ref:</label>
  <select name="job_ref_delete" required>
    <option value="">-- Select Job Ref --</option>
    <option value="WEB12">WEB12 - Web Developer</option>
    <option value="UI456">UI/UX Designer - UI456</option>
    <option value="DB789">Database Developer - DB789</option>
  </select>
  <button type="submit">Delete</button>
</form>


<table>
<tr>
  <th>EOI #</th>
  <th>Job Ref</th>
  <th>Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Location</th>
  <th>Skills</th>
  <th>Status</th>
  <th>Action</th>
</tr>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $skills = array_filter([$row['skill1'], $row['skill2'], $row['skill3'], $row['skill4']]);
        echo "<tr>";
        echo "<td>{$row['EOInumber']}</td>";
        echo "<td>{$row['job_ref']}</td>";
        echo "<td>{$row['first_name']} {$row['last_name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['suburb']} {$row['state']} {$row['postcode']}</td>";
        echo "<td>" . implode(", ", $skills);
        if (!empty($row['other_skills'])) echo "<br><em>Other:</em> {$row['other_skills']}";
        echo "</td>";
        echo "<td>{$row['status']}</td>";

        // Status update form
        echo "<td>
            <form method='post'>
              <input type='hidden' name='EOInumber' value='{$row['EOInumber']}'>
              <select name='status'>
                <option ".($row['status']=="New"?"selected":"").">New</option>
                <option ".($row['status']=="Current"?"selected":"").">Current</option>
                <option ".($row['status']=="Final"?"selected":"").">Final</option>
              </select>
              <button type='submit' name='update_status'>Save</button>
            </form>
          </td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found.</td></tr>";
}
?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
