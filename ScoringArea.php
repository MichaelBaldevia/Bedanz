<?php 
include('includes/Functions.php');
$conn = mysqli_connect($servername, $username, $password,  $dbname);

        $result = mysqli_query($conn,"SELECT team_scoring.Team_Id,teams.Division, teams.Name,Performance,Skill,Creativity_and_Originality,Audience_Impact,team_deduction.Late_Submission,team_deduction.Clothing_or_Props_Thrown,team_deduction.Routine_Length,team_deduction.Late_Start,team_deduction.Improper_Language,team_deduction.Lewd_Gestures,team_deduction.Damage_Incurring_Props,team_deduction.Falls_Trips_Tumbles,((Performance /100) * .40) * 100 as Performance,((Skill /100) * .35) * 100 as Skill,((Creativity_and_Originality /100) * .15)* 100 as Creativity_and_Originality, ((Audience_Impact /100) * .10)* 100 as Audience_Impact, IF(team_deduction.Late_Submission = 1, 0.0005, 0)*100 as Late_Submission_Deduction,IF(team_deduction.Clothing_or_Props_Thrown = 1, 0.0005, 0)*100 as Clothing_or_Props_Thrown_Deduction,IF(team_deduction.Routine_Length = 1, 0.0005, 0)*100 as Routine_Length_Deduction,IF(team_deduction.Late_Start = 1, 0.0005, 0)*100 as Late_Start_Deduction,IF(team_deduction.Improper_Language = 1, 0.001, 0)*100 as Improper_Language_Deduction,IF(team_deduction.Lewd_Gestures = 1, 0.001, 0)*100 as Lewd_Gestures_Deduction,IF(team_deduction.Damage_Incurring_Props = 1, 0.001, 0)*100 as Damage_Incurring_Props_Deduction,IF(team_deduction.Falls_Trips_Tumbles = 1, 0.001, 0)*100 as Falls_Trips_Tumbles_Deduction FROM `team_scoring` INNER JOIN `team_deduction` on team_scoring.Team_Id = team_deduction.Team_Id INNER JOIN teams on team_scoring.Team_Id = teams.Id WHERE Division = 'CAS' GROUP BY Team_Id "); 

?>
<!--  -->
<html>
<head>
<style>

.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
</head>
<body>
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

          <tr >
          <td ><?php echo  $row['Name'] ?></td>
          <td ><?php echo  $row['Performance'] ?></td>
          <td><?php echo  $row['Skill'] ?></td>
          <td ><?php echo  $row['Creativity_and_Originality']  ?></td>
          <td ><?php echo  $row['Audience_Impact']  ?></td>
          <td ><?php echo  $Total_Deduction . "%"?></td>
          <td ><?php echo  $Total_Score  ?></td>
        
       </tr>
    <?php  } ?>
  </tbody>
</table>

</body>
</html>