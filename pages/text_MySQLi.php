<?php
	// $con=mysqli_connect("localhost","my_user","my_password","my_db");
	$con=mysqli_connect("127.0.0.1","root","qwe123","test","3306");

	// Check connection
	if (mysqli_connect_errno($con))
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else{
		echo "<br>MySQL 有連結到。<br>";
	}
	$sql = "SELECT * FROM `table 1` WHERE 1 LIMIT 10";

	if ($result=mysqli_query($con,$sql))
	{
		$rowcount=mysqli_num_rows($result);
	}
	//把所有欄位繞出來
	$fieldinfo_name = "";
	while ($fieldinfo=mysqli_fetch_field($result))
		{
			// Get field cursor position
			$currentfield=mysqli_field_tell($result);
			// $StrAll = $StrAll." ". $row[$currentfield];
			// $StrAll = $StrAll." ". $row[$fieldinfo->name];
			//$fieldinfo_name = $fieldinfo_name.$row[$currentfield].",";
			$fieldinfo_name = $fieldinfo_name.$row[$fieldinfo->name].",";
		}
	$array_name = explode(",", $fieldinfo_name);

	$StrAll = "<table>";
	for($i = 0;$i< $rowcount;$i++ ){
		if (!mysqli_data_seek ($result, $i)) { printf ("Cannot seek to row %d\n", $i); continue;}
		//if(!($row = mysqli_fetch_object ($result))) {continue;}
		if(!($row = mysqli_fetch_array ($result))) {continue;}

		//printf ("%s %s<BR>\n", $row['COL 3'], $row['COL 4']); 
		
		$StrAll = $StrAll."<tr>";
			foreach( $array_name as $key => $val ) 
			{
				$StrAll = $StrAll."<td>". $row[$key]."<td>";
			}
			//$StrAll = $StrAll." ". $row[$currentfield];
			//$StrAll = $StrAll."<td>". $currentfield."<td>";
		$StrAll = $StrAll."</tr>";
		
	}
	$StrAll = $StrAll."</table>";
	printf ($StrAll);


	echo "<br>現在釋放 result。";mysqli_free_result($result);
	echo "<br>現在關閉 connect。";mysqli_close($con);
?>
<br><br>
<br>1.連接資料庫
<br>$con=mysqli_connect("127.0.0.1","root","qwe123","test","3306");
<br>
<br>2.資料庫連接錯誤
<br>mysqli_connect_errno()
<br>
<br>3.放SQL 做查詢
<br>mysqli_query($con,$sql)
<br>
<br>4.取出筆數
<br>mysqli_num_rows($result)
<br>
<br>5.指著 某筆資料
<br>mysqli_data_seek ($result, $i)
<br>
<br>6.取得當前行 作為物件返回
<br>mysqli_fetch_object()
<br>
<br>7.取得當前行 作為ARRAY返回
<br>mysqli_fetch_array()
<br>
<br>8. 返回字段指针的当前偏移量
<br>mysqli_field_tell($result)
<br>
<br>
<br>
<br>
<br>