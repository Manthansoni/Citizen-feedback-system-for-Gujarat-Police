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
	<title>Feedback Output</title>
	<link rel="stylesheet" href="../css/lastpage.css">
</head>

<body>
	<form>
		<div class="imgcontainer">
			<div class="logo">
				<img src="../images/images.png" alt="logo" height="65px" width="55px">
			</div>
			<div class="GPD">
				<h2 class="font">GUJARAT POLICE DEPARTMENT</h2>
			</div>
		</div><br>

		<div class="container">

			<div class="ty">
				<center>THANK YOU FOR GIVING</center>
				<center>YOUR VALUABLE RESPONSE</center>
				<center>TO GUJARAT POLICE DEPT.</center><br>
			</div>

			<div class="fetched_data">
				<div class="left">
					<label for="date">
						<font>DATE</font>
					</label><br>
					<label for="fetched_date"><?php date_default_timezone_set("Asia/Kolkata"); echo date("d M Y"); ?></label>
				</div>

				<div class="right1">
					<label for="Pin">
						<font>PIN CODE</font>
					</label><br>
					<label for="fetched_pin"><?php echo $data['pincode']; ?></label>
				</div>
			</div><br>

			<div class="fetched_data">
				<div class="left">
					<label for="loc">
						<font>LOCATION</font>
					</label><br>
					<label for="fetched_loc"><?php echo $area; ?></label>
				</div>

				<div class="right2">
					<label for="time">
						<font>TIMING</font>
					</label><br>
					<label for="fetched_time"><?php date_default_timezone_set("Asia/Kolkata"); echo date("h:i a"); ?></label>
				</div>
			</div><br>

			<div class="fetched_data">
				<div class="left">
					<label for="feedback">
						<font>STATUS</font>
					</label><br>
					<label for="fetched_feedback">COMPLETED</label>
				</div>

				<div class="right3">
					<label for="ref">
						<font>REF. NO</font>
					</label><br>
					<label for="fetched_ref"><?php echo $_GET['ref']; ?></label>
				</div>
			</div><br>

			<hr><br>
			<center>
				<div class="PCR_NO">
					<div class="PCR">
						<center><label for="PCR_no">POLICE CONTROL ROOM NUMBER</label></center><br>
						<div class="PCR_city">
							<label for="ahmd">Ahmedabad - 079-2563363</label>
						</div>
						<div class="PCR_button">
							<input type="image" name="Call" src="../images/call.png" border="none" class="call_button">
						</div>
					</div><br>

					<div class="PCR">
						<div class="PCR_city">
							<label for="amreli">Amreli - 02792-222333</label>
						</div>
						<div class="PCR_button">
							<input type="image" name="Call" src="../images/call.png" border="none" class="call_button">
						</div>
					</div><br>

					<div class="PCR">
						<div class="PCR_city">
							<label for="bharuch">Bharuch - 02642-223303</label>
						</div>
						<div class="PCR_button">
							<input type="image" name="Call" src="../images/call.png" border="none" class="call_button">
						</div>
					</div><br>

					<div class="PCR">
						<div class="PCR_city">
							<label for="bhavnagar">Bhavnagar - 0278-2520050</label>
						</div>
						<div class="PCR_button">
							<input type="image" name="Call" src="../images/call.png" border="none" class="call_button">
						</div>
					</div><br>
				</div>
			</center><br><br><br><br>

			<div style="overflow:auto;" class="app_button">
				<div style="float:left; margin-left: 150px">
					<input type="image" name="play_store" src="../images/playstore.png" border="none"
						class="icon_button">
				</div>
				<div style="margin-left: 220px">
					<input type="image" name="app_store" src="../images/app_store.png" border="none"
						class="icon_button">
				</div>
			</div><br>
	</form>
</body>

</html>