		<?php
require('fpdf17/fpdf.php');
include('../includes/functions.php');
include('../includes/config.php');



//db connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "bedanz";

$con=mysqli_connect($servername,$username,$password,$db);
mysqli_select_db($con,'bedanz');

$query = mysqli_query($con,"SELECT team_scoring.Team_Id,teams.Division, teams.Name,Performance,Skill,Creativity_and_Originality,Audience_Impact,team_deduction.Late_Submission,team_deduction.Clothing_or_Props_Thrown,team_deduction.Routine_Length,team_deduction.Late_Start,team_deduction.Improper_Language,team_deduction.Lewd_Gestures,team_deduction.Damage_Incurring_Props,team_deduction.Falls_Trips_Tumbles,((Performance /100) * .40) * 100 as Performance,((Skill /100) * .35) * 100 as Skill,((Creativity_and_Originality /100) * .15)* 100 as Creativity_and_Originality, ((Audience_Impact /100) * .10)* 100 as Audience_Impact ,IF(team_deduction.Late_Submission = 1, 0.05, 0) as Late_Submission_Deduction,IF(team_deduction.Clothing_or_Props_Thrown = 1, 0.05, 0) as Clothing_or_Props_Thrown_Deduction,IF(team_deduction.Routine_Length = 1, 0.05, 0) as Routine_Length_Deduction,IF(team_deduction.Late_Start = 1, 0.05, 0) as Late_Start_Deduction,IF(team_deduction.Improper_Language = 1, 0.1, 0) as Improper_Language_Deduction,IF(team_deduction.Lewd_Gestures = 1, 0.1, 0) as Lewd_Gestures_Deduction,IF(team_deduction.Damage_Incurring_Props = 1, 0.1, 0) as Damage_Incurring_Props_Deduction,IF(team_deduction.Falls_Trips_Tumbles = 1, 0.1, 0) as Falls_Trips_Tumbles_Deduction, (((Performance /100) * .40) * 100 )+  (((Skill /100) * .35) * 100) + (((Creativity_and_Originality /100) * .15)* 100) + (((Audience_Impact /100) * .10) * 100) - ( IF(team_deduction.Late_Submission = 1, 0.05, 0)  + IF(team_deduction.Clothing_or_Props_Thrown = 1, 0.05, 0) + IF(team_deduction.Routine_Length = 1, 0.05, 0) + IF(team_deduction.Late_Start = 1, 0.05, 0) + IF(team_deduction.Improper_Language = 1, 0.1, 0) + IF(team_deduction.Lewd_Gestures = 1, 0.1, 0) + IF(team_deduction.Damage_Incurring_Props = 1, 0.1, 0) + IF(team_deduction.Falls_Trips_Tumbles = 1, 0.1, 0))  as Total_Score FROM `team_scoring` INNER JOIN `team_deduction` on team_scoring.Team_Id = team_deduction.Team_Id INNER JOIN teams on team_scoring.Team_Id = teams.Id WHERE Division = 'SHS' GROUP BY Team_Id ORDER BY Total_Score DESC");
$invoice = mysqli_fetch_array($query);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->Image('SBCA-icon1transparent.png',10,50,190);
$pdf->Cell(200	,5,'San Beda College Alabang',0,1,'C');
$pdf->Cell(200	,5,'Bedanz Dance Troupe Alabang',0,1,'C');//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(200	,5,'Sayaw Hataw',0,0,'C');
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(200	,5,'Alabang Town Center',0,1,'C');
$pdf->Cell(200	,5,'December 15, 2018',0,1,'C');
$pdf->Cell(34	,5, "",0,1);//end of line

//$pdf->Cell(130	,5,'Phone [236-7222]',0,0);
//$pdf->Cell(25	,5,'Invoice #',0,0);
//$pdf->Cell(34	,5,$invoice['OrderID'],0,1);//end of line
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(100	,5,'Score Table For: ',0,1);
$pdf->Cell(10	,5,'Highchool Division',0,1);	




//$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
//$pdf->Cell(25	,5,'Customer ID',0,0);
//$pdf->Cell(34	,5,$invoice['UserID'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
//end of line

//billing address
//end of line

//add dummy cell at beginning of each line for indentation

//$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$invoice['company'],0,1);

$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$invoice['unitno'] ." " . $invoice['street'].", " .$invoice['subdivision'] .", " . $invoice['barangay'] .", " . $invoice['city'] .", " . $invoice['province'] ,0,1);

$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$invoice['email'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',9);

//Numbers are right-aligned so we give 'R' after new line parameter

//items

$query = mysqli_query($con,"SELECT team_scoring.Team_Id,teams.Division, teams.Name,Performance,Skill,Creativity_and_Originality,Audience_Impact,team_deduction.Late_Submission,team_deduction.Clothing_or_Props_Thrown,team_deduction.Routine_Length,team_deduction.Late_Start,team_deduction.Improper_Language,team_deduction.Lewd_Gestures,team_deduction.Damage_Incurring_Props,team_deduction.Falls_Trips_Tumbles,((Performance /100) * .40) * 100 as Performance,((Skill /100) * .35) * 100 as Skill,((Creativity_and_Originality /100) * .15)* 100 as Creativity_and_Originality, ((Audience_Impact /100) * .10)* 100 as Audience_Impact ,IF(team_deduction.Late_Submission = 1, 0.05, 0) as Late_Submission_Deduction,IF(team_deduction.Clothing_or_Props_Thrown = 1, 0.05, 0) as Clothing_or_Props_Thrown_Deduction,IF(team_deduction.Routine_Length = 1, 0.05, 0) as Routine_Length_Deduction,IF(team_deduction.Late_Start = 1, 0.05, 0) as Late_Start_Deduction,IF(team_deduction.Improper_Language = 1, 0.1, 0) as Improper_Language_Deduction,IF(team_deduction.Lewd_Gestures = 1, 0.1, 0) as Lewd_Gestures_Deduction,IF(team_deduction.Damage_Incurring_Props = 1, 0.1, 0) as Damage_Incurring_Props_Deduction,IF(team_deduction.Falls_Trips_Tumbles = 1, 0.1, 0) as Falls_Trips_Tumbles_Deduction, (((Performance /100) * .40) * 100 )+  (((Skill /100) * .35) * 100) + (((Creativity_and_Originality /100) * .15)* 100) + (((Audience_Impact /100) * .10) * 100) - ( IF(team_deduction.Late_Submission = 1, 0.05, 0)  + IF(team_deduction.Clothing_or_Props_Thrown = 1, 0.05, 0) + IF(team_deduction.Routine_Length = 1, 0.05, 0) + IF(team_deduction.Late_Start = 1, 0.05, 0) + IF(team_deduction.Improper_Language = 1, 0.1, 0) + IF(team_deduction.Lewd_Gestures = 1, 0.1, 0) + IF(team_deduction.Damage_Incurring_Props = 1, 0.1, 0) + IF(team_deduction.Falls_Trips_Tumbles = 1, 0.1, 0))  as Total_Score FROM `team_scoring` INNER JOIN `team_deduction` on team_scoring.Team_Id = team_deduction.Team_Id INNER JOIN teams on team_scoring.Team_Id = teams.Id WHERE Division = 'SHS' GROUP BY Team_Id ORDER BY Total_Score DESC");



 if (mysqli_affected_rows($con)  > 0) {
$pdf->Cell(50	,5,'Team Name',1,0);
$pdf->Cell(25	,5,'Performance',1,0);
$pdf->Cell(15	,5,'Skill',1,0);
$pdf->Cell(25	,5,'Originality',1,0);
$pdf->Cell(30	,5,'Audience Impact',1,0);
$pdf->Cell(30	,5,'Total Deduction',1,0);
$pdf->Cell(20	,5,'Total Score',1,1);
//end of line

$pdf->SetFont('Arial','',12);

$TotalBookings = 0; //total tax
$TotalBookingsbyEmployee = 0;
$TotalBookingsbyStudent = 0; //total amount
//Cell(width , height , text , border , end line , [align] )
//display the items
while($row = mysqli_fetch_array($query)){

	$Total_Deduction =  $row['Late_Submission_Deduction'] + $row['Clothing_or_Props_Thrown_Deduction'] + $row['Routine_Length_Deduction'] + $row['Late_Start_Deduction'] + $row['Improper_Language_Deduction']  + $row['Lewd_Gestures_Deduction'] + $row['Damage_Incurring_Props_Deduction']  + $row['Falls_Trips_Tumbles_Deduction'];
      $Total_Score = ($row['Performance'] + $row['Skill'] + $row['Creativity_and_Originality'] + $row['Audience_Impact']) - ( $Total_Deduction );


	$pdf->Cell(50	,5,$row['Name'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format((float)$row['Performance'], 2, '.', ''),1,0);
	$pdf->Cell(15	,5,number_format((float)$row['Skill'], 2, '.', ''),1,0);
	$pdf->Cell(25	,5,number_format((float)$row['Creativity_and_Originality'], 2, '.',''),1,0);
	$pdf->Cell(30	,5,number_format((float)$row['Audience_Impact'], 2, '.',''),1,0);
	$pdf->Cell(30	,5,number_format((float)$Total_Deduction, 2, '.',''),1,0);
	$pdf->Cell(20	,5,number_format((float)$Total_Score, 2, '.',''),1,1);

	//$pdf->Cell(34	,5,($item['date']),1,1,'R');//end of line
	//accumulate tax and amount
	//$tax += $item['tax'];
	
//	$amount +=  $item['quantity'];
}

//$pdf->Cell(130	,5,'',0,0);
//$pdf->Cell(25	,5,'Date Due',0,0);
//$pdf->Cell(4	,5,'P',1,0);
//$pdf->Cell(30	,5,number_format($amount + $tax),1,1,'R');//end of line

 }

else {
	$pdf->SetFont('Arial','',24);
	$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(60	,5,'',0,0);
$pdf->Cell(50	,5,'No Records Found',0,0);
}









$pdf->Output();
?>
