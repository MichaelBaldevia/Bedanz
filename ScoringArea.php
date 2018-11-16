<?php 
include('Functions.php');


        $result = mysqli_query($conn,"SELECT *, ((Performance /100) * .40) * 100 as Performance,((Skill /100) * .35) * 100 as Skill,((Creativity_and_Originality /100) * .15)* 100 as Creativity_and_Originality, ((Audience_Impact /100) * .10)* 100 as Audience_Impact, IF(Late_Submission = 1, 0.0005, 0)*100 as Late_Submission_Deduction,IF(Clothing_or_Props_Thrown = 1, 0.0005, 0)*100 as Clothing_or_Props_Thrown_Deduction,IF(Routine_Length = 1, 0.0005, 0)*100 as Routine_Length_Deduction,IF(Late_Start = 1, 0.0005, 0)*100 as Late_Start_Deduction,IF(Improper_Language = 1, 0.001, 0)*100 as Improper_Language_Deduction,IF(Lewd_Gestures = 1, 0.001, 0)*100 as Lewd_Gestures_Deduction,IF(Damage_Incurring_Props = 1, 0.001, 0)*100 as Damage_Incurring_Props_Deduction,IF(Falls_Trips_Tumbles = 1, 0.001, 0)*100 as Falls_Trips_Tumbles_Deduction FROM `team_scoring` GROUP BY Team_Id"); 

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
 <h1><span class="blue"></span>Score<span class="blue"></span> <span class="yellow">Table</pan></h1>

<table class="container">
  <thead>
    <tr>
       <th><h1>Team Name</h1></th>
       <th><h1>Performance</h1></th> 
       <th><h1>Skill</h1></th>
       <th><h1>Creativity and Originality</h1></th>
       <th><h1>Audience Impact</h1></th>
       <th><h1>Total Deduction</h1></th>
       <th><h1>Total Score</h1></th>
    </tr>
  </thead>
  <tbody>
    <?php  while($row = mysqli_fetch_array($result)) { 
   
      $Total_Deduction =  $row['Late_Submission_Deduction'] + $row['Clothing_or_Props_Thrown_Deduction'] + $row['Routine_Length_Deduction'] + $row['Late_Start_Deduction'] + $row['Improper_Language_Deduction']  + $row['Lewd_Gestures_Deduction'] + $row['Damage_Incurring_Props_Deduction']  + $row['Falls_Trips_Tumbles_Deduction'];
      $Total_Score = ($row['Performance'] + $row['Skill'] + $row['Creativity_and_Originality'] + $row['Audience_Impact']) - (($row['Performance'] + $row['Skill'] + $row['Creativity_and_Originality'] + $row['Audience_Impact']) * $Total_Deduction );
        ?>

          <tr style=color:white;>
          <td style='width:150px;border:1px solid black;'><?php echo  $row['Team_Id'] ?></td>
          <td style='width:150px;border:1px solid black;'><?php echo  $row['Performance'] ?></td>
          <td style='width:150px;border:1px solid black;'><?php echo  $row['Skill'] ?></td>
          <td style='width:150px;border:1px solid black;'><?php echo  $row['Creativity_and_Originality']  ?></td>
          <td style='width:150px;border:1px solid black;'><?php echo  $row['Audience_Impact']  ?></td>
          <td style='width:150px;border:1px solid black;'><?php echo  $Total_Deduction . "%"?></td>
          <td style='width:150px;border:1px solid black;'><?php echo  $Total_Score  ?></td>
        
       </tr>
    <?php  } ?>
  </tbody>
</table>

</body>
</html>