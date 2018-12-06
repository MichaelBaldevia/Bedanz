<?php 
include "config.php";

$id = $_POST['id'];

// Delete record
$query = "DELETE * FROM team_scoring WHERE Id=".$id;
mysqli_query($con,$query);

echo 1;