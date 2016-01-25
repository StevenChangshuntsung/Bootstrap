<?php
	// $con=mysqli_connect("localhost","my_user","my_password","my_db");
	$con=mysqli_connect("127.0.0.1","root","qwe123","test","3306");

	// Check connection
	if (mysqli_connect_errno($con))
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else{
		echo "<br>MySQL 有連結到。";
	}
	$sql = "SELECT * FROM `table 1` WHERE 1 LIMIT 10";

	if ($result=mysqli_query($con,$sql))
	{
		$rowcount=mysqli_num_rows($result);
	}
	for($i = 0;$i< $rowcount;$i++ ){
		if (!mysqli_data_seek ($result, $i)) { printf ("Cannot seek to row %d\n", $i); continue;}
		//if(!($row = mysqli_fetch_object ($result))) {continue;}
		if(!($row = mysqli_fetch_array ($result))) {continue;}


		printf ("%s %s<BR>\n", $row['COL 3'], $row['COL 4']); 
	}




	echo "<br>現在釋放 result。";mysqli_free_result($result);
	echo "<br>現在關閉 connect。";mysqli_close($con);
?>