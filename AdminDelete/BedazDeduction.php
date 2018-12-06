<?php 
    include "config.php";
    include "../includes/Functions.php";

     if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../Login.php');
}
?>
<!doctype html>
<html>
    <head>
        <title>Judge Scoring Details</title>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.3.1.js' type='text/javascript'></script>
        <script src='bootstrap/js/bootstrap.min.js'></script> 
        <script src='bootbox.min.js'></script>
        <script src='script.js' type='text/javascript'></script>
    </head>
    <body>
        
        <div class='container'>
            <table border='1' class='table' >
                <tr style='background: whitesmoke;'>
                    <th>Team Name</th>
                    <th>Late Submission</th>
                    <th>Clothing of Props Thrown</th>
                    <th>Routine Length</th>
                    <th>Late Start</th>
                    <th>Improper Language</th>
                    <th>Lewd Gestures</th>
                    <th>Damage Incurring Proprs</th>
                    <th>Falls, Trips, Tumble</th>
                    <th>Action</th>
                </tr>

                <?php 
                $query = "SELECT *, team_deduction.Id as DeductionId ,teams.Name as TeamName FROM `team_deduction`  INNER JOIN teams ON team_deduction.Team_Id = teams.Id";
                $result = mysqli_query($con,$query); 

                $count = 1;
                while($row = mysqli_fetch_assoc($result) ){
                    $id                         = $row['DeductionId'];
                    $TeamName                   = $row['TeamName'];
                    $Late_Submission            = $row['Late_Submission'];
                    $Clothing_or_props_Thrown   = $row['Clothing_or_Props_Thrown'];
                    $Routine_Length             = $row['Routine_Length'];
                    $Late_Start                 = $row['Late_Start'];
                    $Improper_Language          = $row['Improper_Language'];
                    $Lewd_Gestures              = $row['Lewd_Gestures'];
                    $Damage_Incurring_Props     = $row['Damage_Incurring_Props'];
                    $Falls_Trips_Tumbles        = $row['Falls_Trips_Tumbles'];


                ?>
                    <tr>
                        <td align='center'><?= $TeamName ?></td>
                        <td align='center'><?= $Late_Submission ?></td>
                        <td align='center'><?= $Clothing_or_props_Thrown  ?></td>
                        <td align='center'><?= $Routine_Length   ?></td>
                        <td align='center'><?=  $Late_Start  ?></td>
                        <td align='center'><?=  $Improper_Language   ?></td>
                        <td align='center'><?=  $Lewd_Gestures   ?></td>
                        <td align='center'><?=  $Damage_Incurring_Props   ?></td>
                        <td align='center'><?=  $Falls_Trips_Tumbles   ?></td>
                        <td align='center'><button class='delete btn btn-danger' id='del_<?= $id ?>'>Delete</button></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>