<?php
// process_eoi.php
// Handles: server-side validation, sanitizing, auto table creation, insert, confirmation output

// ------------------------
// 1) Block direct access (user must come from form POST)
// ------------------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit;
}

require_once "settings.php";

// ------------------------
// 2) Connect to database
// ------------------------
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<h2>❌ Database connection failed.</h2>");
}

// ------------------------
// 3) Ensure the EOI table exists
// ------------------------
$create_sql = "
CREATE TABLE IF NOT EXISTS eoi (
  EOInumber    INT AUTO_INCREMENT PRIMARY KEY,
  job_ref      VARCHAR(10)  NOT NULL,
  first_name   VARCHAR(20)  NOT NULL,
  last_name    VARCHAR(20)  NOT NULL,
  street       VARCHAR(40)  NOT NULL,
  suburb       VARCHAR(40)  NOT NULL,
  state        ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  postcode     CHAR(4)      NOT NULL,
  email        VARCHAR(80)  NOT NULL,
  phone        VARCHAR(20)  NOT NULL,
  dob          DATE         NOT NULL,
  gender       ENUM('Male','Female','Other','Prefer not to say') DEFAULT 'Prefer not to say',
  skill1       VARCHAR(40),
  skill2       VARCHAR(40),
  skill3       VARCHAR(40),
  skill4       VARCHAR(40),
  other_skills TEXT,
  status       ENUM('New','Current','Final') DEFAULT 'New',
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
mysqli_query($conn, $create_sql);

// ------------------------
// 4) Helper Functions
// ------------------------

//cleaning input to prevent broken pages/XSS
function clean($value) {
    if (!isset($value)) return "";
    $value = trim($value);               // remove leading/trailing spaces
    $value = stripslashes($value);       // remove backslashes
    $value = htmlspecialchars($value);   // stop HTML/script execution
    return $value;
}

// Convert DOB dd/mm/yyyy → YYYY-MM-DD and verify it is a real date
function parse_dob($dob_str) {
    if (!preg_match('/^(\\d{2})\\/(\\d{2})\\/(\\d{4})$/', $dob_str, $m))
        return [false, "Date of Birth must be in format dd/mm/yyyy"];

    $day = (int)$m[1];
    $month = (int)$m[2];
    $year = (int)$m[3];

    if (!checkdate($month, $day, $year))
        return [false, "Invalid calendar date"];

    return [true, sprintf("%04d-%02d-%02d", $year, $month, $day)];
}

// Check postcode matches state (AU rule)
function postcode_matches_state($state, $pc) {
    $rules = [
        'VIC' => ['3','8'], 'NSW' => ['1','2'], 'QLD' => ['4','9'],
        'NT' => ['0'], 'ACT' => ['0'], 'SA' => ['5'],
        'WA' => ['6'], 'TAS' => ['7']
    ];
    return isset($rules[$state]) && in_array($pc[0], $rules[$state]);
}

// ------------------------
// 5) Collect + Sanitize Form Data
// ------------------------
$job_ref     = strtoupper(clean($_POST['job_ref'] ?? ""));
$first_name  = clean($_POST['first_name'] ?? "");
$last_name   = clean($_POST['last_name'] ?? "");
$street      = clean($_POST['street'] ?? "");
$suburb      = clean($_POST['suburb'] ?? "");
$state       = clean($_POST['state'] ?? "");
$postcode    = clean($_POST['postcode'] ?? "");
$email       = clean($_POST['email'] ?? "");
$phone       = clean($_POST['phone'] ?? "");
$dob_raw     = clean($_POST['dob'] ?? "");
$gender      = clean($_POST['gender'] ?? "Prefer not to say");
$skills_arr  = $_POST['skills'] ?? [];
$other_skills= clean($_POST['other_skills'] ?? "");

$errors = [];

// ------------------------
// 6) Validation Rules 
// ------------------------
if ($job_ref === "" || !preg_match('/^[A-Z]{2,4}\\d{2,4}$/', $job_ref))
    $errors[] = "Please select a valid job reference.";

if (!preg_match('/^[A-Za-z]{1,20}$/', $first_name))
    $errors[] = "First name must be letters only (max 20).";

if (!preg_match('/^[A-Za-z]{1,20}$/', $last_name))
    $errors[] = "Last name must be letters only (max 20).";

if ($street === "" || strlen($street) > 40)
    $errors[] = "Street must be ≤ 40 characters.";

if ($suburb === "" || strlen($suburb) > 40)
    $errors[] = "Suburb must be ≤ 40 characters.";

if (!in_array($state, ['VIC','NSW','QLD','NT','WA','SA','TAS','ACT']))
    $errors[] = "Invalid state selected.";

if (!preg_match('/^\d{4}$/', $postcode))
    $errors[] = "Postcode must be 4 digits.";
elseif (!postcode_matches_state($state, $postcode))
    $errors[] = "Postcode does not match selected state.";

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = "Invalid email.";

if (!preg_match('/^[0-9\s]{8,12}$/', $phone))
    $errors[] = "Phone must be 8–12 digits (spaces allowed).";

list($dob_ok, $dob_iso_or_error) = parse_dob($dob_raw);
if (!$dob_ok) $errors[] = $dob_iso_or_error;

if (!in_array($gender, ['Male','Female','Other','Prefer not to say']))
    $errors[] = "Invalid gender.";

// Convert skills[] → skill1, skill2, skill3, skill4
$skill_list = array_slice(array_map('clean', $skills_arr), 0, 4);
while (count($skill_list) < 4) $skill_list[] = "";
[$skill1,$skill2,$skill3,$skill4] = $skill_list;

// ------------------------
// 7) If validation fails → show errors
// ------------------------
if (!empty($errors)) {
    echo "<h2>⚠ Submission Errors</h2><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><p><a href=\"apply.php\">Go Back</a></p>";
    exit;
}

// ------------------------
// 8) Insert Record
// ------------------------
$sql = "INSERT INTO eoi
(job_ref, first_name, last_name, street, suburb, state, postcode, email, phone, dob, gender, skill1, skill2, skill3, skill4, other_skills, status)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, 'New')";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssssssssss",
  $job_ref, $first_name, $last_name, $street, $suburb, $state, $postcode,
  $email, $phone, $dob_iso_or_error, $gender,
  $skill1, $skill2, $skill3, $skill4,
  $other_skills
);
mysqli_stmt_execute($stmt);

// ------------------------
// 9) Show Confirmation Page
// ------------------------
$new_id = mysqli_insert_id($conn);
echo "<h2>✅ EOI Submitted Successfully</h2>";
echo "<p>Your EOInumber is: <strong>$new_id</strong></p>";
echo "<p>Status: New</p>";
echo "<p><a href=\"index.php\">Return Home</a></p>";

mysqli_close($conn);
?>
