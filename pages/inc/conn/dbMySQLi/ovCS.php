<?php  
	/*消耗*/
	function dbMySQLi_ovCS($StrAll) { 
		return $StrAll;
	} 
	function test_get_ShowColumns($dbtable, $con) { 
		$sql = "";
		$sql .= "SHOW COLUMNS FROM `$dbtable`";
		$result=mysqli_query($con,$sql);
		printf("<table>");
		printf("<tr><th>%s</th><th>%s</th></tr>","Field","Key");
		while ($obj=mysqli_fetch_object($result))
		{
			printf("<tr><td>%s</td><td>%s</td></tr>",$obj->Field,$obj->Key);
		}
		printf("</table>");
	}
?>