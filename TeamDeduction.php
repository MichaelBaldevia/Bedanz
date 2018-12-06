<?php 
include('includes/Functions.php');
        //Table for users
include('AdminHeader.php');    
        $servername = "localhost";
$username = "root";
$password = "";
$db = "bedanz";


        $con=mysqli_connect($servername,$username,$password,$db);
        $result = mysqli_query($con,"
                SELECT *, team_deduction.Id as DeductionId ,teams.Name as TeamName FROM `team_deduction`  INNER JOIN teams ON team_deduction.Team_Id = teams.Id;
                
                ");

            if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: Login.php');
}
                ?>

<html>
<head>
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
<link rel="stylesheet" type="text/css" href="css/button.css">
<link rel="stylesheet" type="text/css" href="css/styledrop.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style>

.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
</head>
<body>
 <h1><span class="blue"></span>Score<span class="blue"></span> <span class="yellow">Table</span></h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <button type="submit" name="LogOut" class="skew-button1" value="LogOut" style="left:45%;margin-top:30px">
     <span>Log Out</span>
     </button> 
   </form>
<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='bootstrap/js/bootstrap.min.js'></script> 
<script src='bootbox.min.js'></script>
<table class="container">




  <tr style=color:black, text-align: left;>
   <th style='width:500px;text-align: left;'>Team Name</th>
   <th style='width:300px;text-align: left;'>Late Submission</th>
   <th style='width:300px;text-align: left;'>Clothing of Props Thrown</th>
   <th style='width:300px;text-align: left;'>Routine Length</th>
   <th style='width:300px;text-align: left;'>Late Start</th>
   <th style='width:300px;text-align: left;'>Improper Language</th>
   <th style='width:300px;text-align: left;'>Lewd Gestures</th>
   <th style='width:300px;text-align: left;'>Damage Incurring Proprs</th>
   <th style='width:300px;text-align: left;'>Falls, Trips, Tumble</th>
   <th style='width:300px;text-align: left;'>Delete</th>
   <th style='width:100px;text-align: left;'>Id</th>
 </tr>
 <?php
while($row = mysqli_fetch_array($result)) {


    echo "<tr style=color:black;>";
    echo "<td style='width:200px;'>" . $row['TeamName'] . "</td>";
    echo "<td style='width:200px;'>" . $row['Late_Submission'] . "</td>";
    echo "<td style='width:300px;'>" . $row['Clothing_or_Props_Thrown'] . "</td>";
    echo "<td style='width:200px;'>" . $row['Routine_Length'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Late_Start'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Improper_Language'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Lewd_Gestures'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Damage_Incurring_Props'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Falls_Trips_Tumbles'] . "</td>";
    
echo '<form method="post" action="" enctype="multipart/form-data">
<td>
<button type="submit" class="btn" onclick="return confirm("Are you sure?")" name="DeductionDelete">Delete</button>
</td>
<td style="width:200px;"">
<input name="DeductionId" value="' . $row['DeductionId'] . '" readonly style="width:100px;text-align: center;"></td></form>';
 echo "</tr>";
}
?>
</table>

</body>
</html>