<?php

    session_start();
    
    include ("connection.php");

    if(isset($_SESSION['loginSuccess'])){
        if($_SESSION['loginSuccess'] == "yes"){
            header("Location:index.php");
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="nav">
            <div class="logo">
                <ul>
                    <li><img src="../assets/images/images.png" alt="logo"></li>
                    <li>
                        <h1>GUJARAT POLICE DEPARTMENT</h1>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="form">
        <div class="form">
            <h2>LOGIN</h2>
            <div class="fields">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="username" id="username" placeholder="Username" class="txt1">
                <br>
                <input type="password" name="password" id="password" placeholder="Password" class="txt1">
            </div>
            <div class="button_txt">
                <input type="submit" class="submit" value="LOGIN" id="submitLo" name="submitLo">
                    <!-- <a href="#">LOGIN</a> -->
                <!-- </button> -->
                </div>
                </form>
                <div class="button_txt">
                <h3><a href="#">FORGOT PASSWORD ?</a></h3>
            </div>
        </div>
    </section>
</body>
</html>

<?php


if(isset($_POST['submitLo'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //echo $username;
    $qry = "SELECT * FROM loginofficer where emailid='$username'";
    $q = mysqli_query($con, $qry);
    if(!$q){
        die(mysqli_error($con));
    }
    $ans = mysqli_fetch_array($q);
    $_SESSION['emailid'] = $ans['emailid'];
    $_SESSION['headID'] = $ans['headID'];
    //var_dump($ans);
    if($ans['password'] == $password){
        if($ans['post'] == "inspector"){
            $_SESSION['loginSuccess']="yes";
            header("Location:inspector_page.php");
        }
        else{
        $_SESSION['loginSuccess']="yes";
        header("Location:index.php");
        }
    }
    else{
        echo "<script> alert('Please enter valid username and password !'); </script>";
    }

}


?>