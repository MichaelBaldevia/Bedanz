<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


  if (isset($_POST['submit'])) {
    Scoring();
  }

 function  Scoring() {
  global $nameErr, $emailErr, $genderErr, $websiteErr ,$name , $email , $gender , $comment ,$website;
  if (empty($_POST["perfromance"])) {
    $nameErr = "Name is required";
  } else {
    if(is_numeric($_POST["perfromance"])){
          $name = test_input($_POST["perfromance"]);
    // check if name only contains letters and whitespace
   /* if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }*/
   /* echo '<pre>';
    die(var_dump($name));
    echo '</pre>';*/
    }
  }
  
  if (empty($_POST["skill"])) {
    $emailErr = "Email is required";
  } else {
       if(is_numeric($_POST["skill"])){
    $email = test_input($_POST["skill"]);
    // check if e-mail address is well-formed
   /* if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }*/
  }
   } 
  if (empty($_POST["creativityandoriginality"])) {
    $website = "";
  } else {
     if(is_numeric($_POST["creativityandoriginality"])){
    $website = test_input($_POST["creativityandoriginality"]);
  /*  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }*/
  }
}
  if (empty($_POST["audienceimpact"])) {
    $comment = "";
  } else {
     if(is_numeric($_POST["audienceimpact"])){
    $comment = test_input($_POST["audienceimpact"]);
  }
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = intval($data);
  return $data;
}
?>