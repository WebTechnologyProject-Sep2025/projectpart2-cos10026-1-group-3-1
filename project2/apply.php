<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexora Tech</title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<?php include "header.inc"; ?>
<body>
<!-- NỘI DUNG DƯỚI NÀYYYYY -->
<section id="slogan">
  <div class="slogan-inner">
    <h1>Your future in technology starts here.</h1>
    <p>Submit your application — we’ll get back to you soon.</p>
  </div>
</section>
  <main>
    <section>
      <h2 class="headings">Job Application Form</h2>
<form method="post" action="process_eoi.php" novalidate="novalidate">

    <label>Job Reference Number:</label>
    <select name="job_ref" required>
        <option value="">-- Select Job Reference --</option>
        <option value="UI456">UI456 - UI/UX Designer</option>
        <option value="DB789">DB789 - Database Developer</option>
        <option value="WEB12">WEB12 - Web Developer</option>
    </select><br>

    <label>First Name:</label>
    <input type="text" name="first_name" maxlength="20"><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" maxlength="20"><br>

    <label>Date of Birth (dd/mm/yyyy):</label>
    <input type="text" name="dob" placeholder="dd/mm/yyyy"><br>

    <fieldset>
        <legend>Gender:</legend>
        <label><input type="radio" name="gender" value="Male"> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
        <label><input type="radio" name="gender" value="Other"> Other</label>
    </fieldset><br>

    <label>Street Address:</label>
    <input type="text" name="street" maxlength="40"><br>

    <label>Suburb/Town:</label>
    <input type="text" name="suburb" maxlength="40"><br>

    <label>State:</label>
    <select name="state">
    <option value="">-- Select State --</option>
    <option value="NSW">New South Wales (NSW)</option>
    <option value="QLD">Queensland (QLD)</option>
    <option value="VIC">Victoria (VIC)</option>
    <option value="WA">Western Australia (WA)</option>
    <option value="SA">South Australia (SA)</option>
    <option value="TAS">Tasmania (TAS)</option>
    <option value="ACT">Australian Capital Territory (ACT)</option>
    <option value="NT">Northern Territory (NT)</option>
    </select><br>


    <label>Postcode:</label>
    <input type="text" name="postcode"><br>

    <label>Email Address:</label>
    <input type="text" name="email"><br>

    <label>Phone Number:</label>
    <input type="text" name="phone"><br>

    <label>Required Technical Skills:</label><br>
    <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
    <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
    <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
    <label><input type="checkbox" name="skills[]" value="Python"> Python</label>
    <br>

    <label>Other Skills:</label><br>
    <textarea name="other_skills" rows="4" cols="40"></textarea><br>

    <button type="submit">Apply</button>
    <button type="reset">Reset</button>

</form>
    </section>
  </main>
  <?php include "footer.inc"; ?>
</body>
</html>

