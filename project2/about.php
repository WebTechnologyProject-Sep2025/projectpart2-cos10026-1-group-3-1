<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexora Tech</title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <?php include "header.inc"; ?>
  <!-- NỘI DUNG DƯỚI NÀYYYYY -->
  <main>
    <!--slogan -->
    <section id="slogan">
      <div class="slogan">
        <h1>Your future in technology starts here.</h1>
      </div>
    </section>
    <!-- intro -->
    <section id="IntroHeading">
      <div class="IntroHead">
        <h1>About Us</h1>
        <h2>This is the Web Technology Project for the course COS10026.1</h2>
        <p>We are a team of four students from Swinburne University of Technology, currently enrolled in the COS10026.1
          course. This project is a part of our coursework, where we apply our knowledge and skills in web development
          to create a functional and user-friendly website for Nexora Tech.</p>
      </div>
    </section>
    <!--about-->
    <section id="AboutHeading">
      <div class="ABHead">
        <h2 class="team-heading">Meet Our Team</h2>
        <ul class="team">
          <li>
            <span class="name">Lê Thanh Hoàng Minh (Team Leader) - COS10026.1;</span>
            <a href="mailto:106216845@student.swin.edu.au">106216845@student.swin.edu.au</a>
            <span class="student-id">106216845</span>
          </li>
          <li>
            <span class="name">Nguyễn Minh Khang - COS10026.1;</span>
            <a href="mailto:106216803@student.swin.edu.au">106216803@student.swin.edu.au</a>
            <span class="student-id">106216846</span>
          </li>
          <li>
            <span class="name">Nguyễn Anh Vũ - COS10026.1;</span>
            <a href="mailto:106221920@student.swin.edu.au">106221920@student.swin.edu.au</a>
            <span class="student-id">106221920</span>
          </li>
          <li>
            <span class="name">Bùi Trương Quỳnh Anh - COS10026.1;</span>
            <a href="mailto:105732191@student.swin.edu.au">105732191@student.swin.edu.au</a>
            <span class="student-id">105732191</span>
          </li>
        </ul>
      </div>
    </section>
    <!--Featured Joba-->
    <section class="team-roles-container">
      <div class="team-roles">
        <h2>Team Roles</h2>
        <dl>
          <div class="team-role">
            <dt>Lê Thanh Hoàng Minh - About Us Page</dt>
            <dd>Responsible for designing and structuring the About Us page, ensuring the company's story, mission, and
              values are communicated clearly and engagingly.</dd>
          </div>

          <div class="team-role">
            <dt>Nguyễn Minh Khang - Application Job Page</dt>
            <dd>Designed and developed the job application page, focusing on a seamless user experience and a clean,
              functional interface for applicants.</dd>
          </div>

          <div class="team-role">
            <dt>Nguyễn Anh Vũ - Job Description Page</dt>
            <dd>Created the job description page with a focus on clarity, readability, and structured information to
              help candidates understand roles effectively.</dd>
          </div>

          <div class="team-role">
            <dt>Bùi Trương Quỳnh Anh - Home Page</dt>
            <dd>Built the homepage to highlight the company's identity, core services, and first impression, ensuring an
              attractive and welcoming design.</dd>
          </div>
        </dl>
      </div>
    </section>
    <!--Team Skills-->
    <section id="AboutHeading">
      <h2>Team Skills</h2>
      <table>
        <tr>
          <th>Name</th>
          <th>Programming Skills</th>
          <th>Experience Level</th>
        </tr>
        <tr>
          <td>Lê Thanh Hoàng Minh</td>
          <td>HTML, CSS</td>
          <td>Beginner</td>
        </tr>
        <tr>
          <td>Nguyễn Minh Khang</td>
          <td>HTML, CSS</td>
          <td>Beginner</td>
        </tr>
        <tr>
          <td>Nguyễn Anh Vũ</td>
          <td>HTML, CSS</td>
          <td>Beginner</td>
        </tr>
        <tr>
          <td>Bùi Trương Quỳnh Anh</td>
          <td>HTML, CSS</td>
          <td>Beginner</td>
        </tr>
      </table>
      <!-- GROUP PHOTO -->
      <section id="GroupPhoto" class="group-photo-section clearfix">
        <h2>Group Photo</h2>
        <figure class="group-figure">
          <img src="../images/group-photo.jpg" alt="Nexora Tech — Group Photo" loading="lazy">
          <figcaption>Our team — COS10026.1 (Nexora Tech)</figcaption>
        </figure>
        <div class="group-summary">
          <h3>Nexora Tech — COS10026.1</h3>
          <p>
            We build a clean, responsive website showcasing our team, roles, and job application flow.
            Below is a quick snapshot of the project and who did what.
          </p>
          <ul class="group-bullets">
            <li><strong>Project:</strong> Nexora Tech Website (index, about, careers).</li>
            <li><strong>Tech:</strong> HTML5, CSS3, responsive layout, accessibility basics.</li>
            <li><strong>Team Lead:</strong> Lê Thanh Hoàng Minh.</li>
            <li><strong>Members:</strong> Nguyễn Minh Khang, Nguyễn Anh Vũ, Bùi Trương Quỳnh Anh</li>
            <li><strong>Tutor:</strong> Mr. Hoàng Nguyễn.</li>
          </ul>
          <div class="group-cta">
            <a class="button-contact" href="mailto:106216845@student.swin.edu.au">Contact us</a>
          </div>
        </div>
      </section>
      <!-- Tutor Info -->
      <section class="tutor-container">
        <h2>Tutor's Name</h2>
        <p class="tutor">
          <strong>Mr. Hoàng Nguyễn</strong> — Lecturer for COS10026.1; 7-10 AM<br>
          Email: <a href="mailto:hnguyen6@swin.edu.au">hnguyen6@swin.edu.au</a>
        </p>
      </section>
  </main>
  <?php include "footer.inc"; ?>
</body>

</html>