<?php

error_reporting(E_ERROR | E_PARSE);

session_start();

@include 'config.php';

if (isset($_POST['submit'])) {

   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $mname = mysqli_real_escape_string($conn, $_POST['mname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $yearLevel = $_POST['yearLevel'];
   $semester = $_POST['semester'];
   $course = $_POST['course'];
   $major = $_POST['major'];
   $campus = $_POST['campus'];

   $select = " SELECT * FROM students WHERE firstName = '$fname' && lastName = '$lname' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $error[] = 'You already enrolled!';
   } else {
      $insert = "INSERT INTO students (firstName, middleName, lastName, email, yearLevel, semester, course, major, campus) VALUES ('$fname', '$mname', '$lname','$email','$yearLevel','$semester' ,'$course' ,'$major' ,'$campus')";
      mysqli_query($conn, $insert);
      $success[] = 'You Pre Enrolled Successfully!';
      // sleep(5);
      // header('location:index.php');
   }
};


// Email Confirmation
/*

// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the FPDF library
require('fpdf/fpdf.php');
require 'vendor/autoload.php';

// Get the enrollee's name and email address from the form data submitted
$name = $_POST['name'];
$email = $_POST['email'];

// Generate the PDF file with the enrollee's name
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Enrollment Form for ' . $name, 0, 1);
$pdf->Output('enrollment_form.pdf', 'F');

// Set up PHPMailer with your email server details
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // Replace with your SMTP server address
$mail->SMTPAuth = true;
$mail->Username = 'smtp@example.com'; // Replace with your SMTP account username
$mail->Password = 'password'; // Replace with your SMTP account password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set the email details
$mail->setFrom('from@example.com'); // Replace with your email address
$mail->addAddress($email); // Replace with the enrollee's email address
$mail->Subject = 'Enrollment Form for ' . $name;
$mail->Body = 'Dear ' . $name . ', please find attached your enrollment form.';
$mail->addAttachment('enrollment_form.pdf', 'Enrollment Form.pdf');

// Send the email
$mail->send();

*/



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>NEMSU Enrollment System</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" type="image/x-icon" href="/img/education.png">

</head>

<body>
   <div class="bg">
      <img src="img/nemsu-news.png" alt="">
      <img src="img/nemsu-news.png" alt="">
   </div>
   <div class="form-container">

      <form action="" method="post" onsubmit="return validateForm()">
         <img src="img/logo.jpg" alt="">
         <h3>NEMSU Pre-Enrollment System</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . ' </span>';
            };
         } elseif (isset($success)) {
            foreach ($success as $success) {
               echo '<span class="success-msg">' . $success . ' </span>';
            };
         };
         ?>
         <input type="text" name="fname" required placeholder="First Name" id="firstName">
         <input type="text" name="mname" required placeholder="Middle Name">
         <input type="text" name="lname" required placeholder="Last Name" id="lastName">
         <input type="email" name="email" required placeholder="Enter Email">

         <select id="category" name="yearLevel" required>
            <option value="" disabled selected>Year Level</option>
            <option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
            <option value="Fourth Year">Fourth Year</option>
            <option value="Graduate School">Graduate School</option>
         </select>

         <select id="category" name="semester" required>
            <option value="" disabled selected>Semester</option>
            <option value="First Semester">First Semester</option>
            <option value="Second Semester">Second Semester</option>
         </select>

         <select id="course" name="course" required>
            <option value="" disabled selected>Select Course</option>
            <option value="Business">Business Administration</option>
            <option value="Engineering">College of Engineering</option>
            <option value="Computer_Studies">Computer Studies</option>
            <option value="Criminology">Criminology</option>
            <option value="Education">Teacher Education</option>
         </select>

         <div id="major-container" hidden>
            <select id="major" name="major">
               <option value="" disabled selected>Select a Major</option>
               <!-- majors for selected course will be added dynamically here -->
            </select>
         </div>

         <select id="category" name="campus" required>
            <option value="" disabled selected>Select Campus</option>
            <option value="Bislig">Bislig</option>
            <option value="Cagwait">Cagwait</option>
            <option value="Cantilan">Cantilan</option>
            <option value="Lianga">Lianga</option>
            <option value="San Miguel">San Miguel</option>
            <option value="Tagbina">Tagbina</option>
            <option value="Tandag">Tandag (Main)</option>
         </select>



         <input type="submit" name="submit" value="enroll now" class="form-btn" id="enroll">
         <p>Developed by <a href="#">John Lloyd Bongcales</a></p>
      </form>

   </div>

   <script src="app.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>


<?php
session_destroy();
?>