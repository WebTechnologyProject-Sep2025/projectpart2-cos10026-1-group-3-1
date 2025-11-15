<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexora Tech</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="icon" type="image/png" href="../favicon/favicon.png">
</head>


<body>
  <!-- NỘI DUNG DƯỚI NÀYYYYY -->
  <?php include "header.inc"; ?>
  <main>
    <section id="slogan">
      <div class="slogan-inner">
        <h1>Your future in technology starts here.</h1>
        <p>Submit your application — we’ll get back to you soon.</p>
      </div>
    </section>

    <section>
      <h2 class="headings">Job Application Form</h2>
      <form method="post" action="process_eoi.php" novalidate=”novalidate”>

        <!-- Job reference: dropdown with all refs -->
        <label>Job Reference Number:</label>
        <select name="job_ref" required>
          <option value="">-- Select Job Reference --</option>
          <option value="UI456">UI456 - UI/UX Designer</option>
          <option value="DB789">DB789 - Database Developer</option>
          <option value="WEB12">WEB12 - Web Developer</option>
        </select><br>

        <!-- First/Last name: alpha only, max 20 -->
        <label>First Name:</label>
        <input type="text" name="first_name" maxlength="20" required pattern="^[A-Za-z]{1,20}$"
          title="Letters only, up to 20"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" maxlength="20" required pattern="^[A-Za-z]{1,20}$"
          title="Letters only, up to 20"><br>

        <!-- DOB: dd/mm/yyyy -->
        <label>Date of Birth (dd/mm/yyyy):</label>
        <input type="text" name="dob" placeholder="dd/mm/yyyy" required
          pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/(19|20)\d{2}$"
          title="Use format dd/mm/yyyy (e.g., 05/09/2006)"><br>

        <!-- Gender: radios within fieldset/legend -->
        <fieldset>
          <legend>Gender:</legend>
          <label><input type="radio" name="gender" value="Male" required> Male</label>
          <label><input type="radio" name="gender" value="Female"> Female</label>
          <label><input type="radio" name="gender" value="Other"> Other</label>
        </fieldset><br>

        <!-- Street/Suburb: max lengths -->
        <label>Street Address:</label>
        <input type="text" name="street" maxlength="40" required><br>

        <label>Suburb/Town:</label>
        <input type="text" name="suburb" maxlength="40" required><br>

        <!-- State: exactly these options -->
        <label>State:</label>
        <select name="state" id="state" required>
          <option value="">-- Select State --</option>
          <option value="VIC">VIC</option>
          <option value="NSW">NSW</option>
          <option value="QLD">QLD</option>
          <option value="NT">NT</option>
          <option value="WA">WA</option>
          <option value="SA">SA</option>
          <option value="TAS">TAS</option>
          <option value="ACT">ACT</option>
        </select><br>

        <!-- Postcode: exactly 4 digits, plus state↔postcode check via JS -->
        <label>Postcode:</label>
        <input type="text" name="postcode" id="postcode" required pattern="^\d{4}$" title="Exactly 4 digits"><br>

        <!-- Email format -->
        <label>Email Address:</label>
        <input type="email" name="email" required><br>

        <!-- Phone: 8–12 digits or spaces only -->
        <label>Phone Number:</label>
        <input type="text" name="phone" required pattern="^[0-9 ]{8,12}$"
          title="8–12 characters: digits and spaces only"><br>

        <!-- Required Technical Skills: checkboxes -->
        <label>Required Technical Skills:</label><br>
        <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
        <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
        <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
        <label><input type="checkbox" name="skills[]" value="Python"> Python</label>
        <label><input type="checkbox" name="skills[]" value="Other" id="skillOther"> Other</label>
        <br>

        <!-- Other skills: must not be empty if 'Other' is checked -->
        <label>Other Skills:</label><br>
        <textarea name="other_skills" id="otherSkills" rows="4" cols="40"
          placeholder="Describe other skills if you checked ‘Other’."></textarea><br>
        <button type="reset">Reset </button>
        <label><input type="checkbox" name="Agree[]" value="Agree" required> I agree with the informations</label>
        <button type="submit">Submit</button>
      </form>
    </section>
  </main>
  <?php include "footer.inc"; ?>
</body>

</html>