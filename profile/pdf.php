<?php
	session_start();
	if(isset($_SESSION['id'])){
		if(isset($_GET['key'])){
			$connect = mysqli_connect('localhost','root','','aminship');
			$uid = $_SESSION['id'];
			$table = "user"."$_SESSION[id]";
			$pid = $_GET['key'];
			$sql = "SELECT * FROM $table WHERE UID = $pid";
			$data = mysqli_query($connect, $sql);
			$row = mysqli_fetch_assoc($data);
			
			// Include the TCPDF library
			require_once('D:\xampp\phpMyAdmin\vendor\tecnickcom\tcpdf\tcpdf.php');

			// Create a new instance of TCPDF
			$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

			// Set the PDF title and author
			$pdf->SetCreator('Online Generator');
			$pdf->SetAuthor('Generated by Aminship');
			$pdf->SetTitle($uid.$pid);
			$pdf->SetSubject('Mesarment detail of '.$uid);

			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			
			// Add a page
			$pdf->AddPage();
			$pdf->SetFillColor(220, 240, 220);
			
			// Set the font and write some content
			$pdf->SetFont('helvetica', '', 12);
			$html = '<h1 style="color:green;text-align:center;">Aminship</h1><br/><h3 style="text-align:center;"> Document of meserment </h3><br/><hr/>';
			$pdf->writeHTML($html, true, false, true, false, '');
			
			$pdf->Cell(40, 10, 'Measurement no :', 0, 0, 'L');
			$pdf->Cell(60, 10, $row['UID'], 0, 0, 'L');
			$pdf->Cell(65, 10, 'Date of print : ', 0, 0, 'R');
			$date = new DateTime();
			$today = $date -> format('j/m/Y');
			$pdf->Cell(40, 10, $today, 0, 1, 'L');
			$pdf->Cell(0, 10, ' ', 0, 1, 'C');
			
			$pdf->Cell(100, 10, 'Land shape:', 0, 0, 'R');
			if($row['fourth'] != 0){
				$pdf->Cell(100, 10, ' Rectengle ', 0, 1, 'L');
			}
			else if($row['third'] != 0){
				$pdf->Cell(100, 10, ' Triangle ', 0, 1, 'L');
			}
			else{
				$pdf->Cell(100, 10, ' Circle ', 0, 1, 'L');
			}
			
			// Retrieve data from database and loop through results
			$pdf->Cell(0, 10, 'Measurement information', 0, 1, 'C');
			$pdf->Cell(0, 10, ' ', 0, 1, 'C');
			if($row) {
				$pdf->Cell(55, 10, ' ', 0, 0, 'C');
				if($row['fourth'] != 0){
					$pdf->Cell(40, 10, 'East side', 0, 0, 'C', 1);
				}
				else{
					$pdf->Cell(40, 10, '1st side', 0, 0, 'C', 1);
				}
				$pdf->Cell(40, 10, $row['first'], 0, 0, 'C');
				$pdf->Cell(55, 10, 'feet', 0, 1, 'L');
				$pdf->Cell(55, 10, ' ', 0, 0, 'C');
				if($row['fourth'] != 0){
					$pdf->Cell(40, 10, 'West side', 0, 0, 'C', 1);
				}
				else{
					$pdf->Cell(40, 10, '2nd side', 0, 0, 'C', 1);
				}
				$pdf->Cell(40, 10, $row['second'], 0, 0, 'C');
				$pdf->Cell(55, 10, 'feet', 0, 1, 'L');
				if($row['third'] != 0){
					$pdf->Cell(55, 10, ' ', 0, 0, 'C');
					if($row['fourth'] != 0){
						$pdf->Cell(40, 10, 'South side', 0, 0, 'C', 1);
					}
					else{
						$pdf->Cell(40, 10, '3rd side', 0, 0, 'C', 1);
					}
					$pdf->Cell(40, 10, $row['third'], 0, 0, 'C');
					$pdf->Cell(55, 10, 'feet', 0, 1, 'L');
				}
				if($row['fourth'] != 0){
					$pdf->Cell(55, 10, ' ', 0, 0, 'C');
					$pdf->Cell(40, 10, 'North side', 0, 0, 'C', 1);
					$pdf->Cell(40, 10, $row['fourth'], 0, 0, 'C');
					$pdf->Cell(55, 10, 'feet', 0, 1, 'L');
				}
				$pdf->Cell(0, 10, ' ', 0, 1, 'C');
				$pdf->Cell(55, 10, ' ', 0, 0, 'C');
				$pdf->Cell(40, 10, 'Area of land',0, 0, 'C', 1);
				$pdf->Cell(40, 10, $row['size'], 0, 0, 'C');
				$pdf->Cell(55, 10, 'cent', 0, 1, 'L');
				$pdf->Cell(95, 10, ' ', 0, 0, 'L');
				$pdf->Cell(40, 10, $row['size'] * 435.6, 0, 0, 'C');
				$pdf->Cell(40, 10, 'Sq feet', 0, 1, 'L');
			}
			
			// Output the PDF
			$pdf->Output($uid.$pid.'.pdf', 'I');
		}
		//mehtod to redirect this page to another page
		header("location:http://localhost/Aminship/profile/view.php");
		exit;
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/auth/log.php");
		exit;
	}
/*
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set some text to print
$txt = <<<EOD
TCPDF Example 002

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);


*/
?>