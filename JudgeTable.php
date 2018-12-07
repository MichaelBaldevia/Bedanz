<?php 
include('includes/Functions.php');
        //Table for users
include('AdminHeader.php');    
        $servername = "localhost";
$username = "root";
$password = "";
$db = "bedanz";


        $con=mysqli_connect($servername,$username,$password,$db);
        $result = mysqli_query($con,"SELECT * FROM `judge`");

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
<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='bootstrap/js/bootstrap.min.js'></script> 
<script src='bootbox.min.js'></script>
<style>

.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="css/Cssfortable.css">
</head>
<body>
 <h1><span class="blue"></span>Score<span class="blue"></span> <span class="yellow">Table</span></h1>
  <div style="margin:0 auto;left:50%;top:50%;text-align: center;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <button type="submit" name="LogOut" class="skew-button1" value="LogOut" style="left:45%;margin-top:30px">
     <span>Log Out</span>
     </button> 
   </form>
    </div>
    
    <div style="padding-bottom:30px;">
<form action="JudgeTable.php" method="POST" enctype="multipart/form-data">

<center>
<h3 class="fontfortitle">Add Judge</h3>


<table style="width: 70%;">
<tr>
<td style="color:#A7A1AE;padding-left:20px;text-align:right">Name:</td>
<td> <input maxlength="100" name="fullname" required="" type="text"
autocomplete="off" style="width:300px;"/></td>

</tr>
<tr>
<td style="color:#A7A1AE;padding-left:20px;text-align:right;">User Type:</td>
<td><select name="user_type" style="width:300px">
        <option value="judge">judge</option>
        <option value="bedanz">bedanz</option>
        <option value="admin">admin</option>
    </select>
    </td>
</tr>
<tr>
<td style="color:#A7A1AE;padding-left:20px;text-align:right">Username:</td>
<td> <input maxlength="100" name="username" required="" type="text"
autocomplete="off" style="width:300px;"/></td>

</tr>
<tr>
<td style="color:#A7A1AE;padding-left:20px;text-align:right">User Password:</td>
<td> <input maxlength="100" name="userpassword" required="" type="text"
autocomplete="off" style="width:300px;"/></td>

</tr>
</table>
<p>
            <div class="buttons">
                <button class="button" name="createJudge"
type="submit" style="margin-right:98px"><span>Add Judge</span></button>
            </div>
<!--<input name="book" type="submit" value="Book" /> -->
    </center>
</form>
    </div>
<table class="container">




  <tr style=color:black, text-align: left;>
   <th style='width:500px;text-align: left;'>Name</th>
   <th style='width:300px;text-align: left;'>User Type</th>
   <th style='width:300px;text-align: left;'>User Name</th>
   <th style='width:300px;text-align: left;'>User Password</th>
   <th style='width:300px;text-align: left;'>Delete</th>
   <th style='width:100px;text-align: left;'>Id</th>
 </tr>
 <?php
while($row = mysqli_fetch_array($result)) {


    echo "<tr style=color:black;>";
    echo "<td style='width:200px;'>" . $row['Name'] . "</td>";
    echo "<td style='width:200px;'>" . $row['User_Type'] . "</td>";
    echo "<td style='width:200px;'>" . $row['User_Name'] . "</td>";
    echo "<td style='width:200px;'>" . $row['Password'] . "</td>";
echo '<form method="post" action="" enctype="multipart/form-data">
<td>
<button type="submit" class="btn" onclick="return confirm("Are you sure?")" name="JudgeDelete">Delete</button>
</td>
<td style="width:200px;"">
<input name="JudgeId" value="' . $row['Id'] . '" readonly style="width:100px;text-align: center;"></td></form>';
 echo "</tr>";
}
?>
</table>

</body>
</html>