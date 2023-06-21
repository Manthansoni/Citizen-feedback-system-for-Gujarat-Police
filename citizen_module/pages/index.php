<?php 
    session_start();
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
    <div class="container">
        <div id="phonenum">
            <center>
                <form class="login_form">
                    <div class="imgcontainer">
                        <img src="../images/images.png" alt="logo" class="login_logo">
                    </div>
                    <center>
                        <div class="login_container">
                            <div class="heading_font">
                                <label for="GP">GUJARAT POLICE</label><br>
                                <label for="GP">DEPARTMENT</label><br><br><br>
                            </div>
                            <label for="uname">Enter Mobile No.</label><br>
                            <!-- <input type="text" value="+91" placeholder="+91" name="+91"  class="code"> -->
                            <input type="text" placeholder="Mobile Number" id="number" name="number" class="number" required><br>
                            <label for="type">Here for</label><br>
                            <select name="Type" id="type" class="number">
                                <option value="1">Feedback</option>
                                <option value="2">Complain</option>
                            </select>

                            <div id="recaptcha-container"></div>

                        </div>
                        <input type="button" id="send" value="Get OTP" class="login_button" onClick="phoneAuth()"><br><br><br><br>
                        <div class="login_footer">
                            <label>By clicking Get OTP, you agree with our <a href="#">Terms</a></label><br>
                            <label>Learn how we process your data in our</label><br>
                            <label><a href="#">Privacy Policy</a> and <a href="#">Cookies and Policy</a></label><br><br><br>
                        </div>
                        </div>
                </form>
            </center>
        </div>
        <div id="verifyOTP" style="display: none">
            <center>
                <form class="login_form">
                    <div class="imgcontainer">
                        <img src="../images/images.png" alt="logo" class="login_logo">
                    </div>
                    <center>
                    <div class="login_container">
                        <div class="heading_font">
                            <label for="GP"><b> GUJARAT POLICE </b></label><br>
                            <label for="GP"> <b>DEPARTMENT </b></label><br><br><br>
                        </div>
                        <label for="uname">Enter OTP came on your mobile</label><br>
                        <label for="uname">number 98******12</label><br><br>
                        <!-- <div class="digit-group">
                            <input type="text" id="digit-1" name="digit-1" placeholder="" maxlength="1" required class="code_otp" data-next="digit-2">
                            <input type="text" id="digit-2" name="digit-2" placeholder="" maxlength="1" required class="code_otp" data-next="digit-3" data-previous="digit-1">
                            <input type="text" id="digit-3" name="digit-3" placeholder="" maxlength="1" required class="code_otp" data-next="digit-4" data-previous="digit-2">
                            <input type="text" id="digit-4" name="digit-4" placeholder="" maxlength="1" required class="code_otp" data-previous="digit-3">
                        </div> -->
                        <input type="text" id="verificationcode" placeholder="OTP Code" class="number" style="width: 150px;height: 50px; text-align: center;" class=""><br><br>
                        
                    </div>
                        <input type="button" id="verify" value="Verify" class="login_button" onClick="codeverify()"><br><br>
                        <!-- <button type="submit" class="login_button">Continue</button> -->
                        <div class="p-conf" style="display: none; color: green;">Number Verified</div>
			            <div class="n-conf" style="display: none; color: red;">OTP ERROR</div>
                        <label><font style="opacity:0.6">Didn't get OTP?</font> <a href="#">Click here</a></label><br><br><br>
                        <label>By clicking Get OTP, you agree with our <a href="#">Terms</a></label><br>
                        <label>Learn how we process your data in our</label><br>
                        <label><a href="#">Privacy Policy</a> and <a href="#">Cookies and Policy</a></label><br><br><br>
                    </div>
                </form>
            </center>
        </div>
    </div>
    


    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            appId: "1:716191158726:web:8573d2d0d49aec1c44a2c7",
            apiKey: "AIzaSyAkYme-uMGdw3x0IqwapT216XCfo-6UOpA",
            authDomain: "ssip-d5aab.firebaseapp.com",
            projectId: "ssip-d5aab",
            storageBucket: "ssip-d5aab.appspot.com",
            messagingSenderId: "716191158726",
            measurementId: "G-DKHC5F7JZZ"
        };
            firebase.initializeApp(firebaseConfig);
        render();
        function render(){
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
            // function for send message
        function phoneAuth(){
            var number = document.getElementById('number').value;
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult){
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                document.getElementById('phonenum').style.display = 'none';
                document.getElementById('verifyOTP').style.display = 'block';
            }).catch(function(error){
                alert(error.message);
            });
        }
            // function for code verify
        function codeverify(){
            var code = document.getElementById('verificationcode').value;
            coderesult.confirm(code).then(function(){
                var num = document.getElementById('number').value;
                var num2 = document.getElementById('type').value;
                console.log(num);
                console.log(num2);
                localStorage.setItem("number",num);
                localStorage.setItem("type",num2);
                if (num2 == 1) {
                    window.location.href = "form.php";
                }
                if (num2 == 2) {
                    window.location.href = "complaint_form.php";
                }
                
            }).catch(function(){
                document.getElementsByClassName('p-conf')[0].style.display = 'none';
                document.getElementsByClassName('n-conf')[0].style.display = 'block';
            })
        }
</script>




</body>

</html>