<?php 
include('Functions.php');
?>

<html>
<head>
<style>

.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="Cssfortable.css">
</head>
<body>  <!-- 
<h2>Created with love by <a href="http://pablogarciafernandez.com" target="_blank">Pablo García Fernández</a></h2> -->


<!-- <p><span class="error">Performance</span></p>
<p><span class="error">Choreography, Synchronization, Transitions, Formations</span></p> -->
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table class="container">
  <thead>
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

  <p>Point Deduction Table</p>

<table class="container">
  <thead>
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
       <td> <input type="radio" name="gender"></td>
    </tr>
    <tr>
      <td> Clothing/Props tossed into audience
       <br>
   
      </td>
      <td>0.05%</td>
      <td><input type="radio" name="gender"></td>

   </tr>
    <tr>
      <td>Routine Length (Over of Under Limit)
       <br>
      </td>
      <td>0.05%</td>
      <td><input type="radio" name="gender"></td>
     
    </tr>
    <tr>
      <td>Late Start (Failure to appear within 20 seconds)
       <br>
      </td>
      <td>0.05%</td>
      <td><input type="radio" name="gender"></td>

    </tr>
      <tr>
      <td>Music Containing Improper language and Lyrics
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="radio" name="gender"></td>

    </tr>
     <tr>
      <td>Lewd gestures and movements
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="radio" name="gender"></td>

    </tr>
     <tr>
      <td>User of props that may damage the stage or may affect other groups' performance
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="radio" name="gender"></td>

    </tr>
       <tr>
      <td>Falls,trips and/or tumbles
       <br>     
      </td>
      <td>0.10%</td>
      <td><input type="radio" name="gender"></td>

    </tr>
  </tbody>
</table>


<input type="submit" name="submit" value="Submit">  
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

</body>
</html>