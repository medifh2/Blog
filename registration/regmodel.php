<?php
    $connect = mysqli_connect("localhost", "root", "root", "blog");
    if (!$connect) echo "error";
    $query =mysqli_query($connect,"INSERT INTO `Users` (`Login`, `Password`, `Username`,`About_me`,`accesslvl`) 
	                                     VALUES ($login, $pass, $uname, $about, $lvl)");
