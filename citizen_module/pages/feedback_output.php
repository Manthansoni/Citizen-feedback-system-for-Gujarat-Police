<?php
	$area = $_GET['area'];
	// echo $area;
	// echo "hello";
	include("connection.php");

	$qry="SELECT `pincode` FROM policestation where `area`='$area'";
   	$q=mysqli_query($con,$qry);
	$data = mysqli_fetch_assoc($q);
	// var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<center>
		<form class="login_form">
			<div class="imgcontainer">
				<img src="../images/images.png" alt="logo" class="login_logo">
			</div>
			<div class="login_container">
				<div class="heading_font">
					<label for="GP">Thank You For Giving <br> Your Valuable Response</label><br>
					<label for="GP">To Gujarat Police Dept.</label><br><br><br>
				</div>
				<div class="feedback_output">
					<table class="number_complaint table_feedback">
						<tr>
							<td>DATE</td>
							<td>PIN CODE</td>
						</tr>
						<tr class="data_table">
							<td><?php date_default_timezone_set("Asia/Kolkata"); echo date("d M Y"); ?></td>
							<td><?php echo $data['pincode']; ?></td>
						</tr>
						<tr class="heading_table">
							<td>LOCATION</td>
							<td>TIMING</td>
						</tr>
						<tr class="data_table">
							<td><?php echo $area; ?></td>
							<td><?php date_default_timezone_set("Asia/Kolkata"); echo date("h:i a"); ?></td>
						</tr>
						<tr class="heading_table">
							<td>STATUS</td>
							<td>REF. NO.</td>
						</tr>
						<tr class="data_table">
							<td>COMPLETED</td>
							<td><?php echo $_GET['ref']; ?></td>
						</tr>
					</table>
				</div>
				<center>
					<div class="PCR_NO">
						<div class="PCR">
							<center><label for="PCR_no">POLICE CONTROL ROOM NUMBER</label></center><br>
							<div class="PCR_city">
								<label for="ahmd">Ahmedabad - 079-2563363</label>
							</div>
							<div class="PCR_button">
								<input type="image" name="Call" src="../images/call.png" border="none"
									class="call_button">
							</div>
						</div><br>

						<div class="PCR">
							<div class="PCR_city">
								<label for="amreli">Amreli - 02792-222333</label>
							</div>
							<div class="PCR_button">
								<input type="image" name="Call" src="../images/call.png" border="none"
									class="call_button">
							</div>
						</div><br>

						<div class="PCR">
							<div class="PCR_city">
								<label for="bharuch">Bharuch - 02642-223303</label>
							</div>
							<div class="PCR_button">
								<input type="image" name="Call" src="../images/call.png" border="none"
									class="call_button">
							</div>
						</div><br>

						<div class="PCR">
							<div class="PCR_city">
								<label for="bhavnagar">Bhavnagar - 0278-2520050</label>
							</div>
							<div class="PCR_button">
								<input type="image" name="Call" src="../images/call.png" border="none"
									class="call_button">
							</div>
						</div><br>
					</div>
				</center>
			</div>
			<div class="app_button">
				<input type="image" name="play_store" src="../images/playstore.png" border="none" class="icon_button">
				<input type="image" name="app_store" src="../images/app_store.png" border="none" class="icon_button">
			</div>
		</form>
</body>

</html>