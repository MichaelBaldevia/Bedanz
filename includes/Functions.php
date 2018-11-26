<?php
include 'config.php';
session_start();
$conn = mysqli_connect($servername, $username, $password,  $dbname);

$Input_Errors = []; 
$Performance_Error = $Skill_Error = $audienceimpact_Error = $Creativity_And_Originality_Error = "";
$Performance = $Skill =  $Audience_Impact = $Creativity_And_Originality = 0;
$Submission = $Clothing = $Routine = $Late_Start = $Language = $Gestures = $Props = $Falls = 0;
$TeamID = 0;

  if (isset($_POST['submit'])) {
    Scoring();
  }
   if (isset($_POST['deductionsubmit'])) {
    Deduction();
  }
if (isset($_POST['LogIn'])) {
		Login();
	}
if (isset($_POST['LogOut'])) {
		LogOut();
	}
 function  Scoring() {
    global $Performance_Error , $Skill_Error , $Audience_Impact_Error , $Creativity_And_Originality_Error, $Performance , $Skill ,  $Audience_Impact ,$Creativity_And_Originality,$conn,$Input_Errors,$TeamID;
     
      if (empty($_POST["TeamID"])) {
       push_error("The team is Required");
      } else {
        if(is_numeric($_POST["TeamID"])){
          $TeamID = test_input($_POST["TeamID"]);      
        }
    }

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
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = mysqli_query($conn,"SELECT * FROM `team_scoring` WHERE Judge_Id = '" . $_SESSION['user']['Id'] . "' AND Team_Id = $TeamID");

$sql = "INSERT INTO `team_scoring`(`Team_Id`,Judge_Id, `Performance`, `Skill`, `Creativity_and_Originality`, `Audience_Impact`, `Comments`) VALUES ( $TeamID, '" . $_SESSION['user']['Id'] . "',$Performance,$Skill,$Creativity_And_Originality,$Audience_Impact,'Default Sample')";
if (count($Input_Errors) == 0){
	if (mysqli_affected_rows($conn)  > 0) {
		  echo "The Team has already been deducted points";
	}
	else {
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
}
  else {
    display_error();
  }
}


function  Deduction() {
    global $Performance_Error , $Skill_Error , $Audience_Impact_Error , $Creativity_And_Originality_Error, $Performance , $Skill ,  $Audience_Impact ,$Creativity_And_Originality,$conn,$Input_Errors;

    if (empty($_POST["TeamID"])) {
       push_error("The team is Required");
      } else {
        if(is_numeric($_POST["TeamID"])){
          $TeamID = test_input($_POST["TeamID"]);      
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


$query = mysqli_query($conn,"SELECT * FROM `team_deduction` WHERE Team_Id = $TeamID");

$sql = "INSERT INTO `team_deduction`( `Team_Id`, `Late_Submission`, `Clothing_or_Props_Thrown`, `Routine_Length`, `Late_Start`, `Improper_Language`, `Lewd_Gestures`, `Damage_Incurring_Props`, `Falls_Trips_Tumbles`) VALUES ( $TeamID,$Submission,$Clothing,$Routine,$Late_Start,$Language,$Gestures,$Props,$Falls)";

if (count($Input_Errors) == 0){
	if (mysqli_affected_rows($conn)  > 0) {
		  echo "The Team has already been deducted points";
	}
else {
	 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
 
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


function Login(){
global $Input_Errors,$conn;
// grap form values
$username = $_POST['Username'];
$password = $_POST['Password'];
// make sure form is filled properly

if (empty($_POST['Username'])) {
	 push_error("Username is required");

}
if (empty($_POST['Password'])) {
	push_error("Password is required");
}


if (count($Input_Errors) == 0) {

$query = "SELECT * FROM judge WHERE User_Name='$username' AND
Password='$password' LIMIT 1";
$results = mysqli_query($conn, $query);

if (mysqli_num_rows($results) == 1) { // user found

$logged_in_user = mysqli_fetch_assoc($results);
if ($logged_in_user['User_Type'] == 'judge') {

$_SESSION['user'] = $logged_in_user;

$_SESSION['success']  = "You are now logged in";
header('location: index.php');
}
else if ($logged_in_user['User_Type'] == 'bedanz') {
$_SESSION['user'] = $logged_in_user;
$_SESSION['success']  = "You are now logged in";
header('location: Deductionindex.php');
}
}else {
push_error("Wrong username/password combination");
}
}
}



function isJudge()
{
if ($_SESSION['user']['User_Type'] == 'judge' ) {
return true;
}else{
return false;
}
}
function isBedanz()
{
if ($_SESSION['user']['User_Type']  == "bedanz" ) {
return true;
}else{
return false;
}
}
function LogOut() {
	session_destroy();
	header('location: Login.php');
}
?>