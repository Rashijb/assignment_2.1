<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$mobile = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }

if(empty($_POST["mobile"]))
 {
  $error .= '<p><label class="text-danger">Mobile is required</label></p>';
 }
 else
 {
  $mobile = clean_text($_POST["mobile"]);
 }
 
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (name, email, mobile, message, subject)
VALUES ('$name', '$email', '$mobile', '$message', '$subject')";

if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

  $error = '<label class="text-success">New record created successfully </label>';
  $name = '';
  $email = '';
  $subject = '';
  $mobile = '';
  $message = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Real Programmer: Student Feedback</title>
  </head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

 {
  box-sizing: border-box;
}

.container 
{
  padding: 10px;
  background-color: white;
}

input[type=text], input[type=text]
 {
  width: 60%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=textarea], input[type=textarea]
 {
  width: 60%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

}
 {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.submitbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}



}
</style>

 <body>
  <br />
  <div class="container">
   <h2 align="center"> Student Feedback </h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <br />
     <?php if(!empty($error)) {
         echo '<div class="alert alert-success" role="alert">'.$error.'</div>';
     }
     ?>
     <div class="form-group" align="center">
      <label>Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group" align="center">
      <label>Email id</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group" align="center">
      <label>Subject</label>
      <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
     </div>
     <div class="form-group" align="center">
      <label>Mobile no</label>
      <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" value="<?php echo $mobile; ?>" />
     </div>
     <div class="form-group" align="center">
      <label>Feedback</label>
      <textarea name="message" class="form-control" placeholder="Enter Feedback"><?php echo $message; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>