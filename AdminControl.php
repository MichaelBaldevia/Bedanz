<?php 
include('includes/Functions.php');
        //Table for users
        
        $servername = "localhost";
$username = "root";
$password = "";
$db = "bedanz";


        $con=mysqli_connect($servername,$username,$password,$db);
        $result = mysqli_query($con,"
                SELECT *,team_scoring.Id as ScoringId,teams.Name as TeamName, judge.Name as JudgeName FROM `team_scoring` 
INNER JOIN judge ON team_scoring.Judge_Id = judge.Id INNER JOIN teams ON team_scoring.Team_Id = teams.Id;
                
                ");
                ?>

<html>
<head>
<style>

.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
</head>
<body>
 <h1><span class="blue"></span>Score<span class="blue"></span> <span class="yellow">Table</pan></h1>
<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='bootstrap/js/bootstrap.min.js'></script> 
<script src='bootbox.min.js'></script>
<table class="container">




  <tr style=color:black, text-align: left;>
 <th style='width:400px;text-align: left;'>Judge Name</th>
 <th style='width:250px;text-align: left;'>Team Name</th>
 <th style='width:300px;text-align: left;'>Performance</th>
 <th style='width:200px;text-align: left;'>Skill</th>
 <th style='width:500px;text-align: left;'>Creativity and Originality</th>
 <th style='width:500px;text-align: left;'>Audience Impact</th>
 <th style='width:200px;text-align: left;'>Delete</th>
 <th style='width:100px;text-align: left;'>Id</th>
 </tr>
 <?php
while($row = mysqli_fetch_array($result)) {


    echo "<tr style=color:black;>";
    echo "<td style='width:200px;'>" . $row['JudgeName'] . "</td>";
    echo "<td style='width:200px;'>" . $row['TeamName'] . "</td>";
    echo "<td style='width:300px;'>" . $row['Performance'] . "</td>";
    echo "<td style='width:200px;'>" . $row['Skill'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Creativity_and_Originality'] . "</td>";
    echo "<td style='width:500px;'>" . $row['Audience_Impact'] . "</td>";
    
    
echo '<form method="post" action="" enctype="multipart/form-data">
<td>
<button type="submit" class="btn" onclick="return confirm("Are you sure?")" name="deleterecord">Delete</button>
</td>
<td style="width:100px;"">
<input name="venueid" value="' . $row['ScoringId'] . '" readonly style="width:100px;text-align: center;"/></td></form>';
 echo "</tr>";
}
?>
</table>

</body>
</html>