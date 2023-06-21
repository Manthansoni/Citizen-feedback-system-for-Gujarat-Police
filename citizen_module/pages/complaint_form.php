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
        <form class="login_form" action="feedback_data_insert.php" method="POST">
            <div class="imgcontainer">
                <img src="../images/images.png" alt="logo" class="login_logo">
            </div>
            <center>
                <div class="login_container">
                    <div class="heading_font">
                        <label for="GP">GUJARAT POLICE</label><br>
                        <label for="GP">DEPARTMENT</label><br><br><br>
                    </div>
                    <label for="uname">Complaint Form For Citizen</label><br>
                    <input type="text" placeholder="Mobile Number" id="number" name="number" class="number_complaint" readonly>

                    <select name="area" id="area" class="number_complaint">

                        <?php
                        include("connection.php");
                        $qry = "SELECT `area` FROM policestation";
                        $q = mysqli_query($con, $qry);
                        while ($fetch = mysqli_fetch_array($q)) {
                            echo "<option value=" . $fetch['area'] . ">" . $fetch['area'] . "</option>";
                        }

                        ?>
                    </select>

                    <select name="city" id="city" class="number_complaint">

                        <?php
                        include("connection.php");
                        $qry = "SELECT `city` FROM policestation group by `city`";
                        $q = mysqli_query($con, $qry);
                        while ($fetch = mysqli_fetch_array($q)) {
                            echo "<option value=" . $fetch['city'] . ">" . $fetch['city'] . "</option>";
                        }

                        ?>
                    </select>

                    <input type="number" placeholder="FIR Number" name="fir_number" class="number_complaint" required>
                    <input type="date" placeholder="Date of Complaint" name="date" class="number_complaint" required>
                    <input type="time" placeholder="Time of Complaint" name="time" class="number_complaint" required>
                    <textarea name="complaint_details" id="" cols="30" rows="10" placeholder="Complaint Details" class="number_complaint"></textarea>


                </div>
                <button type="submit" class="login_button" id="complaint_submit" name="complaint_submit">Submit</button><br><br><br><br>
                <div class="login_footer">
                    <label>By clicking Get OTP, you agree with our <a href="#">Terms</a></label><br>
                    <label>Learn how we process your data in our</label><br>
                    <label><a href="#">Privacy Policy</a> and <a href="#">Cookies and Policy</a></label><br><br><br>
                </div>
                </div>
        </form>
    </center>

    <script>
        var num = localStorage.getItem("number");
        document.getElementById('number').value = num;
    </script>

</body>

</html>