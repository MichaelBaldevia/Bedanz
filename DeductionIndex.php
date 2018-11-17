<?php 
include('includes/Functions.php');
$conn = mysqli_connect($servername, $username, $password,  $dbname);
  $result = mysqli_query($conn,"SELECT * FROM `teams`"); 
?>

<html>
<head>
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
}
.error {color: #FF0000;}
.container{
}
</style>
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
<link rel="stylesheet" type="text/css" href="css/button.css">
</head>
<body> 
<div>
    <div style="margin:0 auto;left:50%;top:50%;">
    <img src="images/bedanz-icon.png">
    </div>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>Point Deduction Table</p>


  <table class="container">
  <thead>
      <h2>Chose the team</h2>
    <?php
    echo "<select name='TeamID'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['Id'] ."'>" . $row['Name'] ."</option>";
}
echo "</select>"; ?>
    <tr>
      <th><h1>Violation</h1> </th>

      <th><h1>Score %</h1></th>
      <th><h1>Judgement</h1></th>
   
    </tr>
  </thead>
 
  <tbody>
    <tr>
      <td>Late Submission of music
       <br>
       </td>
       <td>0.05%</td>
       <td> <input type="checkbox" name="Submission" value="1"></td>
    </tr>
    <tr>
      <td> Clothing/Props tossed into audience
       <br>
   
      </td>
      <td>0.05%</td>
      <td><input type="checkbox" name="Clothing" value="1"></td>

   </tr>
    <tr>
      <td>Routine Length (Over of Under Limit)
       <br>
      </td>
      <td>0.05%</td>
      <td><input type="checkbox" name="Routine" value="1"></td>
     
    </tr>
    <tr>
      <td>Late Start (Failure to appear within 20 seconds)
       <br>
      </td>
      <td>0.05%</td>
      <td><input type="checkbox" name="Late_Start" value="1"></td>

    </tr>
      <tr>
      <td>Music Containing Improper language and Lyrics
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="checkbox" name="Language" value="1"></td>

    </tr>
     <tr>
      <td>Lewd gestures and movements
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="checkbox" name="Gestures" value="1"></td>

    </tr>
     <tr>
      <td>User of props that may damage the stage or may affect other groups' performance
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="checkbox" name="Props" value="1"></td>

    </tr>
       <tr>
      <td>Falls,trips and/or tumbles
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="checkbox" name="Falls" value="1"></td>

    </tr>
  </tbody>
</table>


     <button type="submit" name="deductionsubmit" class="skew-button" value="Submit">
     <span>SUBMIT</span>
     </button> 
     
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

</body>
</html>