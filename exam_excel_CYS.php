<?php
  require_once('OLEwriter.php');
  require_once('BIFFwriter.php');
  require_once('Worksheet.php');
  require_once('Workbook.php');
  require_once('dbcon.php');
  
  $id_get=$_POST['id_get'];
  $semester=$_POST['semester'];
  $sy=$_POST['sy'];

    function HeaderingExcel($filename) {
      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=$filename" );
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
      header("Pragma: public");
      }
	  
	  // HTTP headers
HeaderingExcel('teacher.xls');// Creating a workbook
$workbook = new excel("-");
// Creating the first worksheet
$worksheet1 =& $workbook->add_worksheet('Course');
$worksheet1->freeze_panes(1, 0);
  $worksheet1->set_column(0, 0, 25);
  $worksheet1->set_column(1, 1, 20);
  $worksheet1->set_column(1, 2, 20);
  $worksheet1->set_column(1, 3, 20);
  $worksheet1->set_column(1, 4, 20);






$query=mysqli_query($conn,"select * from schedule where  CYS='$id_get' and semester='$semester' and sy='$sy'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
$name=$row['CYS'];
$sy=$row['sy'];
$semester=$row['semester'];

   $worksheet1->write_string(0,0,"Class Schedule");
   $worksheet1->write_string(2,0,"$name");
   $worksheet1->write_string(3,0,"School Year: $sy");
   $worksheet1->write_string(3,1,"Semester: $semester");
   $worksheet1->write_string(6,0,"MWF Schedule");
   $worksheet1->write_string(7,0,"Day");
   $worksheet1->write_string(7,1,"Time");
   $worksheet1->write_string(7,2,"Proctor");
   $worksheet1->write_string(7,3,"Subject");
   $worksheet1->write_string(7,4,"Room");







/////////////////
	

	$qryreport = mysqli_query($conn,"SELECT * FROM schedule where CYS='$id_get' and type='Exam'  and semester='$semester' and sy='$sy'") or die(mysqli_error());
	
	$sqlrows=mysqli_num_rows($qryreport);
	$j=7;
	
	WHILE ($reportdisp=mysqli_fetch_array($qryreport)) {
	$j=$j+1;
			$day = $reportdisp['day'];
			$project = $reportdisp['time'];
			$time_end = $reportdisp['time_end'];
			$CYS = $reportdisp['teacher'];
			$subject = $reportdisp['subject'];
			$room = $reportdisp['room'];
			
			
			
			 $leaderid = $reportdisp['CYS']; 
			 
			 $qryleader = mysqli_query($conn,"SELECT * FROM schedule WHERE CYS='".$leaderid."' and type='Exam'  and semester='$semester' and sy='$sy'") or die(mysqli_error());
				$leader = mysqli_fetch_assoc($qryleader);
				
				$assignedto = $leader['time'];
			
			 $worksheet1->write_string($j,0,"$day");
			 $worksheet1->write_string($j,1,"$project-$time_end");
		 $worksheet1->write_string($j,2,"$CYS");
		 $worksheet1->write_string($j,3,"$subject");
		 $worksheet1->write_string($j,4,"$room");
			 
	}
	
	
	
/////////////////
  
  

  
  
$workbook->close();
?>