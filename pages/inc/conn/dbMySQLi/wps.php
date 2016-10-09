<?php  
	/*wps*/

	function get_conn() { 
	global $conn_dbSource;
	$con=mysqli_connect($conn_dbSource["host"],$conn_dbSource["username"],$conn_dbSource["password"],$conn_dbSource["dbname"],$conn_dbSource["port"]);
	    if (mysqli_connect_errno($con))
	    {
	    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    	mysqli_close($con);
	    }else{
	        // echo "<br>MySQL 有連結到。<br>";
	        mysqli_close($con);
	        return mysqli_connect($conn_dbSource["host"],$conn_dbSource["username"],$conn_dbSource["password"],$conn_dbSource["dbname"],$conn_dbSource["port"]);
		}
	    
} 

?>