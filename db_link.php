<?php
	$dblink = mysqli_connect("localhost","root","","dbinventarisperalatan");
 
    if (mysqli_connect_errno()){
        echo "no connecton : " . mysqli_connect_error();
    }
