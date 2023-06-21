<?php

$us = $_GET['number'];

include("connection.php");

$qry2 = "SELECT * FROM feedback where `contactNo`='$us'";
$q2 = mysqli_query($con, $qry2);
$i=1;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Custom CSS -->
    <link href="../css/style.min.css" rel="stylesheet">
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
                    <label for="GP">GUJARAT POLICE</label><br>
                    <label for="GP">DEPARTMENT</label><br><br><br>
                </div>
                <label for="back" style="text-decoration: none; color: black;"><a href="#">Back</a></label><br>
                <label for="uname">Old Feedback's</label><br>
                <div class="history">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Ref NO.</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($fetch = mysqli_fetch_assoc($q2)) {
                                                                                                  
                                            echo "<tr>";
                                            echo "<td>" . $fetch['refNo'] .  "</td>";
                                            echo "<td>" . $fetch['area'] .  "</td>";
                                            echo "<td>" . $fetch['city'] .  "</td>";
                                            echo "<td>" . $fetch['ques4'] .  "</td>";
                                            echo "</tr>";
                                                }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
</body>

</html>