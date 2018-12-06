<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">Admin Control</a>
  <div class="header-right">
    <a href="AdminControl.php">Team Scoring</a>
    <a href="TeamDeduction.php">Team Deduction</a>
    <a href="TeamTable.php">Team Table</a>
    <a href="JudgeTable.php">Judge Table</a>
    <a href="PDFInvoice/PrintCAS.php">Print College Division</a>
    <a href="PDFInvoice/PrintHighSchool.php">Print HighSchool Division</a>


  </div>
</div>


</body>
</html>
