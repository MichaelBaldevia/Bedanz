<?php 
include('includes/Functions.php');
$conn = mysqli_connect($servername, $username, $password,  $dbname);
     $result = mysqli_query($conn,"SELECT * FROM `teams` ORDER BY Name ASC"); 

 if (!isJudge()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: Login.php');
}
?>

<html>
<head>
<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
* {
  margin:0px;
  box-sizing: border-box;
}
body{
    height:100%;
    margin:0;
}
.background{
    width: 100%;
    min-height: 100vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background-color: black;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    z-index: 1;
}
.background::before{
    content: "";
    display: block;
    position: absolute;
    z-index: -1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(255, 255, 255, 0.22);
    background-image: url(images/picture1.jpg);
}
.error {color: #FF0000;}
.container{
}

</style>
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
<link rel="stylesheet" type="text/css" href="css/button.css">
<link rel="stylesheet" type="text/css" href="css/styledrop.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body> 
<div>
    <div style="margin:0 auto;left:50%;top:50%;text-align: center;">
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <button type="submit" name="LogOut" class="skew-button1" value="LogOut" style="left:45%;margin-top:30px">
     <span>Log Out</span>
     </button> 
   </form>
    <img src="images/bedanz-icon.png">
    </div>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table class="container">
  <thead>
    <div style="margin:0 auto;left:50%;top:50%;text-align: center;">
    <h2 style="display: inline-block">Chose the team:</h2>
    <select name='TeamID' id="sources" class="custom-select sources" placeholder="Team" style="display: inline-block;" >
    <?php
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['Id'] ."'>" . $row['Name'] ."</option>";
}
?>
</select>
</div>
    
    <tr>
      <th><h1>Criteria</h1> </th>

      <th><h1>Score %</h1></th>
      <th><h1>Grade</h1></th>
   
    </tr>
  </thead>
 
  <tbody>
    <tr>
      <td><b>Performance:</b>
       <br>
       <p>Choreography, Synchronization, Transitions, Formations</p>
       </td>
       <td>40%</td>
       <td><input type="number" name="perfromance" value="<?php echo $name;?>"></td>
    </tr>
    <tr>
      <td> <b>Skill:</b>
       <br>
       <p>Proper execution of Choreography and Intensity/Difficulty of Dance Routine
       </p>
      </td>
      <td>35%</td>
      <td><input type="number" name="skill" value="<?php echo $name;?>"></td>

   </tr> 
    <tr>
      <td><b>Creativity and Originality:</b>
       <br>
       <p>Incoporating Unique and Original/Creative moves and a Distinct and Eye-Catching Concept</p>
      </td>
      <td>15%</td>
      <td><input type="number" name="creativityandoriginality" value="<?php echo $name;?>"></td>
     
    </tr>
    <tr>
      <td><b>Audience Impact:</b>
       <br>
       <p>Entertainment Value and Crowd Appeal</p>
      </td>
      <td>10%</td>
      <td><input type="number" name="audienceimpact" value="<?php echo $name;?>"></td>

    </tr>
  </tbody>
</table>
     <div style="margin:0 auto;left:50%;top:50%;text-align: center;">
   <button type="submit" name="submit" class="skew-button" value="Submit" style="left:45%">
     <span>SUBMIT</span>
     </button>
     </div>
     
</form>
<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Performance: 
  <br><br>
  Skill: <input type="text" name="skill" value="<?php echo $email;?>">
  <br><br>
  Creativity and Originality: <input type="text" name="creativityandoriginality" value="<?php echo $website;?>">
 
  <br><br>
  Audience Impact: <input type="text" name="audienceimpact" value="<?php echo $website;?>">
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  

  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
 -->
<?php
/*echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;*/
?>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/indexdrop.js"></script>
</body>
</html>