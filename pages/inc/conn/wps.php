<?php  
namespace dbMySQLi\ovWP\wps { 
	/*wps*/
	function dbMySQLi_test($StrAll) { 
		return $StrAll;
	} 
	function get_conn() { 
	global $dbSource;
	$con=mysqli_connect($dbSource["host"],$dbSource["username"],$dbSource["password"],$dbSource["dbname"],$dbSource["port"]);
	    if (mysqli_connect_errno($con))
	    {
	    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    	mysqli_close($con);
	    }else{
	        // echo "<br>MySQL 有連結到。<br>";
	        mysqli_close($con);
	        return mysqli_connect($dbSource["host"],$dbSource["username"],$dbSource["password"],$dbSource["dbname"],$dbSource["port"]);
		}
	    
} 

}
?>