<?php

    define('host','localhost');
	define('user','root');
	define('password','');
	define('db','ssip');

	$con=mysqli_connect(host,user,password,db);

    if(!$con){
		echo "<script> alert('Connection Error'); </script>";
	}
?>