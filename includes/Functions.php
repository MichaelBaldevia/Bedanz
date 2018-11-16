<?php
include 'config.php';
$conn = mysqli_connect($servername, $username, $password,  $dbname);

$Input_Errors = []; 
$Performance_Error = $Skill_Error = $audienceimpact_Error = $Creativity_And_Originality_Error = "";
$Performance = $Skill =  $Audience_Impact = $Creativity_And_Originality = "";
$Submission = $Clothing = $Routine = $Late_Start = $Language = $Gestures = $Props = $Falls = 0;


  if (isset($_POST['submit'])) {
    Scoring();
  }

 function  Scoring() {
    global $Performance_Error , $Skill_Error , $Audience_Impact_Error , $Creativity_And_Originality_Error, $Performance , $Skill ,  $Audience_Impact ,$Creativity_And_Originality,$conn,$Input_Errors;
    if (empty($_POST["perfromance"])) {
       push_error("Score for Performance is Required");
      } else {
        if(is_numeric($_POST["perfromance"])){
          $Performance = test_input($_POST["perfromance"]);      
        }
    }
  
   if (empty($_POST["skill"])) {
      push_error("Score for Skill is Required");
    } else {
        if(is_numeric($_POST["skill"])){
          $Skill = test_input($_POST["skill"]);
          }
      } 
    if (empty($_POST["creativityandoriginality"])) {
       push_error("Score for Creativity and Originality is Required");
    } else {
        if(is_numeric($_POST["creativityandoriginality"])){
          $Creativity_And_Originality = test_input($_POST["creativityandoriginality"]);
        }
      }
    if (empty($_POST["audienceimpact"])) {
      push_error("Score for Audience Impact is Required");
    } else {
        if(is_numeric($_POST["audienceimpact"])){
          $Audience_Impact = test_input($_POST["audienceimpact"]);
        }
      }
    if (empty($_POST["Submission"])) {
      $Submission = 0;
    } else {
        if(is_numeric($_POST["Submission"])){
          $Submission = test_input($_POST["Submission"]);
        }
      }
    if (empty($_POST["Clothing"])) {
      $Clothing = 0;
    } else {
       if(is_numeric($_POST["Clothing"])){
          $Clothing = test_input($_POST["Clothing"]);
        }
      }
    if (empty($_POST["Routine"])) {
      $Routine = 0;
    } else {
        if(is_numeric($_POST["Routine"])){
          $Routine = test_input($_POST["Routine"]);
        }
      }
    if (empty($_POST["Late_Start"])) {
     $Late_Start = 0;
    } else {
        if(is_numeric($_POST["Late_Start"])){
          $Late_Start = test_input($_POST["Late_Start"]);
        }
      }
  
    if (empty($_POST["Language"])) {
      $Language = 0;
    } else {
        if(is_numeric($_POST["Language"])){
          $Language = test_input($_POST["Language"]);
        }
      }

    if (empty($_POST["Gestures"])) {
      $Gestures = 0;
    } else {
        if(is_numeric($_POST["Gestures"])){
          $Gestures = test_input($_POST["Gestures"]);
        }
    }

    if (empty($_POST["Props"])) {
      $Props = 0;
    } else {
        if(is_numeric($_POST["Props"])){
          $Props = test_input($_POST["Props"]);
        }
    }

    if (empty($_POST["Falls"])) {
      $Falls = 0;
    } else {
        if(is_numeric($_POST["Falls"])){
          $Falls = test_input($_POST["Falls"]);
        }
    }
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `team_scoring`(`Team_Id`, `Performance`, `Skill`, `Creativity_and_Originality`, `Audience_Impact`, `Late_Submission`, `Clothing_or_Props_Thrown`, `Routine_Length`, `Late_Start`, `Improper_Language`, `Lewd_Gestures`, `Damage_Incurring_Props`, `Falls_Trips_Tumbles`, `Comments`) VALUES ('Default Sample',$Performance,$Skill,$Creativity_And_Originality,$Audience_Impact,$Submission,$Clothing,$Routine,$Late_Start,$Language,$Gestures,$Props,$Falls,'Default Sample')";
if (count($Input_Errors) == 0){
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
  else {
    display_error();
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = intval($data);
  return $data;
}
function test_progress($date) {
   echo '<pre>';
        die(var_dump($date));
        echo '</pre>';
}
function push_error($Error){
  global $Input_Errors;
  array_push($Input_Errors, $Error);
}
function display_error() {
   global $Input_Errors;
   foreach ($Input_Errors as $value) {
    echo "$value <br>";
}
  
}
?>