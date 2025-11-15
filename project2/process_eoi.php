<?php
// 1. Block direct access
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit;
}

// 2. Connect to database
require_once "settings.php";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("<h2>Database connection failed: " . mysqli_connect_error() . "</h2>");
}

// 3. Clean function (simple)
function clean($v) {
    return trim(htmlspecialchars($v ?? ""));
}

// 4. Collect POST data
$job_ref      = clean($_POST["job_ref"] ?? "");
$first_name   = clean($_POST["first_name"] ?? "");
$last_name    = clean($_POST["last_name"] ?? "");
$dob          = clean($_POST["dob"] ?? "");   
$gender       = clean($_POST["gender"] ?? "Prefer not to say");
$street       = clean($_POST["street"] ?? "");
$suburb       = clean($_POST["suburb"] ?? "");
$state        = clean($_POST["state"] ?? "");
$postcode     = clean($_POST["postcode"] ?? "");
$email        = clean($_POST["email"] ?? "");
$phone        = clean($_POST["phone"] ?? "");
$other_skills = clean($_POST["other_skills"] ?? "");

$skills_arr   = $_POST["skills"] ?? [];

// Map skills[] → skill1..skill4
$skill1 = isset($skills_arr[0]) ? clean($skills_arr[0]) : "";
$skill2 = isset($skills_arr[1]) ? clean($skills_arr[1]) : "";
$skill3 = isset($skills_arr[2]) ? clean($skills_arr[2]) : "";
$skill4 = isset($skills_arr[3]) ? clean($skills_arr[3]) : "";

// 5. Basic server-side validation
$errors = [];

if ($job_ref === "")        $errors[] = "Job reference is required.";
if ($first_name === "")     $errors[] = "First name is required.";
if ($last_name === "")      $errors[] = "Last name is required.";
if ($dob === "")            $errors[] = "Date of birth is required.";
if ($gender === "")         $errors[] = "Gender is required.";
if ($street === "")         $errors[] = "Street is required.";
if ($suburb === "")         $errors[] = "Suburb is required.";
if ($state === "")          $errors[] = "State is required.";
if ($postcode === "")       $errors[] = "Postcode is required.";
if ($email === "")          $errors[] = "Email is required.";
if ($phone === "")          $errors[] = "Phone is required.";
if (empty($skills_arr))     $errors[] = "Select at least one skill.";

// If validation errors -> show list
if (!empty($errors)) {
    echo "<h2>⚠ Submission Errors</h2><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul><p><a href='apply.php'>Go Back</a></p>";
    mysqli_close($conn);
    exit;
}

// 6. Build and run INSERT
$sql = "
INSERT INTO eoi
(job_ref, first_name, last_name, dob, gender, street, suburb, state, postcode,
 email, phone, skill1, skill2, skill3, skill4, other_skills, status)
VALUES (
  '$job_ref',
  '$first_name',
  '$last_name',
  '$dob',
  '$gender',
  '$street',
  '$suburb',
  '$state',
  '$postcode',
  '$email',
  '$phone',
  '$skill1',
  '$skill2',
  '$skill3',
  '$skill4',
  '$other_skills',
  'New'
)
";

$result = mysqli_query($conn, $sql);

// 7. Output result
if ($result) {
    $new_id = mysqli_insert_id($conn);

    include "header.inc";
    echo "<main>";
    echo "<h2>EOI Submitted!</h2>";
    echo "<p>Your application was submitted successfully.</p>";
    echo "<p><strong>EOInumber:</strong> " . htmlspecialchars($new_id) . "</p>";
    echo "<p>Status: New</p>";
    echo "<p><a href='apply.php'>Submit another application</a></p>";
    echo "</main>";
    include "footer.inc";

} else {

    include "header.inc";
    echo "<main>";
    echo "<h2>Error submitting EOI</h2>";
    echo "<p>" . mysqli_error($conn) . "</p>";
    echo "<a href='apply.php'>Go back</a>";
    echo "</main>";
    include "footer.inc";
}

mysqli_close($conn);
?>


