<?php
	include("connection.php");
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
		<form class="login_form" action="feedback_data_insert.php" method="post">

			<input type="hidden" id="contact" name="contact" required>
			<input type="hidden" id="type" name="type" required>

			<div class="imgcontainer">
				<img src="../images/images.png" alt="logo" class="login_logo">
			</div>
			<div class="login_container">
				<div class="heading_font">
					<label for="GP">GUJARAT POLICE</label><br>
					<label for="GP">DEPARTMENT</label><br><br><br>
				</div>
				<label for="uname">Feedback Form For Citizen</label><br>



				<select name="area" id="area" class="number_complaint" required>
					<option value="area" disabled selected>Choose Area</option>
					<?php

					$qry = "SELECT `area` FROM policestation";
					$q = mysqli_query($con, $qry);
					while ($fetch = mysqli_fetch_array($q)) {
						echo "<option value=" . $fetch['area'] . ">" . $fetch['area'] . "</option>";
					}

					?>
				</select>

				<select name="city" id="city" class="number_complaint" required>
					<option value="city" disabled selected>Choose City</option>
					<?php

					$qry2 = "SELECT `city` FROM policestation group by `city`";
					$q2 = mysqli_query($con, $qry2);

					while ($fetch = mysqli_fetch_array($q2)) {
						echo "<option value=" . $fetch['city'] . ">" . $fetch['city'] . "</option>";
					}

					?>
				</select>

				<select name="indian" id="indian" class="number_complaint" required>
					<option value="indian" disabled selected>Are You Indian Citizen ?</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>

				<select name="question_1" id="question_1" class="number_complaint" required>
					<option value="" selected disabled hidden>How did you come to the police station?</option>
					<option value="Through a person known to a police officer">Through a person known to a police officer</option>
					<option value="With a neighbour/local leader">With a neighbour/local leader</option>
					<option value="On your own">On your own</option>
				</select>

				<select name="question_2" id="question_2" class="number_complaint" required>
					<option value="" selected disabled hidden>After how much time you were heard in police station ?
					</option>
					<option value="More than 15 minutes">More than 15 minutes</option>
					<option value="15 minutes">15 minutes</option>
					<option value="10 minutes">10 minutes</option>
					<option value="5 minutes">5 minutes</option>
					<option value="Immediately">Immediately</option>
				</select>

				<select name="question_3" id="question_3" class="number_complaint" required>
					<option value="" selected disabled hidden>Behaviour of Officers ?</option>
					<option value="Good">😊</option>
					<option value="Bad">😡</option>
				</select>

				<textarea name="experience" id="experience" cols="30" rows="10"
					placeholder="How would you describe your experience with police officers in the police station?(1300 words)"
					class="number_complaint"></textarea>

			</div>
			
			<input type="submit" id="submit" name="submit" class="login_button"><br><br><br><br>
			<div class="login_footer">
				<label>By clicking Get OTP, you agree with our <a href="#">Terms</a></label><br>
				<label>Learn how we process your data in our</label><br>
				<label><a href="#">Privacy Policy</a> and <a href="#">Cookies and Policy</a></label><br><br><br>
			</div>
			</div>
		</form>
		<button id="history" name="history" class="login_button" onclick="history()">History</button>

		<script>
		var num = localStorage.getItem("number");
		var typ = localStorage.getItem("type");
		document.getElementById('contact').value = num;
		document.getElementById('type').value = typ;

		function history(){
			window.location.href = "history.php?number=" + num;
		}

		// var area = document.getElementById('area').value;
		// console.log(area);
		// localStroage.setItem("area",area);
		</script>
	</center>
</body>

</html>