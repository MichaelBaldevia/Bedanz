<?php 
    include "config.php";
    include "../includes/Functions.php";

     if (!isJudge()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../Login.php');
}
?>
<!doctype html>
<html>
    <head>
        <title>Confirmation alert Before Delete record with jQuery AJAX</title>
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
                    <th>Judge Name</th>
                    <th>Performance</th>
                    <th>Skill</th>
                    <th>Creativity and Originality</th>
                    <th>Audience Impact</th>
                    <th>Action</th>
                </tr>

                <?php 
                $query = "SELECT *,team_scoring.Id as ScoringId,teams.Name as TeamName, judge.Name as JudgeName FROM `team_scoring` 
INNER JOIN judge ON team_scoring.Judge_Id = judge.Id INNER JOIN teams ON team_scoring.Team_Id = teams.Id;";
                $result = mysqli_query($con,$query); 

                $count = 1;
                while($row = mysqli_fetch_assoc($result) ){
                    $id                         = $row['Id'];
                    $TeamName                   = $row['TeamName'];
                    $JudgeName                  = $row['JudgeName'];
                    $Performance                = $row['Performance'];
                    $Skill                      = $row['Skill'];
                    $Creativity_and_Originality = $row['Creativity_and_Originality'];
                    $Audience_Impact            = $row['Audience_Impact'];


                ?>
                    <tr>
                        <td align='center'><?= $TeamName ?></td>
                        <td align='center'><?= $JudgeName ?></td>
                        <td align='center'><?= $Performance  ?></td>
                        <td align='center'><?= $Skill   ?></td>
                        <td align='center'><?=  $Creativity_and_Originality  ?></td>
                        <td align='center'><?=  $Audience_Impact   ?></td>
                        <td align='center'><button class='delete btn btn-danger' id='del_<?= $id ?>'>Delete</button></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>