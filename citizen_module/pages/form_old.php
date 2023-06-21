<?php

include("connection.php");


?>

<html>

<head>
	<title> Form </title>
	<link rel="stylesheet" href="../css/form.css">
</head>

<body>

	<form action="feedback_data_insert.php" method="post">

		<input type="hidden" id="contact" name="contact" required>
		<input type="hidden" id="type" name="type" required>

		<div class="imgcontainer">
			<div>
				<img src="../images/images.png" alt="logo" height="120px" width="100px">
			</div>
			<div class="heading">
				<label for="GP"><b> GUJARAT POLICE <br><label class="txt"> DEPARTMENT </label></b></label><br>
			</div>
		</div><br><br>

		<div class="container">
			<label for="uname">FEEDBACK FORM FOR CITIZEN</label><br><br>
			<div class="first">
				<!-- <input type="text" placeholder="Pincode" required class="code"><br><br> -->



				<select name="area" id="area" class="code">

					<?php

					$qry = "SELECT `area` FROM policestation";
					$q = mysqli_query($con, $qry);
					while ($fetch = mysqli_fetch_array($q)) {
						echo "<option value=" . $fetch['area'] . ">" . $fetch['area'] . "</option>";
					}

					?>
				</select><br><br>
				<!-- <input type="text" placeholder="Area" required><br><br> -->
				<!-- <input type="text" placeholder="City" required class="code"><br><br> -->

				<select name="city" id="city" class="code">
					<?php

					$qry2 = "SELECT `city` FROM policestation group by `city`";
					$q2 = mysqli_query($con, $qry2);

					while ($fetch = mysqli_fetch_array($q2)) {
						echo "<option value=" . $fetch['city'] . ">" . $fetch['city'] . "</option>";
					}

					?>
				</select><br><br>


			</div>

			<div class="second">
				<label for="Indian">Indian Citizen</label>
				<input type="radio" id="yes" name="indian" value="YES" checked>
				<label for="indian">YES</label>
				<input type="radio" id="no" name="indian" value="NO">
				<label for="indian">NO</label>
			</div><br>

			<div class="third">
				<label for="visit">How did you come to the police station?</label><br>
				<input type="radio" id="Through a person known to a police officer" value="Through a person known to a police officer" name="visit" checked>
				<label for="visit">Through a person known to a police officer</label><br>
				<input type="radio" id="With a neighbour/local leader" value="With a neighbour/local leader" name="visit">
				<label for="visit">With a neighbour/local leader</label><br>
				<input type="radio" id="On your own" name="visit" value="On your own">
				<label for="visit">On your own</label><br>
			</div><br>

			<div class="four">
				<label for="time">After how much time you were heard in police station?</label><br>
				<input type="radio" id="More than 15 minutes" name="time" value="More than 15 minutes" checked>
				<label for="time">More than 15 minutes</label><br>
				<input type="radio" id="15 minutes" name="time" value="15 minutes">
				<label for="time">15 minutes</label><br>
				<input type="radio" id="10 minutes" name="time" value="10 minutes">
				<label for="time">10 minutes</label><br>
				<input type="radio" id="5 minutes" name="time" value="5 minutes">
				<label for="time">5 minutes</label><br>
				<input type="radio" id="Immediately" name="time" value="Immediately">
				<label for="time">Immediately</label><br>
			</div><br>

			<div class="five">
				<label for="behave">Behaviour of Officers ?</label><br>
				<input type="radio" id="good" name="behave" value="good" checked>
				<label for="behave" class="emoji">😊</label><br>
				<input type="radio" id="bad" name="behave" value="bad">
				<label for="behave" class="emoji">😡</label><br>
			</div><br>

			<textarea name="experience" class="fifth" placeholder="How would you describe your experience with police officers in the police station?(1300 words) " required></textarea><br><br>
			<input type="submit" id="submit" name="submit" class="sbutton"><br>
		</div><br><br>

	</form>

	<script>
		var num = localStorage.getItem("number");
		var typ = localStorage.getItem("type");
		document.getElementById('contact').value = num;
		document.getElementById('type').value = typ;

		// var area = document.getElementById('area').value;
		// console.log(area);
		// localStroage.setItem("area",area);
	</script>


</body>

</html>