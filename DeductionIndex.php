<?php 
include('includes/Functions.php');
$conn = mysqli_connect($servername, $username, $password,  $dbname);
  $result = mysqli_query($conn,"SELECT * FROM `teams` ORDER BY Name ASC"); 

  if (!isBedanz()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: Login.php');
}
?>

<html>
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
</div>

</body>
</html>