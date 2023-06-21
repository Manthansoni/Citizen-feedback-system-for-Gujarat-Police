<?php
	include("connection.php");
	// feedback data entry
	if(isset($_POST['submit'])){

		$contact = $_POST['contact'];
		$type = $_POST['type'];
		$area = $_POST['area'];
		$city = $_POST['city'];
		$ind = $_POST['indian'];
		$q1 = $_POST['question_1'];
		$q2 = $_POST['question_2'];
		$q3 = $_POST['question_3'];
		$q4 = $_POST['experience'];
		$refno = rand("111111","999999");

		$qry="SELECT `type` FROM `loginuser` WHERE `contactNo`='$contact'";
   		$q=mysqli_query($con,$qry);
   		if(!$q){
   			die("can/'t insert data");
   		}
   		else{
            echo "successfull";
        }

		$da=mysqli_fetch_assoc($q);
		var_dump($da);
		if($da['type'] == $type){
			echo "cannot insert";
		}
		else{
			$qry2="INSERT INTO loginuser(`contactNo`, `type`) VALUES ( $contact , $type )";
   			$q2=mysqli_query($con,$qry2);
   			if(!$q2){
	   			die("can/'t insert data");
   			}
   			else{
	            echo "successfull";
        	}
		}

        
        
        $qry3="INSERT INTO feedback(`refNo`, `area`, `city`, `contactNo`, `indian`, `ques1`, `ques2`, `ques3`, `ques4`) VALUES 
        ($refno, '$area', '$city', $contact , '$ind' , '$q1' , '$q2' , '$q3' , '$q4')";
   		$qa3=mysqli_query($con,$qry3);
   		if(!$qa3){
   			die("can/'t insert data");
   		}
   		else{
            echo "successfull";
			header("location:feedback_output.php?area=$area&ref=$refno");
        }
	}

	//Complaint data entry
	if(isset($_POST['complaint_submit'])){
		$ind = [];
		$contact = $_POST['number'];
		$area = $_POST['area'];
		$city = $_POST['city'];
		$fir_number = $_POST['fir_number'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$complaint_details = $_POST['complaint_details'];
		$refno = rand("111111","999999");

		$qry4="SELECT `type`,count(`type`) FROM `loginuser` WHERE `contactNo`='$contact'";
   		$q4=mysqli_query($con,$qry4);
   		if(!$q4){
   			die("can/'t insert data");
   		}
   		else{
            echo "successfull";
        }

		//complain user login table entry check each value
		$da4=mysqli_fetch_assoc($q4);

			if($da4['count(`type`)'] == 2 || $da4['type'] == 2){
				echo "cannot insert";
			}
			else{
				$qry5="INSERT INTO loginuser(`contactNo`, `type`) VALUES ( $contact , 2)";
				$q5=mysqli_query($con,$qry5);
				if(!$q5){
					die("can/'t insert data");

				}
				else{
					echo "successfull";
				}
			}
				// exit;
		// var_dump($da4);
		// exit;

		$qry8="SELECT `psID` FROM `policestation` WHERE `area`='$area' && `city`='$city'";
   		$q8=mysqli_query($con,$qry8);
   		if(!$q8){
   			die("can/'t insert data");
   		}
   		else{
            echo "successfull";
        }
        $da8=mysqli_fetch_assoc($q8);
        $psid = $da8['psID'];
		

		$qry6="INSERT INTO complaint(`contactNo`, `psID`, `refId`, `firNo`, `date`, `time`, `complainDetails`) VALUES 
		($contact ,$psid ,$refno ,$fir_number ,'$date' ,'$time' ,'$complaint_details')";
   		$q6=mysqli_query($con,$qry6);
   		if(!$q6){
   			die("can/'t insert data");
   		}
   		else{
            echo "successfull";
			header("location:feedback_output.php?area=$area&ref=$refno");
        }
	}

		//echo $contact . $type . $ind . $q1 . $q2 . $q3 . $q4;
?>